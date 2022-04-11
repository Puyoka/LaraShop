<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        if(Auth::check())
        {
            $cart = DB::table('cart')->get();
            $cartItems = DB::table('cart')
            ->join('products', 'cart.productID', '=', 'products.id')
            ->where('userID',Auth::id())
            ->select('products.*', 'cart.id as cartID')
            ->get();

            return view('cart', ['products' => $cartItems]);
        }
        else
        {
            return redirect('/login');
        }

    }
    public static function remove($id)
    {
        Cart::destroy($id);


        return redirect('/cart');
    }

    public static function order(Request $req)
    {
        $orderItems = DB::table('cart')
        ->join('products', 'cart.productID', '=', 'products.id')
        ->where('userID',Auth::id())
        ->select('products.*', 'cart.id as cartID')
        ->get();

        foreach ($orderItems as $item)
        {
            $order = new Order;
            $order->productID = $item->id;
            $order->userID = Auth::id();
            $order->sellerID = $item->sellerID;
            $order->paymentMethod = $req->paymentMethod;
            $order->status = 'processing';
            $order->save();


            Cart::destroy($item->cartID);
        }
        return view('orders');
    }
}
