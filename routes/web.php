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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'LandingController@index')->name('landing');
Route::get('/wirausaha', 'LandingController@wirausaha')->name('wirausaha');
Route::get('/jasa', 'LandingController@jasa')->name('jasa');
Route::get('/agribisnis', 'LandingController@agribisnis')->name('agribisnis');
Route::get('/pariwisata', 'LandingController@pariwisata')->name('pariwisata');

Auth::routes(['reset' => false, 'register' => true, 'verify' => true]);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers', 'middleware' => 'administrator'], function () {
        Route::get('/home', 'AdminController@homeView')->name('admin.home');
    });

    Route::group(['prefix' => 'dashboard', 'namespace' => '\App\Http\Controllers', 'middleware' => 'user'], function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/profile', 'HomeController@profileView')->name('profile.view');
        Route::get('/bumdes', 'HomeController@bumdesView')->name('bumdes.view');
        Route::post('/bumdes/create', 'HomeController@bumdesCreate')->name('bumdes.create');
        Route::post('/bumdes/create/pengurus', 'HomeController@pengurusCreate')->name('bumdes.create.pengurus');
        Route::post('/bumdes/update/pengurus/{id}', 'HomeController@pengurusUpdate')->name('bumdes.update.pengurus');
        Route::post('/bumdes/delete/pengurus/{id}', 'HomeController@pengurusDelete')->name('bumdes.delete.pengurus');
        Route::post('/bumdes/{id}/update', 'HomeController@bumdesUpdate')->name('bumdes.update');

        Route::get('/unit', 'HomeController@unitView')->name('unit.view');
        Route::post('/unit/create', 'HomeController@unitCreate')->name('unit.create');

        Route::get('/modal', 'HomeController@modalView')->name('modal.view');
        Route::post('/modal/create', 'HomeController@modalCreate')->name('modal.create');

        Route::get('/hasil', 'HomeController@hasilView')->name('hasil.view');
        Route::post('/hasil/create', 'HomeController@hasilCreate')->name('hasil.create');

        Route::get('/penjualan', 'HomeController@jualView')->name('jual.view');
        Route::post('/penjualan/create', 'HomeController@jualCreate')->name('jual.create');
        Route::post('/penjualan/{id}/update', 'HomeController@jualUpdate')->name('jual.update');
    });
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');