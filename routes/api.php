<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/actors', ActorController::class);
Route::resource('/movies', MovieController::class);
Route::resource('/categories', CategoryController::class);

Route::any('{query}',
    function() { return redirect('/'); })
    ->where('query', '.*');
