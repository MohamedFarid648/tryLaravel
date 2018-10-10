<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course=new Course();
        $course->Name='Pascal';
        $course->Description='after 0,1';
        $course->Grade='100';
        $course->Quantity='500';
        $course->imgURL='';
        $course->save();
    }
}
