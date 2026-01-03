<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function termsandconditions()
    {
        return view('termsandconditions');
    }

}
