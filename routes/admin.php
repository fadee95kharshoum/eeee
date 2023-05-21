<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CardController;
use App\Http\Controllers\Backend\DiscountController;
use App\Http\Controllers\Backend\ForSaleController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\MethodController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\RequestController;
use App\Http\Controllers\Backend\SaleController;
use App\Http\Controllers\Backend\StatusController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CustomController;
use App\Http\Controllers\GusetController;
use App\Http\Controllers\RoleController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
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

//For Admin
Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified', 'auth:admin'])
    ->group( function () {

        Route::get('/admin/profile', [UserProfileController::class, 'show'])->name('profile.admin');
        Route::get('/admin/dashboard', [HomeController::class, 'isAdmin'])->name('dashboard')->middleware('auth:admin');
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('change-user-status/{id}', [UserController::class, 'changeStatus'])->name('change-user-status');
        Route::resource('cards', CardController::class);
        Route::get('change-card-status/{id}', [CardController::class, 'changeStatus'])->name('change-card-status');
        Route::resource('types', TypeController::class);
        Route::get('change-type-status/{id}', [TypeController::class, 'changeStatus'])->name('change-type-status');

        Route::resource('/payments', PaymentController::class);
        Route::get('change-payment-status/{id}', [PaymentController::class, 'changeStatus'])->name('change-payment-status');

        Route::resource('cards-for-sale', ForSaleController::class);
        Route::post('/upload-card', [ForSaleController::class, 'uploadNewCardForSale'])->name('uploadNewCardForSale');
        Route::get('change-forSale-status/{id}', [ForSaleController::class, 'changeStatus'])->name('change-forSale-status');

        Route::resource('discounts', DiscountController::class);
        Route::resource('sales', SaleController::class)->only('index', 'destroy');
        Route::get('change-sales-status/{id}', [SaleController::class, 'changeStatus'])->name('change-sales-status');

        Route::resource('methods', MethodController::class);
        Route::get('change-methods-status/{id}', [MethodController::class, 'changeStatus'])->name('change-methods-status');

        Route::resource('requests', RequestController::class);
        Route::get('/change-status/{id}', [RequestController::class, 'changeStatus'])->name('change-request-status');
        Route::resource('messages', MessageController::class);


        // Uploaded Card card->type->table_data->change_status_and_export
        Route::get('/cards-pendding', [StatusController::class, 'getfirstpage_pendding'])->name('card-pendding');
        Route::get('/types-pendding/{id}', [StatusController::class, 'getsecondpage_pendding'])->name('type-pendding');
        Route::get('/uploads-data-pendding/{id}', [StatusController::class, 'getPenddingCards'])->name('uploads-pendding');

        Route::get('/cards-selected', [StatusController::class, 'getfirstpage_selected'])->name('card-selected');
        Route::get('/types-selected/{id}', [StatusController::class, 'getsecondpage_selected'])->name('type-selected');
        Route::get('/uploads-data-selected/{id}', [StatusController::class, 'getSelectedCards'])->name('uploads-selected');

        Route::get('/cards-approved', [StatusController::class, 'getfirstpage_approved'])->name('card-approved');
        Route::get('/types-approved/{id}', [StatusController::class, 'getsecondpage_approved'])->name('type-approved');
        Route::get('/uploads-data-approved/{id}', [StatusController::class, 'getApprovedCards'])->name('uploads-approved');

        Route::get('/cards-rejected', [StatusController::class, 'getfirstpage_rejected'])->name('card-rejected');
        Route::get('/types-rejected/{id}', [StatusController::class, 'getsecondpage_rejected'])->name('type-rejected');
        Route::get('/uploads-data-rejected/{id}', [StatusController::class, 'getRejectedCards'])->name('uploads-rejected');

        //change status and export data
        Route::post('/transform-export', [StatusController::class, 'transformAndExport'])->name('transformAndExport');
        // end of uploads

        // Export And Delete Uploaded Cards
        Route::get('/export-approved-cards/{type_selected}', [StatusController::class, 'ExportApproved'])->name('ExportApproved');
        Route::get('/delete-approved-cards/{type_selected}', [StatusController::class, 'DeleteApproved'])->name('DeleteApproved');

        Route::get('/export-rejected-cards/{type_selected}', [StatusController::class, 'ExportRejected'])->name('ExportRejected');
        Route::get('/delete-rejected-cards/{type_selected}', [StatusController::class, 'DeleteRejected'])->name('DeleteRejected');


        // For Custom Table
        Route::get('/custom-cards-pendding', [CustomController::class, 'getPenddingCustomCards'])->name('custom-card-pendding');
        Route::get('/custom-cards-selected', [CustomController::class, 'getSelectedCustomCards'])->name('custom-card-selected');
        Route::get('/custom-cards-approved', [CustomController::class, 'getApprovedCustomCards'])->name('custom-card-approved');
        Route::get('/custom-cards-rejected', [CustomController::class, 'getRejectedCustomCards'])->name('custom-card-rejected');

        Route::post('/export-data-custom', [CustomController::class, 'convertAndExport'])->name('custom-convert');

        Route::get('/custom-cards-approved-export', [CustomController::class, 'exportApprovedCustomCard'])->name('export-custom-card-approved');
        Route::get('/custom-cards-approved-delete', [CustomController::class, 'deleteApprovedCustomCard'])->name('delete-custom-card-approved');

        Route::get('/custom-cards-rejected-export', [CustomController::class, 'exportRejectedCustomCard'])->name('export-custom-card-rejected');
        Route::get('/custom-cards-rejected-delete', [CustomController::class, 'deleteRejectedCustomCard'])->name('delete-custom-card-rejected');

        // showFirstEditPage
        Route::get('update-items-slider', [GusetController::class, 'showFirstEditPage'])->name('update-items-slider');
        Route::get('update-items-home', [GusetController::class, 'showSecondEditPage'])->name('update-items-home');

        // Edit Guest Home Page
        Route::post('add-image-to-slider', [GusetController::class, 'addImageToSlider'])->name('add-image-to-slider');
        Route::delete('delete-image-from-slider', [GusetController::class, 'deleteImageFromSlider'])->name('delete-image-from-slider');
        Route::post('update-video-from-slider', [GusetController::class, 'updateVideoFromSlider'])->name('update-video-from-slider');
        Route::post('update-head-second-section', [GusetController::class, 'updateHeadOfSecondSection'])->name('update-head-second-section');
        Route::post('update-body-second-section', [GusetController::class, 'updateBodyOfSecondSection'])->name('update-body-second-section');
        Route::delete('delete-body-second-section', [GusetController::class, 'deleteBodyOfSecondSection'])->name('delete-body-second-section');
        Route::post('update-discount-section', [GusetController::class, 'updateDiscountSection'])->name('update-discount-section');

        Route::get('/chat', [MessageController::class, 'chat'])->name('chat');

        // Route::get('show-my-users-complaints', [ MessageController::class, 'showComplaintsMyUsers'])->name('show-my-users-complaints');
        Route::get('/messages/{status}', [MessageController::class, 'getOtherMessage'])->name('getOtherMessage');


    });

    });
