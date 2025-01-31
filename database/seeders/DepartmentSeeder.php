<?php

namespace Database\Seeders;

use App\Models\Department;
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

       Department::create([
          
            'dep_name' => 'administracion'


        ]);


        Department::create([
          
            'dep_name' => 'informatica'


        ]);

        Department::create([
    
            'dep_name' => 'matematicas'


        ]);
    }
    /*
    $table->string('dep_name');
            $table->string('department_id');

*/
}
