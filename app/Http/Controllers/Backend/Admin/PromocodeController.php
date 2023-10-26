<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Promocode;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use View;
use DB;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.promocode.index');
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

      $promocodes = Promocode::all();
      return Datatables::of($promocodes)
        
        ->addColumn('promocode', function ($promocodes) {
           return $promocodes->promocode;
        })
        ->addColumn('status', function ($promocodes) {
           return $promocodes->is_active ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>';
        })
        ->addColumn('action', function ($promocodes) use ($can_edit, $can_delete) {
           $html = '<div class="btn-group">';
           $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $promocodes->id . '" class="btn btn-xs btn-info mr-1 edit" title="Edit"><i class="fa fa-edit"></i> </a>';
           $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $promocodes->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
           $html .= '</div>';
           return $html;
        })
        ->rawColumns(['action', 'status' ,'promocode'])
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
            $view = View::make('backend.admin.promocode.create', compact('roles'))->render();
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
           'promocode' => 'required|unique:promocodes,promocode,NULL,id',
           'discount' => 'required'
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

               $promocode = new Promocode();
               $promocode->promocode = $request->input('promocode');
               $promocode->discount = $request->input('discount');
               $promocode->is_active = $request->input('status');
               $promocode->save();

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
            $promocode = Promocode::where('id', $id)->first();
            $roles = Role::all(); //Get all roles
            $view = View::make('backend.admin.promocode.edit', compact('promocode', 'roles'))->render();
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
    public function update(Request $request, Promocode $promocode)
    {
        if ($request->ajax()) {
                
         Promocode::findOrFail($promocode->id);

         $rules = [
           'promocode' => 'required',
           'discount' => 'required'
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
               $promocode->promocode = $request->input('promocode');
               $promocode->discount = $request->input('discount');
               $promocode->is_active = $request->input('status');
               $promocode->save();

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
            $promocodes = Promocode::findOrFail($id); //Get user with specified id
            $promocodes->delete();
            return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
        } else {
            abort(403, 'Sorry, you are not authorized to access the page');
        }
          } else {
             return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
          }
    }
}
