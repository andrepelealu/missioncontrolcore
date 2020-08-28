<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('marketingsettings', ['as' => 'marketingsettings.index', 'uses' => '\Eyeweb\MissionControl\Modules\MarketingSettings\Controllers\AdminMarketingSettingsController@index']);
    Route::post('marketingsettings', ['as' => 'marketingsettings.update', 'uses' => '\Eyeweb\MissionControl\Modules\MarketingSettings\Controllers\AdminMarketingSettingsController@update']);

    Route::get('marketingmeta', ['as' => 'marketingmeta.export', 'uses' => '\Eyeweb\MissionControl\Modules\MarketingSettings\Controllers\AdminMarketingSettingsController@export']);
    Route::post('marketingmeta', ['as' => 'marketingmeta.import', 'uses' => '\Eyeweb\MissionControl\Modules\MarketingSettings\Controllers\AdminMarketingSettingsController@import']);

    Route::group(['middleware' => 'auth.dev'], function () {
        Route::get('marketingsettings/create', ['as' => 'marketingsettings.create', 'uses' => '\Eyeweb\MissionControl\Modules\MarketingSettings\Controllers\AdminMarketingSettingsController@create']);
        Route::post('marketingsettings/create', ['as' => 'marketingsettings.store', 'uses' => '\Eyeweb\MissionControl\Modules\MarketingSettings\Controllers\AdminMarketingSettingsController@store']);
    });
});
