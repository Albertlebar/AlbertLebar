<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use App\Models\Appointment;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return View::make('backend.admin.home');
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
