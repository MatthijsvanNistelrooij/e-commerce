<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/products/create', [
        'uses' => 'ProductsController@create',
        'as' => 'products.create'
    ]);

    Route::post('/products/store', [
    'uses' => 'ProductsController@store',
    'as' => 'products.store'
    ]);

    Route::get('/products', [
        'uses' => 'ProductsController@index',
        'as' => 'products'
    ]);

    Route::get('/products/restore/{id}', [
        'uses' => 'ProductsController@restore',
        'as' => 'products.restore'
    ]);

    Route::get('/products/kill/{id}', [
        'uses' => 'ProductsController@kill',
        'as' => 'products.kill'
    ]);

    Route::get('/products/edit/{id}', [
        'uses' => 'ProductsController@edit',
        'as' => 'products.edit'
    ]);

    Route::get('/product/{id}', [
        'uses' => 'FrontEndController@singleProduct',
        'as' => 'single'
    ]);


    Route::post('/products/update/{id}', [
        'uses' => 'ProductsController@update',
        'as' => 'products.update'
    ]);


    Route::get('/products/delete/{id}', [
        'uses' => 'ProductsController@destroy',
        'as' => 'products.delete'
    ]);

    Route::get('/products/trashed', [
        'uses' => 'ProductsController@trashed',
        'as' => 'products.trashed'
    ]);

    Route::get('/categories/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/categories/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
        ]);

        Route::get('/categories', [
            'uses' => 'CategoriesController@index',
            'as' => 'categories'
        ]);

        Route::get('/categories/edit/{id}', [
            'uses' => 'CategoriesController@edit',
            'as' => 'categories.edit'
        ]);

        Route::get('/categories/delete/{id}', [
            'uses' => 'CategoriesController@destroy',
            'as' => 'categories.delete'
        ]);

        Route::post('/categories/update/{id}', [
            'uses' => 'CategoriesController@update',
            'as' => 'category.update'
            ]);

            Route::post('/cart/add', [
                'uses' => 'ShoppingController@add_to_cart',
                'as' => 'cart.add'
            ]);

            Route::get('/cart', [
                'uses' => 'ShoppingController@cart',
                'as' => 'cart'
            ]);

            Route::get('/cart/delete/{id}', [
                'uses' => 'ShoppingController@cart_delete',
                'as' => 'cart.delete'
            ]);

            Route::get('/cart/incr/{id}/{qty}', [
                'uses' => 'ShoppingController@incr',
                'as' => 'cart.incr'
            ]);

            Route::get('/cart/decr/{id}/{qty}', [
                'uses' => 'ShoppingController@decr',
                'as' => 'cart.decr'
            ]);
});
