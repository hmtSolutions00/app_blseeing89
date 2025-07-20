<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendProdukLayananController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Models\Carousel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/produk-dan-layanan', [IndexController::class, 'product_layanan'])->name('frontend.products.layanan');
Route::get('/produk/kategori/{slug}', [IndexController::class, 'categoryProducts'])->name('frontend.products.byCategory');


// tujuan pembuatan view sementara nanti akna dihapus
Route::get('/dummy', [FrontendProdukLayananController::class, 'index'])->name('dummy');
Route::get('/produk-dan-layanan/{slug}', [FrontendProdukLayananController::class, 'subcategoriesByCategorySlug'])->name('frontend.products.subcategories');
// Untuk menampilkan produk berdasarkan subkategori
Route::get('/produk-dan-layanan/{category_slug}/{subcategory_slug}', [FrontendProdukLayananController::class, 'showBySubcategory'])
    ->name('frontend.products.bySubcategory');
Route::get('/produk/{category_slug}/{subcategory_slug}/{product_slug}', [FrontendProdukLayananController::class, 'show'])->name('frontend.products.show');
Route::get('/produk-terbaru-by-subcategory/{slug}', [IndexController::class, 'getLatestProductsBySubcategory']);

// Route Glaeri Show
Route::get('/galeries', [FrontendProdukLayananController::class, 'listGaleri'])->name('galeri.list');
Route::get('/galeri/{slug}', [FrontendProdukLayananController::class, 'singleGaleri'])->name('galeri.single');
Route::get('/privacy-policy', [IndexController::class, 'privacyPolicy'])->name('privacy');
Route::get('/terms-and-conditions', [IndexController::class, 'termsCondition'])->name('termsCondition');


Route::get('/search', [FrontendProdukLayananController::class, 'search'])->name('frontend.search');






Auth::routes();
Route::get('/detail/carousel/{id}', [CarouselController::class, 'detail'])->name('carousel.detail');

Route::get('/about-us', [AboutUsController::class, 'index2'])->name('aboutus.index');

Route::get('/kelola/produk', function () {
    return view('panel.pages.data_produk.index');
});


// ROUTE UNTUK HALAMAN ADMIN MENGGUNAKAN PREFIX admin-
//rout ketika sudah memiliki auth
Route::prefix('admin-panel')->name('admin-panel.')->middleware(['auth'])->group(function () {
    // 1. Dashboard Admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk AJAX, namanya akan menjadi 'admin-panel.get-subcategories'
    Route::get('/get-subcategories/{categoryId}', [ProductController::class, 'getSubcategories'])->name('get-subcategories');

    Route::get('/get-products/{subcategoryId}', [ProductController::class, 'getProducts']);
    
    // 2. Grup Rute untuk Produk
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
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
        Route::get('/{id}', [CategoryController::class, 'show'])->name('show'); // <--- tambahkan ini
    });

    // 4. Rute untuk Sub Kategori Produk
    Route::prefix('sub-categories')->name('sub_categories.')->group(function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
        Route::post('/', [SubCategoryController::class, 'store'])->name('store');
        Route::get('/{id}', [SubCategoryController::class, 'show'])->name('show'); // ⬅️ Tambahkan ini
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

     // 7. Rute untuk About Us
    Route::prefix('/about-us')->name('about-us.')->group(function () {
        Route::get('/', [AboutUsController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [AboutUsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AboutUsController::class, 'update'])->name('update');
    });

    // 8. Rute untuk Partner
    Route::prefix('/partner')->name('partner.')->group(function () {
        Route::get('/', [PartnerController::class, 'index'])->name('index');
        Route::get('/create', [PartnerController::class, 'create'])->name('create');
        Route::post('/', [PartnerController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [PartnerController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [PartnerController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PartnerController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PartnerController::class, 'destroy'])->name('destroy');
    });

     Route::prefix('/testimonial')->name('testimonial.')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::get('/create', [TestimonialController::class, 'create'])->name('create');
        Route::post('/', [TestimonialController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [TestimonialController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TestimonialController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TestimonialController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
    });
        Route::prefix('/galeri')->name('galeri.')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('index');
        Route::get('/create', [GaleriController::class, 'create'])->name('create');
        Route::post('/', [GaleriController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [GaleriController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [GaleriController::class, 'edit'])->name('edit');
        Route::put('/{id}', [GaleriController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [GaleriController::class, 'destroy'])->name('destroy');
        Route::get('/image/{id}/delete', [GaleriController::class, 'deleteImage'])->name('image.delete');
    });

    // Tambahkan rute admin lainnya di sini...
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
