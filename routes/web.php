<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/listuser', [UserController::class, 'index']);
    Route::get('/listuser/{id}/delete', [UserController::class, 'delete']);
    Route::post('/listuser/create', [UserController::class, 'create']);
    Route::get('/listuser/{id}/view', [UserController::class, 'view']);
    Route::get('/listuser/{id}/edit', [UserController::class, 'edit']);
    Route::post('/listuser/{id}/update', [UserController::class, 'update']);
});


Route::group(['middleware' => ['auth', 'checkRole:admin,user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/task', [DashboardController::class, 'task']);
    Route::get('/task/make', [DashboardController::class, 'make']);
    Route::post('/task/make/create', [DashboardController::class, 'create']);
    Route::get('/task/{id}/delete', [DashboardController::class, 'delete']);
    Route::get('/task/{id}/detail', [DashboardController::class, 'detail']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/profile/{id}/edit', [UserController::class, 'editProfile']);
    Route::post('/profile/{id}/update', [UserController::class, 'updateProfile']);
    Route::get('/discussion', [UserController::class, 'diskusi']);
    Route::post('/discussion/create', [UserController::class, 'createDiskusi']);
    Route::post('/task/{id}/update', [DashboardController::class, 'update']);
    Route::get('/task/{id}/edit', [DashboardController::class, 'edit']);
    // fullcalendar
    Route::get('/fullcalendar', [CalendarController::class, 'index'])->name('calendar');
    Route::get('/fullcalendar/create', [CalendarController::class, 'create']);
    Route::post('/fullcalendar/update', [CalendarController::class, 'update']);
    Route::post('/fullcalendar/delete', [CalendarController::class, 'delete']);
    Route::get('/document', [DashboardController::class, 'dokumen'])->name('document');
});



// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });
