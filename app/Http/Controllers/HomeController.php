<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect() {
        $usertype = Auth::user()->role;

        if($usertype == 'admin') {

            return view('admin.dashboard');
         }

         else {
            return view('home.home');
         }
    }

    public function index() {
       return view('home.home');
     }
}
