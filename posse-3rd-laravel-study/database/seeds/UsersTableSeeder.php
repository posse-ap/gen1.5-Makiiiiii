<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            ['name' => "maki",
            'email' => "test@com",
            'password' => bcrypt('password'),
            'is_admin' => true,
            ],
            ['name' => "user2",
            'email' => "test2@com",
            'password' => bcrypt('password'),
            'is_admin' => false,
            ],
        ]);
    }
}
