<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatusUpdate;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
  public function index()
  {
    $orders = Order::with(['category', 'user', 'driver'])->latest()->paginate(15);
    $drivers = User::where('role', 'partner')->orderBy('name')->get();
    return view('dashboard.admin_orders', compact('orders', 'drivers'));
  }

  public function show(Order $order)
  {
    $order->load(['category', 'user', 'driver', 'updates.performer']);
    $drivers = User::where('role', 'partner')->orderBy('name')->get();
    return view('dashboard.admin_order_show', compact('order', 'drivers'));
  }

  public function assignDriver(Request $request, Order $order)
  {
    $data = $request->validate(['driver_id' => ['required', 'exists:users,id']]);
    $order->assigned_driver_id = $data['driver_id'];
    $order->status = 'assigned';
    $order->save();
    OrderStatusUpdate::create([
      'order_id' => $order->id,
      'status' => 'assigned',
      'performed_by' => $request->user()->id,
      'note' => 'Assigned to driver',
    ]);
    return back()->with('success', 'Driver assigned.');
  }

  public function updateStatus(Request $request, Order $order)
  {
    $data = $request->validate([
      'status' => ['required', 'in:pending,assigned,otw,picked,done,cancelled'],
      'eta' => ['nullable', 'date'],
      'note' => ['nullable', 'string', 'max:255'],
    ]);
    $order->status = $data['status'];
    if (!empty($data['eta'])) {
      $order->eta = $data['eta'];
    }
    $order->save();
    OrderStatusUpdate::create([
      'order_id' => $order->id,
      'status' => $data['status'],
      'performed_by' => $request->user()->id,
      'note' => $data['note'] ?? null,
    ]);
    return back()->with('success', 'Status updated.');
  }
}
