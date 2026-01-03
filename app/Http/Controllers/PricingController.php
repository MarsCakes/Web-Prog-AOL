<?php

namespace App\Http\Controllers;

use App\Models\PricingCategory;

class PricingController extends Controller
{
  public function index()
  {
    $categories = PricingCategory::orderBy('name')->get();

    $freePickup = [
      'Kertas bersih (min 5 kg)',
      'Botol plastik bersih (min 5 kg)',
      'Kaleng aluminium (min 3 kg)'
    ];

    $paidPickup = [
      'Kasur/sofa bekas',
      'Peralatan elektronik besar (TV besar, kulkas)',
      'Sampah B3 (baterai, lampu neon)'
    ];

    $perKm = 2000; // biaya per kilometer (opsional)

    return view('pricing', compact('categories', 'freePickup', 'paidPickup', 'perKm'));
  }
}
