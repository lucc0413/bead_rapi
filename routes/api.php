<?php

use App\Http\Controllers\AuthController;
use App\Models\termekek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/termekek', function(){
    return termekek::create([
        'termekalapanyaga' => "csirke", "marha", "sertés",

    ]);

});

Route::post("login", [AuthController::class, "signin"]);
Route::post("register", [AuthController::class, "signup"]);
Route::post('/logout', 'LoginController@logout');






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
