<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function getIndex(Store $session)
    {

        $course = new Course();
        $courses = DB::table('courses')->select()->get();//$course->getAllCourses($session);

        return view('admin.courses.index', ['courses' => $courses]);

    }

    public function getCreate()
    {
        return view('admin.courses.create');
    }

    public function postCreate(Store $session, Request $request)
    {
        $this->validate($request, [
            'Description' => 'required',
            'Quantity' => 'required',
            'Grade' => 'required',
            'Description' => 'required',
            'Name' => 'required|min:3',
        ]);
        $course = new Course(['Name' => $request->input('Name'), 'Description' => $request->input('Description'), 'Grade' => $request->input('Grade'), 'Quantity' => $request->input('Quantity'), 'imgURL' => $request->input('imgURL')]);
        $course->save();
        //$course_request = ['Id'=>'', 'Name'=>$request->input('Name'), 'Description'=>$request->input('Description'),'Grade'=> $request->input('Grade'),'Quantity'=> $request->input('Quantity'),'imgURL'=> $request->input('imgURL')];
        //$course->addCourse($session, $course_request);

        return redirect()->route('coursesHome')->with('create_course_information', 'Course (' . $request["Name"] . ' ) has been already Created');

    }

    public function getEdit(Store $session, $id)
    {


        $course = new Course();
        $course = $course->getCourse($session, $id);
        return view('admin.courses.edit', ['course' => $course, 'courseId' => $id]);

    }

    public function postEdit(Store $session, Request $request)
    {
        $this->validate($request, [
            'Description' => 'required',
            'Quantity' => 'required',
            'Grade' => 'required',
            'Description' => 'required',
            'Name' => 'required|min:3',
        ]);
        $course = new Course();
        $course_request = ['Id' => $request->input('id'), 'Name' => $request->input('Name'), 'Description' => $request->input('Description'), 'Grade' => $request->input('Grade'), 'Quantity' => $request->input('Quantity'), 'imgURL' => $request->input('imgURL')];
        $course->editCourse($session, $request->input('id'), $course_request);
        return redirect()->route('coursesHome')->with('create_course_information', 'Course (' . $request["Name"] . ' ) has been already Edited');

    }


}
