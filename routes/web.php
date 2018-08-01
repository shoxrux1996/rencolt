<?php

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

Route::get('/', 'WebController@index')->name('index');
Route::get('products', 'WebController@products')->name('products');
Route::get('product/{id}', 'WebController@product')->name('product');
Route::get('objects','WebController@objects')->name('objects');
Route::get('object/{id}', 'WebController@object')->name('object');
Route::get('videos','WebController@videos')->name('videos');
Route::get('video/{id}', 'WebController@video')->name('video');
Route::get('category/{name}', 'WebController@category')->name('category');
Route::get('aboutus', 'WebController@aboutus')->name('aboutus');
Route::get('partners', 'WebController@partners')->name('partners');
Route::post('telegram','WebController@telegram')->name('telegram');

Route::get('products/search', 'WebController@productsSearch')->name('products.search');
Route::get('objects/search', 'WebController@objectsSearch')->name('objects.search');
Route::get('videos/search' , 'WebController@videosSearch')->name('videos.search');
Route::get('all/search','WebController@all')->name('all');

Route::prefix('admin')->group(function () {
    // Language
    Route::get('language/texts/{lang?}/{file?}', 'LanguageAdminController@showTexts')->name('language.file');
    Route::post('language/texts/{lang}/{file}', 'LanguageAdminController@updateTexts');

    Route::get('profile','Admin\AdminController@profile')->name('profile');
    Route::post('update/profile', 'Admin\AdminController@update')->name('update.profile');

    Route::get('categories/destroy/{id?}', 'Admin\AdminCategoryController@destroy')->name('categories.destroy');
    Route::post('categories/update/{id?}', 'Admin\AdminCategoryController@update')->name('categories.update');
    Route::get('categories', 'Admin\AdminCategoryController@index')->name('categories.index');
    Route::post('categories/store', 'Admin\AdminCategoryController@store')->name('categories.store');

    Route::get('products/destroy/{id?}', 'Admin\AdminProductController@destroy')->name('products.destroy');
    Route::post('products/update/{id?}', 'Admin\AdminProductController@update')->name('products.update');
    Route::get('products', 'Admin\AdminProductController@index')->name('products.index');
    Route::post('products/store', 'Admin\AdminProductController@store')->name('products.store');
    Route::get('product/edit/{id?}', 'Admin\AdminProductController@edit')->name('products.edit');
    Route::get('product/image/delete/{id?}/{image?}','Admin\AdminProductController@deleteImage')->name('product.image.delete');

    Route::get('objects/destroy/{id?}', 'Admin\AdminObjectController@destroy')->name('objects.destroy');
    Route::post('objects/update/{id?}', 'Admin\AdminObjectController@update')->name('objects.update');
    Route::get('objects', 'Admin\AdminObjectController@index')->name('objects.index');
    Route::post('objects/store', 'Admin\AdminObjectController@store')->name('objects.store');
    Route::get('objects/edit/{id?}', 'Admin\AdminObjectController@edit')->name('objects.edit');
    Route::get('object/image/delete/{id?}/{image?}','Admin\AdminObjectController@deleteImage')->name('object.image.delete');

    Route::get('videos/destroy/{id?}', 'Admin\AdminVideoController@destroy')->name('videos.destroy');
    Route::post('videos/update/{id?}', 'Admin\AdminVideoController@update')->name('videos.update');
    Route::get('videos', 'Admin\AdminVideoController@index')->name('videos.index');
    Route::post('videos/store', 'Admin\AdminVideoController@store')->name('videos.store');

    
    Route::get('/', 'HomeController@index')->name('home');
    Route::any('ajax/categories', 'Admin\AdminCategoryController@browse')->name('categories.browse');
    Route::any('ajax/products', 'Admin\AdminProductController@browse')->name('products.browse');
    Route::any('ajax/objects', 'Admin\AdminObjectController@browse')->name('objects.browse');
    Route::any('ajax/videos', 'Admin\AdminVideoController@browse')->name('videos.browse');
    Route::any('ajax/messages', 'Admin\AdminMessageController@browse')->name('messages.browse');

    Route::get('messages/destroy/{id?}', 'Admin\AdminMessageController@destroy')->name('messages.destroy');
});

Route::get('setlocale/{locale}', 'LanguageController@setLocale')->name('lang.switch');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


