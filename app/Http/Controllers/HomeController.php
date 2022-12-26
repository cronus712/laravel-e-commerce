<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

      $category = Category::where('popular','on')->get();
       $product = Product::where('trending','on')->take(9)->get();
       return view('home.home', compact('product', 'category'));
     }

     

}
