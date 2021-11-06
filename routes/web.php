<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Coursecontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('others/news', [Homecontroller::class,'news']);
Route::get('/news/{category}/{id}',[Homecontroller::class,'news']);

Route::get('/create-course',[CourseController::class,'create']);
Route::post('/store-course',[CourseController::class,'store']);
Route::get('/create-employee',[EmployeeController::class,'create']);
Route::post('/store-employee',[EmployeeController::class,'store']);
Route::get('/employees',[EmployeeController::class,'all']);
Route::get('/edit-employee/{id}',[EmployeeController::class,'edit']);
Route::post('/update-employee/{id}',[EmployeeController::class,'update']);
Route::get('/delete-employee/{id}',[EmployeeController::class,'delete']);
Route::get('/login',[AuthController::class,'login']);
Route::post('/loginstore',[AuthController::class,'loginstore']);
Route::group(['middleware' => 'checkloggedin'],function(){
    Route::get('/dashboard',[AuthController::class,'dashboard']);
    Route::group(['middleware' => 'checkifstudent'],function(){
        Route::get('/student',[AuthController::class,'student']);
    });
    Route::group(['middleware' => 'checkifteacher'],function(){
        Route::get('/teacher',[AuthController::class,'teacher']);    
    });
    
});
Route::get('upload',[UploadController::class,'upload']);
Route::post('upload-image',[UploadController::class,'uploadimage']);



