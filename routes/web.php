<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



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

// "http://localhost/Laravel-session/matrimonial/public/users"
// "manage.users.list"

// Route::get('/users', function () {
//     return view('welcome', ['name' => 'James']);
// })->name("manage.users.list");

Route::get('/', function () {
    return view('layouts.public-master');
})->name('public.home');

Route::get('/home', function () {
    return view('partials.public-home');
})->name('public.public_home');

Route::get('/about-us', function () {
    return view('partials.about-us');
})->name('public.about_us');

Route::get('/user', [UserController::class, 'index'])->name('public.users');
Route::get('/user/create', [UserController::class, 'create'])->name('public.users.create.load_view');
Route::post('/user/create-new', [UserController::class, 'store'])->name('public.users.create');

// admin routes

	Route::group([
		'middleware' => 'naive.middleware'		
	], function() {

		Route::get('/home', function () {
		    return view('partials.public-home');
		});

		Route::get('/about-us', function () {
		    return view('partials.about-us');
		});

		Route::get('/user', [UserController::class, 'index']);
	});



// Naive routes
