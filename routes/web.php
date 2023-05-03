<?php

use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\UserController;
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
    Route::get('/{id}/detail', 'detail');
    Route::post('/getCar', 'getCar');

    Route::post('/{id}/detail', 'detailPost');


    Route::get('/cart', 'indexCart');
    Route::get('/cart/{id}', 'detailCart');

    Route::post('/checkout', 'checkout');
    // Route::group([
    //     'middleware' => ['auth', 'role:user'],
    // ], function () {
    //     Route::post('/{id}/detail', 'detailPost');
    // });


    // Register

    Route::get('auth/register', 'register');
    Route::post("/auth/register", 'registerPost');

    Route::get('auth/register-customer', 'registerCust');
    Route::post("auth/register-customer", 'registerPostCust');
    // Route::group([])
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


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
        Route::post('/', 'store');

        Route::get('/{id}/terima', 'terima');


        // Route::get('/kontrak', 'indexKontrak');
    });
    // Route::group([
    //     'prefix' => 'mobil',
    //     'controller' => MobilController::class,
    // ], function () {
    //     Route::get('/', 'index');
    //     Route::post('/', 'store');
    // });
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
        Route::post('/edit', 'editMobil');
        Route::post('/{id}/supir', 'addSupir');
    });

    Route::group([
        'prefix' => 'supir',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexSupir');
        Route::post('/', 'storeSupir');
    });

    Route::group([
        'prefix' => 'kontrak',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexKontrak');
        Route::post('/', 'storeKontrak');
    });
    Route::group([
        'prefix' => 'persyaratan',
        'controller' => MobilController::class,
    ], function () {
        Route::get('/', 'indexPersyaratan');
        Route::post('/', 'storePersyaratan');
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
    Route::prefix('orders')->group(function () {
        Route::get('/', 'indexOrders');
        Route::get('/{id}', 'detailOrders');
        Route::post('/{id}/digunakan', 'detailOrderDigunakan');
    });
});


require __DIR__ . '/auth.php';
