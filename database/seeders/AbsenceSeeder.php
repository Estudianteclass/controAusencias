<?php

namespace Database\Seeders;

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
            'user_id' => '1',
            'timestamps' => now()

        ]);
        DB::table('absences')->insert([
            'description' => 'renovacion dni',
            'hour' => 'primera',
            'turn' => 'mañana',
            'user_id' => '2',
            'timestamps' => now()

        ]);
    }

    /*
      'description',
        'hour',
        'turn',

    
    */
}
