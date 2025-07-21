<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'status' => true],
            ['name' => 'Books', 'status' => true],
            ['name' => 'Clothing', 'status' => true],
            ['name' => 'Home & Kitchen', 'status' => true],
            ['name' => 'Toys', 'status' => false], // inactive
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
