<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout(Request $request) {

        // Auth::logout();
        return redirect('home')->with(Auth::logout());;

    }

    public function index() {
        
        $orders = Order::where('user_id', Auth::id())->get();
        return view('home.orders.index', compact('orders'));
    }

    public function viewOrderDetails($id) {


        if(Order::where('id', $id)->exists()) {
         
            $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
            return view('home.orders.details', compact('orders'));

       }
       }


}
