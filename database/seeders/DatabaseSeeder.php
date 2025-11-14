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
        // Call AdminSeeder to create admin and demo customer accounts
        $this->call([
            AdminSeeder::class,
        ]);

        // Create Categories
        $categories = [
            [
                'name' => 'Alat Kesehatan Umum',
                'slug' => 'alat-kesehatan-umum',
                'description' => 'Alat kesehatan untuk kebutuhan umum seperti tensimeter, thermometer, dan nebulizer',
            ],
            [
                'name' => 'Alat Medis',
                'slug' => 'alat-medis',
                'description' => 'Peralatan medis profesional untuk klinik dan rumah sakit',
            ],
            [
                'name' => 'Suplemen & Vitamin',
                'slug' => 'suplemen-vitamin',
                'description' => 'Suplemen dan vitamin untuk menjaga kesehatan dan imunitas tubuh',
            ],
            [
                'name' => 'Alat Terapi',
                'slug' => 'alat-terapi',
                'description' => 'Alat untuk terapi, rehabilitasi, dan dukungan mobilitas',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Call ProductSeeder to create 50+ products
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
