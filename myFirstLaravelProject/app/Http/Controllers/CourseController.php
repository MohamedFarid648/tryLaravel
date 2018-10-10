<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Course;


class CourseController extends Controller
{
    public function getIndex()
    {

        $course = new Course();
        $courses = $course->getAllCourses();
        return view('admin.courses.index', ['courses' => $courses]);

    }

    public function getCreate()
    {
        return view('admin.courses.create');
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'Description' => 'required',
            'Quantity' => 'required',
            'Grade' => 'required',
            'Description' => 'required',
            'Name' => 'required|min:3',
        ]);

        $course = new Course();
        $course_request = ['Name' => $request->input('Name'), 'Description' => $request->input('Description'), 'Grade' => $request->input('Grade'), 'Quantity' => $request->input('Quantity'), 'imgURL' => $request->input('imgURL')];
        $course->addCourse($course_request);
        return redirect()->route('coursesHome')->with('course_information', 'Course (' . $request["Name"] . ' ) has been already Created');

    }

    public function getEdit($id)
    {


        $course = new Course();
        $course = $course->getCourse($id);
        return view('admin.courses.edit', ['course' => $course, 'courseId' => $id]);
       
    }

    public function getDelete($id)
    {


        $course = new Course();
        $course = $course->getCourse($id);
        return view('admin.courses.delete', ['course' => $course, 'courseId' => $id]);
       
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'Description' => 'required',
            'Quantity' => 'required',
            'Grade' => 'required',
            'Description' => 'required',
            'Name' => 'required|min:3',
        ]);
        $course = new Course();



        $course_request = ['Name' => $request->input('Name'), 'Description' => $request->input('Description'), 'Grade' => $request->input('Grade'), 'Quantity' => $request->input('Quantity'), 'imgURL' => $request->input('imgURL')];
        $course->editCourse($request->input('id'), $course_request);
        return redirect()->route('coursesHome')->with('course_information', 'Course (' . $request["Name"] . ' ) has been already Edited');

    }


    public function postDelete(Request $request)
    {
        $course = new Course();
        $course->deleteCourse($request->input('id'), $request->input('Name'));
        return redirect()->route('coursesHome')->with('course_information', 'Course (' . $request["Name"] . ' ) has been already Deleted');

    }


}
