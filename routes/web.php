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
});

Route::get('setlocale/{locale}', 'LanguageController@setLocale')->name('lang.switch');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'HomeController@index')->name('home');
