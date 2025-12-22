<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderStatusUpdate;
use App\Models\User;
use App\Models\PricingCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
  public function run(): void
  {
    $user = User::where('email', 'user@green.local')->first() ?? User::where('role', 'user')->first();
    $admin = User::where('email', 'admin@green.local')->first() ?? User::where('role', 'admin')->first();
    $driver = User::where('role', 'partner')->first();
    $cat = PricingCategory::inRandomOrder()->first();

    if (!$user || !$admin || !$cat) {
      return; // prerequisites missing
    }

    $now = Carbon::now();
    $samples = [
      ['status' => 'pending',  'offset' => '+1 day',   'eta' => null],
      ['status' => 'assigned', 'offset' => '+2 days',  'eta' => '+2 days 3 hours'],
      ['status' => 'otw',      'offset' => '+3 days',  'eta' => '+3 days 2 hours'],
      ['status' => 'picked',   'offset' => '+4 days',  'eta' => '+4 days 1 hour'],
      ['status' => 'done',     'offset' => '-1 days',  'eta' => '-1 days'],
      ['status' => 'cancelled', 'offset' => '+5 days',  'eta' => null],
    ];

    foreach ($samples as $i => $s) {
      $scheduled = Carbon::parse($s['offset'], $now->timezone);
      $order = Order::create([
        'user_id' => $user->id,
        'customer_name' => $user->name,
        'customer_phone' => $user->phone ?? '+62-8120000000',
        'address' => 'Jl. Contoh No. ' . ($i + 1) . ', Jakarta',
        'lat' => -6.2 + ($i * 0.001),
        'lng' => 106.8 + ($i * 0.001),
        'pricing_category_id' => $cat->id,
        'photo_path' => null,
        'service_method' => $i % 2 === 0 ? 'free' : 'paid',
        'scheduled_at' => $scheduled,
        'status' => $s['status'],
        'assigned_driver_id' => in_array($s['status'], ['assigned', 'otw', 'picked', 'done']) && $driver ? $driver->id : null,
        'eta' => $s['eta'] ? Carbon::parse($s['eta'], $now->timezone) : null,
        'tracking_code' => strtoupper(Str::random(10)),
        'estimated_price' => $cat->price,
      ]);

      // Build status timeline
      $timeline = ['pending'];
      if (in_array($s['status'], ['assigned', 'otw', 'picked', 'done'])) {
        $timeline[] = 'assigned';
      }
      if (in_array($s['status'], ['otw', 'picked', 'done'])) {
        $timeline[] = 'otw';
      }
      if (in_array($s['status'], ['picked', 'done'])) {
        $timeline[] = 'picked';
      }
      if ($s['status'] === 'done') {
        $timeline[] = 'done';
      }
      if ($s['status'] === 'cancelled') {
        $timeline[] = 'cancelled';
      }

      $ts = $scheduled->copy()->subHours(2);
      foreach ($timeline as $st) {
        OrderStatusUpdate::create([
          'order_id' => $order->id,
          'status' => $st,
          'performed_by' => $admin->id,
          'note' => null,
          'created_at' => $ts,
          'updated_at' => $ts,
        ]);
        $ts = $ts->addHour();
      }
    }
  }
}
