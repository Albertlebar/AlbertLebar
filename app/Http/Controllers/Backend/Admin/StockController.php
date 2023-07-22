<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemStock;
use App\Models\Role;
use View;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.stock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
         $haspermision = auth()->user()->can('user-create');
         if ($haspermision) {
            $roles = Role::all();
            $categories = Category::pluck('title','id')->toArray();
            $categories[''] = 'Select Category';
            $view = View::make('backend.admin.catelogue.create', compact('roles','categories'))->render();
            return response()->json(['html' => $view]);
         } else {
            abort(403, 'Sorry, you are not authorized to access the page');
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
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
        DB::beginTransaction();
        try{
            $itemStock = ItemStock::where('item_id',$request->item_id)->first();
            if(isset($itemStock))
            {
                $itemStock->item_id = $request->input('item_id');  
                $itemStock->stock = json_encode($request->input('stock'));  
                $itemStock->save();
            }else{
                $itemStock = new ItemStock();
               $itemStock->item_id = $request->input('item_id');
               $itemStock->stock = json_encode($request->input('stock'));
               $itemStock->save();
            }
            return response()->json(['type' => 'success', 'message' => "Successfully Created"]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['type' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $item = Item::where('id', $id)->first();
            $itemStock = ItemStock::where('item_id',$id)->first();
            $itemQty = isset($itemStock) ? json_decode($itemStock->stock,true) : NULL;
            $roles = Role::all(); //Get all roles
            $view = View::make('backend.admin.stock.edit', compact('item', 'itemStock', 'itemQty','roles'))->render();
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
