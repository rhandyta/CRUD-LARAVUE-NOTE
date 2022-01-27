<?php

use App\Http\Controllers\Notes\NoteController;
use App\Http\Controllers\Notes\SubjectController;
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

Route::group([
    'prefix' => 'notes'
], function () {
    Route::get('', [NoteController::class, 'index']);
    Route::post('create-new-note', [NoteController::class, 'store']);
});
Route::group(['prefix' => 'subjects'], function () {
    Route::get('', [SubjectController::class, 'index']);
});
