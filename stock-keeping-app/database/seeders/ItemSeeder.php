<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'name' => 'T-Shirt',
            'sku' => 'TSHIRT001',
            'cost_price' => 200.00,
            'sell_price' => 300.00,
            'stock_quantity' => 0, // default at creation
        ]);

        Item::create([
            'name' => 'Coffee Mug',
            'sku' => 'MUG001',
            'cost_price' => 80.00,
            'sell_price' => 120.00,
            'stock_quantity' => 0,
        ]);
    }
}
