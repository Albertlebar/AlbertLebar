<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use App\Models\Appointment;
use Yajra\DataTables\DataTables;

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

    public function getAllAppointment()
    {
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
        ->addColumn('appointment_date', function ($appointment) {
           return $appointment->appointment_date;
        })
        ->rawColumns(['first_name', 'last_name', 'email', 'phone_number', 'appointment_type', 'appointment_date', 'notes'])
        ->addIndexColumn()
        ->make(true);
    }
}
