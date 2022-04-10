<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();

        return view('products', ['products' => $products]);
    }
    public static function addToShopcart(Request $req)
    {
        if(Auth::check())
        {
            $cart = new Cart;
            $cart->productID=$req->productID;
            $cart->userID=Auth::id();
            $cart->save();
            return redirect('/products');
        }
        else
        {
            return redirect('/login');
        }

    }
    public function detail($id)
    {
        $data =Product::find($id);
        return view('detail', ['product'=>$data]);
    }
}
