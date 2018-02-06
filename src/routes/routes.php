<?php

Route::group(['prefix' => 'persentase-kondisi-kelas-baik-sma-ma', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\PerKKBSmaMa\Http\Controllers\PerKKBSmaMaController@index',
        'create'     => 'Bantenprov\PerKKBSmaMa\Http\Controllers\PerKKBSmaMaController@create',
        'store'     => 'Bantenprov\PerKKBSmaMa\Http\Controllers\PerKKBSmaMaController@store',
        'show'      => 'Bantenprov\PerKKBSmaMa\Http\Controllers\PerKKBSmaMaController@show',
        'update'    => 'Bantenprov\PerKKBSmaMa\Http\Controllers\PerKKBSmaMaController@update',
        'destroy'   => 'Bantenprov\PerKKBSmaMa\Http\Controllers\PerKKBSmaMaController@destroy',
    ];

    Route::get('/',$controllers->index)->name('persentase-kondisi-kelas-baik-sma-ma.index');
    Route::get('/create',$controllers->create)->name('persentase-kondisi-kelas-baik-sma-ma.create');
    Route::post('/store',$controllers->store)->name('persentase-kondisi-kelas-baik-sma-ma.store');
    Route::get('/{id}',$controllers->show)->name('persentase-kondisi-kelas-baik-sma-ma.show');
    Route::put('/{id}/update',$controllers->update)->name('persentase-kondisi-kelas-baik-sma-ma.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('persentase-kondisi-kelas-baik-sma-ma.destroy');

});

