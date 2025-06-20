<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Models\Carousel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

// Route::get('/', function () {
//     return view('app.pages.index.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/detail/carousel/{id}', [CarouselController::class, 'detail'])->name('carousel.detail');

Route::get('/kelola/produk', function () {
    return view('panel.pages.data_produk.index');
});


// ROUTE UNTUK HALAMAN ADMIN MENGGUNAKAN PREFIX admin-
//rout ketika sudah memiliki auth
// Route::prefix('admin-panel')->name('admin-panel.')->middleware(['auth', 'admin'])->group(function ()
Route::prefix('admin-panel')->name('admin-panel.')->group(function () {
    // 1. Dashboard Admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Rute untuk Produk
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [ProductController::class, 'destroy'])->name('destroy');
    });

    // 3. Rute untuk Kategori Produk
    // Anda juga bisa menggunakan Route::resource() untuk CRUD secara otomatis
    // Route::resource('categories', CategoryController::class);
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    // 4. Rute untuk Sub Kategori Produk
    Route::prefix('sub-categories')->name('sub_categories.')->group(function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
        Route::post('/', [SubCategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SubCategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SubCategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [SubCategoryController::class, 'destroy'])->name('destroy');
    });

    // 5. Rute untuk Carousel
    Route::prefix('/carousel')->name('carousel.')->group(function () {
        Route::get('/', [CarouselController::class, 'index'])->name('index');
        Route::get('/create', [CarouselController::class, 'create'])->name('create');
        Route::post('/', [CarouselController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [CarouselController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [CarouselController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CarouselController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CarouselController::class, 'destroy'])->name('destroy');
    });

    // 6. Rute untuk User
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [UserController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Tambahkan rute admin lainnya di sini...
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
