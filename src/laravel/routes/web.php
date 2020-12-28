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

Route::get('/', function () {
    return view('voyager::login');
})->name('awal');

Route::get('/admin/flames/siaga', 'Controller@siagaFlame')->name('siaga.flame');
Route::get('/admin/flames/bahaya', 'Controller@bahayaFlame')->name('bahaya.flame');

Route::get('/admin/floods/bahaya', 'Controller@bahayaFlood')->name('bahaya.flood');

Route::get('/admin/grounds/siaga', 'Controller@siagaGround')->name('siaga.ground');
Route::get('/admin/grounds/bahaya', 'Controller@bahayaGround')->name('bahaya.ground');

// ubah di prefix dan di voyager config utk costum url admin nya
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

