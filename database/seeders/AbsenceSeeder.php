<?php

namespace Database\Seeders;

use App\Models\Absence;
use Carbon\Carbon;
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
            'absence_date'=>Carbon::create('2025','03','04'),
            'user_id' => '2',
          

        ]);
        Absence::create([
            'description' => 'renovacion dni',
            'hour' => 'primera',
            'turn' => 'mañana',
          'absence_date'=>Carbon::create('2025','08','11'),
            'user_id' => '3',
           

        ]);
        Absence::create([
            'description' => 'gestiones',
            'hour' => 'tercera',
            'turn' => 'tarde',
           'absence_date'=>Carbon::create('2025','10','27'),
            'user_id' => '2',
           

        ]);
        Absence::create([
            'description' => 'convocatoria',
            'hour' => 'cuarta',
            'turn' => 'mañana',
            'absence_date'=>Carbon::create('2025','05','07'),
            'user_id' => '3',
           

        ]);
    }

    /*
      'description',
        'hour',
        'turn',

    
    */
}
