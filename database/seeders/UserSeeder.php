<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'loleiste172',
            'email' => 'root@root.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Admin');
    }
}
