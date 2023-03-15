<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;

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
  return view('home');
});

Route::get('/home', [AttendanceController::class, 'homeIndex']);

Route::get('/login', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/register', [UserController::class, 'registerIndex']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/home', [AttendanceController::class, 'homeIndex']);
Route::get('/checkIn', [AttendanceController::class, 'checkInIndex'])->middleware('checkAuth');
Route::get('/checkInClick', [AttendanceController::class, 'checkIn'])->middleware('checkAuth');
Route::get('/checkOut', [AttendanceController::class, 'checkOutIndex'])->middleware('checkAuth');
Route::get('/checkOutClick', [AttendanceController::class, 'checkOut'])->middleware('checkAuth');
Route::get('/viewAttendance', [AttendanceController::class, 'viewAttendance'])->middleware('checkAuth');
