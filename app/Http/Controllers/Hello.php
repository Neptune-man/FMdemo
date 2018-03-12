<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class Hello extends Controller
{
    function index(){
      $result=User::get();
      dd($result);
    }
}
