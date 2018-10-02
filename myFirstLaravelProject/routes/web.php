<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('master.welcome');
})->name('userHome');


Route::get('login',function (){
     return view('master.login');
})->name('login');


Route::get('register',function (){
    return view('master.register');
})->name('register');

Route::get('login',function (){
    return view('master.login');
})->name('login');


Route::get('admin',function (){
    return view('admin.index');
})->name('adminHome');




Route::group(['prefix'=>'courses'],function(){

                            
                Route::get('',function (){
                    return view('admin.courses.index');
                })->name('coursesHome');

                Route::get('create',function (){
                    return view('admin.courses.create');
                })->name('create_course');

                Route::post('create',function (Request $request,Validate $validate){

                    $validation=$validate->make($request->all(),[
                                      'id'=>'required',
                                      'Name'=>'required|min:3',

                    ]);

                    if($validate->fails()){

                        return redirect()->back()->withErrors($validation);
                    }
                    else{

                        return redirect()->route('coursesHome')->with('create_course_information','Post'.$request["Name"].' Created');
                    }


                    return 'admin.courses.create';
                })->name('create_course');

                Route::get('edit/{id}',function (){
                    return view('admin.courses.edit');
                })->name('edit_course');

                Route::post('create',function (){
                    return 'admin.courses.edit';
                })->name('edit_course_post');


                Route::get('delete/{id}',function (){
                    return view('admin.courses.delete');
                })->name('delete_course');

                Route::post('delete',function (){
                    return 'admin.courses.edit';
                })->name('delete_course_post');


});




Route::group(['prefix'=>'students'],function(){

                            
    Route::get('',function (){
        return view('admin.students.index');
    })->name('studentsHome');

    Route::get('create',function (){
        return view('admin.students.create');
    })->name('create_student');

    Route::post('create',function (){
        return 'admin.students.create';
    })->name('create_student');

    Route::get('edit/{id}',function (){
        return view('admin.students.edit');
    })->name('edit_student');

    Route::post('create',function (){
        return 'admin.students.edit';
    })->name('edit_student_post');


    Route::get('delete/{id}',function (){
        return view('admin.students.delete');
    })->name('delete_student');

    Route::post('delete',function (){
        return 'admin.students.edit';
    })->name('delete_student_post');


});