<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::group(['before' => 'auth.dev'], function () {
        Route::get('pagetemplateblocks/{pagetemplate}/pagetemplateblocks/{pagetemplateblock}/confirm-delete', ['as' => 'pagetemplates.pagetemplateblocks.confirm-delete', 'uses' => '\Eyeweb\MissionControl\Modules\PageTemplateBlocks\Controllers\AdminPageTemplateBlockController@confirmdelete']);
        Route::resource('pagetemplates.pagetemplateblocks', '\Eyeweb\MissionControl\Modules\PageTemplateBlocks\Controllers\AdminPageTemplateBlockController', ['except' => ['show']])->parameters(['pagetemplateblocks' => 'pagetemplateblock']);
    });
});
