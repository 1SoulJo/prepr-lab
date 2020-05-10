<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lab;

class MapController extends Controller
{
    public function index()
    {
        $labs = Lab::all();

    	return view('map',compact('labs'));
    }
}
