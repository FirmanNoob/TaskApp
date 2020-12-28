<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/login', [DashboardController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/coba', [DashboardController::class, 'coba']);
Route::get('/profile', [DashboardController::class, 'profile']);


// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });
