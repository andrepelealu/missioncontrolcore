<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::resource('marketingreports', '\Eyeweb\MissionControl\Modules\MarketingReports\Controllers\AdminMarketingReportController');
});