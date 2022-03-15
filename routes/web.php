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
});

Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

//login
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('dashboard-admin')->middleware('admin');
Route::get('customer/dashboard', [App\Http\Controllers\HomeController::class, 'handleCustomer'])->name('dashboard-customer')->middleware('customer');
Route::get('petShop/dashboard', [App\Http\Controllers\HomeController::class, 'handlePetShop'])->name('dashboard-petShop')->middleware('petShop');
Route::get('vetClinic/dashboard', [App\Http\Controllers\HomeController::class, 'handleVetClinic'])->name('dashboard-vetClinic')->middleware('vetClinic');
Route::get('veterinary/dashboard', [App\Http\Controllers\HomeController::class, 'handleVeterinary'])->name('dashboard-veterinary')->middleware('veterinary');

//profile
Route::get('/admin/{id}/profile', [App\Http\Controllers\AdminController::class, 'show'])->name('admin-profile');
Route::get('/customer/{id}/profile', [App\Http\Controllers\CustomerController::class, 'show'])->name('customer-profile');
Route::get('/petShop/{id}/profile', [App\Http\Controllers\PetShopController::class, 'show'])->name('petShop-profile');
Route::get('/vetClinic/{id}/profile', [App\Http\Controllers\VetClinicController::class, 'show'])->name('vetClinic-profile');
Route::get('/veterinary/{id}/profile', [App\Http\Controllers\VeterinaryController::class, 'show'])->name('veterinary-profile');

Route::get('/petShop/product', [App\Http\Controllers\PetShopController::class, 'showProduct'])->name('petShop-product');

Route::get('/vetClinic/medicine', [App\Http\Controllers\VetClinicController::class, 'showMedicine'])->name('vetClinic-medicine');

Route::get('/customer/vetService', [App\Http\Controllers\CustomerController::class, 'showService'])->name('customer-service');
Route::get('/customer/location', [App\Http\Controllers\CustomerController::class, 'showLocation'])->name('customer-location');
Route::get('/customer/diagnosis', [App\Http\Controllers\CustomerController::class, 'showDiagnosis'])->name('customer-diagnosis');

Route::get('/admin/manageUser', [App\Http\Controllers\AdminController::class, 'showUser'])->name('admin-user');

//update profile
Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\AdminController@update']);
Route::put('customer/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\CustomerController@update']);
Route::put('petShop/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\PetShopController@update']);
Route::put('vetClinic/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\VetClinicController@update']);
Route::put('veterinary/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\VeterinaryController@update']);

//password profile
Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\AdminController@password']);
Route::put('customer/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\CustomerController@password']);
Route::put('petShop/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\PetShopController@password']);
Route::put('vetClinic/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\VetClinicController@password']);
Route::put('veterinary/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\VeterinaryController@password']);

//profile picture
Route::post('admin/profilepicture','App\Http\Controllers\AdminController@profilePicUpdate')->name('admin-profilePic');
Route::post('customer/profilepicture','App\Http\Controllers\CustomerController@profilePicUpdate')->name('customer-profilePic');
Route::post('petShop/profilepicture','App\Http\Controllers\PetShopController@profilePicUpdate')->name('petShop-profilePic');
Route::post('vetClinic/profilepicture','App\Http\Controllers\VetClinicController@profilePicUpdate')->name('vetClinic-profilePic');
Route::post('veterinary/profilepicture','App\Http\Controllers\VeterinaryController@profilePicUpdate')->name('veterinary-profilePic');


Route::resource('users', \App\Http\Controllers\UserController::class);
