<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
$controller_path = 'App\Http\Controllers';


// AdminController
Route::get('/admin/dashboard/deptAll', $controller_path . '\Pages\AdminController@deptAll')->name('dept.All');
Route::get('/admin/dashboard/deptAdd', $controller_path . '\Pages\AdminController@deptAdd')->name('dept.Add');
Route::post('/admin/dashboard//add_department', $controller_path . '\Pages\AdminController@add_department')->name('add.dept');
Route::get('/admin/dashboard/delete_department/{id}',$controller_path . '\Pages\AdminController@delete_department')->name('delete.dept');

Route::get('/admin/dashboard/courseAll', $controller_path . '\Pages\AdminController@courseAll')->name('course.All');
Route::get('/admin/dashboard/courseAdd', $controller_path . '\Pages\AdminController@courseAdd')->name('course.Add');
Route::post('/admin/dashboard//add_course', $controller_path . '\Pages\AdminController@add_course')->name('add.course');
Route::get('/admin/dashboard/delete_course/{id}',$controller_path . '\Pages\AdminController@delete_course')->name('delete.course');

Route::get('/admin/dashboard/programAll', $controller_path . '\Pages\AdminController@programAll')->name('program.All');
Route::get('/admin/dashboard/programAdd', $controller_path . '\Pages\AdminController@programAdd')->name('program.Add');
Route::post('/admin/dashboard//add_program', $controller_path . '\Pages\AdminController@add_program')->name('add.program');
Route::get('/admin/dashboard/delete_program/{id}',$controller_path . '\Pages\AdminController@delete_program')->name('delete.program');


Route::get('/teacher/dashboard/delete_suggestion{id}', $controller_path . '\Pages\HomeController@delete_suggestion')->name('delete.suggestion');
Route::post('/teacher/dashboard//add_suggestion', $controller_path . '\Pages\HomeController@add_suggestion')->name('add.suggestion');
Route::get('/teacher/dashboard/update_suggestion/{id}',$controller_path . '\Pages\HomeController@update_suggestion')->name('update.suggestion');



Route::get('/teacher/dashboard/delete_notice{id}', $controller_path . '\Pages\HomeController@delete_notice')->name('delete.notice');
Route::post('/teacher/dashboard//add_notice', $controller_path . '\Pages\HomeController@add_notice')->name('add.notice');
Route::get('/teacher/dashboard/update_notice/{id}',$controller_path . '\Pages\HomeController@update_notice')->name('update.notice');



Route::get('/admin/dashboard/teacherlist', $controller_path . '\Pages\AdminController@teacherlist')->name('teacher.list');
Route::get('/admin/dashboard/studentlist', $controller_path . '\Pages\AdminController@studentlist')->name('student.list');





Route::get('/student/dashboard/suggestion/{user_id}', $controller_path . '\Pages\StudentController@studentsuggestion')->middleware(['auth', 'verified'])->name('student.suggestion');
Route::get('/student/dashboard/notice/{user_id}', $controller_path . '\Pages\StudentController@studentnotice')->middleware(['auth', 'verified'])->name('student.notice');


Route::get('/admin/dashboard/teacher/{id}', $controller_path . '\Pages\AdminController@teacher')->name('teacher');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', $controller_path . '\Pages\AdminController@index')->middleware(['auth:admin', 'verified'])->name('admin.dashboard');
Route::get('/dashboard', $controller_path . '\Pages\StudentController@index')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('teacherdashboard', $controller_path . '\Pages\HomeController@index')->middleware(['auth', 'verified'])->name('teacher.dashboard');


// Route::get('/dashboard/student', $controller_path . '\Pages\StudentController@stu_dashboard')->middleware(['auth:studentinfo', 'verified'])->name('student.dashboard');




// Route::get('/dashboard', function () {
//     return view('content.student.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';
