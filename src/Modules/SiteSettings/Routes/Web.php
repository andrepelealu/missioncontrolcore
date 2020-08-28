<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('sitesettings', ['as' => 'sitesettings.index', 'uses' => '\Eyeweb\MissionControl\Modules\SiteSettings\Controllers\AdminSiteSettingsController@index']);
    Route::post('sitesettings', ['as' => 'sitesettings.update', 'uses' => '\Eyeweb\MissionControl\Modules\SiteSettings\Controllers\AdminSiteSettingsController@update']);
    Route::group(['middleware' => 'auth.dev'], function () {
        Route::get('sitesettings/create', ['as' => 'sitesettings.create', 'uses' => '\Eyeweb\MissionControl\Modules\SiteSettings\Controllers\AdminSiteSettingsController@create']);
        Route::post('sitesettings/create', ['as' => 'sitesettings.store', 'uses' => '\Eyeweb\MissionControl\Modules\SiteSettings\Controllers\AdminSiteSettingsController@store']);
    });
});
