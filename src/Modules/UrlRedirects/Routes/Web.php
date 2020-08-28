<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('urlredirects/export', ['as' => 'urlredirects.export', 'uses' => '\Eyeweb\MissionControl\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@export']);
    Route::post('urlredirects/import', ['as' => 'urlredirects.import', 'uses' => '\Eyeweb\MissionControl\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@import']);
    Route::get('urlredirects/{urlredirect}/confirm-delete', ['as' => 'urlredirects.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@confirmDelete']);
    Route::get('urlredirects/{id}/confirm-restore', ['as' => 'urlredirects.confirm-restore', 'uses' => '\Eyeweb\MissionControl\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@confirmRestore']);
    Route::post('urlredirects/{id}/restore', ['as' => 'urlredirects.restore', 'uses' => '\Eyeweb\MissionControl\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@restore']);
    Route::resource('urlredirects', '\Eyeweb\MissionControl\Modules\UrlRedirects\Controllers\AdminUrlRedirectController', ['except' => ['show']])->parameters(['urlredirects' => 'urlredirect']);
});
