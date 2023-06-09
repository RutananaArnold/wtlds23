<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

Route::get('/migrate', function () {
    // Run migrations with the force flag
    Artisan::call('migrate:fresh', ['--force' => true]);
    
    // Get the output of the migration command
    $output = Artisan::output();
    
    // Return the output as a response
    echo "<pre>{$output}</pre>";
});

/*
this is the one you will push
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

//for testing

/*Route::get('/testingForm', function () {
    return view('testingForm');
});*/

//one of the url endpoints 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//the route for checking for commands end point(may have to remove this one)
Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
// users
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/addUser', [\App\Http\Controllers\UserController::class, 'create']);

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// reports and analtyics
    Route::get('reportsAndAnalytics', [\App\Http\Controllers\AnalyticsController::class, 'index'])->name('reports_and_analytics.analytics');
    Route::post('/addReading', [\App\Http\Controllers\ReadingController::class, 'create'])->name('reports_and_analytics.addReading');
// devices
    Route::get('/devices', [\App\Http\Controllers\DevicesController::class, 'index'])->name('devices.devices');
    Route::post('/addDevice', [\App\Http\Controllers\DevicesController::class, 'create']);
    Route::get('/deviceStatus', [\App\Http\Controllers\DeviceStatusController::class, 'index'])->name('devices.deviceStatus');
    Route::post('/addDeviceStatus', [\App\Http\Controllers\DeviceStatusController::class, 'create']);
    Route::get('/ViewOnMap', [\App\Http\Controllers\ViewOnMapController::class, 'index'])->name('devices.ViewOnMap');
    //valve for sending command to open the valve
    Route::get('/openValve', [\App\Http\Controllers\DevicesController::class, 'open'])->name('devices.openValve');
    Route::post('/devices/{device}/update', [\App\Http\Controllers\DevicesController::class, 'update'])->name('devices.update');



// notifications
    Route::get('notifications', [\App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications.notifications');
    Route::post('/addNotification', [\App\Http\Controllers\NotificationsController::class, 'create']);
    // Route::get('/notifications/search', [\App\Http\Controllers\NotificationsController::class, 'search'])->name('notifications.search');


    Route::get('addDevice', function () {
		return view('devices.addDevice');
	})->name('addDevice');

    Route::get('addDeviceStatus', function () {
		return view('devices.addDeviceStatus');
	})->name('addDeviceStatus');

    Route::get('addUser', function () {
		return view('users.addUser');
	})->name('addUser');

    Route::get('addNotification', function () {
		return view('notifications.addNotification');
	})->name('addNotification');

    Route::get('addReading', function () {
		return view('reports_and_analytics.addReading');
	})->name('addReading');
});
