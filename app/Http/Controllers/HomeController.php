<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller {
  
  public function index() {

    if (Auth::id()) {
      return redirect('home');
    }

    else {
      $doctor = doctor::all();
      return view('user.home', compact('doctor'));
    }

  }

  public function redirect() {

    if (Auth::id()) {

      $doctor = doctor::all();

      if (Auth::user()->usertype=='0') {
        return view('user.home', compact('doctor'));
      } 

      else {
        return view('admin.home', compact('doctor'));
      }

    }

    else {
      return redirect()->back();
    }

  }

  public function logout() {
    Session::flush();
    Auth::logout();
    return redirect('/');
  }

  public function make_appointment (Request $request) {

    $appointment = new appointment;
    $appointment->name = $request->name;
    $appointment->email = $request->email;
    $appointment->date = $request->date;
    $appointment->phone = $request->phone;
    $appointment->doctor = $request->doctor;
    $appointment->message = $request->message;
    $appointment->status = "Processing";

    if (Auth::id()) {
      $appointment->user_id = Auth::user()->id;
    }

    else {
      $appointment->user_id = "Guest";
    }

    $appointment->save(); 
    return redirect()->back()->with('success', 'Appointment succesfully created.');

  }

  public function my_appointment() {

    if (Auth::id()) {
      $userid = Auth::user()->id;
      $appointments = DB::table('appointments')->where('user_id', '=', $userid)->get();
      return view('user.my_appointment', compact('appointments'));
    }

    else {
      return redirect()->back()->with('danger', 'Please login to view your appointment.');
    }
  }

  public function cancel_appointment($id) {
    $data = appointment::find($id);
    $data->delete();
    return redirect()->back()->with('success', 'Appointment successfully canceled.');
  }

}
