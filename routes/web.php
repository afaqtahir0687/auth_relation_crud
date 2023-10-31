<?php
 
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return view('welcome');
});
 

Route::get('students.create',[App\Http\Controllers\StudentController::class, 'create']);
Route::post('students.store',[App\Http\Controllers\StudentController::class, 'store']);
Route::get('/',[App\Http\Controllers\StudentController::class, 'index']);
Route::get('students.edit/{id}',[App\Http\Controllers\StudentController::class, 'edit']);
Route::get('students.show/{id}',[App\Http\Controllers\StudentController::class, 'show']);
Route::post('students.update/{id}',[App\Http\Controllers\StudentController::class, 'update']);
Route::delete('students.destroy/{id}',[App\Http\Controllers\StudentController::class, 'destroy']);


Route::get('teachers.create',[App\Http\Controllers\TeacherController::class, 'create']);
Route::post('teachers.store',[App\Http\Controllers\TeacherController::class, 'store']);
Route::get('teachers',[App\Http\Controllers\TeacherController::class, 'index']);
Route::get('teachers.edit/{id}',[App\Http\Controllers\TeacherController::class, 'edit']);
Route::get('teachers.show/{id}',[App\Http\Controllers\TeacherController::class, 'show']);
Route::post('teachers.update/{id}',[App\Http\Controllers\TeacherController::class, 'update']);
Route::delete('teachers.destroy/{id}',[App\Http\Controllers\TeacherController::class, 'destroy']);


Route::get('classes.create',[App\Http\Controllers\ClassController::class, 'create']);
Route::post('classes.store',[App\Http\Controllers\ClassController::class, 'store']);
Route::get('classes',[App\Http\Controllers\ClassController::class, 'index']);
Route::get('classes.edit/{id}',[App\Http\Controllers\ClassController::class, 'edit']);
Route::get('classes.show/{id}',[App\Http\Controllers\ClassController::class, 'show']);
Route::post('classes.update/{id}',[App\Http\Controllers\ClassController::class, 'update']);
Route::delete('classes.destroy/{id}',[App\Http\Controllers\ClassController::class, 'destroy']);



Route::get('attendance.create',[App\Http\Controllers\AttendancesController::class, 'create']);
Route::post('attendance.store',[App\Http\Controllers\AttendancesController::class, 'store']);
Route::get('attendance',[App\Http\Controllers\AttendancesController::class, 'index']);
Route::get('attendance.edit/{id}',[App\Http\Controllers\AttendancesController::class, 'edit']);
Route::get('attendance.show/{id}',[App\Http\Controllers\AttendancesController::class, 'show']);
Route::post('attendance.update/{id}',[App\Http\Controllers\AttendancesController::class, 'update']);
Route::delete('attendance.destroy/{id}',[App\Http\Controllers\AttendancesController::class, 'destroy']);


Route::get('subject.create',[App\Http\Controllers\SubjectController::class, 'create']);
Route::post('subject.store',[App\Http\Controllers\SubjectController::class, 'store']);
Route::get('subject',[App\Http\Controllers\SubjectController::class, 'index']);
Route::get('subject.edit/{id}',[App\Http\Controllers\SubjectController::class, 'edit']);
Route::get('subject.show/{id}',[App\Http\Controllers\SubjectController::class, 'show']);
Route::post('subject.update/{id}',[App\Http\Controllers\SubjectController::class, 'update']);
Route::delete('subject.destroy/{id}',[App\Http\Controllers\SubjectController::class, 'destroy']);



Route::get('exams.create',[App\Http\Controllers\ExamsController::class, 'create']);
Route::post('exams.store',[App\Http\Controllers\ExamsController::class, 'store']);
Route::get('exams',[App\Http\Controllers\ExamsController::class, 'index']);
Route::get('exams.edit/{id}',[App\Http\Controllers\ExamsController::class, 'edit']);
Route::get('exams.show/{id}',[App\Http\Controllers\ExamsController::class, 'show']);
Route::post('exams.update/{id}',[App\Http\Controllers\ExamsController::class, 'update']);
Route::delete('exams.destroy/{id}',[App\Http\Controllers\ExamsController::class, 'destroy']);


Route::get('results.create',[App\Http\Controllers\ResultController::class, 'create']);
Route::post('results.store',[App\Http\Controllers\ResultController::class, 'store']);
Route::get('results',[App\Http\Controllers\ResultController::class, 'index']);
Route::get('results.edit/{id}',[App\Http\Controllers\ResultController::class, 'edit']);
Route::get('results.show/{id}',[App\Http\Controllers\ResultController::class, 'show']);
Route::post('results.update/{id}',[App\Http\Controllers\ResultController::class, 'update']);
Route::delete('results.destroy/{id}',[App\Http\Controllers\ResultController::class, 'destroy']);




Route::get('fees.create',[App\Http\Controllers\FeesController::class, 'create']);
Route::post('fees.store',[App\Http\Controllers\FeesController::class, 'store']);
Route::get('fees',[App\Http\Controllers\FeesController::class, 'index']);
Route::get('fees.edit/{id}',[App\Http\Controllers\FeesController::class, 'edit']);
Route::get('fees.show/{id}',[App\Http\Controllers\FeesController::class, 'show']);
Route::post('fees.update/{id}',[App\Http\Controllers\FeesController::class, 'update']);
Route::delete('fees.destroy/{id}',[App\Http\Controllers\FeesController::class, 'destroy']);

Route::get('parents.create',[App\Http\Controllers\ParentController::class, 'create']);
Route::post('parents.store',[App\Http\Controllers\ParentController::class, 'store']);
Route::get('parents',[App\Http\Controllers\ParentController::class, 'index']);
Route::get('parents.edit/{id}',[App\Http\Controllers\ParentController::class, 'edit']);
Route::get('parents.show/{id}',[App\Http\Controllers\ParentController::class, 'show']);
Route::post('parents.update/{id}',[App\Http\Controllers\ParentController::class, 'update']);
Route::delete('parents.destroy/{id}',[App\Http\Controllers\ParentController::class, 'destroy']);


Route::get('courses.create',[App\Http\Controllers\CoursesController::class, 'create']);
Route::post('courses.store',[App\Http\Controllers\CoursesController::class, 'store']);
Route::get('courses',[App\Http\Controllers\CoursesController::class, 'index']);
Route::get('courses.edit/{id}',[App\Http\Controllers\CoursesController::class, 'edit']);
Route::get('courses.show/{id}',[App\Http\Controllers\CoursesController::class, 'show']);
Route::post('courses.update/{id}',[App\Http\Controllers\CoursesController::class, 'update']);
Route::delete('courses.destroy/{id}',[App\Http\Controllers\CoursesController::class, 'destroy']);



Route::get('assignments.create',[App\Http\Controllers\AssignmentController::class, 'create']);
Route::post('assignments.store',[App\Http\Controllers\AssignmentController::class, 'store']);
Route::get('assignments',[App\Http\Controllers\AssignmentController::class, 'index']);
Route::get('assignments.edit/{id}',[App\Http\Controllers\AssignmentController::class, 'edit']);
Route::get('assignments.show/{id}',[App\Http\Controllers\AssignmentController::class, 'show']);
Route::post('assignments.update/{id}',[App\Http\Controllers\AssignmentController::class, 'update']);
Route::delete('assignments.destroy/{id}',[App\Http\Controllers\AssignmentController::class, 'destroy']);