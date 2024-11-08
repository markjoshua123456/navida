<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\PasswordResetByNameController;
use App\Http\Controllers\CategoryController;






// Login and logout routes
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.custom');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [AuthController::class, 'showLogin'])->name('login.default');


// Route to show the custom reset password form
Route::get('password/reset-name', [PasswordResetByNameController::class, 'showResetForm'])->name('password.reset.name');


// Route to handle the reset password by name request
Route::post('password/reset-name', [PasswordResetByNameController::class, 'resetPassword']);


Route::put('/products/update', [ProductController::class, 'update'])->name('products.update');
Route::get('/products', [ProductController::class, 'view'])->name('products.view');






// Protected routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');
});






// Route::get('/', function () {
//     return view('welcome');
// });


// skibidi








Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// create.blade.php
// Route for creating a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


// list.blade.php
// Route for viewing the list of products
Route::get('/products/list', [ProductController::class, 'view'])->name('products.list');


// menu.blade.php
// Route for viewing the product menu
Route::get('/products/menu', [ProductController::class, 'productMenu'])->name('products.menu');


// orders/list.blade.php
// Order Request Route
Route::get('/orders/request', [OrderController::class, 'orderRequest'])->name('orders.list');


// orders/sales.blade.php
// Route for viewing the sales
Route::get('/accounting', [OrderController::class, 'viewSales'])->name('orders.sales');


// orders/transaction.blade.php
// Route for viewing the transactions
Route::get('/transaction', [OrderController::class, 'viewTransactions'])->name('orders.transaction');


Route::get('/user_profiles', [UserController::class, 'viewProfilePage'])->name('user.profile_page');


Route::get('/events', [EventController::class, 'viewEvents'])->name('events.viewEvents');






// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Product routes
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


// Category routes
// Route to display the form and categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


// Route to store a new category
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');


// Routes to delete
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');





Route::get('/products/category/{category_id}', [ProductController::class, 'showByCategory'])->name('products.category');
