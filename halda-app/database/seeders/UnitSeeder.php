<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Kilogram', 'code' => 'kg', 'status' => true],
            ['name' => 'Gram', 'code' => 'g', 'status' => true],
            ['name' => 'Liter', 'code' => 'l', 'status' => true],
            ['name' => 'Piece', 'code' => 'pc', 'status' => true],
            ['name' => 'Dozen', 'code' => 'dz', 'status' => false],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
