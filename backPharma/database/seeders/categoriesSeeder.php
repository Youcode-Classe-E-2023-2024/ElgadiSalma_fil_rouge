<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Dermatologie',
            'Douleurs - Fièvre',
            'Vitamines - Minéraux',
            'Circulation sanguine',
            'Minceur - Cholestérol',
            'Autre'
        ];

        foreach ($categories as $category) 
        {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
