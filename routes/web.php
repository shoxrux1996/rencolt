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
    Route::get('products', 'Admin\AdminProductController@products')->name('products');
    Route::get('objects', 'Admin\AdminObjectController@objects')->name('objects');
    Route::get('videos', 'Admin\AdminVideoController@videos')->name('videos');
    Route::get('/', 'HomeController@index')->name('home');
    Route::any('ajax/categories', 'Admin\AdminCategoryController@browse')->name('categories.browse');
});

Route::get('setlocale/{locale}', 'LanguageController@setLocale')->name('lang.switch');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


