<?php

use App\Models\CourseDuration;
use Illuminate\Database\Seeder;

class CourseDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseDuration::truncate();
        \DB::table('course_durations')->insert([
            [
                'name' => '6 Months'
            ],
            [
                'name' => '1 Year'
            ],
            [
                'name' => '2 Year'
            ],
            [
                'name' => '3 Year'
            ],
            [
                'name' => '4 Year'
            ],
            [
                'name' => '5 Year'
            ],
            [
                'name' => '6 Year'
            ]
        ]);
        dd('Inserted Successfully.');
    }
}
