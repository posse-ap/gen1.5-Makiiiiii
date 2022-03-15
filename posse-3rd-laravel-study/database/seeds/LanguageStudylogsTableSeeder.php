<?php

use Illuminate\Database\Seeder;

class LanguageStudylogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language_studylogs')->insert([
            [
                'user_id' => 1,
                'date' => '2022-03-01',
                'language_id' => 1,
                'studylog_id' => 1,
                'study_time' => 1,
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-01',
                'language_id' => 2,
                'studylog_id' => 1,
                'study_time' => 1,
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-02',
                'language_id' => 4,
                'studylog_id' => 2,
                'study_time' => 3,
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-03',
                'language_id' => 3,
                'studylog_id' => 3,
                'study_time' => 1,
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-04',
                'language_id' => 5,
                'studylog_id' => 4,
                'study_time' => 6,
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-05',
                'language_id' => 1,
                'studylog_id' => 5,
                'study_time' => 5,
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-14',
                'language_id' => 2,
                'studylog_id' => 6,
                'study_time' => 3,
            ],
        ]);
    }
}
