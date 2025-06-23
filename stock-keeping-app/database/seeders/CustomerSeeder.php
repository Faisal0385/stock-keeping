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
    public function run(): void
    {
        Customer::create([
            'name' => 'John Doe',
            'contact' => 'john@example.com',
            'address' => '123 Customer Lane, Dhaka'
        ]);

        Customer::create([
            'name' => 'Alice Smith',
            'contact' => 'alice@example.com',
            'address' => '456 Client Avenue, Sylhet'
        ]);
    }
}
