<?php

use App\Events\Message;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\GroomingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PetCareController;
use App\Http\Controllers\PetShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VetClinicController;
use App\Http\Controllers\VeterinaryController;
use Illuminate\Http\Request;
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

//Route::post('/send-message', function (Request $request){
//   event(new Message($request->input('username'), $request->input('message')));
//});

Auth::routes();

Route::get('customer/consultation', [ConsultationController::class, 'index'])->name('consultation');

Route::get('message/{id}', [ConsultationController::class, 'getMessage'])->name('message');

//login
Route::get('admin/dashboard', [HomeController::class, 'handleAdmin'])->name('dashboard-admin')->middleware('admin');
Route::get('customer/dashboard', [HomeController::class, 'handleCustomer'])->name('dashboard-customer')->middleware('customer');
Route::get('petShop/dashboard', [HomeController::class, 'handlePetShop'])->name('dashboard-petShop')->middleware('petShop');
Route::get('vetClinic/dashboard', [HomeController::class, 'handleVetClinic'])->name('dashboard-vetClinic')->middleware('vetClinic');
Route::get('veterinary/dashboard', [HomeController::class, 'handleVeterinary'])->name('dashboard-veterinary');

//profile
Route::get('/admin/{id}/profile', [AdminController::class, 'show'])->name('admin-profile');
Route::get('/customer/{id}/profile', [CustomerController::class, 'show'])->name('customer-profile');
Route::get('/petShop/{id}/profile', [PetShopController::class, 'show'])->name('petShop-profile');
Route::get('/vetClinic/{id}/profile', [VetClinicController::class, 'show'])->name('vetClinic-profile');
Route::get('/veterinary/{id}/profile', [VeterinaryController::class, 'show'])->name('veterinary-profile');

//ManageProductPetShop
Route::get('/petShop/product', [PetShopController::class, 'showProduct'])->name('petShop-product');
Route::get('/productData/{id}', [PetShopController::class, 'productData'])->name('productData');
Route::get('/productEdit/{id}', [PetShopController::class, 'showEditProduct'])->name('editProduct');
Route::post('/petShop/product', [PetShopController::class, 'store'])->name('petShop-product');

//AnimalCarePetShop
Route::get('/petShop/petCare', [PetShopController::class, 'showPetCare'])->name('petShop-petCare');
Route::get('/petShop/orderHistory', [OrderController::class, 'orderHistory'])->name('orderHistory');

Route::get('/vetClinic/medicine', [VetClinicController::class, 'showMedicine'])->name('vetClinic-medicine');

Route::get('/customer/vetService', [CustomerController::class, 'showService'])->name('customer-service');
Route::get('/customer/location', [CustomerController::class, 'showLocation'])->name('customer-location');
Route::get('/customer/reminder', [CustomerController::class, 'showReminder'])->name('customer-reminder');
Route::get('/customer/medicine', [CustomerController::class, 'showMedicine'])->name('customer-medicine');

//Search
Route::get('/searchProduct', [ProductController::class, 'search'])->name('search');
Route::get('/searchMedicine', [MedicineController::class, 'search'])->name('searchMedicine');
Route::get('/searchService', [ServiceController::class, 'search'])->name('searchService');
Route::get('/searchPetCare', [PetCareController::class, 'search'])->name('searchPetCare');
Route::get('/searchGrooming', [GroomingController::class, 'search'])->name('searchGrooming');

Route::get('/admin/manageUser', [AdminController::class, 'showUser'])->name('admin-user');
Route::post('/admin/manageInformation', [AdminController::class, 'updateInformation'])->name('admin-update-information');
Route::post('/admin/delete', [AdminController::class, 'destroy'])->name('information-destroy');
Route::post('/admin/statusUpdate', [ServiceController::class, 'updateStatus'])->name('update-statusVet');
Route::get('/admin/verifyVet', [AdminController::class, 'showVet'])->name('verify-vet');

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

Route::get('/location', MapLocation::class);

Route::resource('admin', AdminController::class);
Route::resource('cart', CartController::class);
Route::resource('customer', CustomerController::class);
Route::resource('consultation', ConsultationController::class);
Route::resource('diagnosis', DiagnosisController::class);
Route::resource('grooming', GroomingController::class);
Route::resource('home', HomeController::class);
Route::resource('information', InformationController::class);
Route::resource('medicine', MedicineController::class);
Route::resource('order', OrderController::class);
Route::resource('petCare', PetCareController::class);
Route::resource('product', ProductController::class);
Route::resource('service', ServiceController::class);
Route::resource('users', UserController::class);
Route::resource('vet', VeterinaryController::class)->middleware('veterinary');
