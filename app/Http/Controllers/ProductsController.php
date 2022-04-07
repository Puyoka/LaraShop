<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
    public static function addToShopcart()
    {
        return "asdf";

    }
    public function detail($id)
    {
        $data =Product::find($id);
        return view('detail', ['product'=>$data]);
    }
}
