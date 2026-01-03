<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function user()
  {
    return view('dashboard.user');
  }

  public function admin()
  {
    return view('dashboard.admin');
  }
}
