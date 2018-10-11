<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Student extends Model
{

    protected $fillable = ['Name', 'Notes' , 'imgURL'];

    public static $count = 3;

    public function getCount()
    {

        return ++self::$count;
    }

    public function courses(){

        return $this->belongsToMany('App\Student','student_course','student_id','course_id');
    }


    public function getAllStudents()
    {

        $students = Student::all();//DB::table('students')->select()->get();
        return $students;

    }


    public function getStudent($id)
    {
       // $student = DB::table('students')->where(['id' => $id])->get();
        //return $student[0];
        $student=Student::find($id);
        return $student;
    }


    public function addStudent($student_request)
    {

        $student_db = new Student($student_request);
        //$student_db->Name='';
        $student_db->save();

    }


    public function editStudent($id, $new_student)
    {


        $row_affected = DB::table('students')->where(['id' => $id])->update($new_student);

        return $row_affected;
    }


    public function deleteStudent($id, $Name)
    {


        $row_affected = DB::table('students')->where(['id' => $id, 'Name' => $Name])->delete();

        return $row_affected;
    }



}
