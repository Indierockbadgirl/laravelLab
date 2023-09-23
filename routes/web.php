<?php

use App\Http\Controllers\companyController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\informationController;
use App\Http\Controllers\stuedntController;
use App\Http\Controllers\userController;
use App\Models\students;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('company',[companyController::class,'index']);
    Route::get('students',[stuedntController::class,'index']);
    Route::post('students/insert',[stuedntController::class,'insert']);
    Route::get('students/delete/{stu_id}',[stuedntController::class,'delete']);
    Route::get('students/restore/{stu_id}',[stuedntController::class,'restore']);
    Route::get('students/forcedelete/{stu_id}',[stuedntController::class,'forcedelete']);

    Route::get('/students/editForm/{stu_id}',[stuedntController::class,'editForm']);
    Route::post('/students/update/{stu_id}',[stuedntController::class,'update'])->name('update');

    

    
});

Route::get('/course/{nameCourse}', [courseController::class, 'getCourse']);
Route::get('info',[informationController::class,'index']);
Route::get('alluser',[userController::class,'index'])->middleware('AuthCheck');