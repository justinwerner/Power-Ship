<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShipmentController;
use App\Models\Shipment;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->can('viewAny', Shipment::class)
        ->name('dashboard');

    Route::prefix('shipment')
        ->name('shipment.')
        ->group(function () {
            Route::post('/', [ShipmentController::class, 'store'])
                ->can('create', Shipment::class)
                ->name('store');

            Route::get('/{shipment}', [ShipmentController::class, 'show'])
                ->can('view', 'shipment')
                ->name('show');

            Route::put('/{shipment}', [ShipmentController::class, 'update'])
                ->can('update', 'shipment')
                ->name('update');

            Route::delete('/{shipment}', [ShipmentController::class, 'destroy'])
                ->can('delete', 'shipment')
                ->name('delete');
        });
});
