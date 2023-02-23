<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller {
  
  public function index() {

    if (Auth::id()) {
      return redirct('home');
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

  public function myappointment () {

    if (Auth::id()) {

      $doctor = doctor::all();
      return view('user.my_appointment', compact('doctor'));
    }

    else {
      return redirect()->back()->with('danger', 'Please Login first.');

    }
  }
}
