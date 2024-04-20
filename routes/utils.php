<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\YajraDatatablesController;

Route::controller(YajraDatatablesController::class)->group(function () {
    Route::get('/listAdminNewsTable', 'admin_news');
    Route::get('/listAdminPaymentTable', 'admin_payment');
    Route::get('/listAdminClassTable', 'admin_class');
});

Route::controller(AjaxController::class)->group(function () {

});