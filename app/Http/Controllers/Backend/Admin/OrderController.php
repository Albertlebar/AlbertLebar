<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use View;
use DB;
use App\Models\Role;
use App\Models\Item;
use App\Models\User;
use App\Models\OrderItem;
use URL;
use PDF;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.order.index');
    }

    public function getAll(Request $request)
   {
      
      $can_edit = $can_delete = '';
      if (!auth()->user()->can('user-edit')) {
         $can_edit = "style='display:none;'";
      }
      if (!auth()->user()->can('user-delete')) {
         $can_delete = "style='display:none;'";
      }
      if(!empty($request['user_id']))
      {
        $orders = Order::where('user_id',$request['user_id'])->get(); 
        $return = "style='display:none;'";
        $status = "style='display:none;'";

        // $invoices->;
      }else{
        $orders = Order::select('*');
        if(!empty($request['param']))
        {
          $orders->where('orders.created_at', '>=', Carbon::yesterday());
          $orders->orWhere('orders.created_at', '=',now());  
        }
        $orders->get();
      }
      return Datatables::of($orders)
        
        ->addColumn('order_type', function ($orders) {
           return config('params.order_type')[$orders->order_type];
        })
        ->addColumn('order_number', function ($orders) {
           return $orders->order_number;
        })
        ->addColumn('created_at', function ($orders) {
          return Carbon::parse($orders->created_at)->format('d/m/Y');
           // return $orders->created_at;
        })
        ->addColumn('order_status', function ($orders) {
           return config('params.order_status')[$orders->order_status];
        })
        ->addColumn('order_total', function ($orders) {
           return number_format((float)$orders->order_total, 2, '.', '');
        })
        ->addColumn('shipping_address_first_name', function ($orders) {
           return $orders->shipping_address_first_name . ' ' . $orders->shipping_address_last_name;
        })
        ->addColumn('action', function ($orders) use ($can_edit, $can_delete) {
           $html = '<div class="btn-group">';
           $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $orders->id . '" class="btn btn-xs btn-info edit" title="Edit"><i class="fa fa-edit"></i> </a>';
           $html .= '<a href="' . \URL :: to('admin/orders') .  '/' . $orders->id . '"  id="' . $orders->id . '" class="btn btn-xs btn-success margin-r-5" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
           // $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $orders->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
           $html .= '<a href="' . \URL :: to('admin/pdf-download') .  '?id=' . $orders->id . '"  id="' . $orders->id . '" class="btn btn-xs btn-warning margin-r-5" title="Download"><i class="fa fa-download fa-fw"></i> </a>';
           $html .= '</div>';
           return $html;
        })
        ->rawColumns(['action', 'order_type', 'order_status', 'order_total', 'shipping_address_first_name'])
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
          $view = View::make('backend.admin.catelogue.create', compact('roles','users'))->render();
          return view('backend.admin.order.create',compact('roles','users'));
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
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->order_number = Order::autoGenerateOrderNumber();
        $order->order_type = 0;
        $order->order_status = 0;
        $order->payment_status = 0;
        $order->sub_total = $request->i_sub_total;
        $order->vat = $request->i_vat_total;
        $order->order_total = $request->i_total;
        $order->shipping_address_first_name = $userDetails->f_name;
        $order->shipping_address_last_name = $userDetails->l_name;
        $order->shipping_address_1 = $userDetails->address_field_1;
        $order->shipping_address_2 = $userDetails->address_field_2;
        $order->shipping_city =  $userDetails->city;
        $order->shipping_postcode = $userDetails->postcode;
        $order->shipping_country = $userDetails->country;
        $order->shipping_contact = $userDetails->mobile;
        $order->save();
        foreach ($request->item_id as $key => $value) {
          $orderItem = new OrderItem();
          $orderItem->order_id = $order->id;
          $orderItem->item_id = $value;
          $orderItem->quantity = $request->qty[$value];
          $orderItem->size = $request->size[$value] ?? NULL;
          $orderItem->price = $request->total_item_price[$value];
          $orderItem->save();
          // $item->delete();
        }
        $returnURL = URL::to('/admin/orders');
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
        $order = Order::find($id);
        return view('backend.admin.order.view',compact('order'));
        if ($request->ajax()) {
            $haspermision = auth()->user()->can('role-view');
            if ($haspermision) {
                $order = Order::find($id);
                
                $permissions = $role->permissions()->get();
                $view = View::make('backend.admin.role.view', compact('role', 'permissions'))->render();
                return response()->json(['html' => $view]);
            } else {
                abort(403, 'Sorry, you are not authorized to access the page');
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
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
            $order = Order::where('id', $id)->first();
            $roles = Role::all(); //Get all roles
            $view = View::make('backend.admin.order.edit', compact('order', 'roles'))->render();
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
    public function update(Request $request, Order $order)
    {
        if ($request->ajax()) {
                
        Order::findOrFail($order->id);

        DB::beginTransaction();
        try {
           $order->order_status = $request->input('status');
           $order->notes = $request->input('notes');

           // $order->updated_by = Auth::user()->id;
           $order->save();

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

    public function addProduct(Request $request)
    {
        $view = View::make('backend.admin.order.add_product')->render();
            return response()->json(['html' => $view]);
    }

    public function addProductData(Request $request)
    {
        $can_edit = $can_delete = '';
      if (!auth()->user()->can('user-edit')) {
         $can_edit = "style='display:none;'";
      }
      if (!auth()->user()->can('user-delete')) {
         $can_delete = "style='display:none;'";
      }

      $items = Item::select('items.*', DB::raw("sum(item_stocks.stock) as total_stock"))->leftjoin('item_stocks','items.id','=','item_stocks.item_id')->groupBy('items.id')->get();
      return Datatables::of($items)
        
        ->addColumn('checkbox', function ($items) {
            return '<input type="checkbox" id="'.$items->id.'" value="'. $items->id .'" name="someCheckbox[]" />';
        })
        ->addColumn('category_id', function ($items) {
           return $items->category->title;
        })
        ->addColumn('total_stock', function ($items) {
           return $items->total_stock > 0 ? $items->total_stock : 0;
        })
        ->addColumn('metal_type', function ($items) {
           return config('params.metal_type')[$items->metal_type];
        })
        ->addColumn('metal_colour', function ($items) {
           return config('params.metal_colour')[$items->metal_colour];
        })
        ->addColumn('total_trade', function ($items) {
           return number_format((float)$items->total_trade, 2, '.', '');
        })
        ->addColumn('total_retail', function ($items) {
           return number_format((float)$items->total_retail, 2, '.', '');
        })
        ->rawColumns(['checkbox','category_id','total_stock','metal_type','metal_colour','total_trade','total_retail'])
        ->addIndexColumn()
        ->make(true);
    }

    public function userDetails(Request $request)
    {
        $userDetails = User::where('id',$request->user_id)->first();
        return response()->json(['userData' => $userDetails]);
    }

    public function getItemDetails(Request $request)
    {
        $id = $request->id;
        $userType = $request->user_type;
        $itemDetails = Item::where('id',$id)->get();
        $view = View::make('backend.admin.order.order_item', compact('itemDetails','userType'))->render();
        return response()->json(['html' => $view]);
    }

    public function getItem(Request $request)
    {
        $item = Item::where('item_title','LIKE',"%".$request['term']['term']."%")
                    ->orWhere('item_code','LIKE',"%".$request['term']['term']."%")
                    ->get()->toArray();

        return response()->json(['data' => $item]);
    }

    public function pdfDownload(Request $request)
    {
      $order = Order::find($request->id);
      // return view('backend.admin.order.invoice',compact('order'));
      $pdf = PDF::loadView('backend.admin.order.invoice',compact('order'));
      return $pdf->download();
    }
}
