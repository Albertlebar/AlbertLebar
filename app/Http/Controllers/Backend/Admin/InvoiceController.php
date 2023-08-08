<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;

use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use View;
use DB;
use URL;
use PDF;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.invoice.index');
    }

    public function getAll()
   {
      $can_edit = $can_delete = '';
      if (!auth()->user()->can('user-edit')) {
         $can_edit = "style='display:none;'";
      }
      if (!auth()->user()->can('user-delete')) {
         $can_delete = "style='display:none;'";
      }

      $invoices = Invoice::all();
      return Datatables::of($invoices)
        
        ->addColumn('order_type', function ($invoices) {
           return config('params.order_type')[$invoices->order_type];
        })
        ->addColumn('invoice_number', function ($invoices) {
           return $invoices->invoice_number;
        })
        ->addColumn('created_at', function ($invoices) {
          return Carbon::parse($invoices->created_at)->format('d/m/Y');
           // return $orders->created_at;
        })
        ->addColumn('status', function ($invoices) {
           return config('params.invoice_status')[$invoices->status];
        })
        ->addColumn('order_total', function ($invoices) {
           return number_format((float)$invoices->order_total, 2, '.', '');
        })
        ->addColumn('shipping_address_first_name', function ($invoices) {
           return $invoices->shipping_address_first_name . ' ' . $invoices->shipping_address_last_name;
        })
        ->addColumn('action', function ($invoices) use ($can_edit, $can_delete) {
           $html = '<div class="btn-group">';
           $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $invoices->id . '" class="btn btn-xs btn-info edit" title="Edit"><i class="fa fa-edit"></i> </a>';
           $html .= '<a href="' . \URL :: to('admin/invoice') .  '/' . $invoices->id . '"  id="' . $invoices->id . '" class="btn btn-xs btn-success margin-r-5" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
           // $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $orders->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
           $html .= '<a href="' . \URL :: to('admin/pdf-download-invoice') .  '?id=' . $invoices->id . '"  id="' . $invoices->id . '" class="btn btn-xs btn-warning margin-r-5" title="Download"><i class="fa fa-download fa-fw"></i> </a>';
           $html .= '</div>';
           return $html;
        })
        ->rawColumns(['action', 'invoice_number', 'order_type', 'status', 'order_total', 'shipping_address_first_name'])
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $haspermision = auth()->user()->can('user-create');
       if ($haspermision) {
          $roles = Role::all();
          $users = User::pluck('f_name','id')->toArray();
          // $view = View::make('backend.admin.catelogue.create', compact('roles','users'))->render();
          return view('backend.admin.invoice.create',compact('roles','users'));
       } else {
          abort(403, 'Sorry, you are not authorized to access the page');
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userDetails = User::find($request->user_id);
        $invoice = new Invoice();
        $invoice->user_id = $request->user_id;
        $invoice->invoice_number = Invoice::autoGenerateInvoiceNumber();
        $invoice->order_type = 0;
        $invoice->status = 0;
        // $invoice->payment_status = 0;
        $invoice->sub_total = $request->i_sub_total;
        $invoice->vat = $request->i_vat_total;
        $invoice->order_total = $request->i_total;
        $invoice->shipping_address_first_name = $userDetails->f_name;
        $invoice->shipping_address_last_name = $userDetails->l_name;
        $invoice->shipping_address_1 = $userDetails->address_field_1;
        $invoice->shipping_address_2 = $userDetails->address_field_2;
        $invoice->shipping_city =  $userDetails->city;
        $invoice->shipping_postcode = $userDetails->postcode;
        $invoice->shipping_country = $userDetails->country;
        $invoice->shipping_contact = $userDetails->mobile;
        $invoice->save();
        foreach ($request->item_id as $key => $value) {
          $orderItem = new InvoiceItem();
          $orderItem->invoice_id = $invoice->id;
          $orderItem->item_id = $value;
          $orderItem->quantity = $request->qty[$value];
          $orderItem->size = $request->size[$value] ?? NULL;
          $orderItem->price = $request->total_item_price[$value];
          $orderItem->save();
          // $item->delete();
        }
        $returnURL = URL::to('/admin/invoice');
        return response()->json(['type' => 'success', 'message' => "Successfully Created", 'returnURL' => $returnURL]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $order = Invoice::find($id);
        return view('backend.admin.invoice.view',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
      if ($request->ajax()) {
         $haspermision = auth()->user()->can('user-edit');
         if ($haspermision) {
            $invoice = Invoice::where('id', $id)->first();
            $roles = Role::all(); //Get all roles
            $view = View::make('backend.admin.invoice.edit', compact('invoice', 'roles'))->render();
            return response()->json(['html' => $view]);
         } else {
            abort(403, 'Sorry, you are not authorized to access the page');
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        if ($request->ajax()) {
                
        Invoice::findOrFail($invoice->id);

        DB::beginTransaction();
        try {
           $invoice->status = $request->input('status');
           // $order->updated_by = Auth::user()->id;
           $invoice->save();

           DB::commit();
           return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);

        } catch (\Exception $e) {
           DB::rollback();
           return response()->json(['type' => 'error', 'message' => $e->getMessage()]);
        }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdfDownload(Request $request)
    {
      $order = Invoice::find($request->id);
      // return view('backend.admin.invoice.invoice',compact('order'));
      $pdf = PDF::loadView('backend.admin.invoice.invoice',compact('order'));
      return $pdf->download();
    }
}
