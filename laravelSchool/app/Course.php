<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    protected $fillable = ['Name', 'Description', 'Grade', 'Quantity', 'imgURL'];
    /*
    
    So, to get started, you should define which model attributes you want to make mass assignable. 
    You may do this using the $fillable property on the model.
     */

    //1.To use SoftDelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public static $count = 3;


    public function students(){

        return $this->belongsToMany('App\Student','student_course','course_id','student_id')->withTimeStamps();
    }
    public function getCount()
    {

        return ++self::$count;
    }
    public function getAllCourses()
    {

        $courses = Course::all();//all(); atatic method coming from Eloquent ORM
         //DB::table('courses')->select()->get();//$course->getAllCourses($session);
        return $courses;

    }

    public function getAllDeletedCourses()
    {

        $deletedCourses = Course::onlyTrashed()->get();
        //Course::withTrashed()->get();  //will get all 
        return $deletedCourses;
    }



    public function getCourse($id)
    {
        //$course = DB::table('courses')->where(['id' => $id])->get();
       
        //will return array of courses has one course
        /*
        if $id==2
        [
                    {
                    "id": 2,
                    "Name": "Angular",
                    "Description": "Front End Library",
                    "Grade": "50",
                    "imgURL": "https://homepages.cae.wisc.edu/~ece533/images/fruits.png",
                    "created_at": "2018-10-08 15:28:44",
                    "updated_at": "2018-10-08 15:28:44",
                    "Quantity": "52"
                    }
        ]
        
         */
        //return $course[0];

        $course = Course::find($id);//Course::where(['id' => $id])->first();
        return $course;
    }


    public function addCourse($course_request)
    {

        $course_db = new Course($course_request);
        $course_db->save();


    }


    public function editCourse($id, $new_course)
    {


        $row_affected = Course::where(['id' => $id])->update($new_course);//DB::table('courses')->where(['id' => $id])->update($new_course);

        return $row_affected; 

        /*
        
        
        or
         $course=Course::find($id);
         $course->Name=$new_course['Name'];
         $course->Description=$new_course['Description'];
         $course->Grade=$new_course['Grade'];
         $course->Quantity=$new_course['Quantity'];
         $course->imgURL=$new_course['imgURL'];
         $course->save();

         */
    }


    public function deleteCourse($id, $Name)
    {


        $row_affected = Course::where('id', $id)->delete(); //DB::table('courses')->where(['id' => $id,'Name'=>$Name])->delete();

        return $row_affected; 

        //delete_at will only changed but course will not be deleted
        /*
        
        
        or
         $course=Course::find($id);
         $course->delete();
         */
    }


    public function unDeleteCourse($id)
    {

        $course = Course::onlyTrashed()->where('id', $id)->get()->first();
        
        $course->restore();

        return $course;

        //Course::withTrashed()->where('id', $id)->restore();
    }

    public function forceDeleteCourse($id)
    {

        $course = Course::onlyTrashed()->where('id', $id)->get()->first();
        
        $course->forceDelete();

        return $course;
    }


}
 
