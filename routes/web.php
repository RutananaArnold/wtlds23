<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
// users
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/addUser', [\App\Http\Controllers\UserController::class, 'create']);

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// reports and analtyics
    Route::get('reportsAndAnalytics', [\App\Http\Controllers\AnalyticsController::class, 'index'])->name('reports_and_analytics.analytics');

// devices
    Route::get('devices', [\App\Http\Controllers\DevicesController::class, 'index'])->name('devices.devices');
    Route::post('/addDevice', [\App\Http\Controllers\DevicesController::class, 'create']);
    Route::get('deviceStatus', [\App\Http\Controllers\DeviceStatusController::class, 'index'])->name('devices.deviceStatus');

// notifications
    Route::get('notifications', [\App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications.notifications');

    Route::get('addDevice', function () {
		return view('devices.addDevice');
	})->name('addDevice');

    Route::get('addUser', function () {
		return view('users.addUser');
	})->name('addUser');
});
