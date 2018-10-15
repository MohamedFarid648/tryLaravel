<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Student;
use App\Course;

class StudentController extends Controller
{


    public function getIndex()
    {

        $student = new Student();
        $students = $student->getAllStudents();
        $deletedStudents=$student->getAllDeletedStudents();

        return view('admin.students.index', ['students' => $students,'deletedStudents'=>$deletedStudents]);

    }

    public function getCreate()
    {

        $course = new Course();
        $courses = $course->getAllCourses();
        return view('admin.students.create', ['courses' => $courses]);
    }

    public function postCreate(Store $session, Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',

        ]);

        $student = new Student();
        $student_request = ['Name' => $request->input('Name'), 'Notes' => $request->input('Notes'), 'imgURL' => $request->input('imgURL')];
        $student_courses = $request->input('student_courses');

        $student->addStudent($student_request, $student_courses);
        return redirect()->route('studentsHome')->with('create_student_information', 'Student (' . $request["Name"] . ' ) has been already Created');

    }

    public function getEdit($id)
    {


        $student = new Student();
        $student = $student->getStudent($id);
        $course = new Course();
        $courses = $course->getAllCourses();

        return view('admin.students.edit', ['student' => $student, 'studentId' => $id,'courses' => $courses]);

    }

    public function getDelete($id)
    {


        $student = new Student();
        $student = $student->getStudent($id);
        return view('admin.students.delete', ['student' => $student, 'studentId' => $id]);

    }

    public function postEdit(Store $session, Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|min:3',
        ]);
        $student = new Student();
        $student_request = ['Name' => $request->input('Name'), 'Notes' => $request->input('Notes'), 'imgURL' => $request->input('imgURL')];
        $student_courses = $request->input('student_courses');
        $student->editStudent($request->input('id'), $student_request, $student_courses);
        return redirect()->route('studentsHome')->with('Student_information', 'Student (' . $request["Name"] . ' ) has been already Edited');


    }


    public function postDelete(Request $request)
    {
        $student = new Student();
        $student->deleteStudent($request->input('id'), $request->input('Name'));
        return redirect()->route('studentsHome')->with('Student_information', 'Student (' . $request["Name"] . ' ) has been already Deleted');

    }


    public function getUnDelete($id)
    {
        $student = new Student();
        $student=$student->unDeleteStudent($id);
        
        return redirect()->route('studentsHome')->with('Student_information', 'Student (' . $student->Name . ' ) has been already UnDeleted');

    }

    
    public function getForceDeleteStudent($id)
    {
        $student = new Student();

        $student=$student->forceDeleteStudent($id);
        
        return redirect()->route('studentsHome')->with('Student_information', 'Student (' . $student->Name . ' ) has been already Deleted for ever');

    }


}
/*



 */