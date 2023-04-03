<?php


use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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

//All products
Route::get('/', [ProductController::class, 'index']);

// //Show create Form
// Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

// //Store Product Data
// Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

// //Show Edit From
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');

// //Update products
// Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth');

// //Delete products
// Route::delete('/products/{product}', [ProductController::class, 'delete'])->middleware('auth');

// //Manage products
// Route::get('/products/manage', [ProductController::class, 'manage'])->middleware('auth');

//Route to user points
Route::get('/users/points', function(){
    return view('users/points');
});

//Single product
Route::get('/products/{product}', [ProductController::class, 'show']);

//Show register/create form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store']);

//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login form
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');

//Login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);
