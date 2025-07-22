<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Customer::create([
            'name' => 'Walk-in',
            'email' => 'walk@example.com',
            'phone' => '01711111111',
            'address' => '123 Main Street',
            'city' => 'Dhaka',
            'country' => 'Bangladesh',
            'opening_balance' => 0.00,
        ]);

        Customer::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'phone' => '01711111111',
            'address' => '123 Main Street',
            'city' => 'Dhaka',
            'country' => 'Bangladesh',
            'opening_balance' => 0.00,
        ]);

        Customer::create([
            'name' => 'Fatima Rahman',
            'email' => 'fatima@example.com',
            'phone' => '01822222222',
            'address' => '456 Lakeview Road',
            'city' => 'Chittagong',
            'country' => 'Bangladesh',
            'opening_balance' => 1000.00,
        ]);
    }
}
