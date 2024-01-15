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
        Product::create([
            'name' => 'idk',
            'price' => '20000',
            'user_id' => '1'
        ]);
        Product::create([
            'name' => 'idk2',
            'price' => '200002',
            'user_id' => '1'
        ]);
        Product::create([
            'name' => 'idk3',
            'price' => '20002',
            'user_id' => '1'
        ]);
        Product::create([
            'name' => 'idk23',
            'price' => '20000',
            'user_id' => '1'
        ]);
        Product::create([
            'name' => 'id234234k',
            'price' => '20000',
            'user_id' => '1'
        ]);
        Product::create([
            'name' => 'id2k',
            'price' => '200001',
            'user_id' => '1'
        ]);
    }
}
