<?php

/*Route::group(['middleware' => ['web']], function () {
    Route::get('/', 
  'NelsonEAX\Ymap\http\controllers\YmapController@index');
});*/

Route::get('/', 'NelsonEAX\Ymap\http\controllers\YmapController@index');
/*Route::get('ymap/{timezone?}', 
  'nelsoneax\ymap\YmapController@index');*/