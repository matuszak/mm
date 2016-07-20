<?php

Route::group(['prefix' => 'painel', 'middleware' => ['auth'], 'web'], function(){

    // Rotas para gerenciamento dos Cidades;
    Route::get('/cities',                     'Painel\CidadeController@index');
    Route::get('/cities/add',                 'Painel\CidadeController@add');
    Route::post('/cities/add',                'Painel\CidadeController@addNow');
    Route::get('/cities/edt/{id}/{act}',      'Painel\CidadeController@edt');
    Route::post('/cities/edt/{id}',           'Painel\CidadeController@edtNow');
    Route::get('/cities/del/{id}/{act}',      'Painel\CidadeController@del');
    Route::post('/cities/del/{id}',           'Painel\CidadeController@delNow');
    Route::post('/cities/search',             'Painel\CidadeController@search');

    // Rotas para gerenciamento dos Countries;
    Route::get('/countries',                     'Painel\PaisController@index');
    Route::get('/countries/add',                 'Painel\PaisController@add');
    Route::post('/countries/add',                'Painel\PaisController@addNow');
    Route::get('/countries/edt/{id}/{act}',      'Painel\PaisController@edt');
    Route::post('/countries/edt/{id}',           'Painel\PaisController@edtNow');
    Route::get('/countries/del/{id}/{act}',      'Painel\PaisController@del');
    Route::post('/countries/del/{id}',           'Painel\PaisController@delNow');
    Route::post('/countries/search',             'Painel\PaisController@search');

    // Rotas para gerenciamento dos Departamentos;
    Route::get('/departamentos',                     'Painel\DepartamentoController@index');
    Route::get('/departamentos/add',                 'Painel\DepartamentoController@add');
    Route::post('/departamentos/add',                'Painel\DepartamentoController@addNow');
    Route::get('/departamentos/edt/{id}/{act}',      'Painel\DepartamentoController@edt');
    Route::post('/departamentos/edt/{id}',           'Painel\DepartamentoController@edtNow');
    Route::get('/departamentos/del/{id}/{act}',      'Painel\DepartamentoController@del');
    Route::post('/departamentos/del/{id}',           'Painel\DepartamentoController@delNow');
    Route::post('/departamentos/search',             'Painel\DepartamentoController@search');

    // Rotas para gerenciamento dos Estados;
    Route::get('/estados',                     'Painel\EstadoController@index');
    Route::get('/estados/add',                 'Painel\EstadoController@add');
    Route::post('/estados/add',                'Painel\EstadoController@addNow');
    Route::get('/estados/edt/{id}/{act}',      'Painel\EstadoController@edt');
    Route::post('/estados/edt/{id}',           'Painel\EstadoController@edtNow');
    Route::get('/estados/del/{id}/{act}',      'Painel\EstadoController@del');
    Route::post('/estados/del/{id}',           'Painel\EstadoController@delNow');
    Route::post('/estados/search',             'Painel\EstadoController@search');

    // Rotas para gerenciamento da Agenda;
    Route::get('/lists',                     'Painel\ListaController@index');
    Route::get('/lists/add',                 'Painel\ListaController@add');
    Route::post('/lists/add',                'Painel\ListaController@addNow');
    Route::get('/lists/edt/{id}/{act}',      'Painel\ListaController@edt');
    Route::post('/lists/edt/{id}',           'Painel\ListaController@edtNow');
    Route::get('/lists/del/{id}/{act}',      'Painel\ListaController@del');
    Route::post('/lists/del/{id}',           'Painel\ListaController@delNow');
    Route::get('/lists/show/{id}',          'Painel\ListaController@show');
    Route::post('/lists/search',             'Painel\ListaController@search');

    // Rotas para gerenciamento dos Permissions;
    Route::get('/permissions',                     'Painel\PermissionController@index');
    Route::get('/permissions/add',                 'Painel\PermissionController@add');
    Route::post('/permissions/add',                'Painel\PermissionController@addNow');
    Route::get('/permissions/edt/{id}/{act}',      'Painel\PermissionController@edt');
    Route::post('/permissions/edt/{id}',           'Painel\PermissionController@edtNow');
    Route::get('/permissions/del/{id}/{act}',      'Painel\PermissionController@del');
    Route::post('/permissions/del/{id}',           'Painel\PermissionController@delNow');
    Route::post('/permissions/search',             'Painel\PermissionController@search');

    // Rotas para gerenciamento dos Roles;
    Route::get('/roles',                     'Painel\RoleController@index');
    Route::get('/roles/add',                 'Painel\RoleController@add');
    Route::post('/roles/add',                'Painel\RoleController@addNow');
    Route::get('/roles/edt/{id}/{act}',      'Painel\RoleController@edt');
    Route::post('/roles/edt/{id}',           'Painel\RoleController@edtNow');
    Route::get('/roles/del/{id}/{act}',      'Painel\RoleController@del');
    Route::post('/roles/del/{id}',           'Painel\RoleController@delNow');
    Route::post('/roles/search',             'Painel\RoleController@search');

    // Rotas para gerenciamento dos Usuários;
    Route::get('/users',                     'Painel\UserController@index');
    Route::get('/users/add',                 'Painel\UserController@add');
    Route::post('/users/add',                'Painel\UserController@addNow');
    Route::get('/users/edt/{id}/{act}',      'Painel\UserController@edt');
    Route::post('/users/edt/{id}',           'Painel\UserController@edtNow');
    Route::get('/users/del/{id}/{act}',      'Painel\UserController@del');
    Route::post('/users/del/{id}',           'Painel\UserController@delNow');
    Route::post('/users/search',             'Painel\UserController@search');

    // Outras rotas não válidas;
    Route::get('/home', 'HomeController@index');


    // Route to main
    Route::get('/', 'Painel\PainelController@index');
});

// Rotas de autenticação;
Route::group(['middleware' => [], 'web'], function(){
    // Autenticação Routes;
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    // Registratation Routes;
    //$this->get('register', 'Auth\AuthController@showRegistrationForm');
    //$this->post('register', 'Auth\AuthController@register');

    // Passwords and Resets;
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');
});

Route::get('/', 'portal\PortalController@index');

