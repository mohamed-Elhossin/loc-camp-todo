<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/dashboard', [CategoryController::class, 'index']);

Route::middleware('auth' )->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('category')->group(function () {
        Route::get("/", [CategoryController::class, 'index'])->name("category.index");
        Route::get("/create", [CategoryController::class, 'create'])->name("category.create");
        Route::get("/list", [CategoryController::class, 'list'])->name("category.list");
        Route::post("/", [CategoryController::class, 'store'])->name("category.store");
        Route::get("/edit/{id}", [CategoryController::class, 'edit'])->name("category.edit");
        Route::post("/{id}", [CategoryController::class, 'update'])->name("category.update");
        Route::get("/{id}", [CategoryController::class, 'destroy'])->name("category.destroy");
    });
    Route::prefix('passwords')->group(function () {
        Route::get("/showPassword/{id}", [PasswordController::class, 'showPassword'])->name("passwords.showPassword");
        Route::get("/index/{id}", [PasswordController::class, 'index'])->name("passwords.index");
        Route::get("/create/{id}", [PasswordController::class, 'create'])->name("passwords.create");
        Route::get("/list", [PasswordController::class, 'list'])->name("passwords.list");
        Route::post("/", [PasswordController::class, 'store'])->name("passwords.store");
        Route::get("/edit/{id}", [PasswordController::class, 'edit'])->name("passwords.edit");
        Route::post("/{id}", [PasswordController::class, 'update'])->name("passwords.update");
        Route::get("/{id}", [PasswordController::class, 'destroy'])->name("passwords.destroy");
    });



});


require __DIR__ . '/auth.php';
