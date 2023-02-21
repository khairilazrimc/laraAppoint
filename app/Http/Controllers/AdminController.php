<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new doctor;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $teaser_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/doctorimages');
            $image->move($destinationPath, $image);
        } else {
            dd('Request Has No File');
        }


        $doctor -> image = $image;
        $doctor -> name = $request -> name;
        $doctor -> phone = $request -> phone;
        $doctor -> speciality = $request -> speciality;
        $doctor -> save(); 
        return redirect() -> back() -> with('message', 'Doctor added succesfully.');
    }
}
