<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UpdateUserController;
use App\Http\Controllers\Futsal\CollectionController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MediaController;

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

Route::get('/test/{id}', [UpdateUserController::class, 'test'])->name('test');

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('/search-results', [\App\Http\Controllers\WelcomeController::class, 'search']);
Route::get("/venues", [App\Http\Controllers\WelcomeController::class, 'venues'])->name('venues');
Route::get('/futsals/{futsal}', [App\Http\Controllers\WelcomeController::class, 'show'])->name('single.show');
Auth::routes();

Route::get('/payment/success', [App\Http\Controllers\PaymentController::class, 'success'])->name('success');
Route::get('/payment/failure', [App\Http\Controllers\PaymentController::class, 'failure'])->name('failure');
Route::get('/searchvenues', [WelcomeController::class, 'search'])->name('searchvenues');


// Customer/User Routes
Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'is_customer'], "as" => 'customer.'], function () {

    Route::get('dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/payment/submit', [App\Http\Controllers\PaymentController::class, 'submit'])->name('submit');

    Route::post('/futsals/book', [App\Http\Controllers\PaymentController::class, 'book'])->name('book.futsal');

    Route::resource('bookings', \App\Http\Controllers\Customer\BookingController::class);
    Route::get('/test/{id}', [UpdateUserController::class, 'update'])->name('test');
    Route::patch('/updateprofile/{id}', [UpdateUserController::class, 'updateprofile'])->name('updateprofile');
});

// Merchant/Futsal Routes
Route::group(['prefix' => 'futsal', 'middleware' => ['auth', 'is_futsal'], "as" => 'futsal.'], function () {

    Route::get('dashboard', [App\Http\Controllers\Futsal\DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/notifications/list', [App\Http\Controllers\Futsal\DashboardController::class, 'notifications'])
        ->name('notifications.index');

    Route::resource('bookings', \App\Http\Controllers\Futsal\BookingController::class);
    Route::resource('timings', \App\Http\Controllers\Futsal\FutsalTimingController::class);
    Route::get('/gallery', [CollectionController::class, 'gallery'])->name('gallery');
    Route::post('/gallery', [CollectionController::class, 'store'])->name('gallery');
    Route::delete('/media/{id}', [CollectionController::class, 'delete'])->name('delete');
});

// Admin Routes
Route::group(['prefix' => 'admin', "as" => 'admin.'], function () {

    Route::get('login', 'App\Http\Controllers\AdminAuthController@showLoginForm');
    Route::post('login', 'App\Http\Controllers\AdminAuthController@login')->name('login');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');
        Route::get('/notifications/list', [App\Http\Controllers\Admin\DashboardController::class, 'notifications'])
            ->name('notifications.index');
        Route::resource('timings', \App\Http\Controllers\Admin\TimingController::class);
        Route::resource('futsals', \App\Http\Controllers\Admin\FutsalController::class);
        Route::resource('customers', \App\Http\Controllers\Admin\CustomerController::class);
        Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class);
    });
});
Route::group(['prefix' => 'chat'], function () {
    Route::get('/list', [\App\Http\Controllers\ChatController::class, 'list'])->name('chat.list');
    Route::get('/chat-list-component', [\App\Http\Controllers\ChatController::class, 'list'])->name('chat.list.component');
    Route::get('/make/{receipent}', [\App\Http\Controllers\ChatController::class, 'make'])->name('chat.make');
    Route::get('/send-message/{id}', [\App\Http\Controllers\ChatController::class, 'send'])->name('chat.send');
});
