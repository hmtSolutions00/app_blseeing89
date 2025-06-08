<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.pages.index.index');
});

Route::get('/kelola/produk', function () {
    return view('app.admin.pages.data_produk.index');
});
