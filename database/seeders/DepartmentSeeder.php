<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('departments')->insert([
          
            'dep_name' => 'administracion'


        ]);


        DB::table('departments')->insert([
          
            'dep_name' => 'informatica'


        ]);

        DB::table('departments')->insert([
    
            'dep_name' => 'matematicas'


        ]);
    }
    /*
    $table->string('dep_name');
            $table->string('department_id');

*/
}
