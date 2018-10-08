<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Course extends Model
{

    protected $fillable = ['Name', 'Description', 'Grade', 'Quantity', 'imgURL'];
//to make them mass-assignable.

    public static $count = 3;

    public function getCount()
    {

        return ++self::$count;
    }
    public function getAllCourses($session)
    {

        if (!$session->has('session_courses2')) {
            return $this->selectAllCourses($session);
        }
        return $session->get('session_courses2');
    }


    public function getCourse($session, $id)
    {

        $courses = $session->get('session_courses2');
        $c_s = collect($courses);

        foreach ($courses as $course) {
            if ($course['Id'] == $id) {
                return $course;
            }
        }
    }


    public function addCourse($session, $course)
    {
 
        /* if (!$session->has('session_courses2')) {
             $this->selectAllCourses($session);
         }
         */
         /*
         echo $session->get('session_courses2');
         [{"Id":"1","Name":"C","Description":"PL1","Grade":"100","Quantity":"200","imgURL":"https:\/\/homepages.cae.wisc.edu\/~ece533\/images\/fruits.png"},
         {"Id":"2","Name":"C++","Description":"PL2","Grade":"100","Quantity":"150","imgURL":"https:\/\/homepages.cae.wisc.edu\/~ece533\/images\/fruits.png"},
         {"Id":"3","Name":"C#","Description":"PL3","Grade":"100","Quantity":"120","imgURL":"https:\/\/homepages.cae.wisc.edu\/~ece533\/images\/fruits.png"}
         ]
         */

        $course_db = new Course(['Name' => $course['Name'], 'Description' => $course['Description'], 'Grade' => $course['Grade'], 'Quantity' => $course['Quantity'], 'imgURL' => $course['imgURL']]);
        $course_db->save();
          /*
         $course['Id'] =$this->getCount();
         $courses = $session->get('session_courses2');
         //array_push($courses, $course);
         $courses[] = $course;
         $session->put('session_courses2', $courses);
         */


    }


    public function editCourse($session, $id, $new_course)
    {

        if (!$session->has('session_courses2')) {
            $this->selectAllCourses($session);
        }
        $courses = $session->get('session_courses2');
        $courses_count = 0;
        foreach ($courses as $course) {
            if ($course['Id'] == $id) {
                $courses[$courses_count] = $new_course;
            }
            $courses_count++;

        }
        $session->put('session_courses2', $courses);

    }


    private function selectAllCourses($session)
    {


        $courses =
            [
            ['Id' => '1', 'Name' => 'C', 'Description' => 'PL1', 'Grade' => '100', 'Quantity' => '200', 'imgURL' => 'https://homepages.cae.wisc.edu/~ece533/images/fruits.png'],
            ['Id' => '2', 'Name' => 'C++', 'Description' => 'PL2', 'Grade' => '100', 'Quantity' => '150', 'imgURL' => 'https://homepages.cae.wisc.edu/~ece533/images/fruits.png'],
            ['Id' => '3', 'Name' => 'C#', 'Description' => 'PL3', 'Grade' => '100', 'Quantity' => '120', 'imgURL' => 'https://homepages.cae.wisc.edu/~ece533/images/fruits.png']
        ];



        $session->put('session_courses2', $courses);
    }
}
 
