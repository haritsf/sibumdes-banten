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

// Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/dashboard/home', 'HomeController@index')->name('home');
Route::get('/dashboard/profile', 'HomeController@profileView')->name('profile.view');
Route::get('/dashboard/bumdes', 'HomeController@bumdesView')->name('bumdes.view');
Route::post('/dashboard/bumdes/create', 'HomeController@bumdesCreate')->name('bumdes.create');
Route::post('/dashboard/bumdes/create/pengurus', 'HomeController@pengurusCreate')->name('bumdes.create.pengurus');
Route::post('/dashboard/bumdes/update/pengurus/{id}', 'HomeController@pengurusUpdate')->name('bumdes.update.pengurus');
Route::post('/dashboard/bumdes/delete/pengurus/{id}', 'HomeController@pengurusDelete')->name('bumdes.delete.pengurus');
Route::post('/dashboard/bumdes/{id}/update', 'HomeController@bumdesUpdate')->name('bumdes.update');

Route::get('/dashboard/unit', 'HomeController@unitView')->name('unit.view');
Route::post('/dashboard/unit/create', 'HomeController@unitCreate')->name('unit.create');

Route::get('/dashboard/modal', 'HomeController@modalView')->name('modal.view');
Route::post('/dashboard/modal/create', 'HomeController@modalCreate')->name('modal.create');

Route::get('/dashboard/hasil', 'HomeController@hasilView')->name('hasil.view');
Route::post('/dashboard/hasil/create', 'HomeController@hasilCreate')->name('hasil.create');

Route::get('/dashboard/penjualan', 'HomeController@jualView')->name('jual.view');
Route::post('/dashboard/penjualan/create', 'HomeController@jualCreate')->name('jual.create');
Route::post('/dashboard/penjualan/{id}/update', 'HomeController@jualUpdate')->name('jual.update');
