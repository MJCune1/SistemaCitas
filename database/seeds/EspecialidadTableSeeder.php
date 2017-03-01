<?php

use Illuminate\Database\Seeder;

class EspecialidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('especialidades')->insert([

            'descripcion'=>'Dermatologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('especialidades')->insert([

            'descripcion'=>'Gatroenterologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);

        DB::table('especialidades')->insert([

            'descripcion'=>'Pediatria',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);

        DB::table('especialidades')->insert([

            'descripcion'=>'n/a',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
    }
}
