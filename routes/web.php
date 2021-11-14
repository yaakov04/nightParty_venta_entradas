<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'index')->name('home');

Route::get('/register', [PageController::class, 'register'])->name('register');
Route::post('/register', [PageController::class, 'store'])->name('store');

Route::get('/checkout',[PaymentController::class, 'checkout'])->name('checkout');
Route::get('/finishing', [PaymentController::class, 'finishing'])->name('finishing');

Route::get('/attendee/{attendee:payerID}', [PageController::class, 'attendee'])->name('attendee');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin-panel/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
