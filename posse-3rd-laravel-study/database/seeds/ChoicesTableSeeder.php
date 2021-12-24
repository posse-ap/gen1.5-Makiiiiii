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
            'question_id' => 1,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'こうわ',
            'correct' => false,
            'question_id' => 1,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'たかわ',
            'correct' => false,
            'question_id' => 1,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめいど',
            'correct' => true,
            'question_id' => 2,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめど',
            'correct' => false,
            'question_id' => 2,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめと',
            'correct' => false,
            'question_id' => 2,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'こうじまち',
            'correct' => true,
            'question_id' => 3,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かゆまち',
            'correct' => false,
            'question_id' => 3,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'おかとまち',
            'correct' => false,
            'question_id' => 3,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'むかいなだ',
            'correct' => true,
            'question_id' => 4,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'むこうひら',
            'correct' => false,
            'question_id' => 4,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'むきひら',
            'correct' => true,
            'question_id' => 4,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'みつぎ',
            'correct' => true,
            'question_id' => 5,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'みよし',
            'correct' => false,
            'question_id' => 5,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'おしらべ',
            'correct' => false,
            'question_id' => 5,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かなやま',
            'correct' => true,
            'question_id' => 6,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'ぎんざん',
            'correct' => false,
            'question_id' => 6,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'きやま',
            'correct' => false,
            'question_id' => 6,
            'choice_id'=> 3
        ]);
        $choice->save();
    }
}
