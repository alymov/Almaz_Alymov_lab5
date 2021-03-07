<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

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


Route::get('/student/{id}', "StudentController@show");

Route::get('/student_date/{date}', "StudentController@showDate");

Route::get('/student_age/{age}', "StudentController@showAge");


Route::get('/insert',function(){
    DB::insert('insert into students (name, date_of_birth, GPA) values ("Arsen", "2001-09-01", 0.5)');
});

Route::get('/select',function(){
    $results = DB::select('select * from students');
    foreach($results as $studInfo){
        echo "name is: ".$studInfo->name.", GPA: ".$studInfo->GPA."<br>";
    }
});

Route::get('/update',function(){
    $updated = DB::update('update students set GPA="3" where id=2');
    return $updated;
});

Route::get('/delete',function(){
    $deleted = DB::delete('delete from students where id=3');
    return $deleted;
});

Route::get('/basicinsert',function(){
    $student = new Student;
    $student->name = "Arsen";
    $student->date_of_birth = "2001-09-01";
    $student->GPA = "2.5";
    $student->save();
});

Route::get('/read',function(){
    $students = Student::all();
    foreach($students as $studInfo){
        echo "ID: ".$studInfo -> id.", name: ".$studInfo->name.", GPA: ".$studInfo->GPA."<br>";
    }
});

Route::get('/basicUpdate',function(){
    $student = Student::find(4);
    $student->GPA = 1;
    $student->save();

});

Route::get('/basicDelete',function(){
    $student = Student::find(4);
    $student->delete();

});