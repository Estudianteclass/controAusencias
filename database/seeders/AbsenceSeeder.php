<?php

namespace Database\Seeders;

use App\Models\Absence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Absence::create([
            'description' => 'cita medica',
            'hour' => 'segunda',
            'turn' => 'tarde',
            'user_id' => '2',
          

        ]);
        Absence::create([
            'description' => 'renovacion dni',
            'hour' => 'primera',
            'turn' => 'mañana',
            'user_id' => '3',
           

        ]);
        Absence::create([
            'description' => 'gestiones',
            'hour' => 'tercera',
            'turn' => 'tarde',
            'user_id' => '2',
           

        ]);
        Absence::create([
            'description' => 'convocatoria',
            'hour' => 'cuarta',
            'turn' => 'mañana',
            'user_id' => '3',
           

        ]);
    }

    /*
      'description',
        'hour',
        'turn',

    
    */
}
