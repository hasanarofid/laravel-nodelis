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
        Route::get('transfer', [App\Http\Controllers\TestdataController::class, 'transfer'])->name('testdata.transfer');
        Route::get('/transfertest/{id}', [App\Http\Controllers\TestdataController::class, 'transfertest'])->name('testdata.transfertest');
        Route::get('cekpasien', [App\Http\Controllers\TestdataController::class, 'cekpasien'])->name('testdata.cekpasien');
        Route::get('loadtabledata', [App\Http\Controllers\TestdataController::class, 'loadtabledata'])->name('testdata.loadtabledata');
        Route::post('senddata', [App\Http\Controllers\TestdataController::class, 'senddata'])->name('testdata.senddata');


        // transfertest
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

    // route menu paket 
    Route::prefix('paket')->group(function () {
        Route::get('/', [App\Http\Controllers\PaketController::class, 'index'])->name('paket.index');
        Route::get('list', [App\Http\Controllers\PaketController::class, 'list'])->name('paket.list');
        Route::get('add', [App\Http\Controllers\PaketController::class, 'add'])->name('paket.add');
        Route::post('store', [App\Http\Controllers\PaketController::class, 'store'])->name('paket.store');
        Route::get('/detail/{id}', [App\Http\Controllers\PaketController::class, 'detail'])->name('paket.detail');
        Route::get('/edit/{id}', [App\Http\Controllers\PaketController::class, 'edit'])->name('paket.edit');
        Route::get('/hapus/{id}', [App\Http\Controllers\PaketController::class, 'hapus'])->name('paket.hapus');
        Route::post('/update/{id}', [App\Http\Controllers\PaketController::class, 'update'])->name('paket.update');
    });
    // end route menu paket 

    // route menu master test 
    Route::prefix('master-test')->group(function () {
        Route::get('/', [App\Http\Controllers\MasterTestController::class, 'index'])->name('master-test.index');
        Route::get('list', [App\Http\Controllers\MasterTestController::class, 'list'])->name('master-test.list');
        Route::get('add', [App\Http\Controllers\MasterTestController::class, 'add'])->name('master-test.add');
        Route::post('store', [App\Http\Controllers\MasterTestController::class, 'store'])->name('master-test.store');
        Route::get('/detail/{id}', [App\Http\Controllers\MasterTestController::class, 'detail'])->name('master-test.detail');
        Route::get('/edit/{id}', [App\Http\Controllers\MasterTestController::class, 'edit'])->name('master-test.edit');
        Route::get('/hapus/{id}', [App\Http\Controllers\MasterTestController::class, 'hapus'])->name('master-test.hapus');
        Route::post('/update/{id}', [App\Http\Controllers\MasterTestController::class, 'update'])->name('master-test.update');
        Route::get('getPaket', [App\Http\Controllers\MasterTestController::class, 'getPaket'])->name('master-test.getPaket');
    });

    // end route menu master test 

    // route menu master  
    Route::prefix('master')->group(function () {
        Route::get('/', [App\Http\Controllers\MasterController::class, 'index'])->name('master.index');
        Route::get('list', [App\Http\Controllers\MasterController::class, 'list'])->name('master.list');
        Route::get('add', [App\Http\Controllers\MasterController::class, 'add'])->name('master.add');
        Route::post('store', [App\Http\Controllers\MasterController::class, 'store'])->name('master.store');
        Route::get('/detail/{id}', [App\Http\Controllers\MasterController::class, 'detail'])->name('master.detail');
        Route::get('/edit/{id}', [App\Http\Controllers\MasterController::class, 'edit'])->name('master.edit');
        Route::get('/hapus/{id}', [App\Http\Controllers\MasterController::class, 'hapus'])->name('master.hapus');
        Route::post('/update/{id}', [App\Http\Controllers\MasterController::class, 'update'])->name('master.update');
        Route::get('getMasterTest', [App\Http\Controllers\MasterController::class, 'getMasterTest'])->name('master.getMasterTest');
    });
    // end route menu master 


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
        Route::get('getmaster', [App\Http\Controllers\MastertindakanController::class, 'getmaster'])->name('mastertindakan.getmaster');
        Route::get('add', [App\Http\Controllers\MastertindakanController::class, 'add'])->name('mastertindakan.add');
        Route::post('store', [App\Http\Controllers\MastertindakanController::class, 'store'])->name('mastertindakan.store');
        Route::get('/detail/{id}', [App\Http\Controllers\MastertindakanController::class, 'detail'])->name('mastertindakan.detail');

        Route::get('/edit/{id}', [App\Http\Controllers\MastertindakanController::class, 'edit'])->name('mastertindakan.edit');
        Route::get('/hapus/{id}', [App\Http\Controllers\MastertindakanController::class, 'hapus'])->name('mastertindakan.hapus');
        Route::post('/update/{id}', [App\Http\Controllers\MastertindakanController::class, 'update'])->name('mastertindakan.update');
    });
    // end route Master Tindakan 

    // route menu Master Inventory 
    Route::prefix('inventory')->group(function () {
        Route::get('/', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory.index');
        Route::get('list', [App\Http\Controllers\InventoryController::class, 'list'])->name('inventory.list');
        Route::get('getmaster', [App\Http\Controllers\InventoryController::class, 'getmaster'])->name('inventory.getmaster');

        Route::get('add', [App\Http\Controllers\InventoryController::class, 'add'])->name('inventory.add');
        Route::post('store', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventory.store');
        Route::get('/detail/{id}', [App\Http\Controllers\InventoryController::class, 'detail'])->name('inventory.detail');
        Route::get('/edit/{id}', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventory.edit');
        Route::get('/hapus/{id}', [App\Http\Controllers\InventoryController::class, 'hapus'])->name('inventory.hapus');
        Route::post('/update/{id}', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory.update');
    });
    // end route Master Inventory 

    // route menu Order 
    Route::prefix('order')->group(function () {
        Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
        Route::get('/getpasien', [App\Http\Controllers\OrderController::class, 'getpasien'])->name('order.getpasien');
        Route::get('/list', [App\Http\Controllers\OrderController::class, 'list'])->name('order.list');
        Route::get('/listdata', [App\Http\Controllers\OrderController::class, 'listdata'])->name('order.listdata');
        Route::get('/getDokter', [App\Http\Controllers\OrderController::class, 'getDokter'])->name('order.getDokter');
        Route::get('/getTindakan', [App\Http\Controllers\OrderController::class, 'getTindakan'])->name('order.getTindakan');
        Route::get('/getlistTindakan', [App\Http\Controllers\OrderController::class, 'getlistTindakan'])->name('order.getlistTindakan');
        Route::post('hapusdata', [App\Http\Controllers\OrderController::class, 'hapusdata'])->name('order.hapusdata');

        Route::post('store', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
        Route::get('/detail/{id}/{time}', [App\Http\Controllers\OrderController::class, 'detail'])->name('order.detail');
        Route::get('/print/{id}', [App\Http\Controllers\OrderController::class, 'print'])->name('order.print');
        Route::get('/print/{id}', [App\Http\Controllers\OrderController::class, 'print'])->name('order.print');
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

    // route menu Laporan 
    Route::prefix('laporan')->group(function () {
        Route::get('/', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/listdata', [App\Http\Controllers\LaporanController::class, 'listdata'])->name('laporan.listdata');
        Route::get('/print/{id}', [App\Http\Controllers\LaporanController::class, 'print'])->name('laporan.print');

        Route::get('/detail/{id}', [App\Http\Controllers\LaporanController::class, 'detail'])->name('laporan.detail');
    });
});
