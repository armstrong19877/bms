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
    return view('welcome');
});

Route::get('/student_register', function () {
    return view('backend/student/auth.register');
});

Auth::routes(['register' => false]);
//Auth::routes();


Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->middleware('auth')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->middleware('auth.admin')->name('register');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'AdminController@index')->middleware('auth.admin')->name('admin.home');

Route::get('/admin', function () {
    return 'You are admin';
})->middleware('auth', 'auth.admin');

Route::resource('/admin/users', 'Admin\UserController', ['except' =>['show', 'create', 'store']]);

Route::namespace('Admin')->prefix('admin')->middleware('auth', 'auth.admin')->name('admin.')->group(function(){

	Route::resource('/users', 'UserController', ['except' =>['show', 'create', 'store']]);

});




//students' route

Route::get('/register/student', 'Student\StudentController@showRegistrationForm')->middleware('auth')->name('register.student');

Route::post('/register/student', 'Student\StudentController@create')->middleware('auth.admin')->name('register.student.submit');

//Route::get('/show/student{id}', 'Admin\AdminRegisterController@show')->middleware('auth')->name('show.student');

Route::get('/students/list', 'Student\StudentController@index')->name('student.list');

Route::get('/scholar/class', 'Student\StudentController@index')->name('scholar.class'); //students' search

Route::get('/student/show/{id}', 'Student\StudentController@show')->name('student.show');

Route::get('/student/edit/{id}', 'Student\StudentController@edit')->name('student.edit');

Route::put('/student/update/{id}', 'Student\StudentController@update')->name('student.update');

Route::delete('/student/destroy/{id}', 'Student\StudentController@destroy')->name('student.destroy');

// class routes

Route::get('/class', 'Student\GradeController@create')->name('class.create');

Route::post('/class', 'Student\GradeController@store')->name('class.store');


//result routes

	Route::get('/result/create/', 'Result\ResultController@show')->name('result.create');

	Route::post('/result/created', 'Result\ResultController@store')->name('result.submit');

	Route::get('/result/getscholars/', 'Result\ResultController@showUsers')->name('result.getscholars');

	Route::any('/student/class/', 'Result\ResultController@showUsers')->name('student.class');  //from index to this

	Route::get('/result/getscholars/show/{id}', 'Result\ResultController@rshow')->name('result.getscholars.show');

//	Route::get('/result_check', 'Result\ResultController@result_check')->name('result.check');

//	Route::post('/result_checker/{id}', 'Result\ResultController@rshow')->name('result.checker.store');

	Route::get('/result/index', 'Result\ResultController@index')->name('result.index');		//one index

	//Route::get('/result/rshow/{user_id}', 'Result\ResultController@rshow')->name('result.show');
	




Route::get('/check/result', function () {
    return view('backend.play.create');
});

Route::get('/check/result/get{user_id}', 'FrontEnd\Testing\PlayController@get')->name('check.result.get');

Route::get('/play/join', 'FrontEnd\Testing\PlayController@index')->name('play.join');

//class crud routes

Route::get('/create/class', 'Student\GradeController@create')->name('create.class');

Route::post('/create/class/store', 'Student\GradeController@store')->name('create.class.store');

Route::get('/index/class', 'Student\GradeController@index')->name('index.class');



//just messing around
Route::get('/last/id', 'AdminController@lastId');

//auth student route
Route::get('/{name}', 'Student\AuthStudentController@show')->name('scholar.show');

Route::get('/edit/{name}', 'Student\AuthStudentController@edit')->name('scholar.edit');

Route::put('/update/{name}', 'Student\AuthStudentController@update')->name('scholar.update');



//auth result route
Route::get('/check/result', function () {
    return view('backend.play.create');
});

Route::get('/check/result/get{user_id}', 'FrontEnd\Testing\PlayController@get')->name('check.result.get');

Route::get('/play/join', 'FrontEnd\Testing\PlayController@index')->name('play.join');


//teachers' crud
Route::get('/register/teacher', 'Teacher\TeacherController@showRegistrationForm')->name('register.teacher');

Route::post('/register/teacher', 'Teacher\TeacherController@store')->name('register.teacher.submit');

Route::get('/teacher/list', 'Teacher\TeacherController@index')->name('teacher.list');

Route::get('/teacher/class', 'Teacher\TeacherController@index')->name('teacher.class'); //teachers' search

Route::get('/teacher/show/{id}', 'Teacher\TeacherController@show')->name('teacher.show');

Route::get('/teacher/edit/{id}', 'Teacher\TeacherController@edit')->name('teacher.edit');

Route::put('/teacher/update/{id}', 'Teacher\TeacherController@update')->name('teacher.update');

Route::delete('/teacher/destroy/{id}', 'Teacher\TeacherController@destroy')->name('teacher.destroy');

//teachers' auth
Route::get('/staff/{name}', 'Teacher\AuthTeacherController@show')->name('staff.show');

Route::get('/edit/staff/{name}', 'Teacher\AuthTeacherController@edit')->name('staff.edit');

Route::put('/update/staff/{name}', 'Teacher\AuthTeacherController@update')->name('staff.update');
