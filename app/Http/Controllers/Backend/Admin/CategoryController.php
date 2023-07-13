<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use View;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.category.index');
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

      $categories = Category::all();
      return Datatables::of($categories)
        
        ->addColumn('title', function ($categories) {
           return $categories->title;
        })
        ->addColumn('action', function ($categories) use ($can_edit, $can_delete) {
           $html = '<div class="btn-group">';
           $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $categories->id . '" class="btn btn-xs btn-info mr-1 edit" title="Edit"><i class="fa fa-edit"></i> </a>';
           $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $categories->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
           $html .= '</div>';
           return $html;
        })
        ->rawColumns(['action', 'title'])
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
        if ($request->ajax()) {
         $haspermision = auth()->user()->can('user-create');
         if ($haspermision) {
            $roles = Role::all();
            $view = View::make('backend.admin.category.create', compact('roles'))->render();
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
        if ($request->ajax()) {
         // Setup the validator
         $rules = [
           'title' => 'required|unique:categories,title,NULL,id,deleted_at,NULL',
         ];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
              'type' => 'error',
              'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {

            DB::beginTransaction();
            try {

               $category = new Category();
               $category->title = $request->input('title');
               $category->created_by = Auth::user()->id;
               $category->updated_by = Auth::user()->id;
               $category->save();

               DB::commit();
               return response()->json(['type' => 'success', 'message' => "Successfully Created"]);

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
            $category = Category::where('id', $id)->first();
            $roles = Role::all(); //Get all roles
            $view = View::make('backend.admin.category.edit', compact('category', 'roles'))->render();
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
    public function update(Request $request, Category $category)
    {
        if ($request->ajax()) {
                
         Category::findOrFail($category->id);

         $rules = [
           'title' => 'required|unique:categories,title,' . $category->id . ',id,deleted_at,NULL',
         ];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
              'type' => 'error',
              'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {

            DB::beginTransaction();
            try {
               $category->title = $request->input('title');
               $category->updated_by = Auth::user()->id;
               $category->save();

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
            $categories = Category::findOrFail($id); //Get user with specified id
            $categories->delete();
            return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
          } else {
             return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
          }
    }
}
