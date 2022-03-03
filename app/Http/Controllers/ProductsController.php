<?php

namespace App\Http\Controllers;

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
}
