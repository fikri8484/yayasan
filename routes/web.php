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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/galeri', 'GalleryController@index')
    ->name('gallery');

Route::get('/kegiatan', 'ActivityController@index')
    ->name('activity');

Route::get('/kegiatandetail', 'ActivitydetailController@index')
    ->name('activity-detail');

Route::get('/tentang', 'AboutController@index')
    ->name('about');

Route::get('/donasi', 'DonationController@index')
    ->name('donation');

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('category', 'GalleryCategoryController');
        Route::resource('gallery', 'GalleryController');
    });
