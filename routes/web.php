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

    Route::get('calculator', [App\Http\Controllers\CalculatorController::class, 'index'])->name('calculator');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
// Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
// Route::get('/addtocart/{id}', [App\Http\Controllers\CartController::class, 'addcart'])->name('addtocart');
// Route::get('/cart/{rowId}', [App\Http\Controllers\CartController::class, 'removeCart'])->name('removeCart');
// Route::post('/updatecart', [App\Http\Controllers\CartController::class, 'UpdateCart'])->name('UpdateCart');
// Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('index');
// Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
// Route::get('/thankyou/{id}', [App\Http\Controllers\CheckoutController::class, 'thankyou'])->name('thankyou');

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/order', function () {
    return view('order');
});
// Route::get('/', function () {
//     // return view('welcome');
// });

//Setting route to register verification code
Route::post('/verificationCode', [App\Http\Controllers\Auth\RegisterController::class, 'verificationCode'])->name('verificationCode');
Route::post('/verification_no', [App\Http\Controllers\Auth\RegisterController::class, 'verification_no'])->name('verification_no');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'middleware' => [ 'auth', 'verified' ] ], function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('Dashboard');
    Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
    Route::resource('role', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('module', App\Http\Controllers\Admin\ModuleController::class);
    Route::resource('generalsetting', App\Http\Controllers\Admin\GeneralSettingController::class);
    Route::get('testcalc', [App\Http\Controllers\Admin\GeneralSettingController::class, 'testcalc'])->name('testcalc');
    Route::resource('leads', App\Http\Controllers\Admin\LeadsController::class);
    Route::post('/lead_data_store', [App\Http\Controllers\Admin\LeadsController::class, 'lead_data_store'])->name('lead_data_store');

    Route::get('/pdf/{id}', [App\Http\Controllers\Admin\LeadsController::class, 'pdf'])->name('pdf');

    
});


