<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Doctor;

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
}
