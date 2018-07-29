<?php

use Illuminate\Routing\Router;

//Backend Admin Routes
Admin::registerAuthRoutes();
Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
        ], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('items', 'ItemController@index');
    $router->get('items/create', 'ItemController@create');
    $router->get('items/{id}/edit', 'ItemController@edit');
});

//API with Required authentication
Route::group([
    'prefix' => 'api/v1',
    'middleware' => 'auth:api',
    'namespace' => config('admin.route.namespace'
    )], function (Router $router) {

    $router->post('invoices', 'InvoiceApiController@create');
    $router->put('invoices/{uuid}', 'InvoiceApiController@update');
    $router->put('items/{uuid}', 'ItemApiController@update');
    $router->get('orders/{uuid}', 'OrderApiController@details');
    $router->put('orders/{uuid}', 'OrderApiController@update');
    $router->post('items', 'ItemApiController@create');
    $router->post('orders', 'OrderApiController@create');
});

//API Public access
Route::group([
    'prefix' => 'api/v1',
    'middleware' => 'guest',
    'namespace' => config('admin.route.namespace')
        ], function(Router $router) {
    
    $router->get('items', 'ItemApiController@all');
    $router->get('items/{uuid}', 'ItemApiController@details');
    $router->get('orders/', 'OrderApiController@all');
    $router->get('orders/{uuid}', 'OrderApiController@details');
    $router->get('invoices', 'InvoiceApiController@all');
    $router->get('invoices/{uuid}', 'InvoiceApiController@details');
    $router->delete('items/{uuid}', 'ItemApiController@delete');
    $router->delete('orders/{uuid}', 'OrderApiController@delete');
    $router->delete('invoices/{uuid}', 'InvoiceApiController@delete');
});
