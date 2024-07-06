<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\YajraDatatablesController;

Route::controller(YajraDatatablesController::class)->group(function () {
    Route::get('/listAdminNewsTable', 'admin_news');
    Route::get('/listAdminPaymentTable', 'admin_payment');
    Route::get('/listAdminClassTable', 'admin_class');
    Route::get('/listWaliMuridNewsTable', 'wali_murid_news');
    Route::get('/listWaliMuridPaymentTable', 'wali_murid_payment');
    Route::get('/listWaliMuridAllMuridTable', 'wali_murid_all_murid');
    Route::get('/listAdminAllMuridTable/{class}', 'admin_all_murid');
    Route::get('/listAdminAllWaliMuridTable', 'admin_all_wali_murid');
    Route::get('/listAdminReportingFinanceYearlyTable', 'admin_reporting_finance_yearly');
    Route::get('/listAdminReportingFinanceMonthlyTable', 'admin_reporting_finance_monthly');
    Route::get('/listAdminReportingFinanceDailyTable', 'admin_reporting_finance_daily');
});

Route::controller(AjaxController::class)->group(function () {

});