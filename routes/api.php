<?php

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

Route::get('/data-demographics', [App\Http\Controllers\ApiController::class, 'ambilDataDemografi'])->name('data-demographics');
Route::get('/data-ordered-item', [App\Http\Controllers\ApiController::class, 'dataOrderedItem'])->name('data-ordered-item');
Route::get('/data-registration', [App\Http\Controllers\ApiController::class, 'dataRegistration'])->name('data-registration');
Route::get('/data-result-bridge', [App\Http\Controllers\ApiController::class, 'dataResultBridge'])->name('data-result-bridge');
