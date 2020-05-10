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

    public function new()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'lab_name' => 'required',
            'address1' => 'required',
            'address2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);

    	$lab = new Lab();
        $lab->name = $request->lab_name;
        $lab->address1 = $request->address1;
        $lab->address2 = $request->address2;
        $lab->city = $request->city;
        $lab->state = $request->state;
        $lab->zip = $request->zip;

        $lab->save();
        
    	return redirect('/');
    }

    public function open(Lab $lab)
    {
    	if (Auth::check()) {            
            return view('open', compact('lab'));
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, Lab $lab)
    {
    	if(isset($_POST['delete'])) {
            $lab->delete();
            
    		return redirect('/');
        }
        
        if(isset($_POST['edit'])) {
            if (Auth::check()) {            
                return view('edit', compact('lab'));
            } else {
                return redirect('/');
            } 
        }    
        
        if(isset($_POST['update'])) {
            echo $request->lab_name;

            $lab->name = $request->lab_name;
            $lab->address1 = $request->address1;
            $lab->address2 = $request->address2;
            $lab->city = $request->city;
            $lab->state = $request->state;
            $lab->zip = $request->zip;
    
            $lab->save();

            return redirect('/');
    	}    
    }
}
