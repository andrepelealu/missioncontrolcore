<?php

Route::get('imagecache/{type}/{width}/{height}/{format}/{quality}/{background}/{image}', ['as' => 'imageresizer.resize', 'uses' => '\Eyeweb\MissionControl\Modules\ImageResizer\Controllers\ImageResizerController@resize'])->where('image', '.*');