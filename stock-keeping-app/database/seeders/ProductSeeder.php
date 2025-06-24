<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 101,
                'name' => 'T-Shirt',
                'sku' => 'TS01',
                'cost_price' => 200.00,
                'sell_price' => 300.00,
                'stock_quantity' => 0,
                'created_at' => '2025-06-01 10:00:00',
                'updated_at' => '2025-06-23 09:00:00',
            ],
            [
                'id' => 102,
                'name' => 'Mug',
                'sku' => 'MG02',
                'cost_price' => 80.00,
                'sell_price' => 120.00,
                'stock_quantity' => 0,
                'created_at' => '2025-06-01 10:00:00',
                'updated_at' => '2025-06-23 09:00:00',
            ],
        ]);
    }
}
