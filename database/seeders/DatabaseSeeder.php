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
                'name' => 'Obat Resep',
                'slug' => 'obat-resep',
                'description' => 'Obat-obatan yang memerlukan resep dokter',
                'image' => 'https://images.unsplash.com/photo-1631549916768-4119b2e5f926?w=800&h=600&fit=crop',
            ],
            [
                'name' => 'Obat Bebas',
                'slug' => 'obat-bebas',
                'description' => 'Obat-obatan yang dapat dibeli tanpa resep dokter',
                'image' => 'https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=800&h=600&fit=crop',
            ],
            [
                'name' => 'Suplemen & Vitamin',
                'slug' => 'suplemen-vitamin',
                'description' => 'Suplemen dan vitamin untuk menjaga kesehatan dan imunitas tubuh',
                'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=800&h=600&fit=crop',
            ],
            [
                'name' => 'Obat Herbal',
                'slug' => 'obat-herbal',
                'description' => 'Obat-obatan berbahan alami dan herbal',
                'image' => 'https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?w=800&h=600&fit=crop',
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
