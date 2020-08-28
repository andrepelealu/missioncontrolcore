<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('slideshows/{slideshow}/confirm-delete', ['as' => 'slideshows.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\Slideshow\Controllers\AdminSlideshowController@confirmDelete']);
    Route::get('slideshows/{slideshow}/confirm-restore', ['as' => 'slideshows.confirm-restore', 'uses' => '\Eyeweb\MissionControl\Modules\Slideshow\Controllers\AdminSlideshowController@confirmRestore']);
    Route::post('slideshows/{slideshow}/restore', ['as' => 'slideshows.restore', 'uses' => '\Eyeweb\MissionControl\Modules\Slideshow\Controllers\AdminSlideshowController@restore']);
    Route::resource('slideshows', '\Eyeweb\MissionControl\Modules\Slideshow\Controllers\AdminSlideshowController', ['except' => ['show']])->parameters(['slideshows' => 'slideshow']);
});
