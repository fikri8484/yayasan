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

Route::get('/kegiatan-kategori/{id}', 'ActivityController@show')
    ->name('kegiatan.kategori');

// Route::get('/{tag}', 'ActivityController@show')
//     ->name('tag');

Route::get('/kegiatan/{slug}', 'ActivitydetailController@index')
    ->name('detail-kegiatan');

Route::get('/tentang', 'AboutController@index')
    ->name('about');

Route::get('/dashboard', 'DashboardController@donasi')
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::get('/donasiSaya', 'DashboardController@donasiSaya')
    ->name('dashboard-DonasiSaya')
    ->middleware(['auth', 'verified']);

Route::get('/dashboardb/cari', 'DashboardController@cari');

Route::get('/kirim-email', 'EmailController@index');


// BAGIAN DONASI

Route::get('/donasi', 'DonationController@index')
    ->name('donation');

Route::get('/donasi/cari', 'DonationController@cari');

Route::get('/donasi/{slug}', 'DonationController@donasi')
    ->name('detail-donation');

Route::get('/donasi/{slug}/form', 'DonationController@donasicreate');
Route::post('/donasi/{slug}/form/store', 'DonationController@donasistore');
Route::get('/confirmdonation/{id}', 'DonationController@confirmdonation')->name('confirmdonation');
Route::post('/confirmdonation/store/{id}', 'DonationController@donasiconfirmstore');



// ADMIN

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');
        Route::get('/hello', 'ActivityController@hello');

        Route::resource('category', 'GalleryCategoryController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('activity', 'ActivityController');
        Route::resource('activity-tag', 'ActivityTagController');
        Route::resource('activity-gallery', 'ActivityGalleryController');
        Route::resource('program', 'ProgramController');
        Route::resource('categoryprogram', 'CategoryController');
        Route::resource('development', 'DevelopmentController');
        Route::resource('donatur', 'DonaturController');
        Route::resource('bank', 'ShelterAccountController');
        Route::resource('homeSlide', 'HomeSlideController');
        Route::resource('contact', 'ContactController');
        Route::resource('about', 'BodyController');
    });

Route::post('Ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
Route::get('createcaptcha', 'CaptchaController@create');
Route::post('captcha', 'CaptchaController@captchaValidate');
Route::get('refreshcaptcha', 'CaptchaController@refreshCaptcha');

Auth::routes(['verify' => true]);
