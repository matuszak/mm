<?php

Route::group(['prefix' => 'painel', 'middleware' => [], 'web'], function(){

    //rotas para gerenciamento dos Countries;
    Route::get('/contries', 'Painel\PaisController@index');
    Route::get('/contries/add', 'Painel\PaisController@add');
    Route::post('/contries/add', 'Painel\PaisController@addInsert');

    //route to main
    Route::get('/', 'Painel\PainelController@index');
});


Route::get('/', 'Portal\PortalController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/editar/{id}', 'HomeController@editar');
Route::get('/rp', 'HomeController@rolesPermissions');