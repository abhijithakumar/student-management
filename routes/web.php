<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\MarksController;

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

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/add-student', [StudentManagementController::class, 'addStudentView'])->name('add-student-view');
    Route::post('/add-student', [StudentManagementController::class, 'addStudent'])->name('add-student');
    Route::get('/students-list-view', [StudentManagementController::class, 'studentsListView'])->name('students-list-view');
    Route::get('/edit-student-view/{id}', [StudentManagementController::class, 'editStudentView'])->name('edit-student-view');
    Route::post('/edit-student/{id}', [StudentManagementController::class, 'editStudent'])->name('edit-student');
    Route::post('/delete-student/{id}', [StudentManagementController::class, 'deleteStudent'])->name('delete-student');

    // Marks
    Route::get('/add-marks', [MarksController::class, 'addMarksView'])->name('add-marks-view');
    Route::post('/add-marks', [MarksController::class, 'addMarks'])->name('add-marks');
    Route::get('/marks-list-view', [MarksController::class, 'marksListView'])->name('marks-list-view');
    Route::get('/edit-marks-view/{id}', [MarksController::class, 'editmarksView'])->name('edit-marks-view');
    Route::post('/edit-marks/{id}', [MarksController::class, 'editMarks'])->name('edit-marks');
    Route::post('/delete-marks/{id}', [MarksController::class, 'deleteMarks'])->name('delete-marks');




});

require __DIR__.'/auth.php';
