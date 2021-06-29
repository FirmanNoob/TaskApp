<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\User;
// use Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth', function (Request $request) {
    $valid = Auth::attempt($request->all());

    if ($valid) {
        $user =  Auth::user();
        $user->api_token = str::random(100);
        $user->save();

        $user->makeVisible('api_token');

        return $user;
    }

    return response()->json([
        'message' => 'Email & Password doesn\'t match'
    ], 404);
});

Route::post('/user/register', [UserController::class, 'register']);
