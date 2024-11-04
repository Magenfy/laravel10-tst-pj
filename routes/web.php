<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductAdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return to_route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verified']], function () {
    // Dashboards
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Locale

    // Profiles
    Route::resource('profiles', ProfileController::class)->only(['index', 'update'])->parameter('profiles', 'user');
    // General Settings
    Route::singleton('general-settings', GeneralSettingController::class);
    // Route::post('general-settings-logo', [GeneralSettingController::class, 'logoUpdate'])->name('general-settings.logo');

    //Category
    Route::resource('category', CategoryController::class);
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    //Product
    Route::resource('products', ProductAdminController::class);
    Route::delete('products/{id}', [ProductAdminController::class, 'destroy'])->name('products.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
