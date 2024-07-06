<?php

use App\Http\Controllers\AdminClassController;
use App\Http\Controllers\AdminMasterController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminReportingController;
use App\Http\Controllers\AdminSettingsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cekUserLogin:admin']], function(){

    Route::controller(AdminMasterController::class)->group(function () {
        Route::get('admin/master-wali-murid', 'admin_master_wali_murid_index')->name('admin.master.wali-murid.index');
        Route::get('admin/master-wali-murid/export-template', 'admin_master_wali_murid_export_template');
        Route::post('admin/master-wali-murid/import-wali-murid', 'admin_master_wali_murid_import_wali_murid')->name('admin.master.wali-murid.import-wali-murid');
        Route::get('admin/master-wali-murid/{wali_murid}/edit', 'admin_master_wali_murid_edit')->name('admin.master.wali-murid.edit');
        Route::patch('admin/master-wali-murid/{wali_murid}', 'admin_master_wali_murid_update')->name('admin.master.wali-murid.update');
        Route::delete('admin/master-wali-murid/{wali_murid}', 'admin_master_wali_murid_destroy')->name('admin.master.wali-murid.destroy');
    });

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
        Route::patch('admin/setting', 'admin_setting_update')->name('admin.setting.update');
    });

    Route::controller(AdminReportingController::class)->group(function () {
        Route::get('rekap/keuangan-tahunan', 'admin_reporting_finance_yearly')->name('admin.reporting.finance.yearly.index');
        Route::get('rekap/keuangan-tahunan/{year}/print', 'admin_reporting_finance_yearly_print')->name('admin.reporting.finance.yearly.print');

        Route::get('rekap/keuangan-bulanan', 'admin_reporting_finance_monthly')->name('admin.reporting.finance.monthly.index');
        Route::get('rekap/keuangan-bulanan/{month}/print', 'admin_reporting_finance_monthly_print')->name('admin.reporting.finance.monthly.print');

        Route::get('rekap/keuangan-harian', 'admin_reporting_finance_daily')->name('admin.reporting.finance.daily.index');
        Route::get('rekap/keuangan-harian/{date}/print', 'admin_reporting_finance_daily_print')->name('admin.reporting.finance.daily.print');
    });
});