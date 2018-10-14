<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Student extends Model
{

    protected $fillable = ['Name', 'Notes', 'imgURL'];

    public static $count = 3;

    public function getCount()
    {

        return ++self::$count;
    }

    public function courses()
    {

        return $this->belongsToMany('App\Student', 'student_course', 'student_id', 'course_id')->withTimeStamps();
    }


    public function getAllStudents()
    {

        $students = Student::all();//DB::table('students')->select()->get();
        return $students;

    }


    public function getStudent($id)
    {
        DB::enableQueryLog();

       // $student = DB::table('students')->where(['id' => $id])->get();
        //return $student[0];
        $student = Student::find($id);
        $student->courses()->get();
        dd(DB::getQueryLog());

        return $student;
    }


    public function addStudent($student_request, $student_courses)
    {

        $student_db = new Student($student_request);
        //$student_db->Name='';
        $student_db->save();
        $student_db->courses()->attach($student_courses);

    }


    public function editStudent($id, $new_student, $student_courses)
    {

        DB::enableQueryLog();


        //$row_affected = DB::table('students')->where(['id' => $id])->update($new_student);
        $student = Student::find($id);
        $student->Name = $new_student['Name'];
        $student->Notes = $new_student['Notes'];
        $student->imgURL = $new_student['imgURL'];
        $student->save();

        //$student->courses()->detach();
        //$student->courses()->attach($student_courses);
        $student->courses()->sync($student_courses);
        dd(DB::getQueryLog());


    }


    public function deleteStudent($id, $Name)
    {


        $row_affected = DB::table('students')->where(['id' => $id, 'Name' => $Name])->delete();

        return $row_affected;
    }



}
/**
 * 
 * 
  array:4 [▼
  0 => array:3 [▼
    "query" => "select * from `students` where `students`.`id` = ? limit 1"
    "bindings" => array:1 [▼
      0 => "1"
    ]
    "time" => 1.42
  ]
  1 => array:3 [▼
    "query" => "select `course_id` from `student_course` where `student_id` = ?"
    "bindings" => array:1 [▼
      0 => 1
    ]
    "time" => 0.22
  ]
  2 => array:3 [▼
    "query" => "insert into `student_course` (`course_id`, `created_at`, `student_id`, `updated_at`) values (?, ?, ?, ?)"
    "bindings" => array:4 [▼
      0 => 2
      1 => Carbon @1539534616 {#223 ▶}
      2 => 1
      3 => Carbon @1539534616 {#223 ▶}
    ]
    "time" => 31.51
  ]
  3 => array:3 [▼
    "query" => "insert into `student_course` (`course_id`, `created_at`, `student_id`, `updated_at`) values (?, ?, ?, ?)"
    "bindings" => array:4 [▼
      0 => 10
      1 => Carbon @1539534616 {#229 ▶}
      2 => 1
      3 => Carbon @1539534616 {#229 ▶}
    ]
    "time" => 88.15
  ]
]
 */