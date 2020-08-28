<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('usergroups/{usergroup}/confirm-delete', ['as' => 'usergroups.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\Usergroups\Controllers\AdminUsergroupController@confirmDelete']);
    Route::get('usergroups/{id}/confirm-restore', ['as' => 'usergroups.confirm-restore', 'uses' => '\Eyeweb\MissionControl\Modules\Usergroups\Controllers\AdminUsergroupController@confirmRestore']);
    Route::post('usergroups/{id}/restore', ['as' => 'usergroups.restore', 'uses' => '\Eyeweb\MissionControl\Modules\Usergroups\Controllers\AdminUsergroupController@restore']);
    Route::resource('usergroups', '\Eyeweb\MissionControl\Modules\Usergroups\Controllers\AdminUsergroupController', ['except' => ['show']])->parameters(['usergroups' => 'usergroup']);
});
