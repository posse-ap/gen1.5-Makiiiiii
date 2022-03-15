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
            'image_path' => asset('img/1-1.png'),
            'area_id' => 1,
            'list' => 1,
        ]);
        $question->save();

        // 2レコード
        $question = new \App\Question([
            'image_path' => asset('img/1-2.png'),
            'area_id' => 1,
            'list' => 2,
        ]);
        $question->save();

        // 3レコード
        $question = new \App\Question([
            'image_path' => asset('img/1-3.png'),
            'area_id' => 1,
            'list' => 3,
        ]);
        $question->save();

        $question = new \App\Question([
            'image_path' => asset('img/2-1.png'),
            'area_id' => 2,
            'list' => 1
        ]);
        $question->save();

        $question = new \App\Question([
            'image_path' => asset('img/2-2.png'),
            'area_id' => 2,
            'list' => 2,
        ]);
        $question->save();

        $question = new \App\Question([
            'image_path' => asset('img/2-3.png'),
            'area_id' => 2,
            'list' => 3,
        ]);
        $question->save();
    }
}
