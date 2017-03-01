<?php

use Illuminate\Database\Seeder;

class UserHasRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_has_roles')->insert([

            'role_id'=>'4',
            'user_id'=>'1',

        ]);

        DB::table('user_has_roles')->insert([

            'role_id'=>'2',
            'user_id'=>'2',

        ]);

    }


}
