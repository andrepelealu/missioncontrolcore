<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
	Route::get('#strtolower_plural_name/{#strtolower_name}/confirm-delete', ['as' => '#strtolower_plural_name.confirm-delete', 'uses' => '\Modules\#plural_name\Controllers\Admin#nameController@confirmDelete']);
	Route::get('#strtolower_plural_name/{id}/confirm-restore', ['as' => '#strtolower_plural_name.confirm-restore', 'uses' => '\Modules\#plural_name\Controllers\Admin#nameController@confirmRestore']);
	Route::post('#strtolower_plural_name/{id}/restore', ['as' => '#strtolower_plural_name.restore', 'uses' => '\Modules\#plural_name\Controllers\Admin#nameController@restore']);
	Route::resource('#strtolower_plural_name', '\Modules\#plural_name\Controllers\Admin#nameController', ['except' => ['show']])->parameters(['#strtolower_plural_name' => '#strtolower_name']);
});