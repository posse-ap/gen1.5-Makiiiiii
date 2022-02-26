<?php

use Illuminate\Database\Seeder;

class StudylogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studylogs')->insert([
            [
            'user_id' => 1,
            'date' => '2022-01-01',
            'content_id' => 1,
            'language_id' => 1,
            'study_time' => 6,
            'comment' => '頑張った！',
            ],
            [
            'user_id' => 1,
            'date' => '2022-02-01',
            'content_id' => 1,
            'language_id' => 1,
            'study_time' => 3,
            'comment' => '頑張った！',
            ],
            [
            'user_id' => 1,
            'date' => '2022-02-01',
            'content_id' => 2,
            'language_id' => 3,
            'study_time' => 1,
            'comment' => '！',
            ],
            [
            'user_id' => 1,
            'date' => '2022-02-02',
            'content_id' => 1,
            'language_id' => 5,
            'study_time' => 2,
            'comment' => '頑張った！！',
            ],
            [
            'user_id' => 1,
            'date' => '2022-02-03',
            'content_id' => 2,
            'language_id' => 1,
            'study_time' => 1,
            'comment' => '',
            ],
            [
            'user_id' => 1,
            'date' => '2022-02-23',
            'content_id' => 1,
            'language_id' => 3,
            'study_time' => 4,
            'comment' => '久しぶりに頑張った',
            ],
            [
            'user_id' => 1,
            'date' => '2022-02-24',
            'content_id' => 1,
            'language_id' => 2,
            'study_time' => 2,
            'comment' => '久しぶりに頑張った',
            ],
            [
            'user_id' => 1,
            'date' => '2022-02-24',
            'content_id' => 1,
            'language_id' => 2,
            'study_time' => 1,
            'comment' => '久しぶりに頑張った',
            ],

        ]);
    }
}
