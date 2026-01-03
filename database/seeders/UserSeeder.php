<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Admin user
    User::create([
      'name' => 'Admin GREEN',
      'email' => 'admin@green.local',
      'phone' => '+62812345678',
      'password' => Hash::make('password123'),
      'role' => 'admin',
    ]);

    // Test user
    User::create([
      'name' => 'Pengguna Test',
      'email' => 'user@green.local',
      'phone' => '+62898765432',
      'password' => Hash::make('password123'),
      'role' => 'user',
    ]);

    // Partner/Driver user
    User::create([
      'name' => 'Mitra GREEN',
      'email' => 'partner@green.local',
      'phone' => '+62811111111',
      'password' => Hash::make('password123'),
      'role' => 'partner',
    ]);
  }
}
