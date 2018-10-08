<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Student;

class StudentController extends Controller
{



    public function getIndex(Store $session)
    {

        $student = new Student();
        $students = $student->getAllstudents($session);
        return view('admin.students.index', ['students' => $students]);

    }

    public function getCreate()
    {
        return view('admin.students.create');
    }

    public function postCreate(Store $session, Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',

        ]);
        $student = new Student();
        $student_request = ['Id'=>'','Name'=> $request->input('Name'), 'Notes'=>$request->input('Notes'), 'imgURL'=>$request->input('imgURL')];
        $student->addstudent($session, $student_request);
        return redirect()->route('studentsHome')->with('create_student_information', 'Student (' . $request["Name"] . ' ) has been already Created');

    }

    public function getEdit(Store $session, $id)
    {


        $student = new Student();
        $student = $student->getstudent($session, $id);

        return view('admin.students.edit', ['student' => $student, 'studentId' => $id]);

    }

    public function postEdit(Store $session, Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|min:3',
        ]);
        $student = new Student();
        $student_request = ['Id'=>$request->input('id'),'Name'=> $request->input('Name'), 'Notes'=>$request->input('Notes'), 'imgURL'=>$request->input('imgURL')];
        $student->editstudent($session, $request->input('id'), $student_request);
        return redirect()->route('studentsHome')->with('create_student_information', 'Student (' . $request["Name"] . ' ) has been already Edited');

    }


}
/*



*/