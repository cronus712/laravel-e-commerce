<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    public function index() {

      $category = Category::where('popular','on')->get();
       $product = Product::where('trending','on')->take(9)->get();
       return view('home.home', compact('product', 'category'));
     }

 

     public function category($slug) {

      if(Category::where('slug', $slug)->exists()) {
         
           $category = Category::where('slug', $slug)->first();
           $product = Product::where('category_id', $category->id)->where('status', 'on')->get();
           return view('home.view-category', compact('category', 'product'));
      }

      else {
         return redirect('/')->with('status', 'Slug does not exist');
      }

     }

     public function viewProduct($slug, $product_name) {

      if(Category::where('slug', $slug)->exists())
      {
        if(Product::where('name', $product_name)->exists()) {
         
         $product = Product::where('name', $product_name)->first();
         return view('home.view-product', compact('product'));
        }

        else {
         return redirect('/')->with('success', 'The link was broken');
      }
    }

     else {
       return redirect('/')->with('success', 'Category not found');
    }

     }

 

}
