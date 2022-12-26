<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   //  public function redirect() {
   //      $usertype = Auth::user()->role;

   //      if($usertype == 'admin') {

   //          return view('admin.dashboard');
   //       }

   //       else {
   //          return view('home.home');
   //       }
   //  }

    public function index() {
       
       $product = Product::where('trending','on')->take(9)->get();
       return view('home.home', compact('product'));
     }
}
