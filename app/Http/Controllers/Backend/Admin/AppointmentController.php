<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use View;
use App\Models\Appointment;
use App\Models\Role;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.appointment.index');
    }

    public function getAllAppointment()
    {
      $can_edit = $can_delete = '';
      if (!auth()->user()->can('user-edit')) {
         $can_edit = "style='display:none;'";
      }
      if (!auth()->user()->can('user-delete')) {
         $can_delete = "style='display:none;'";
      }
        $appointment = Appointment::all();
      return Datatables::of($appointment)
        
        ->addColumn('first_name', function ($appointment) {
           return $appointment->first_name;
        })
        ->addColumn('last_name', function ($appointment) {
           return $appointment->last_name;
        })
        ->addColumn('email', function ($appointment) {
           return $appointment->email;
        })
        ->addColumn('phone_number', function ($appointment) {
           return $appointment->phone_number;
        })
        ->addColumn('appointment_type', function ($appointment) {
           return $appointment->appointment_type == 0 ? 'Face to Face' : 'Call';
        })
        ->addColumn('notes', function ($appointment) {
           return $appointment->notes;
        })
        ->addColumn('status', function ($appointment) {
          if($appointment->status == 0){
           return '<label class="badge badge-warning">Pending</label>';
          }elseif($appointment->status == 1){
           return '<label class="badge badge-info">Approved</label>';
          }elseif($appointment->status == 2){
           return '<label class="badge badge-danger">Not Approved</label>';
          }elseif($appointment->status == 3){
           return '<label class="badge badge-success">Success</label>'; 
          }
        })
        ->addColumn('appointment_date', function ($appointment) {
           return Carbon::parse($appointment->appointment_date)->format('M d, Y');
        })
        ->addColumn('action', function ($appointment) use ($can_edit, $can_delete) {
           $html = '<div class="btn-group">';
           $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $appointment->id . '" class="btn btn-xs btn-info mr-1 edit" title="Edit"><i class="fa fa-edit"></i> </a>';
           $html .= '</div>';
           return $html;
        })
        ->rawColumns(['first_name', 'last_name', 'email', 'phone_number', 'appointment_type', 'appointment_date', 'notes', 'action','status'])
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
            $appointment = Appointment::where('id', $id)->first();
            $roles = Role::all(); //Get all roles
            $view = View::make('backend.admin.appointment.edit', compact('appointment', 'roles'))->render();
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
    public function update(Request $request, Appointment $appointment)
    {
        if ($request->ajax()) {
                
         Appointment::findOrFail($appointment->id);
         DB::beginTransaction();
        try {
           $appointment->status = $request->input('status');
           $appointment->save();

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
}
