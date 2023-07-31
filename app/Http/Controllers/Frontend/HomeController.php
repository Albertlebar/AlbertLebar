<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Appointment;
use App\Models\Cart;
use App\Models\Item;


class HomeController extends Controller
{

   public function __construct()
  {
      $this->middleware(['is_verify_email']);
  }

   public function index()
   {
      $items = Item::latest()->limit(8)->get();
      return View::make('frontend.index',compact('items'));
   }

   // News Details
   public function viewNews(Blog $blog)
   {
      return view('frontend.newsDetails', compact('blog'));
   }

   public function termsConditions()
   {
      return view('frontend.term_conditions');
   }

   public function returnPolicy()
   {
      return view('frontend.return_policy');
   }

   public function aboutUs()
   {
      return view('frontend.about_us');
   }

   public function bookAppointment()
   {
      return view('frontend.book_appointment');
   }

   public function bookAppointmentSave(Request $request)
   {
      if ($request->ajax()) {
         // Setup the validator
         $rules = [
           'first_name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'email' => 'required|max:255',
           'phone_number' => 'required',
           'appointment_type' => 'required',
           'appointment_date' => 'required',
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

               $appointment = new Appointment();
               $appointment->first_name = $request->input('first_name');
               $appointment->last_name = $request->input('last_name');
               $appointment->email = $request->input('email');
               $appointment->phone_number = $request->input('phone_number');
               $appointment->appointment_type = $request->input('appointment_type');
               $appointment->appointment_date = \DateTime::createFromFormat('d/m/Y H:i:s', $request->input('appointment_date').' '.date('H:i:s'));
               $appointment->notes = $request->input('notes');
               $appointment->save();
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
}
