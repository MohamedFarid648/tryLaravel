<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable =['Name','Notes'];

    public static $count = 3;

    public function getCount(){
 
               return ++self::$count;
    }


    public function getAllStudents($session)
    {

        if (!$session->has('SessionStudents')) {
            return $this->selectAllStudents($session);
        }
        return $session->get('SessionStudents');
    }


    public function getStudent($session, $id)
    {



        $Students = $session->get('SessionStudents');
        foreach ($Students as $Student) {
            if ($Student['Id'] == $id) {
                return $Student;
            }
        }
    }


    public function addStudent($session, $Student)
    {
        if (!$session->has('SessionStudents')) {
            $this->selectAllStudents($session);
        }

        $Student['Id'] =$this->getCount();
        $Students = $session->get('SessionStudents');
        $Students[] = $Student;
       // array_push($Students, $Student);
       print_r($Students);
        $session->put('SessionStudents', $Students);
    }


    public function editStudent($session, $id, $New_Student)
    {

        if (!$session->has('SessionStudents')) {
            $this->selectAllStudents($session);
        }
        $Students = $session->get('SessionStudents');
        $students_count=0;
        foreach ($Students as $Student) {
            if ($Student['Id'] == $id ){
                $Students[$students_count]= $New_Student;
            }
            $students_count++;

        }        $session->put('SessionStudents', $Students);

    }


    private function selectAllStudents($session)
    {

        $Students = [
            ['Id' => '1', 'Name' => 'Ahmed', 'Notes'=>'V.Good', 'imgURL' => 'https://homepages.cae.wisc.edu/~ece533/images/fruits.png'],
            ['Id' => '2', 'Name' => 'Ali', 'Notes'=>'Good', 'imgURL' => 'https://homepages.cae.wisc.edu/~ece533/images/fruits.png'],
            ['Id' => '3', 'Name' => 'Hussien', 'Notes'=>'Medium', 'imgURL' => 'https://homepages.cae.wisc.edu/~ece533/images/fruits.png']
        ];//'Courses' => ['ids' => '1,2', 'grades' => 'A,B']

        $session->put('SessionStudents', $Students);
    }












}
