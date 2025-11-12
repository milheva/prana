<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@prana.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '081234567890',
        ]);

        // Create Customer User
        User::create([
            'name' => 'Customer Test',
            'email' => 'customer@test.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '081234567891',
            'address' => 'Jl. Test No. 123',
            'city' => 'Jakarta',
            'province' => 'DKI Jakarta',
            'postal_code' => '12345',
        ]);

        // Create Categories
        $categories = [
            [
                'name' => 'Alat Kesehatan Umum',
                'slug' => 'alat-kesehatan-umum',
                'description' => 'Alat kesehatan untuk kebutuhan umum',
            ],
            [
                'name' => 'Alat Medis',
                'slug' => 'alat-medis',
                'description' => 'Peralatan medis profesional',
            ],
            [
                'name' => 'Suplemen & Vitamin',
                'slug' => 'suplemen-vitamin',
                'description' => 'Suplemen dan vitamin untuk kesehatan',
            ],
            [
                'name' => 'Alat Terapi',
                'slug' => 'alat-terapi',
                'description' => 'Alat untuk terapi dan rehabilitasi',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create Sample Products
        $products = [
            [
                'category_id' => 1,
                'name' => 'Tensimeter Digital',
                'slug' => 'tensimeter-digital',
                'description' => 'Tensimeter digital akurat untuk mengukur tekanan darah',
                'sku' => 'TEN-001',
                'price' => 250000,
                'discount_price' => 225000,
                'stock' => 50,
                'unit' => 'pcs',
                'brand' => 'Omron',
                'is_featured' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Thermometer Digital',
                'slug' => 'thermometer-digital',
                'description' => 'Thermometer digital non-contact untuk mengukur suhu tubuh',
                'sku' => 'THER-001',
                'price' => 150000,
                'stock' => 100,
                'unit' => 'pcs',
                'brand' => 'Beurer',
                'is_featured' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Masker N95',
                'slug' => 'masker-n95',
                'description' => 'Masker N95 standar medis',
                'sku' => 'MASK-001',
                'price' => 25000,
                'stock' => 500,
                'unit' => 'box',
                'brand' => '3M',
            ],
            [
                'category_id' => 3,
                'name' => 'Vitamin C 1000mg',
                'slug' => 'vitamin-c-1000mg',
                'description' => 'Vitamin C dosis tinggi untuk meningkatkan imunitas',
                'sku' => 'VIT-001',
                'price' => 85000,
                'discount_price' => 75000,
                'stock' => 200,
                'unit' => 'botol',
                'brand' => 'Blackmores',
            ],
            [
                'category_id' => 4,
                'name' => 'Kursi Roda Lipat',
                'slug' => 'kursi-roda-lipat',
                'description' => 'Kursi roda lipat portabel dan praktis',
                'sku' => 'WHEEL-001',
                'price' => 1500000,
                'stock' => 20,
                'unit' => 'pcs',
                'brand' => 'GEA',
                'is_featured' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
