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
            'question_id' => 1,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'こうわ',
            'question_id' => 1,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'たかわ',
            'question_id' => 1,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめいど',
            'question_id' => 2,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめど',
            'question_id' => 2,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かめと',
            'question_id' => 2,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'こうじまち',
            'question_id' => 3,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かゆまち',
            'question_id' => 3,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'おかとまち',
            'question_id' => 3,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'むかいなだ',
            'question_id' => 4,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'むこうひら',
            'question_id' => 4,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'むきひら',
            'question_id' => 4,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'みつぎ',
            'question_id' => 5,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'みよし',
            'question_id' => 5,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'おしらべ',
            'question_id' => 5,
            'choice_id'=> 3
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'かなやま',
            'question_id' => 6,
            'choice_id'=> 1
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'ぎんざん',
            'question_id' => 6,
            'choice_id'=> 2
        ]);
        $choice->save();

        $choice = new \App\Choice([
            'name' => 'きやま',
            'question_id' => 6,
            'choice_id'=> 3
        ]);
        $choice->save();
    }
}
