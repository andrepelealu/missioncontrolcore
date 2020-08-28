<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {

    // Authentication routes...
	Route::get('login', '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminLoginController@getLogin');
    Route::post('login', ['as' => 'login', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminLoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminLoginController@logout']);

	// Password reset link request routes...
    Route::get('forgotten-password', ['as' => 'request', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminForgotPasswordController@showLinkRequestForm']);
    Route::post('forgotten-password', ['as' => 'request', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminForgotPasswordController@sendResetLinkEmail']);

	// Password reset routes...
    Route::get('password/reset/{token}', ['as' => 'reset', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'reset', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminResetPasswordController@reset']);

    // Admin routes
    Route::get('/', ['as' => 'dashboard', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminDashboardController@index']);
    Route::get('admins/{admin}/confirm-delete', ['as' => 'admins.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminAdminController@confirmDelete']);
    Route::post('admins/{id}/change-password', ['as' => 'admins.changepassword', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminAdminController@changePassword']);
    Route::get('admins/{id}/confirm-restore', ['as' => 'admins.confirm-restore', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminAdminController@confirmRestore']);
    Route::post('admins/{id}/restore', ['as' => 'admins.restore', 'uses' => '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminAdminController@restore']);
    Route::resource('admins', '\Eyeweb\MissionControl\Modules\Admins\Controllers\AdminAdminController', ['except' => ['show']])->parameters(['admins' => 'admin']);

    // Sort order function
	Route::post('sortorder', function () {
		updateSortOrder(request()->input());
	});
});
