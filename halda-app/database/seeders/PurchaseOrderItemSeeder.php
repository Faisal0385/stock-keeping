<?php

namespace Database\Seeders;

use App\Models\PurchaseOrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'purchase_order_id' => 1,
                'date' => '2025-07-21',
                'product_id' => 1,        // assuming product ID 1 exists
                'received_qty' => 30,
                'unit_price' => 6666.67,
                'subtotal' => 200000.00,
            ],
            [
                'purchase_order_id' => 1,
                'date' => '2025-07-21',
                'product_id' => 2,        // assuming product ID 2 exists
                'received_qty' => 50,
                'unit_price' => 1500.00,
                'subtotal' => 75000.00,
            ],
            [
                'purchase_order_id' => 2,
                'date' => '2025-07-22',
                'product_id' => 3,        // assuming product ID 3 exists
                'received_qty' => 40,
                'unit_price' => 900.00,
                'subtotal' => 36000.00,
            ],
        ];

        foreach ($items as $item) {
            PurchaseOrderItem::create($item);
        }
    }
}
