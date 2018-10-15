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

 /*
Route::get('/', function () {
    return view('master.welcome');
})->name('userHome');*/
Route::get('/', ['uses' => 'MasterController@getIndex', 'as' => 'userHome']);
Route::get('login', ['uses' => 'MasterController@getLogin', 'as' => 'login']);
Route::get('register', ['uses' => 'MasterController@getRegister', 'as' => 'register']);
Route::get('admin', ['uses' => 'MasterController@getAdmin', 'as' => 'adminHome']);




/*
Route::group(['prefix' => 'courses'], function () {


    Route::get('', ['uses' => 'CourseController@getIndex', 'as' => 'coursesHome']);
    Route::get('create',['uses'=>'CourseController@getCreate','as'=>'create_course']);


    Route::post('create', function (Request $request, Validate $validate) {

        $validation = $validate->make($request->all(), [
            'id' => 'required',
            'Name' => 'required|min:3',

        ]);

        if ($validate->fails()) {

            return redirect()->back()->withErrors($validation);
        } else {

            return redirect()->route('coursesHome')->with('create_course_information', 'Post' . $request["Name"] . ' Created');
        }


        return 'admin.courses.create';
    })->name('create_course');

    Route::get('edit/{id}', function () {
        return view('admin.courses.edit');
    })->name('edit_course');

    Route::post('edit', function () {
        return 'admin.courses.edit';
    })->name('edit_course_post');


    Route::get('delete/{id}', function () {
        return view('admin.courses.delete');
    })->name('delete_course');

    Route::post('delete', function () {
        return 'admin.courses.edit';
    })->name('delete_course_post');


});
 */

Route::group(['prefix' => 'courses'], function () {
    Route::get('', ['uses' => 'CourseController@getIndex', 'as' => 'coursesHome']);
    Route::get('create', ['uses' => 'CourseController@getCreate', 'as' => 'create_course']);
    Route::post('create', ['uses' => 'CourseController@postCreate', 'as' => 'create_course']);
    Route::get('edit/{id}', ['uses' => 'CourseController@getEdit', 'as' => 'edit_course']);
    Route::post('edit', ['uses' => 'CourseController@postEdit', 'as' => 'post_edit_course']);
    Route::get('delete/{id}', ['uses' => 'CourseController@getDelete', 'as' => 'delete_course']);
    Route::post('delete', ['uses' => 'CourseController@postDelete', 'as' => 'post_delete_course']);
    Route::get('undelete/{id}', ['uses' => 'CourseController@getUnDelete', 'as' => 'undelete_course']);
    Route::get('forceDelete/{id}', ['uses' => 'CourseController@getForceDeleteCourse', 'as' => 'force_delete_course']);



});



    Route::group(['prefix' => 'students'], function () {
    Route::get('', ['uses' => 'StudentController@getIndex', 'as' => 'studentsHome']);
    Route::get('create', ['uses' => 'StudentController@getCreate', 'as' => 'create_student']);
    Route::post('create', ['uses' => 'StudentController@postCreate', 'as' => 'create_student']);
    Route::get('edit/{id}', ['uses' => 'StudentController@getEdit', 'as' => 'edit_student']);
    Route::post('edit', ['uses' => 'StudentController@postEdit', 'as' => 'post_edit_student']);
    Route::get('delete/{id}', ['uses' => 'StudentController@getDelete', 'as' => 'delete_student']);
    Route::post('delete', ['uses' => 'StudentController@postDelete', 'as' => 'post_delete_student']);
    Route::get('undelete/{id}', ['uses' => 'StudentController@getUnDelete', 'as' => 'undelete_student']);
    Route::get('forceDelete/{id}', ['uses' => 'StudentController@getForceDeleteStudent', 'as' => 'force_delete_student']);

});
