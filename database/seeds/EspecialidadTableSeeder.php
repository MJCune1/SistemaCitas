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

        DB::table('especialidadades')->insert([

            'doctor_id'=>'1',
            'descripicion'=>'Dermatologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
    }
}
