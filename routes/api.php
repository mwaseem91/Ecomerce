<?php

use App\Http\Controllers\ApiController;
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
//categories controller route
Route::get('list',[ApiController ::class, 'list']);
Route::post('/cat/add',[ ApiController::class, 'store']);
Route::put('/cat/update/',[ ApiController::class, 'update'])->name('category.update');
Route::post('/login',[ ApiController::class, 'index']);
Route::delete('/delete/{id}',[ApiController::class, 'delete']);

