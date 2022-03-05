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
                'date' => '2022-03-01',
                'content_id' => 1,
                'studylog_id' => 1,
                'study_time' => 2,
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-03',
                'content_id' => 1,
                'studylog_id' => 2,
                'study_time' => 1,
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-03',
                'content_id' => 3,
                'studylog_id' => 2,
                'study_time' => 1,
            ],
        ]);
    }
}
