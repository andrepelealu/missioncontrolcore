<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('slide/{slide}/confirm-delete', ['as' => 'slides.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\SlideshowImage\Controllers\AdminSlideshowImageController@confirmdelete']);
    Route::post('slide/multiple', ['as' => 'slide.multiple', 'uses' => '\Eyeweb\MissionControl\Modules\SlideshowImage\Controllers\AdminSlideshowImageController@uploadMultipleImages']);
    Route::resource('slides', '\Eyeweb\MissionControl\Modules\SlideshowImage\Controllers\AdminSlideshowImageController', ['except' => ['index', 'create', 'show']])->parameters(['slides' => 'slide']);
});
