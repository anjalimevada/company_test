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
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'admin'], function () {
    	// Admin Auth
	Route::get('login','AdminController@getLogin')->name('adminLogin');
    Route::post('login', 'AdminController@postLogin')->name('adminLoginPost');

    Route::group(['middleware' => 'adminauth'], function () {
        // Admin Dashboard
        Route::get('dashboard','AdminController@dashboard')->name('adminDashboard');
        Route::get('/ajax_listing', 'AdminController@ajax_listing')->name('ajax_listing');
        Route::get('/company-register', 'AdminController@getCompanyRegister')->name('companyRegister'); 
        Route::post('/post-company-register', 'AdminController@postCompanyRegister')->name('postCompanyRegister'); 
        Route::get('logout', 'AdminController@logout')->name('adminLogout');
    });
});

Route::group(['prefix' => 'company'], function () {
    //company
	Route::get('company-login','CompanyController@companyLogin')->name('CompanyLogin');
	Route::post('company-login-post','CompanyController@postCompanyLogin')->name('PostCompanyLogin');
});
