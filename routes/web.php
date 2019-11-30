<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/restaurants', 'RestaurantController@index')->name('restos');
    Route::get('/restaurants/menu/{id}', 'MenuController@index')->name('resto.menu');
    Route::get('/restaurants/orders/{id}', 'RestaurantOrderController@index')->name('resto.orders');
    Route::get('/restaurants/orders/{id}/add', 'RestaurantOrderController@add')->name('resto.orders.add');
});
