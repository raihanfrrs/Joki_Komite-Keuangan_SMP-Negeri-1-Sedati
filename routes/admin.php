<?php

use App\Http\Controllers\AdminClassController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminSettingsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cekUserLogin:admin']], function(){

    Route::controller(AdminNewsController::class)->group(function () {
        Route::get('admin/news', 'admin_news_index')->name('admin.news.index');
        Route::get('admin/news/add', 'admin_news_create');
        Route::post('admin/news', 'admin_news_store')->name('admin.news.store');
        Route::get('admin/news/{news}/edit', 'admin_news_edit')->name('admin.news.edit');
        Route::patch('admin/news/{news}', 'admin_news_update')->name('admin.news.update');
        Route::get('admin/news/{news}', 'admin_news_show')->name('admin.news.show');
        Route::delete('admin/news/{news}', 'admin_news_destroy')->name('admin.news.destroy');
    });

    Route::controller(AdminPaymentController::class)->group(function () {
        Route::get('admin/payment', 'admin_payment_index')->name('admin.payment.index');
        Route::get('admin/payment/{payment}', 'admin_payment_show')->name('admin.payment.show');
        Route::patch('admin/payment/{payment}/{type}', 'admin_payment_update_status')->name('admin.payment.update.status');
    });

    Route::controller(AdminClassController::class)->group(function () {
        Route::get('admin/class', 'admin_class_index')->name('admin.class.index');
        Route::get('admin/class/{class}', 'admin_class_show')->name('admin.class.show');
    });

    Route::controller(AdminSettingsController::class)->group(function () {
        Route::get('admin/setting', 'admin_setting_index')->name('admin.setting.index');
    });
});