<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PhoneAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// TI1
Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');
Route::get('/vendor',[LoginController::class,'showVendorLoginForm'])->name('vendor.login-view');
Route::post('/vendor',[LoginController::class,'vendorLogin'])->name('vendor.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');
Route::get('/vendor/register',[RegisterController::class,'showVendorRegisterForm'])->name('vendor.register-view');
Route::post('/vendor/register',[RegisterController::class,'createVendor'])->name('vendor.register');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard',function(){
    return view('admin');
})->middleware('auth:admin');
Route::get('/vendor/dashboard',function(){
    return view('vendor');
})->middleware('auth:vendor');

Auth::routes();

//TI 3
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');

//TI4
Route::get('phone-auth', [PhoneAuthController::class, 'index']);
