<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use View;
use DB;

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

    public function getAll()
   {
      $can_edit = $can_delete = '';
      if (!auth()->user()->can('user-edit')) {
         $can_edit = "style='display:none;'";
      }
      if (!auth()->user()->can('user-delete')) {
         $can_delete = "style='display:none;'";
      }

      $orders = Order::all();
      return Datatables::of($orders)
        
        ->addColumn('order_type', function ($orders) {
           return config('params.order_type')[$orders->order_type];
        })
        ->addColumn('order_status', function ($orders) {
           return config('params.order_status')[$orders->order_status];
        })
        ->addColumn('order_total', function ($orders) {
           return $orders->order_total;
        })
        ->addColumn('shipping_address_first_name', function ($orders) {
           return $orders->shipping_address_first_name . ' ' . $orders->shipping_address_last_name;
        })
        ->addColumn('action', function ($orders) use ($can_edit, $can_delete) {
           $html = '<div class="btn-group">';
           // $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $orders->id . '" class="btn btn-xs btn-info edit" title="Edit"><i class="fa fa-edit"></i> </a>';
           $html .= '<a href="' . \URL :: to('admin/orders') .  '/' . $orders->id . '"  id="' . $orders->id . '" class="btn btn-xs btn-success margin-r-5" title="View"><i class="fa fa-eye fa-fw"></i> </a>';
           // $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $orders->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
