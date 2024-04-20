<?php

use App\Http\Controllers\WaliMuridNewsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cekUserLogin:wali_murid']], function(){

    Route::controller(WaliMuridNewsController::class)->group(function () {
        Route::get('wali-murid/news', 'wali_murid_news_index')->name('wali.murid.news.index');
    });
});