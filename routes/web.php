<?php



use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PointsController;
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
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    //Admin routes
    Route::get('/products', [ProductController::class, 'getProducts'])->name('admin.products');
    // Delete products
    // Route::delete('/products/{product}', [ProductController::class, 'delete'])->middleware('auth');
     Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    //Edit and update products
     Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
     Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');

     Route::get('/admin', [AdminController::class, 'index']);

     //Users admin

     Route::get('/users', [UserController::class, 'index'])->name('admin.users');

    //Show edit users form
     Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');

     Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
     Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

});

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
Route::get('/users/points', function() {
    if(Auth::check()) {
        $user = Auth::user();
        return view('users.points', compact('user'));
    }
    return redirect('/login');
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
