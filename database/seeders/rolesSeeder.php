<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Administrateur',
            'Moderateur',
            'Utilisateur',

        ];
        

        foreach ($roles as $role) 
        {
            DB::table('role')->insert([
                'name' => $role,
            ]);
        }
    }
}
