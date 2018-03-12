<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    function getLogin(){
      return view("Auth.login");
    }

    function postLogin(LoginRequest $request){
      $inputs=$request->input();
      $result=Auth::login($inputs);

      if ($result) {
        return redirect("home");
      } elseif ($result===null) {
        return back()->withInput()->withErrors(["message"=>"アカウントかパスワードが誤っています。"]);
      } else {
        return back()->withInput()->withErrors(["message"=>"DBに接続できません。管理者に問い合わせて下さい。"]);
      }
    }

    function logout(request $request){
      Auth::logout();
      return redirect("/");
    }
}
