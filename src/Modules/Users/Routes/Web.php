<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('users/{user}/confirm-delete', ['as' => 'users.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\AdminUserController@confirmDelete']);
    Route::post('users/{user}/changepassword', ['as' => 'users.changepassword', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\AdminUserController@changePassword']);
    Route::get('users/{id}/confirm-restore', ['as' => 'users.confirm-restore', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\AdminUserController@confirmRestore']);
    Route::post('users/{id}/restore', ['as' => 'users.restore', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\AdminUserController@restore']);
    Route::resource('users', '\Eyeweb\MissionControl\Modules\Users\Controllers\AdminUserController', ['except' => ['show']])->parameters(['users' => 'user']);
});

Route::get('login', ['as' => 'account.login', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserLoginController@getLogin']);
Route::post('login', ['as' => 'account.login.post', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserLoginController@login']);
Route::get('logout', ['as' => 'account.logout', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserLoginController@logout']);

Route::get('forgotten-password', ['as' => 'account.forgottenpassword', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserForgotPasswordController@showLinkRequestForm']);
Route::post('forgotten-password', ['as' => 'account.forgottenpassword.post', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserForgotPasswordController@sendResetLinkEmail']);

Route::get('register', ['as' => 'account.register', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserRegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'account.register.post', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserRegisterController@register']);

Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'account.resetpassword.post', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserResetPasswordController@reset']);


Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => ['auth.user']], function ($router) {

    Route::get('/', ['as' => 'index', 'uses' => '\Eyeweb\MissionControl\Modules\Users\Controllers\UserAccountController@index']);

});
