<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\GroomingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PetCareController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\VeterinaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MapLocation;

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

Route::get('customer/consultation', [ConsultationController::class, 'index'])->name('consultation');

Route::get('message/{id}', [ConsultationController::class, 'getMessage'])->name('message');
Route::post('send_message', 'App\Http\Controllers\ConsultationController@sendMessage')->name('send.message');

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

//login
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('dashboard-admin')->middleware('admin');
Route::get('customer/dashboard', [App\Http\Controllers\HomeController::class, 'handleCustomer'])->name('dashboard-customer')->middleware('customer');
Route::get('petShop/dashboard', [App\Http\Controllers\HomeController::class, 'handlePetShop'])->name('dashboard-petShop')->middleware('petShop');
Route::get('vetClinic/dashboard', [App\Http\Controllers\HomeController::class, 'handleVetClinic'])->name('dashboard-vetClinic')->middleware('vetClinic');
Route::get('veterinary/dashboard', [App\Http\Controllers\HomeController::class, 'handleVeterinary'])->name('dashboard-veterinary');

//profile
Route::get('/admin/{id}/profile', [App\Http\Controllers\AdminController::class, 'show'])->name('admin-profile');
Route::get('/customer/{id}/profile', [App\Http\Controllers\CustomerController::class, 'show'])->name('customer-profile');
Route::get('/petShop/{id}/profile', [App\Http\Controllers\PetShopController::class, 'show'])->name('petShop-profile');
Route::get('/vetClinic/{id}/profile', [App\Http\Controllers\VetClinicController::class, 'show'])->name('vetClinic-profile');
Route::get('/veterinary/{id}/profile', [App\Http\Controllers\VeterinaryController::class, 'show'])->name('veterinary-profile');

//ManageProductPetShop
Route::get('/petShop/product', [App\Http\Controllers\PetShopController::class, 'showProduct'])->name('petShop-product');
Route::get('/productData/{id}', [App\Http\Controllers\PetShopController::class, 'productData'])->name('productData');
Route::post('/petShop/product', [App\Http\Controllers\PetShopController::class, 'store'])->name('petShop-product');

//AnimalCarePetShop
Route::get('/petShop/orderHistory', [App\Http\Controllers\OrderController::class, 'orderHistory'])->name('orderHistory');

Route::get('/customer/location', [App\Http\Controllers\CustomerController::class, 'showLocation'])->name('customer-location');

//Search
Route::get('/searchProduct', [App\Http\Controllers\ProductController::class, 'search'])->name('search');
Route::get('/searchMedicine', [App\Http\Controllers\MedicineController::class, 'search'])->name('searchMedicine');
Route::get('/searchService', [App\Http\Controllers\ServiceController::class, 'search'])->name('searchService');
Route::get('/searchPetCare', [App\Http\Controllers\PetCareController::class, 'search'])->name('searchPetCare');
Route::get('/searchGrooming', [App\Http\Controllers\GroomingController::class, 'search'])->name('searchGrooming');

Route::get('/admin/manageUser', [App\Http\Controllers\AdminController::class, 'showUser'])->name('admin-user');
Route::post('/admin/manageInformation', [App\Http\Controllers\AdminController::class, 'updateInformation'])->name('admin-update-information');
Route::post('/admin/delete', [App\Http\Controllers\AdminController::class, 'destroy'])->name('information-destroy');
Route::post('/admin/statusUpdate', [App\Http\Controllers\ServiceController::class, 'updateStatus'])->name('update-statusVet');
Route::post('/admin/statusUpdate', [App\Http\Controllers\OrderController::class, 'updateStatus'])->name('update-statusOrder');
Route::get('/admin/verifyVet', [App\Http\Controllers\AdminController::class, 'showVet'])->name('verify-vet');

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

//Route::post('customer/market', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('market-customer');
Route::get('/cart/delete/{cartId}', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::put('/cart/update/{cartId}', 'App\Http\Controllers\CartController@update')->name('cart_update');


Route::get('/location', MapLocation::class);

Route::resource('admin', AdminController::class);
Route::resource('cart', CartController::class);
Route::resource('customer', CustomerController::class);
Route::resource('consultation', ConsultationController::class);
Route::resource('diagnosis', DiagnosisController::class);
Route::resource('grooming', GroomingController::class);
Route::resource('information', InformationController::class);
Route::resource('medicine', MedicineController::class);
Route::resource('order', OrderController::class);
Route::resource('petCare', PetCareController::class);
Route::resource('product', ProductController::class);
Route::resource('reminder', ReminderController::class);
Route::resource('service', ServiceController::class);
Route::resource('users', UserController::class);
Route::resource('vaccine', VaccineController::class);
Route::resource('vet', VeterinaryController::class)->middleware('veterinary');
