<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
     //index
    public function index(){
        return view('order.index');     
    }
}
