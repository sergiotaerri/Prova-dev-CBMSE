<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonContactController;
use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\PersonController;

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

Route::get('pessoas-contato', [PersonContactController::class,  'index']);
Route::post('pessoas-contato', [PersonContactController::class,  'store']);
Route::get('pessoas-contato/{id}', [PersonContactController::class, 'show']);
Route::put('pessoas-contato/{id}', [PersonContactController::class, 'update']);
Route::delete('pessoas-contato/{id}', [PersonContactController::class, 'delete']);

Route::get('pessoas', [PersonController::class,  'index']);
Route::post('pessoas', [PersonController::class,  'store']);
Route::get('pessoas/{id}', [PersonController::class, 'show']);
Route::put('pessoas/{id}', [PersonController::class, 'update']);
Route::delete('pessoas/{id}', [PersonController::class, 'delete']);

Route::get('tipos-contato', [ContactTypeController::class,  'index']);
Route::post('tipos-contato', [ContactTypeController::class,  'store']);
Route::get('tipos-contato/{id}', [ContactTypeController::class, 'show']);
Route::put('tipos-contato/{id}', [ContactTypeController::class, 'update']);
Route::delete('tipos-contato/{id}', [ContactTypeController::class, 'delete']);
