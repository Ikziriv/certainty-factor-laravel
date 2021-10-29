<?php

namespace App\Http\Controllers;
use App\BobotNilai;
use App\Gejala;
use App\GejalaSolusi;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
	    $gejalas = Gejala::all();
	    $bobots = BobotNilai::all();
	    $gesol = GejalaSolusi::all();

        $request->session()->flush(); 
        $request->session()->regenerate();

	    return view('welcome_three', compact('gejalas', 'bobots', 'gesol'));
    }
}
