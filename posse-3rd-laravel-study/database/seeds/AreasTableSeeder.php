<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1レコード
        $area = new \App\Area([
            'area' => '東京の難読地名クイズ'
        ]);
        $area->save();

        // 2レコード
        $area = new \App\Area([
            'area' => '広島の難読地名クイズ'
        ]);
        $area->save();
    }
}
