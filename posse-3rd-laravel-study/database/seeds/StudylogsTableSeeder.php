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
                'date' => '2022-03-01',
                'study_time' => 2,
                'comment' => '久しぶりに頑張った',
            ],
            [
                'user_id' => 1,
                'date' => '2022-03-03',
                'study_time' => 2,
                'comment' => '頑張った',
            ],
        ]);
    }
}
