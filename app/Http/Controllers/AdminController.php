<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Appointment;
use App\Models\Doctor;
use Notification;
use App\Notifications\SendMailNotification;

class AdminController extends Controller {

  public function showappointments () {
    if (Auth::id() and Auth::user()->usertype==1) {
      $appointments = appointment::all();
      return view('admin.show_appointments', compact('appointments'));
    }
    else {
      return redirect()->back()->with('danger', 'Restricted Access');
    }
  }

  public function approveappointment($id) {
    $data = appointment::find($id);
    $data->status = 'Approved';
    $data->save();
    return redirect()->back()->with('success', 'Status successfully updated.');
  }

  public function disapproveappointment($id) {
    $data = appointment::find($id);
    $data->status = 'Disapproved';
    $data->save();
    return redirect()->back()->with('success', 'Status successfully updated.');
  }




  public function showdoctors () {
    if (Auth::id() and Auth::user()->usertype==1) {
      $doctors = doctor::all();
      return view('admin.show_doctors', compact('doctors'));
    }
    else {
      return redirect()->back()->with('danger', 'Restricted Access');
    }
  }

  public function deletedoctor($id) {
    $data = doctor::find($id);
    $data->delete();
    return redirect()->back()->with('success', 'Doctor successfully deleted.');
  }

  public function adddoctorview() {
    if (Auth::id() and Auth::user()->usertype==1) {
      return view('admin.add_doctor');
    }
    else {
      return redirect()->back()->with('danger', 'Restricted Access');
    }
  }

  public function adddoctorprocess (Request $request) {
    $doctor = new doctor;
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/doctorimages');
      $image->move($destinationPath, $imagename);
      $doctor->image = $imagename;
    } 
    $doctor->name = $request->name;
    $doctor->phone = $request->phone;
    $doctor->speciality = $request->speciality;
    $doctor->save(); 
    return redirect()->back()->with('success', 'Doctor succesfully added.');
  }

  public function updatedoctorview($id) {
    if (Auth::id() and Auth::user()->usertype==1) {
      $doctor = doctor::find($id);
      return view('admin.update_doctor', compact('doctor'));
    }
    else {
      return redirect()->back()->with('danger', 'Restricted Access');
    }
  }

  public function updatedoctorprocess (Request $request, $id) {
    $doctor = doctor::find($id);
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/doctorimages');
      $image->move($destinationPath, $imagename);
      $doctor->image = $imagename;
    } 
    $doctor->name = $request->name;
    $doctor->phone = $request->phone;
    $doctor->speciality = $request->speciality;
    $doctor->save(); 
    return redirect()->back()->with('success', 'Doctor succesfully updated.');
  }

  public function mailview($id) {
    if (Auth::id() and Auth::user()->usertype==1) {
      $appointment = appointment::find($id);
      return view('admin.email_view', compact('appointment'));
    }
    else {
      return redirect()->back()->with('danger', 'Restricted Access');
    }
  }

  public function mailprocess(Request $request, $id) {
    $appointment = appointment::find($id);
    $details = [
      'mailheader' => $request->mailheader,
      'mailbody' => $request->mailbody,
      'actiontext' => $request->actiontext,
      'actionurl' => $request->actionurl,
      'mailfooter' => $request->mailfooter
    ];
    Notification::send($appointment, new SendMailNotification($details));
    return redirect()->back()->with('success', 'Mail successfully sent.');
  }
}
