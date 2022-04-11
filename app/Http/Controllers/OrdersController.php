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
            return view('orders');
        }
        else
        {
            return redirect('/login');
        }
    }
}
