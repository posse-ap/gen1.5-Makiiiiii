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
            ['userid' => 'maki',
            'password' => bcrypt('1231Makiko'),
            ],
        ]);
    }
}
