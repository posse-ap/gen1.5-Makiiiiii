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
            'image_path' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png',
            'area_id' => 1,
            'list' => 1,
        ]);
        $question->save();

        // 2レコード
        $question = new \App\Question([
            'image_path' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png',
            'area_id' => 1,
            'list' => 2,
        ]);
        $question->save();

        // 3レコード
        $question = new \App\Question([
            'image_path' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png',
            'area_id' => 1,
            'list' => 3,
        ]);
        $question->save();

        $question = new \App\Question([
            'image_path' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/d876208414d51791af9700a0389b988b.png',
            'area_id' => 2,
            'list' => 1
        ]);
        $question->save();

        $question = new \App\Question([
            'image_path' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/51e91a5c0b3bc7d6bef3b4c02d6c553d.png',
            'area_id' => 2,
            'list' => 2,
        ]);
        $question->save();

        $question = new \App\Question([
            'image_path' => 'https://d1khcm40x1j0f.cloudfront.net/quiz/93c494f3017e03085dae7e63a85baed9.png',
            'area_id' => 2,
            'list' => 3,
        ]);
        $question->save();
    }
}
