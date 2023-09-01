<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use App\Models\Appointment;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use DB;
use App\Models\Order;
// use App\Model\Appointment;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $orderInformation = Order::select(DB::raw("sum(orders.order_total) as total_order_price"),DB::raw("count(id) as total_order"),DB::raw("SUM(CASE 
            WHEN created_at >= '" . Carbon::yesterday() . "' OR created_at = now()  THEN 1 ELSE 0 END) AS new_order"), DB::raw("SUM(CASE 
            WHEN created_at >= '" . Carbon::yesterday() . "' OR created_at = now()  THEN orders.order_total ELSE 0 END) AS new_sell"))->first();
        $appointment = Appointment::select(DB::raw("count(id) as total_appointment"),DB::raw("SUM(CASE 
            WHEN created_at >= '" . Carbon::yesterday() . "' OR created_at = now()  THEN 1 ELSE 0 END) AS new_appointment"))->first();
        // echo "<pre>";
        // print_r($appointment);
        // die;
        // echo "<pre>";
        // print_r($orderInformation);
        // die;
        return View::make('backend.admin.home',compact('orderInformation','appointment'));
    }

    public function appointment()
    {
    	return View::make('backend.admin.appointment.index');
    }

    public function getDetails(Request $request)
    {
      echo "<pre>";
      print_r($request->id);
      die;
      $haspermision = auth()->user()->can('user-edit');
       if ($haspermision) {
          $item = Item::where('id', $id)->first();
          $roles = Role::all(); //Get all roles
          if($request->tab == 'tab-size-stock')
          {
            $itemStock = ItemStock::where('item_id',$id)->get();
            $view = View::make('backend.admin.catelogue.tab_size_stock', compact('item', 'itemStock','roles'))->render();
            return response()->json(['html' => $view]);
            // return view('backend.admin.catelogue.tab_size_stock',compact('item','itemStock','roles'));
          }else{
            $categories = Category::pluck('title','id')->toArray();
            $categories[''] = 'Select Category';
            return view('backend.admin.catelogue.edit',compact('item','categories'));
          }
       } else {
          abort(403, 'Sorry, you are not authorized to access the page');
       }
    }
}
