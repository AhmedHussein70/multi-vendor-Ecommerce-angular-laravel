<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Clothing', 'slug' => 'women-men-clothing', 'description' => 'women and men clothing', 'image' => 'ii.png'],
            ['name' => 'Shoes', 'slug' => 'women-men-shoes', 'description' => 'women and men shoes', 'image' => '44.png'],
            ['name' => 'Accessories', 'slug' => 'women-men-accessories', 'description' => 'women and men accessories', 'image' => 'iitt.png'],
            ['name' => 'Dresses', 'slug' => 'women-dresses', 'description' => 'women dresses', 'image' => 'yyyyii.png'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'description' => $category['description'],
                'image' => $category['image'],
            ]);
        }
        
    }
}
