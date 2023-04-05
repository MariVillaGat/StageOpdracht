<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
   public function index()
   {
       return view('admin.admin');
   }
  



   
}
