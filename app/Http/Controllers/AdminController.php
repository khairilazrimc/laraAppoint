<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
    return redirect()->back()->with('message', 'Doctor succesfully added.');
  
  }

}
