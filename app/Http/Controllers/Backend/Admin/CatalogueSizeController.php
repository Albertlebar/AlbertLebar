<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\User;
use App\Models\ItemImage;
use App\Models\ItemStock;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use View;
use DB;

class CatalogueSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.catalogue_size.index');
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
        DB::beginTransaction();
        try{
            $itemStock = ItemStock::where('item_id',$request->item_id)->get();
            if(!empty($request->size))
            {
                foreach ($request->size as $key => $value) 
                {
                    $itemStock = ItemStock::find($key);
                    $itemStock->size = $value;
                    $itemStock->stock = $request->stock[$key];
                    $itemStock->save();
                }
                $itemStockDelete = ItemStock::where('item_id',$request->item_id)->whereNotIn('id',array_keys($request->size))->delete();
            }
            
            if(!empty($request->new_size))
            {
                foreach ($request->new_size as $key => $value) {
                    $itemStock = new ItemStock();
                    $itemStock->item_id = $request->item_id;
                    $itemStock->size = $value;
                    $itemStock->stock = $request->new_stock[$key];
                    $itemStock->save();
                }
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
            $itemStock = ItemStock::where('item_id',$id)->get();
            $roles = Role::all(); //Get all roles
            $view = View::make('backend.admin.catalogue_size.edit', compact('item', 'itemStock','roles'))->render();
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
