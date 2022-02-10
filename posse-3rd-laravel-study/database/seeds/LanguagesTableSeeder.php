<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
            'name' => 'HTML',
            'color' => '#0445EC',
            ],
            [
            'name' => 'CSS',
            'color' => '#0D72BD',
            ],
            [
            'name' => 'JavaScript',
            'color' => '#1EBEDE',
            ],
            [
            'name' => 'PHP',
            'color' => '#3CCEFE',
            ],
            [
            'name' => 'Laravel',
            'color' => '#B29EF3',
            ],
            [
            'name' => 'SQL',
            'color' => '#6D46EC',
            ],
            [
            'name' => 'SHELL',
            'color' => '#6D46EC',
            ],
            [
            'name' => 'その他',
            'color' => '#4A17EF',
            ],
        ]);
    }
}
