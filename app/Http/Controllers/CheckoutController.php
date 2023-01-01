<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index() {

        //delete outstock item from checkout cart
         $old_cartItem = Cart::where('user_id', Auth::id())->get();
         foreach( $old_cartItem as $item) {
             if(!Product::where('id',$item->product_id)->where('quantity', '>=', $item->product_quantity)->exists()) {
                $removItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removItem->delete();
             }
         }

         

        $cartItem = Cart::where('user_id', Auth::id())->get();
        return view('home.checkout', compact('cartItem'));
    }

    public function placeOrder(Request $request, Order $order) {

       $this->validate(request(), [
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'country' => 'required',
        'state' => 'required',
        'zip' => 'required',
    ]);
      $order->user_id = Auth::id();
       $order->name = $request->input('name');
       $order->email = $request->input('email');
       $order->address = $request->input('address');
       $order->country = $request->input('country');
       $order->state = $request->input('state');
       $order->zip = $request->input('zip');
       $order->reference = 'order No'.rand(1111,9999);


       $total = 0;
       $cartItem_total = Cart::where('user_id', Auth::id())->get();
       foreach ($cartItem_total as $product) {
        $total += $product->products->selling_price ;
       }
       $order->total_price = $total;
       $order->save();


        $cartItem = Cart::where('user_id', Auth::id())->get();

         foreach ($cartItem as $item ) {
             OrderItem::create([
             'order_id' => $order->id,
             'product_id' => $item->product_id,
             'quantity' => $item->product_quantity,
             'price' => $item->products->selling_price,
            ]);
            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity - $item->product_quantity ;
            $product->update();

         }

         $cartItem = Cart::where('user_id', Auth::id())->get();
         Cart::destroy($cartItem);
        return redirect('cart')->with('success', 'Order placed successfully !');   

    }


}
