<?php

namespace Database\Seeders;

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
        DB::table('absences')->insert([
            'description' => 'cita medica',
            'hour' => 'segunda',
            'turn' => 'tarde',
            'absenceDate'=>Carbon::create('2025','03','04'),
            'user_id' => '2',
          

        ]);
        DB::table('absences')->insert([
            'description' => 'renovacion dni',
            'hour' => 'primera',
            'turn' => 'mañana',
          'absenceDate'=>Carbon::create('2025','08','11'),
            'user_id' => '3',
           

        ]);
        DB::table('absences')->insert([
            'description' => 'gestiones',
            'hour' => 'tercera',
            'turn' => 'tarde',
           'absenceDate'=>Carbon::create('2025','10','27'),
            'user_id' => '2',
           

        ]);
        DB::table('absences')->insert([
            'description' => 'convocatoria',
            'hour' => 'cuarta',
            'turn' => 'mañana',
            'absenceDate'=>Carbon::create('2025','05','07'),
            'user_id' => '3',
           

        ]);
    }

    /*
      'description',
        'hour',
        'turn',

    
    */
}
