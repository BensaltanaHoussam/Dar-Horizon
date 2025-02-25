<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class touristController extends Controller
{
    public function touristIndex(Request $request)
    {
       return view('tourist.dashboard');
    }
}
