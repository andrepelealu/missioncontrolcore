<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('pageformenquiries/{pageformenquiry}/confirm-delete', ['as' => 'pageformenquiries.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\PageFormEnquiries\Controllers\AdminPageFormEnquiryController@confirmDelete']);
    Route::resource('pageformenquiries', '\Eyeweb\MissionControl\Modules\PageFormEnquiries\Controllers\AdminPageFormEnquiryController', ['except' => ['edit', 'create', 'store']])->parameters(['pageformenquiries' => 'pageformenquiry']);
});