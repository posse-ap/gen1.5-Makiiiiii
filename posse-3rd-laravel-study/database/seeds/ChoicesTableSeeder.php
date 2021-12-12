<?php

use Illuminate\Database\Seeder;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $choice = new \App\Choice([
            'name' => 'たかなわ',
            'correct' => true,
            'question_id' => 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'こうわ',
            'correct' => false,
            'question_id' => 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'たかわ',
            'correct' => false,
            'question_id' => 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめいど',
            'correct' => true,
            'question_id' => 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめど',
            'correct' => false,
            'question_id' => 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめと',
            'correct' => false,
            'question_id' => 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'こうじまち',
            'correct' => true,
            'question_id' => 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かゆまち',
            'correct' => false,
            'question_id' => 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'おかとまち',
            'correct' => false,
            'question_id' => 3
        ]);
        $choice->save();
    }
}
