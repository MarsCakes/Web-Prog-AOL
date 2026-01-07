<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PricingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->only(['userOrders', 'userShow']);
  }

  public function create()
  {
    $categories = PricingCategory::orderBy('name')->get();
    return view('order.create', compact('categories'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'customer_name' => ['required', 'string', 'max:100'],
      'customer_phone' => ['required', 'string', 'max:30'],
      'address' => ['required', 'string', 'max:1000'],
      'lat' => ['nullable', 'numeric'],
      'lng' => ['nullable', 'numeric'],
      'pricing_category_id' => ['required', 'exists:pricing_categories,id'],
      'photo' => ['nullable', 'image', 'max:4096'],
      'service_method' => ['required', 'in:free,paid'],
      'scheduled_at' => ['required', 'date', 'after:now'],
    ]);

    $path = null;
    if ($request->hasFile('photo')) {
      $path = $request->file('photo')->store('orders', 'public');
    }

    $category = PricingCategory::find($validated['pricing_category_id']);
    $estimated = $category ? $category->price : null;

    $order = Order::create([
      'user_id' => Auth::id(),
      'customer_name' => $validated['customer_name'],
      'customer_phone' => $validated['customer_phone'],
      'address' => $validated['address'],
      'lat' => $validated['lat'] ?? null,
      'lng' => $validated['lng'] ?? null,
      'pricing_category_id' => $validated['pricing_category_id'],
      'photo_path' => $path,
      'service_method' => $validated['service_method'],
      'scheduled_at' => $validated['scheduled_at'],
      'status' => 'pending',
      'assigned_driver_id' => null,
      'eta' => null,
      'tracking_code' => strtoupper(Str::random(10)),
      'estimated_price' => $estimated,
    ]);

    return redirect()->route('track.index', ['code' => $order->tracking_code])
      ->with('success', 'Order berhasil dibuat. Kode pelacakan: ' . $order->tracking_code);
  }

  public function userOrders()
  {
    $orders = Order::where('user_id', Auth::id())->latest()->paginate(10);
    return view('dashboard.user_orders', compact('orders'));
  }

  public function userShow(Order $order)
  {
    abort_unless($order->user_id === Auth::id(), 403);
    $order->load(['category', 'driver', 'updates']);
    return view('dashboard.order_show', compact('order'));
  }
}
