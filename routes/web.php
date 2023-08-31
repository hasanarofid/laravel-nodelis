<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebSocketController;

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
// Route::get('/ws', [WebSocketController::class, 'onOpen']);


// // Route::get('/ws://localhost:3000/ws', [WebSocketController::class, 'onOpen'])->name('test');
Route::get('/chat', function () {
    return view('chat');
});

Auth::routes();
Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// route penel dashboard for marketing
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // route menu produk 
    Route::prefix('testdata')->group(function () {
        Route::get('/', [App\Http\Controllers\TestdataController::class, 'index'])->name('testdata.index');
        Route::get('list', [App\Http\Controllers\TestdataController::class, 'list'])->name('testdata.list');
         Route::get('/detail/{id}', [App\Http\Controllers\TestdataController::class, 'detail'])->name('testdata.detail');
         Route::get('/edit/{id}', [App\Http\Controllers\TestdataController::class, 'edit'])->name('testdata.edit');
         Route::get('/hapus/{id}', [App\Http\Controllers\TestdataController::class, 'hapus'])->name('testdata.hapus');

    });
    // end route menu produk 

    // route menu pasien 
    Route::prefix('pasien')->group(function () {
        Route::get('/', [App\Http\Controllers\PasienController::class, 'index'])->name('pasien.index');
        Route::get('list', [App\Http\Controllers\PasienController::class, 'list'])->name('pasien.list');
        Route::get('add', [App\Http\Controllers\PasienController::class, 'add'])->name('pasien.add');
        Route::post('store', [App\Http\Controllers\PasienController::class, 'store'])->name('pasien.store');
         Route::get('/detail/{id}', [App\Http\Controllers\PasienController::class, 'detail'])->name('pasien.detail');
         Route::get('/edit/{id}', [App\Http\Controllers\PasienController::class, 'edit'])->name('pasien.edit');
         Route::get('/hapus/{id}', [App\Http\Controllers\PasienController::class, 'hapus'])->name('pasien.hapus');
         Route::post('/update/{id}', [App\Http\Controllers\PasienController::class, 'update'])->name('pasien.update');
    });
    // end route menu pasien 


    // route menu Dokter 
    Route::prefix('dokter')->group(function () {
        Route::get('/', [App\Http\Controllers\DokterController::class, 'index'])->name('dokter.index');
        Route::get('list', [App\Http\Controllers\DokterController::class, 'list'])->name('dokter.list');
        Route::get('add', [App\Http\Controllers\DokterController::class, 'add'])->name('dokter.add');
        Route::post('store', [App\Http\Controllers\DokterController::class, 'store'])->name('dokter.store');
         Route::get('/detail/{id}', [App\Http\Controllers\DokterController::class, 'detail'])->name('dokter.detail');
         Route::get('/edit/{id}', [App\Http\Controllers\DokterController::class, 'edit'])->name('dokter.edit');
         Route::get('/hapus/{id}', [App\Http\Controllers\DokterController::class, 'hapus'])->name('dokter.hapus');
         Route::post('/update/{id}', [App\Http\Controllers\DokterController::class, 'update'])->name('dokter.update');
    });
    // end route menu Dokter 

    // route menu Master Tindakan 
    Route::prefix('mastertindakan')->group(function () {
        Route::get('/', [App\Http\Controllers\MastertindakanController::class, 'index'])->name('mastertindakan.index');
        Route::get('list', [App\Http\Controllers\MastertindakanController::class, 'list'])->name('mastertindakan.list');
        Route::get('add', [App\Http\Controllers\MastertindakanController::class, 'add'])->name('mastertindakan.add');
        Route::post('store', [App\Http\Controllers\MastertindakanController::class, 'store'])->name('mastertindakan.store');
         Route::get('/detail/{id}', [App\Http\Controllers\MastertindakanController::class, 'detail'])->name('mastertindakan.detail');
         Route::get('/edit/{id}', [App\Http\Controllers\MastertindakanController::class, 'edit'])->name('mastertindakan.edit');
         Route::get('/hapus/{id}', [App\Http\Controllers\MastertindakanController::class, 'hapus'])->name('mastertindakan.hapus');
         Route::post('/update/{id}', [App\Http\Controllers\MastertindakanController::class, 'update'])->name('mastertindakan.update');
    });
    // end route Master Tindakan 

        // route menu Order 
    Route::prefix('order')->group(function () {
        Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
        Route::get('/getpasien', [App\Http\Controllers\OrderController::class, 'getpasien'])->name('order.getpasien');
        Route::get('/getDokter', [App\Http\Controllers\OrderController::class, 'getDokter'])->name('order.getDokter');
        Route::get('/getTindakan', [App\Http\Controllers\OrderController::class, 'getTindakan'])->name('order.getTindakan');
   Route::post('store', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
     


    });

    // route menu Test 
    Route::prefix('test')->group(function () {
        Route::get('/', [App\Http\Controllers\TestController::class, 'index'])->name('test.index');
        Route::get('list', [App\Http\Controllers\TestController::class, 'list'])->name('test.list');
        Route::get('add', [App\Http\Controllers\TestController::class, 'add'])->name('test.add');
        Route::post('store', [App\Http\Controllers\TestController::class, 'store'])->name('test.store');
         Route::get('/detail/{id}', [App\Http\Controllers\TestController::class, 'detail'])->name('test.detail');
         Route::get('/edit/{id}', [App\Http\Controllers\TestController::class, 'edit'])->name('test.edit');
         Route::get('/hapus/{id}', [App\Http\Controllers\TestController::class, 'hapus'])->name('test.hapus');
         Route::post('/update/{id}', [App\Http\Controllers\TestController::class, 'update'])->name('test.update');
    });
    // end route menu Test 
});