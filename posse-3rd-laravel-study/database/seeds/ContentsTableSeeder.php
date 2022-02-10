<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            [
            'name' => 'N予備校',
            'color' => '#0445EC',
            ],
            [
            'name' => 'ドットインストール',
            'color' => '#0D72BD',
            ],
            [
            'name' => '課題',
            'color' => '#1EBEDE',
            ],
        ]);
    }
}
