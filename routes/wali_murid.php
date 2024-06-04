<?php

use App\Http\Controllers\WaliMuridClassController;
use App\Http\Controllers\WaliMuridNewsController;
use App\Http\Controllers\WaliMuridPaymentController;
use App\Http\Controllers\WaliMuridSettingsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cekUserLogin:wali murid']], function(){

    Route::controller(WaliMuridNewsController::class)->group(function () {
        Route::get('wali-murid/news', 'wali_murid_news_index')->name('wali.murid.news.index');
    });

    Route::controller(WaliMuridPaymentController::class)->group(function () {
        Route::get('wali-murid/payment', 'wali_murid_payment_index')->name('wali.murid.payment.index');
        Route::get('wali-murid/payment/add', 'wali_murid_payment_create');
        Route::post('wali-murid/payment', 'wali_murid_payment_store')->name('wali.murid.payment.store');
        Route::get('wali-murid/payment/{payment}/edit', 'wali_murid_payment_edit')->name('wali.murid.payment.edit');
        Route::patch('wali-murid/payment/{payment}', 'wali_murid_payment_update')->name('wali.murid.payment.update');
        Route::get('wali-murid/payment/{payment}', 'wali_murid_payment_show')->name('wali.murid.payment.show');
        Route::delete('wali-murid/payment/{payment}', 'wali_murid_payment_destroy')->name('wali.murid.payment.destroy');
    });

    Route::controller(WaliMuridClassController::class)->group(function () {
        Route::get('wali-murid/class', 'wali_murid_class_index')->name('wali.murid.class.index');
    });

    Route::controller(WaliMuridSettingsController::class)->group(function () {
        Route::get('wali-murid/setting', 'wali_murid_setting_index')->name('wali.murid.setting.index');
    });
});