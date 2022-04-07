<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ShopcartController extends Controller
{

    public function index()
    {
        return view('shopcart');
    }


}
