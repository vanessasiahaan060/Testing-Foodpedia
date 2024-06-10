<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Auth\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        FacadesDB::table('users')->insertOrIgnore([
            'id'=> '1',
            'name' => 'foodpedia',
            'email'=> 'foodpedia@gmail.com',
            'password'=> 'foodpedia123',
            'role'=> 'pelanggan',
        ]);
    }
}
