<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect()->route('city.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/cities/{city}/restaurants', RestaurantController::class);
Route::resource('/counties', CountyController::class);
Route::resource('/cities', CityController::class);
Route::resource('/categories', CategoryController::class);

Route::middleware(['auth'])->group(function() {
});

Route::get('/auth-test', function() {
	dd([
		'Is user logged in?' => Auth::check(),
		'Is user guest?' => Auth::guest(),
		'ID of logged in user?' => Auth::id(),
		'Logged in User' => Auth::user(),
	]);
});