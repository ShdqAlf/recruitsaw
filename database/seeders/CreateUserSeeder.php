<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Pelamar 1',
            'email' => 'pelamar@gmail.com',
            'password' => Hash::make('pelamar'),
            'role' => 'Pelamar'
        ]);
    }
}
