<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ownerController extends Controller
{
    public function ownerIndex(Request $request)
    {
       return view('owner.ownerDashboard');
    }
}
