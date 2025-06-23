<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'ABC Ltd',
            'contact' => 'abc@example.com',
            'address' => '123 Supplier Street, Dhaka'
        ]);

        Supplier::create([
            'name' => 'XYZ Co',
            'contact' => 'xyz@example.com',
            'address' => '456 Vendor Road, Chattogram'
        ]);
    }
}
