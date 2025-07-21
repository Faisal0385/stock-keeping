<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example: Create 5 products
        Product::insert([
            [
                'name' => 'Wireless Mouse',
                'sku' => 'SKU-1001',
                'unit_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
                'purchase_price' => 300.00,
                'selling_price' => 500.00,
                'reorder_stock' => 10,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'USB Keyboard',
                'sku' => 'SKU-1002',
                'unit_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 2,
                'purchase_price' => 400.00,
                'selling_price' => 650.00,
                'reorder_stock' => 15,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample products as needed
        ]);
    }
}
