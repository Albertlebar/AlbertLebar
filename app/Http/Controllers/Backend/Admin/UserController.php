<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

use View;
use DB;

class UserController extends Controller
{
   /**
    * Display a listing of the resource.
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('backend.admin.user.index');
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
      $users = User::all();
      return Datatables::of($users)
        ->addColumn('file_path', function ($users) {
           return "<img src='" . asset($users->file_path) . "' class='img-thumbnail' width='50px'>";
        })
        // ->addColumn('role', function ($user) {
        //    return '<label class="badge badge-secondary">' . ucfirst($user->roles->pluck('name')->implode(' , ')) . '</label>';
        // })
        ->addColumn('status', function ($users) {
           return $users->status ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>';
        })
        ->addColumn('user_type', function ($users) {
           return config('params.user_type')[$users->user_type];
        })
        ->addColumn('is_approved', function ($users) {
           return config('params.bool_val')[$users->is_approved];
        })
        ->addColumn('action', function ($user) use ($can_edit, $can_delete) {
           $html = '<div class="btn-group">';
           $html .= '<a href="' . \URL :: to('admin/users') .  '/' . $user->id . '/edit" data-toggle="tooltip" ' . $can_edit . '  id="' . $user->id . '" class="btn btn-xs btn-info mr-1" title="Edit"><i class="fa fa-edit"></i> </a>';
           $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $user->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
           $html .= '</div>';
           return $html;
        })
        ->rawColumns(['action', 'file_path', 'status', 'user_type', 'is_approved'])
        ->addIndexColumn()
        ->make(true);
   }


   /**
    * Show the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function create(Request $request)
   {
      if ($request->ajax()) {
         $haspermision = auth()->user()->can('user-create');
         if ($haspermision) {
            $roles = Role::all();
            $view = View::make('backend.admin.user.create', compact('roles'))->render();
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
    * @param  \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      if ($request->ajax()) {
         // Setup the validator
         $rules = [
           // 'name' => 'required',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|same:confirm-password',
           'photo' => 'image|max:2024|mimes:jpeg,jpg,png'
         ];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
              'type' => 'error',
              'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {

            $file_path = "assets/images/users/default.png";

            if ($request->hasFile('photo')) {
               if ($request->file('photo')->isValid()) {
                  $destinationPath = public_path('assets/images/users/');
                  $extension = $request->file('photo')->getClientOriginalExtension();
                  $fileName = time() . '.' . $extension;
                  $file_path = 'assets/images/users/' . $fileName;
                  $request->file('photo')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }


            DB::beginTransaction();
            try {

               $user = new User();
               $user->name = $request->input('f_name') . ' ' . $request->input('l_name');
               $user->f_name = $request->input('f_name');
               $user->l_name = $request->input('l_name');
               $user->email = $request->input('email');
               $user->company = $request->input('company');
               $user->address_field_1 = $request->input('address_field_1');
               $user->address_field_2 = $request->input('address_field_2');
               $user->city = $request->input('city');
               $user->country = $request->input('country');
               $user->state_province_county = $request->input('state_province_county');
               $user->postcode = $request->input('postcode');
               $user->telephone = $request->input('telephone');
               $user->mobile = $request->input('mobile');
               $user->vat_number = $request->input('vat_number');
               $user->refrences = $request->input('refrences');
               $user->user_type = $request->input('user_type');
               $user->is_approved = $request->input('is_approved');
               $user->refrences = $request->input('refrences');
               $user->refrences = $request->input('refrences');
               $user->password = Hash::make($request->password);
               $user->email_verified_at = now();
               $user->file_path = $file_path;
               $user->save();

               // generate role
               // $roles = $request->input('roles');
               // if (isset($roles)) {
               //    $user->assignRole($roles);
               // }

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
    * @param  int $id
    *
    * @return \Illuminate\Http\Response
    */
   public function show($id, Request $request)
   {
      if ($request->ajax()) {
         $user = User::findOrFail($id);
         $view = View::make('backend.admin.user.view', compact('user'))->render();
         return response()->json(['html' => $view]);
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    *
    * @return \Illuminate\Http\Response
    */
   public function edit($id, Request $request)
   {
     $haspermision = auth()->user()->can('user-edit');
     if ($haspermision) {
        $user = User::with('roles')->where('id', $id)->first();
        $roles = Role::all(); //Get all roles
        if($request->tab == 'tab-invoice'){
            $view = View::make('backend.admin.user.tab_invoice',compact('user'))->render();
            return response()->json(['html' => $view]);
        }elseif($request->tab == 'tab-order'){
          $view = View::make('backend.admin.user.tab_order',compact('user'))->render();
          return response()->json(['html' => $view]);
        }else{
          $view = View::make('backend.admin.user.edit', compact('user', 'roles'))->render();
          return view('backend.admin.user.edit',compact('user','roles'));  
        }
     } else {
        abort(403, 'Sorry, you are not authorized to access the page');
     }
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  int $id
    *
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, User $user)
   {
      if ($request->ajax()) {

         User::findOrFail($user->id);

         $rules = [
           // 'name' => 'required',
           'email' => 'required|email|unique:users,email,' . $user->id,
           'photo' => 'image|max:2024|mimes:jpeg,jpg,png'
         ];

         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return response()->json([
              'type' => 'error',
              'errors' => $validator->getMessageBag()->toArray()
            ]);
         } else {

            $file_path = $request->input('SelectedFileName');;

            if ($request->hasFile('photo')) {
               if ($request->file('photo')->isValid()) {
                  $destinationPath = public_path('assets/images/users/');
                  $extension = $request->file('photo')->getClientOriginalExtension(); // getting image extension
                  $fileName = time() . '.' . $extension;
                  $file_path = 'assets/images/users/' . $fileName;
                  $request->file('photo')->move($destinationPath, $fileName);
               } else {
                  return response()->json([
                    'type' => 'error',
                    'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                  ]);
               }
            }

            DB::beginTransaction();
            try {
               $user->name = $request->input('f_name') . ' ' . $request->input('l_name');
               $user->f_name = $request->input('f_name');
               $user->l_name = $request->input('l_name');
               $user->email = $request->input('email');
               $user->company = $request->input('company');
               $user->address_field_1 = $request->input('address_field_1');
               $user->address_field_2 = $request->input('address_field_2');
               $user->city = $request->input('city');
               $user->country = $request->input('country');
               $user->state_province_county = $request->input('state_province_county');
               $user->postcode = $request->input('postcode');
               $user->telephone = $request->input('telephone');
               $user->mobile = $request->input('mobile');
               $user->vat_number = $request->input('vat_number');
               $user->refrences = $request->input('refrences');
               $user->user_type = $request->input('user_type');
               $user->is_approved = $request->input('is_approved');
               $user->refrences = $request->input('refrences');
               if(!is_null($user->password))
               {
                  $user->password = Hash::make($request->password);                
               }
               // $user->email_verified_at = now();
               $user->file_path = "assets/images/users/default.png";
               $user->save();

               // $roles = $request->input('roles');
               // if (isset($roles)) {
               //    $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
               // } else {
               //    $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
               // }

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
    * @param  int $id
    *
    * @return \Illuminate\Http\Response
    */
   public function destroy($id, Request $request)
   {
      if ($request->ajax()) {
         $haspermision = auth()->user()->can('user-delete');
         if ($haspermision) {
            $user = User::findOrFail($id); //Get user with specified id
            $user->delete();
            return response()->json(['type' => 'success', 'message' => "Successfully Deleted"]);
         } else {
            abort(403, 'Sorry, you are not authorized to access the page');
         }
      } else {
         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
      }
   }
}
