<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::resource('navmenus', '\Eyeweb\MissionControl\Modules\NavMenu\Controllers\AdminNavMenuController', ['only' => ['index', 'edit', 'update']])->parameters(['navmenus' => 'navmenu']);
});
