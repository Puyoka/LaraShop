<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrdersController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $orders = DB::table('orders')
            ->groupBy('created_at')
            ->having('userID', Auth::id())
            ->get();


            return view('orders', ['orders' => $orders]);
        }
        else
        {
            return redirect('/login');
        }
    }

    public static function getOrdersByCreatedAt($created_at)
    {
        $orders = DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.productID')
            ->where('orders.created_at', $created_at)
            ->where('userID', Auth::id())
            ->get();
        return $orders;
    }

    public static function getProductByID($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->get();
        return $product;
    }
}
