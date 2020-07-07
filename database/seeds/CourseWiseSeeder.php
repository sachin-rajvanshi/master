<?php

use App\Models\CourseWise;
use Illuminate\Database\Seeder;

class CourseWiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	CourseWise::truncate();
        \DB::table('course_wises')->insert([
            [
                'name' => 'Semester'
            ],
            [
                'name' => 'Annual'
            ]
        ]);
        dd('Inserted Successfully.');
    }
}
