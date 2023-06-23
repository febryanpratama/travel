<?php

use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rental\MobilController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => '/',
    'controller' => FrontController::class,
], function () {
    Route::get('/', 'index');
    Route::get('/cek-penyewaan', 'cekExpiredPenyewaan');
    Route::get('/tentang-kami', 'tentangkami');
    Route::get('/{id}/detail', 'detail');
    Route::post('/getCar', 'getCar');

    Route::get('/rental/detail/{rental_id}', 'detailRental');

    Route::post('/{id}/detail', 'detailPost');


    Route::get('/cart', 'indexCart');
    Route::get('/cart/{id}', 'detailCart');
    Route::get('/cari-mobil', 'cariMobil');

    Route::post('/checkout', 'checkout');
    // Route::group([
    //     'middleware' => ['auth', 'role:user'],
    // ], function () {
    //     Route::post('/{id}/detail', 'detailPost');
    // });


    // Register

    Route::get('auth/register', 'register');
    Route::post("/auth/register", 'registerPost');

    Route::get('auth/forgot-password', 'forgotPassword');
    Route::post('auth/forgot-password', 'storeforgotPassword');

    Route::get('auth/register-customer', 'registerCust');
    Route::post("auth/register-customer", 'registerPostCust');

    Route::get('syarat-ketentuan/{rental_id}', 'syaratKetentuan');
    // Route::group([])
});


Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => 'dashboard',
    'controller' => DashboardController::class,
], function () {
    Route::get('/', 'index');
});


Route::group([
    'middleware' => ['auth', 'role:admin'],
    'prefix' => 'admin',
], function () {

    Route::group([
        'prefix' => 'rental',
        'controller' => RentalController::class,
    ], function () {
        Route::get('/', 'index');
        Route::get('/store', 'indexStore');
        Route::post('/store', 'store');

        Route::get('{id}/detail', 'detail');
        Route::get('{id}/detail/supir', 'detailSupir');

        Route::get('/{id}/ubah', 'ubah');
        Route::get('/{id}/terima', 'terima');
        Route::get('/{id}/hapus', 'hapus');


        // Route::get('/kontrak', 'indexKontrak');
    });

    Route::group([
        'prefix' => 'fee',
        'controller' => AdminController::class,
    ], function () {
        Route::get('/', 'indexFee');
        // Route::post('/', 'storeMobil');
    });
    Route::group([
        'prefix' => 'mobil',
        'controller' => AdminController::class,
    ], function () {
        Route::get('/', 'indexMobil');
        Route::post('/', 'storeMobil');
    });


    Route::group([
        'prefix' => 'orders',
        'controller' => AdminController::class,
    ], function () {
        Route::get('/', 'indexOrder');
        Route::get('/{order_id}', 'detailOrder');
        Route::get('/{order_id}/syarat-ketentuan', 'syaratketentuan');
    });


    Route::group([
        'prefix' => 'customer',
        'controller' => UserController::class,
    ], function () {
        Route::get('/', 'indexAdmin');
        Route::get('/{id}/detail', 'detailAdmin');
        Route::get('/{id}/terima', 'terimaAdmin');
        Route::get('/{id}/tolak', 'tolakAdmin');
    });

    Route::group([
        'prefix' => 'profil',
        'controller' => UserController::class,
    ], function () {
        Route::get('/', 'indexProfil');
        Route::post('/', 'storeProfil');
    });
});


Route::group([
    'middleware' => ['auth', 'role:rental'],
    'prefix' => 'rental',
], function () {

    Route::group([
        'prefix' => 'mobil',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}/hapus', 'hapusMobil');
        Route::post('/edit', 'editMobil');
        Route::post('/{id}/supir', 'addSupir');
    });

    Route::group([
        'prefix' => 'supir',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexSupir');
        Route::get('/{supir_id}/hapus', 'hapusSupir');
        Route::post('/', 'storeSupir');
        Route::post('/{supir_id}/edit', 'editSupir');
    });

    Route::group([
        'prefix' => 'kontrak',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexKontrak');
        Route::post('/', 'storeKontrak');
        Route::get('/{id}/hapus', 'hapusKontrak');
    });
    Route::group([
        'prefix' => 'persyaratan',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexPersyaratan');
        Route::post('/', 'storePersyaratan');
        Route::get('/{id}/hapus', 'hapusPersyaratan');
    });
    Route::group([
        'prefix' => 'profil',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexProfile');
        Route::post('/', 'storeProfile');
    });

    Route::group([
        'prefix' => 'fee',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexFee');
        Route::post('/', 'storeFee');
        // Route::get('/{id}/hapus', 'hapusFee');
    });

    Route::group([
        'prefix' => 'orders',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexOrders');
        Route::get('/{id}', 'detailOrders');
        Route::post('/{id}/persiapan', 'detailOrderPersiapan');
        Route::post('/{id}/pengantaran', 'detailOrderPengantaran');
        Route::post('/{id}/dikembalikan', 'detailOrderDikembalikan');
    });
});


Route::group([
    'prefix' => 'user',
    'controller' => UserUserController::class,
], function () {
    Route::prefix('profil')->group(function () {
        Route::get('/', 'indexProfile');
        Route::post('/', 'storeProfile');
    });
    Route::prefix('orders')->group(function () {
        Route::get('/', 'indexOrders');
        Route::get('/{id}', 'detailOrders');
        Route::post('{id}/bukti', 'inputBukti');
        Route::post('/{id}/digunakan', 'detailOrderDigunakan');
    });
});


require __DIR__ . '/auth.php';
