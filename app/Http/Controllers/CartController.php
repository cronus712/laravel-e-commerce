<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addProduct(Request $request) {

      $product_id = $request->input('product_id');
      $product_quantity = $request->input('product_quantity');

      if(Auth::check()) {

        $prod_check = Product::where('id', $product_id)->first();

        if($prod_check) {

          if(Cart::where('product_id',$product_id)->where('user_id', Auth::id())->exists()) {
            return response()->json(['status' => $prod_check->name. " Already added to cart "]);
          }
          else {
            $cartItem = new Cart();
            $cartItem->product_id = $product_id;
            $cartItem->product_quantity = $product_quantity;
            $cartItem->user_id = Auth::id();
            $cartItem->save();
            return response()->json(['status' =>$prod_check->name. " Added to cart successfully !"]);
          }
        }

      }

      else {
        return response()->json(['status' => "Login to continue"]);
      }

    }

    public function viewCart() {

        $cartItem = Cart::where('user_id', Auth::id())->get();
        return view('cart', compact('cartItem'));
    }

    public function deleteProduct(Request $request) {
         
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if(Cart::where('product_id',$product_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem ->delete();
                
                return response()->json(['status' => "Product deleted successfully !"]);

            }
        }
        else {
            return response()->json(['status' => "Login to continue"]);

        }

    }

    public function updateProduct(Request $request) {

      

        if (Auth::check()) {

            $product_id = $request->input('product_id');
            $product_quantity = $request->input('product_quantity');
           if(Cart::where('product_id',$product_id)->where('user_id', Auth::id())->exists()) {
            
            $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
            $cartItem->product_quantity = $product_quantity;
            $cartItem->update();
             return response()->json(['status' => "Product updated"]);


           }
        }
    }
}
