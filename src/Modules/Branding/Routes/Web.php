<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::resource('branding', '\Eyeweb\MissionControl\Modules\Branding\Controllers\AdminBrandingController', ['only' => ['index', 'update']]);
});
