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

Route::get('/', function () {
    return view('welcome');
});

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

    Route::get('videos', 'Admin\AdminVideoController@videos')->name('videos');
    Route::get('/', 'HomeController@index')->name('home');
    Route::any('ajax/categories', 'Admin\AdminCategoryController@browse')->name('categories.browse');
    Route::any('ajax/products', 'Admin\AdminProductController@browse')->name('products.browse');

});

Route::get('setlocale/{locale}', 'LanguageController@setLocale')->name('lang.switch');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


