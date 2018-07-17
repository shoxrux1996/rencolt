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
});

Route::get('setlocale/{locale}', 'LanguageController@setLocale')->name('lang.switch');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
