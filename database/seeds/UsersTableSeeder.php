<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert([

        'nombre'=>'Juan',
        'apellido'=>'Alvarado',
        'email'=>'manuelcolorado19@gmail.com',
        'password'=>bcrypt('12345'),

    ]);
    }
}
