<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::create([
            'name' => 'administrador',
            'lastName' => 'admin',
            'phone' => '3333333',
            'department_id'=>'1',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123')

        ]);


        User::create([
            'name' => 'Miguel',
            'lastName' => 'Perez',
            'phone' => '123456',
            'department_id'=>'2',
            'email' => 'miguel@example.com',
            'password' => Hash::make('miguel123')

        ]);
        User::create([
            'name' => 'Juan',
            'lastName' => 'Rodriguez',
            'phone' => '456688',
            'department_id'=>'3',
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