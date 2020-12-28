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


// ADMIN
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard_admin');
    Route::get('/information', 'AdminController@information')->name('information');
    Route::get('/dossier', 'AdminController@dossier')->name('dossier');
    Route::get('/anomalie', 'AdminController@anomalie')->name('anomalie');
    Route::get('/utilisateur', 'AdminController@utilisateur')->name('utilisateur');
    Route::get('/agence', 'AdminController@agence')->name('agence');
    Route::get('/edit/{id}', 'AdminController@edit')->name('edit_user');
    Route::put('/edit/{id}', 'AdminController@update')->name('update_user');
    Route::get('/delete/{id}', 'AdminController@delete')->name('delete_user'); // Supprimer utilisateur
    Route::get('/add_user_form', 'AdminController@add_user_form')->name('add_user_form');
    Route::post('/add_user', 'AdminController@add_user')->name('add_user');
    Route::post('/save_email', 'AdminController@save_email')->name('save_agence_email');
    Route::get('/edit', 'AdminController@editAccount')->name('edit_user_admin');
    Route::put('/update/{id}', 'AdminController@updateAccount')->name('update_user_admin');
    Route::get('/get_dossiers', 'AdminController@get_dossiers')->name('get_dossiers_url');
    Route::post('/get_deblocages', 'AdminController@get_deblocages')->name('get_deblocages');
});


// CODEX READ ONLY
Route::group(['prefix' => 'viewer', 'namespace' => 'CodexReadOnly', 'middleware' => 'auth'], function () {
    Route::get('/', 'CROController@index')->name('dashboard_cro');
    Route::get('/information', 'CROController@information')->name('information_cro');
    Route::get('/dossier', 'CROController@dossier')->name('dossier_cro');
    Route::get('/anomalie', 'CROController@index')->name('anomalie_cro');
    Route::get('/edit', 'CROController@edit')->name('edit_user_cro');
    Route::put('/update/{id}', 'CROController@update')->name('update_user_cro');
});


// ESPACE CODEX
Route::group(['prefix' => 'codex', 'namespace' => 'Codex', 'middleware' => 'auth'], function () {
    Route::get('/', 'CodexController@index')->name('dashboard_codex');
    Route::get('/information', 'CodexController@information')->name('information_codex');
    Route::get('/dossier', 'CodexController@dossier')->name('dossier_codex');
    Route::get('/edit', 'CodexController@edit')->name('edit_user_codex');
    Route::put('/update/{id}', 'CodexController@update')->name('update_user_codex');
});


// ESPACE COOPEC
Route::group(['prefix' => 'coopec', 'namespace' => 'Coopec', 'middleware' => 'auth'], function () {
    Route::get('/', 'CoopecController@index')->name('dashboard_coopec');
    Route::get('/information', 'CoopecController@information')->name('information_coopec');
    Route::get('/anomalie', 'CoopecController@anomalie')->name('anomalie_coopec');
    Route::get('/edit', 'CoopecController@edit')->name('edit_user_coopec');
    Route::put('/update/{id}', 'CoopecController@update')->name('update_user_coopec');
});

// AUTRES
Auth::routes();
Route::get('/', 'HomePageController@home')->name('home');
