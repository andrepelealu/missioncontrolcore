<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('languages/{language}/confirm-delete', ['as' => 'languages.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\Languages\Controllers\AdminLanguageController@confirmdelete']);
    Route::get('languages/{id}/confirm-restore', ['as' => 'languages.confirm-restore', 'uses' => '\Eyeweb\MissionControl\Modules\Languages\Controllers\AdminLanguageController@confirmrestore']);
    Route::post('languages/{id}/restore', ['as' => 'languages.restore', 'uses' => '\Eyeweb\MissionControl\Modules\Languages\Controllers\AdminLanguageController@restore']);
    Route::resource('languages', '\Eyeweb\MissionControl\Modules\Languages\Controllers\AdminLanguageController', ['except' => ['show']])->parameters(['languages' => 'language']);
});

Route::get('languages/{code}', ['as' => 'language.change', 'uses' => '\Eyeweb\MissionControl\Modules\Languages\Controllers\LanguageController@changeLanguage']);
