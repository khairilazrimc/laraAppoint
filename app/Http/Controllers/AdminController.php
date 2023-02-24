<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Appointment;
use App\Models\Doctor;
use Notification;
use App\Notifications\SendMailNotification;

class AdminController extends Controller {

  public function showappointments () {
    $appointments = appointment::all();
    return view('admin.show_appointments', compact('appointments'));
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
    $doctors = doctor::all();
    return view('admin.show_doctors', compact('doctors'));
  }

  public function deletedoctor($id) {
    $data = doctor::find($id);
    $data->delete();
    return redirect()->back()->with('success', 'Doctor successfully deleted.');
  }

  public function adddoctorview() {
    return view('admin.add_doctor');
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
    $doctor = doctor::find($id);
    return view('admin.update_doctor', compact('doctor'));
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
    $appointment = appointment::find($id);
    return view('admin.email_view', compact('appointment'));
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
