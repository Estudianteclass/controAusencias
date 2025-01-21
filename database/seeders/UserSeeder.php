<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Miguel',
            'lastName' => 'Perez',
            'phone' => '123456',
            'DPL' => 'DPL',
            'email' => 'miguel@example.com',
            'password' => Hash::make('miguel123')

        ]);
        DB::table('users')->insert([
            'name' => 'Juan',
            'lastName' => 'Rodriguez',
            'phone' => '456688',
            'DPL' => 'LND',
            'email' => 'juan@example.com',
            'password' => Hash::make('juan123')

        ]);
    }
}
/*
     'name',
        'lastName',
        'phone',
        'department_id',
        'email',
        'password',

*/