<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContenController extends Controller
{
    //
    public function index()
    {
        return view('home.home');
    }
    public function rpl()
    {
        return view('home.rpl');
    }
}
