<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

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
    public static function numOfProductsInCart()
    {
        if(Auth::check())
        {
            return Cart::where('userID',Auth::id())->count();
        }
        else
        {
            return 0;
        }
    }
    public static function search(Request $req)
    {
        $data = Product::where('name', 'like', '%'.$req->input('nameToSearch').'%')
        ->get();
        return view('products', ['products' => $data]);
    }

    public static function orderby(Request $req)
    {


        switch ($req->input('order')) {
            case "Name Ascending":
                $products = DB::table('products')->orderby('name' , 'ASC');
                break;
            case "Name Descending":
                $products = DB::table('products')->orderby('name' , 'DESC');
                break;
            case "Price Ascending":
                $products = DB::table('products')->orderby('price' , 'ASC');
                break;
            case "Price Ascending":
                $products = DB::table('products')->orderby('price' , 'DESC');
                break;
        }

        return view('products', ['products' => $products]);
    }
}
