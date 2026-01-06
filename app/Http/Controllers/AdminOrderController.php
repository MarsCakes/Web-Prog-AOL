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
        return view('dashboard.admin_orders', [
            'orders'  => $this->getOrders(),
            'drivers' => $this->getDrivers(),
        ]);
    }

    public function show(Order $order)
    {
        $order->load([
            'category',
            'user',
            'driver',
            'updates.performer',
        ]);

        return view('dashboard.admin_order_show', [
            'order'   => $order,
            'drivers' => $this->getDrivers(),
        ]);
    }

    public function assignDriver(Request $request, Order $order)
    {
        $data = $this->validateDriver($request);

        $order->update([
            'assigned_driver_id' => $data['driver_id'],
            'status' => 'assigned',
        ]);

        $this->createStatusUpdate(
            $order,
            'assigned',
            $request->user()->id,
            'Assigned to driver'
        );

        return back()->with('success', 'Driver assigned.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $this->validateStatus($request);

        $order->status = $data['status'];

        if (!empty($data['eta'])) {
            $order->eta = $data['eta'];
        }

        $order->save();

        $this->createStatusUpdate(
            $order,
            $data['status'],
            $request->user()->id,
            $data['note'] ?? null
        );

        return back()->with('success', 'Status updated.');
    }

    private function getOrders()
    {
        return Order::with(['category', 'user', 'driver'])
            ->latest()
            ->paginate(15);
    }

    private function getDrivers()
    {
        return User::where('role', 'partner')
            ->orderBy('name')
            ->get();
    }

    private function validateDriver(Request $request): array
    {
        return $request->validate([
            'driver_id' => ['required', 'exists:users,id'],
        ]);
    }

    private function validateStatus(Request $request): array
    {
        return $request->validate([
            'status' => ['required', 'in:pending,assigned,otw,picked,done,cancelled'],
            'eta' => ['nullable', 'date'],
            'note' => ['nullable', 'string', 'max:255'],
        ]);
    }

    private function createStatusUpdate(
        Order $order,
        string $status,
        int $performedBy,
        ?string $note = null
    ): void {
        OrderStatusUpdate::create([
            'order_id' => $order->id,
            'status' => $status,
            'performed_by' => $performedBy,
            'note' => $note,
        ]);
    }
}
