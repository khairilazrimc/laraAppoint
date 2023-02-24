<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Appointment;
use App\Models\Doctor;

class AdminController extends Controller {
  
  public function addview() {
    return view('admin.add_doctor');
  }

  public function upload (Request $request) {
    
    $doctor = new doctor;

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/doctorimages');
      $image->move($destinationPath, $imagename);
    } 

    else {
      dd('Request Has No File');
    }

    $doctor->image = $imagename;
    $doctor->name = $request->name;
    $doctor->phone = $request->phone;
    $doctor->speciality = $request->speciality;
    $doctor->save(); 
    return redirect()->back()->with('success', 'Doctor succesfully added.');
  }

  public function showappointment () {
    $appointments = appointment::all();
    return view('admin.show_appointment', compact('appointments'));
  }

  public function approveappointment($id) {
    $data = appointment::find($id);
    $data->status = 'Approved';
    $data->save();
    return redirect()->back()->with('success', 'Status successfully updated.');
  }

  public function disapproveappointment($id) {
    $data = appointment::find($id);
    $data->status = 'Disapprove';
    $data->save();
    return redirect()->back()->with('success', 'Status successfully updated.');
  }
}
