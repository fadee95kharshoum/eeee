<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\RequestController;
use App\Http\Controllers\Backend\SaleController;
use App\Http\Controllers\Backend\UploadController;
use App\Http\Controllers\HomeController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::get('/', [HomeController::class, 'index']);
        Route::get('/buy-card/{id}', [HomeController::class, 'buyCard'])->name('buy');
        Route::post('/sales-store', [SaleController::class, 'store'])->name('sales.store');
        Route::post('/create-info-message', [MessageController::class, 'storeMessage'])->name('storeMessage');
// Route::get('/get.active.methodes', [HomeController::class, 'getActiveMethodes'])->name('get.active.methodes');
Route::post('/get-transection-for-method', [HomeController::class, 'getTransectionNumber'])->name('get-transection-for-method');
Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'),'verified'])
        ->group(function () {
            Route::get('/dashboard', [HomeController::class, 'isUser'])->name('dashboard');
            Route::post('/request-money', [RequestController::class, 'storeRequestFromUser'])->name('storeRequestFromUser');
            Route::resource('uploads', UploadController::class)->only(['store']);
            Route::get('/user-complaints', [MessageController::class, 'showComplaintsForm'])->name('show-complaints-form');
            // Route::post('/user-complaints', [MessageController::class, 'createComplaintsForm'])->name('create-complaints-form');
});
    });


    //for testing mcamara
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('/testformcamara', function(){
            // return  LaravelLocalization::getSupportedLocales();
            // return LaravelLocalization::getLocalesOrder();
            // return LaravelLocalization::getSupportedLanguagesKeys();
            return LaravelLocalization::getCurrentLocale();
            // return LaravelLocalization::getLocalizedURL('ar', null, [], true);

        });
    });

