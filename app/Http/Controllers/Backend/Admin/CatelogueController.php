<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
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
use URL;

class CatelogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.catelogue.index');
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

      $items = Item::all();
      return Datatables::of($items)
        
        ->addColumn('category_id', function ($items) {
           return $items->category->title;
        })
        ->addColumn('item_title', function ($items) {
           return $items->item_title;
        })
        ->addColumn('item_code', function ($items) {
           return $items->item_code;
        })
        ->addColumn('item_description', function ($items) {
           return $items->item_description;
        })
        ->addColumn('supplier_name', function ($items) {
           return $items->supplier_name;
        })
        ->addColumn('supplier_code', function ($items) {
           return $items->supplier_code;
        })
        ->addColumn('metal_type', function ($items) {
           return config('params.metal_type')[$items->metal_type];
        })
        ->addColumn('metal_colour', function ($items) {
           return config('params.metal_colour')[$items->metal_colour];
        })
        ->addColumn('total_gold_weight', function ($items) {
           return number_format((float)$items->total_gold_weight, 2, '.', '');
        })
        ->addColumn('total_ct_weight', function ($items) {
           return number_format((float)$items->total_ct_weight, 2, '.', '');
        })
        ->addColumn('gold_price', function ($items) {
           return number_format((float)$items->gold_price, 2, '.', '');
        })
        ->addColumn('stone_price', function ($items) {
           return number_format((float)$items->stone_price, 2, '.', '');          
        })
        ->addColumn('labour_cost', function ($items) {
           return number_format((float)$items->labour_cost, 2, '.', '');
        })
        ->addColumn('duty_and_extra', function ($items) {
           return number_format((float)$items->duty_and_extra, 2, '.', '');
        })
        ->addColumn('total_cost', function ($items) {
           return number_format((float)$items->total_cost, 2, '.', '');
        })
        ->addColumn('profit_trade', function ($items) {
           return number_format((float)$items->profit_trade, 2, '.', '');
        })
        ->addColumn('profit_retail', function ($items) {
           return number_format((float)$items->profit_retail, 2, '.', '');
        })
        ->addColumn('total_trade', function ($items) {
           return number_format((float)$items->total_trade, 2, '.', '');
        })
        ->addColumn('total_retail', function ($items) {
           return number_format((float)$items->total_retail, 2, '.', '');
        })
        ->addColumn('is_active', function ($items) {
           return $items->is_active ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>';
        })
        ->addColumn('action', function ($items) use ($can_edit, $can_delete) {
           $html = '<div class="btn-group">';
           $html .= '<a href="' . \URL :: to('admin/catelogues') .  '/' . $items->id . '/edit"  id="' . $items->id . '" class="btn btn-xs btn-info margin-r-5" title="View"><i class="fa fa-edit"></i> </a>';
           // $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $items->id . '" class="btn btn-xs btn-info mr-1 edit" title="Edit"><i class="fa fa-edit"></i> </a>';
           $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $items->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
           $html .= '</div>';
           return $html;
        })
        ->rawColumns(['action', 'category_id', 'item_title', 'item_code', 'item_description', 'supplier_name', 'supplier_code', 'metal_type', 'metal_colour', 'total_gold_weight', 'total_ct_weight', 'gold_price', 'stone_price', 'labour_cost', 'duty_and_extra', 'total_cost', 'profit_trade', 'profit_retail', 'total_trade', 'total_retail', 'is_active'])
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
          $categories = Category::pluck('title','id')->toArray();
          $categories[''] = 'Select Category';
          $view = View::make('backend.admin.catelogue.create', compact('roles','categories'))->render();
          return view('backend.admin.catelogue.create',compact('roles','categories'));
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
        if ($request->ajax()) {
         // Setup the validator
         $rules = [
           'category_id' => 'required',
           'item_title' => 'required|max:255',
           'item_code' => 'required|max:255',
           'item_description' => 'required|max:255',
           'supplier_name' => 'required|max:255',
           'supplier_code' => 'required|max:255',

           'metal_type' => 'required',
           'metal_colour' => 'required',
           'total_gold_weight' => 'required|numeric|min:0|max:100000',
           'total_ct_weight' => 'required|numeric|min:0|max:100000',

           'gold_price' => 'required|numeric|min:0|max:100000',
           'stone_price' => 'required|numeric|min:0|max:100000',
           'labour_cost' => 'required|numeric|min:0|max:100000',
           'duty_and_extra' => 'required|numeric|min:0|max:100000',
           'total_cost' => 'required|numeric|min:0|max:100000',
           'profit_trade' => 'required|numeric|min:0|max:100',
           'profit_retail' => 'required|numeric|min:0|max:100',
         ];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
              'type' => 'error',
              'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {

            if ($request->hasFile('photo_0')) {
               if ($request->file('photo_0')->isValid()) {
                  $destinationPath = public_path('assets/images/items/');
                  $extension = $request->file('photo_0')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path_0 = 'assets/images/items/' . $fileName;
                  $request->file('photo_0')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }

            if ($request->hasFile('photo_1')) {
               if ($request->file('photo_1')->isValid()) {
                  $destinationPath = public_path('assets/images/items/');
                  $extension = $request->file('photo_1')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path_1 = 'assets/images/items/' . $fileName;
                  $request->file('photo_1')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }

            if ($request->hasFile('photo_2')) {
               if ($request->file('photo_2')->isValid()) {
                  $destinationPath = public_path('assets/images/items/');
                  $extension = $request->file('photo_2')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path_2 = 'assets/images/items/' . $fileName;
                  $request->file('photo_2')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }

            if ($request->hasFile('photo_3')) {
               if ($request->file('photo_3')->isValid()) {
                  $destinationPath = public_path('assets/images/items/');
                  $extension = $request->file('photo_3')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path_3 = 'assets/images/items/' . $fileName;
                  $request->file('photo_3')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }
            
            DB::beginTransaction();
            try {

               $item = new Item();
               $item->category_id = $request->input('category_id');
               $item->item_title = $request->input('item_title');
               $item->item_code = $request->input('item_code');
               $item->item_description = $request->input('item_description');
               $item->supplier_name = $request->input('supplier_name');
               $item->supplier_code = $request->input('supplier_code');
               $item->metal_type = $request->input('metal_type');
               $item->metal_colour = $request->input('metal_colour');
               $item->total_gold_weight = $request->input('total_gold_weight');
               $item->total_ct_weight = $request->input('total_ct_weight');

               $item->gold_price = $request->input('gold_price');
               $item->stone_price = $request->input('stone_price');
               $item->labour_cost = $request->input('labour_cost');
               $item->duty_and_extra = $request->input('duty_and_extra');
               $item->total_cost = $request->input('total_cost');
               $item->profit_trade = $request->input('profit_trade');
               $item->profit_retail = $request->input('profit_retail');
               $item->total_trade = $request->input('total_trade');
               $item->total_retail = $request->input('total_retail');
               $item->is_active = $request->input('is_active');
               $item->is_sale = $request->input('is_sale');
               $item->best_seller = $request->input('best_seller');
               if(isset($file_path_0)){
                $item->photo_0 = $file_path_0;                
               }
               if(isset($file_path_1)){
                $item->photo_1 = $file_path_1;                
               }
               if(isset($file_path_2)){
                $item->photo_2 = $file_path_2;                
               }
               if(isset($file_path_3)){
                $item->photo_3 = $file_path_3;                
               }
               $item->created_by = Auth::user()->id;
               $item->updated_by = Auth::user()->id;
               $item->save();

               DB::commit();
               $returnURL = URL::to('/admin/catelogues') . '/' . $item->id . '/edit';
               return response()->json(['type' => 'success', 'message' => "Successfully Created", 'returnURL' => $returnURL]);

            } catch (\Exception $e) {
               DB::rollback();
               return response()->json(['type' => 'error', 'message' => $e->getMessage()]);
            }

         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
        
        $item = Item::find($id);
        
         $rules = [
           'category_id' => 'required',
           'item_title' => 'required|max:255',
           'item_code' => 'required|max:255',
           'item_description' => 'required|max:255',
           'supplier_name' => 'required|max:255',
           'supplier_code' => 'required|max:255',
           'metal_type' => 'required',
           'metal_colour' => 'required',
           'total_gold_weight' => 'required|numeric|min:0|max:100000',
           'total_ct_weight' => 'required|numeric|min:0|max:100000',
           'gold_price' => 'required|numeric|min:0|max:100000',
           'stone_price' => 'required|numeric|min:0|max:100000',
           'labour_cost' => 'required|numeric|min:0|max:100000',
           'duty_and_extra' => 'required|numeric|min:0|max:100000',
           'total_cost' => 'required|numeric|min:0|max:100000',
           'profit_trade' => 'required|numeric|min:0|max:100',
           'profit_retail' => 'required|numeric|min:0|max:100',
         ];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
              'type' => 'error',
              'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {
              
            if ($request->hasFile('photo_0')) {
               if ($request->file('photo_0')->isValid()) {
                  $destinationPath = public_path('assets/images/items/');
                  $extension = $request->file('photo_0')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path_0 = 'assets/images/items/' . $fileName;
                  $request->file('photo_0')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }

            if ($request->hasFile('photo_1')) {
               if ($request->file('photo_1')->isValid()) {
                  $destinationPath = public_path('assets/images/items/');
                  $extension = $request->file('photo_1')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path_1 = 'assets/images/items/' . $fileName;
                  $request->file('photo_1')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }

            if ($request->hasFile('photo_2')) {
               if ($request->file('photo_2')->isValid()) {
                  $destinationPath = public_path('assets/images/items/');
                  $extension = $request->file('photo_2')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path_2 = 'assets/images/items/' . $fileName;
                  $request->file('photo_2')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }

            if ($request->hasFile('photo_3')) {
               if ($request->file('photo_3')->isValid()) {
                  $destinationPath = public_path('assets/images/items/');
                  $extension = $request->file('photo_3')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path_3 = 'assets/images/items/' . $fileName;
                  $request->file('photo_3')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }

            DB::beginTransaction();
            try {
               $item->category_id = $request->input('category_id');
               $item->item_title = $request->input('item_title');
               $item->item_code = $request->input('item_code');
               $item->item_description = $request->input('item_description');
               $item->supplier_name = $request->input('supplier_name');
               $item->supplier_code = $request->input('supplier_code');

               $item->metal_type = $request->input('metal_type');
               $item->metal_colour = $request->input('metal_colour');
               $item->total_gold_weight = $request->input('total_gold_weight');
               $item->total_ct_weight = $request->input('total_ct_weight');

               $item->gold_price = $request->input('gold_price');
               $item->stone_price = $request->input('stone_price');
               $item->labour_cost = $request->input('labour_cost');
               $item->duty_and_extra = $request->input('duty_and_extra');
               $item->total_cost = $request->input('total_cost');
               $item->profit_trade = $request->input('profit_trade');
               $item->profit_retail = $request->input('profit_retail');
               $item->total_trade = $request->input('total_trade');
               $item->total_retail = $request->input('total_retail');
               $item->is_active = $request->input('is_active');
               $item->is_sale = $request->input('is_sale');
               $item->best_seller = $request->input('best_seller');
               if(!empty($file_path_0)){
                $item->photo_0 = $file_path_0;                
               }
               if(!empty($file_path_1)){
                $item->photo_1 = $file_path_1;                
               }
               if(!empty($file_path_2)){
                $item->photo_2 = $file_path_2;                
               }
               if(!empty($file_path_3)){
                $item->photo_3 = $file_path_3;                
               }
               $item->updated_by = Auth::user()->id;
               $item->save();

               DB::commit();
               return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);

            } catch (\Exception $e) {
               DB::rollback();
               return response()->json(['type' => 'error', 'message' => $e->getMessage()]);
            }

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
    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
        $haspermision = auth()->user()->can('user-delete');
        if ($haspermision) {
            $item = Item::find($id); //Get user with specified id
            $item->delete();
            return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
          } else {
             return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
          }
    }
}
