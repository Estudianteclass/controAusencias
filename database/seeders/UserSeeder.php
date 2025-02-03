<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name','admin')->first();
        $teacherRole = Role::where('name','teacher')->first();
   $admin=     User::create([
            'name' => 'david_admin',
            'last_name' => 'administrador',
            'department_id'=>'1',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123')

        ]);
$admin->assignRole($adminRole);

        $user2=       User::create([
            'name' => 'Miguel',
            'last_name' => 'Perez',
            'department_id'=>'2',
            'email' => 'miguel@example.com',
            'password' => Hash::make('miguel123')

        ]);
        $user2->assignRole($teacherRole);
        $user3=    User::create([
            'name' => 'Juan',
            'last_name' => 'Rodriguez',
            'department_id'=>'3',
            'email' => 'juan@example.com',
            'password' => Hash::make('juan123')

        ]);
        $user3->assignRole($teacherRole);
        $user4=    User::create([
            'name' => 'Marina',
            'last_name' => 'Hernandez',
            'department_id'=>'3',
            'email' => 'maria@example.com',
            'password' => Hash::make('marina123')

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