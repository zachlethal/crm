<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperviseurController extends Controller
{
    public function dashboard()
    {
        return view('superviseur.dashboard');
    }
}
