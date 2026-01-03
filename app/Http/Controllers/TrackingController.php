<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
  public function index(Request $request)
  {
    $code = $request->query('code');
    $order = null;
    if ($code) {
      $order = Order::with(['category', 'driver', 'updates'])->where('tracking_code', $code)->first();
    }
    return view('tracking.index', compact('order', 'code'));
  }

  public function track(Request $request)
  {
    $data = $request->validate(['code' => ['required', 'string', 'max:20']]);
    return redirect()->route('track.index', ['code' => strtoupper($data['code'])]);
  }
}
