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
                'date' => '2022-11-01',
                'study_time' => 2,
                'comment' => '久しぶりに頑張った',
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-02',
                'study_time' => 3,
                'comment' => '久しぶりに頑張った',
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-03',
                'study_time' => 2,
                'comment' => '頑張った',
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-04',
                'study_time' => 6,
                'comment' => '頑張った',
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-05',
                'study_time' => 5,
                'comment' => '頑張った',
            ],
            [
                'user_id' => 1,
                'date' => '2022-11-14',
                'study_time' => 3,
                'comment' => '頑張った',
            ],
        ]);
    }
}
