<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Salma ElGadi',
            'email' => 'elgadi.salma0@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => '1',
        ]);
    }
}
