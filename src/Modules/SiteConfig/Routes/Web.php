<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::group(['middleware' => 'auth.dev'], function () {
        Route::get('siteconfig', ['as' => 'siteconfig.index', 'uses' => '\Eyeweb\MissionControl\Modules\SiteConfig\Controllers\AdminSiteConfigController@index']);
        Route::get('gitpull/confirm-gitpull', ['as' => 'gitpull.confirm-gitpull', 'uses' => '\Eyeweb\MissionControl\Modules\SiteConfig\Controllers\AdminSiteConfigController@confirmgitpull']);
        Route::post('gitpull', ['as' => 'gitpull.pull', 'uses' => '\Eyeweb\MissionControl\Modules\SiteConfig\Controllers\AdminSiteConfigController@gitpull']);
        Route::post('siteconfig/updaterobots', ['as' => 'siteconfig.updaterobots', 'uses' => '\Eyeweb\MissionControl\Modules\RobotsTxt\Controllers\AdminRobotsTxtController@update']);
        Route::post('siteconfig/changedebugmode', ['as' => 'siteconfig.changedebugmode', 'uses' => '\Eyeweb\MissionControl\Modules\SiteConfig\Controllers\AdminSiteConfigController@changeDebugMode']);
    });
});
