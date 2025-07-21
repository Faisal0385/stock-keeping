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
        Supplier::insert([
            [
                'name' => 'ABC Traders',
                'email' => 'abc@traders.com',
                'phone' => '01711000000',
                'address' => 'Dhaka, Bangladesh',
                'status' => true,
            ],
            [
                'name' => 'XYZ Supplies',
                'email' => 'xyz@supplies.com',
                'phone' => '01822000000',
                'address' => 'Chittagong, Bangladesh',
                'status' => true,
            ],
            [
                'name' => 'Global Imports',
                'email' => 'global@imports.com',
                'phone' => '01633000000',
                'address' => 'Khulna, Bangladesh',
                'status' => true,
            ],
        ]);
    }
}
