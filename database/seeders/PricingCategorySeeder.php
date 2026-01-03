<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricingCategory;

class PricingCategorySeeder extends Seeder
{
  public function run(): void
  {
    $categories = [
      ['name' => 'Kertas', 'unit' => 'kg', 'price' => 1000, 'description' => 'Kertas bekas, karton, majalah'],
      ['name' => 'Plastik', 'unit' => 'kg', 'price' => 1500, 'description' => 'Botol plastik, kantong plastik'],
      ['name' => 'Kaca', 'unit' => 'kg', 'price' => 800, 'description' => 'Botol kaca, pecahan kaca'],
      ['name' => 'Logam', 'unit' => 'kg', 'price' => 3000, 'description' => 'Kaleng, tembaga, aluminium'],
      ['name' => 'Elektronik Kecil', 'unit' => 'unit', 'price' => 5000, 'description' => 'Charger, kabel, baterai'],
    ];

    foreach ($categories as $cat) {
      PricingCategory::create($cat);
    }
  }
}
