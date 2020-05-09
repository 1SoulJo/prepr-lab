<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lab;

class LabsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $labs = Lab::all();
    	return view('welcome',compact('labs'));
    }

    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
    	$lab = new Lab();
    	$lab->name = $request->name;
    	$lab->save();
    	return redirect('/'); 
    }

    public function edit(Task $lab)
    {

    	if (Auth::check() && Auth::user()->id == $lab->user_id) {            
            return view('edit', compact('lab'));
        } else {
            return redirect('/');
        }            	
    }

    public function update(Request $request, Lab $lab)
    {
    	if(isset($_POST['delete'])) {
            $lab->delete();
            
    		return redirect('/');
    	} else {
    		$lab->name = $request->name;
            $lab->save();
            
	    	return redirect('/'); 
    	}    	
    }
}
