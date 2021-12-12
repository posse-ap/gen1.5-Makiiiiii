<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1レコード
        $question = new \App\Question([
            'image_path' => '/img/0.png',
            'area_id' => 1
        ]);
        $question->save();

        // 2レコード
        $question = new \App\Question([
            'image_path' => '/img/1.png',
            'area_id' => 1
        ]);
        $question->save();

        // 3レコード
        $question = new \App\Question([
            'image_path' => '/img/2.png',
            'area_id' => 1
        ]);
        $question->save();
    }
}
