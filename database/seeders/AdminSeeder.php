<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Create admin user
    User::create([
      'name' => 'Admin Prana Medical',
      'email' => 'admin@pranamedical.com',
      'password' => Hash::make('password'),
      'role' => 'admin',
      'email_verified_at' => now(),
    ]);

    // Create demo customer
    User::create([
      'name' => 'Customer Demo',
      'email' => 'customer@example.com',
      'password' => Hash::make('password'),
      'role' => 'customer',
      'email_verified_at' => now(),
      'phone' => '081234567890',
      'address' => 'Jl. Contoh No. 123',
      'city' => 'Jakarta',
      'province' => 'DKI Jakarta',
      'postal_code' => '12345',
    ]);
  }
}
