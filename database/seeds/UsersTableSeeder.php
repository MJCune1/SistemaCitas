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
            'cedula'=>'19292076',
            'direccion'=>'Av.Fuerzas Armadas',
            'sexo'=>'masculino',
            'fecha_nac'=>'1989-06-25',
            'email'=>'manuelcolorado19@gmail.com',
            'password'=>bcrypt('12345'),
            'especialidad_id'=>'1',

        ]);

            DB::table('users')->insert([

                    'nombre'=>'Secretaria',
                    'apellido'=>'Secretaria',
                    'cedula'=>'19292078',
                    'direccion'=>'Av.Fuerzas Armadas',
                    'sexo'=>'masculino',
                    'fecha_nac'=>'1989-06-25',
                    'email'=>'secretaria@mail.com',
                    'password'=>bcrypt('12345'),
                    'especialidad_id'=>'4',

                ]);




    }
}
