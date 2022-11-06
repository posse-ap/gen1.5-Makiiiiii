<?php

use Illuminate\Database\Seeder;

class ContentStudylogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content_studylogs')->insert([
            [
                'user_id' => 1,
                'date' => '2022-11-01',
                'content_id' => 1,
                'studylog_id' => 1,
                'study_time' => 2,
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-02',
                'content_id' => 2,
                'studylog_id' => 2,
                'study_time' => 3,
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-03',
                'content_id' => 1,
                'studylog_id' => 3,
                'study_time' => 1,
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-03',
                'content_id' => 3,
                'studylog_id' => 3,
                'study_time' => 1,
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-04',
                'content_id' => 2,
                'studylog_id' => 4,
                'study_time' => 6,
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-05',
                'content_id' => 1,
                'studylog_id' => 5,
                'study_time' => 5,
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-14',
                'content_id' => 2,
                'studylog_id' => 6,
                'study_time' => 3,
            ],
        ]);
    }
}
