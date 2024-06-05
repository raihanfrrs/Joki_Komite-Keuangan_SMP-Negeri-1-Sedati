<?php

use App\Http\Controllers\WaliMuridClassController;
use App\Http\Controllers\WaliMuridNewsController;
use App\Http\Controllers\WaliMuridPaymentController;
use App\Http\Controllers\WaliMuridSettingsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cekUserLogin:wali murid']], function(){

    Route::controller(WaliMuridNewsController::class)->group(function () {
        Route::get('wali-murid/news', 'wali_murid_news_index')->name('wali.murid.news.index');
        Route::get('wali-murid/news/{news}', 'wali_murid_news_show')->name('wali.murid.news.show');
        Route::get('wali-murid/news/{news}/download', 'wali_murid_news_download')->name('wali.murid.news.download');
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
        Route::get('wali-murid/class/export-template', 'wali_murid_export_template')->name('wali.murid.export.template');
        Route::post('wali-murid/class/import-murid', 'wali_murid_import_murid')->name('wali.murid.import.murid');
        Route::get('wali-murid/class/{murid}/edit', 'wali_murid_class_edit')->name('wali.murid.class.edit');
        Route::patch('wali-murid/class/{murid}', 'wali_murid_class_update')->name('wali.murid.class.update');
        Route::delete('wali-murid/class/{murid}', 'wali_murid_class_destroy')->name('wali.murid.class.destroy');
    });

    Route::controller(WaliMuridSettingsController::class)->group(function () {
        Route::get('wali-murid/setting', 'wali_murid_setting_index')->name('wali.murid.setting.index');
        Route::patch('wali-murid/setting', 'wali_murid_setting_update')->name('wali.murid.setting.update');
    });
});