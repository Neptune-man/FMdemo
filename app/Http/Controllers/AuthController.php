<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Larafm;

class AuthController extends Controller
{
  function Login(){
    return view("auth.login");
  }
    function postLogin(request $request){
      $result=Larafm::Auth()->login($request->input());
      if ($result->errorCode==0) {
        return redirect("home");
      }else {
        $errors = array('Error' => $result->message );
        return back()->withInput()->withErrors($errors);
      }
    }

    function Logout(){
      Larafm::Auth()->logout();
      return redirect("login");
    }
}
