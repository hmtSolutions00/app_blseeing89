<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;

class FrontendProdukLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('app.pages.galeries.show');
    }
    public function subcategoriesByCategorySlug($slug)
{
    // Ambil data category berdasarkan slug beserta relasi subcategories dan produk
    $category = ProductCategory::with(['subcategories.products'])->where('slug', $slug)->firstOrFail();

    // Kirim ke view
    return view('app.pages.products.subcategories', compact('category'));
}
public function showBySubcategory($category_slug, $subcategory_slug)
{
    // Ambil subkategori berdasarkan slug
    $subcategory = ProductSubcategory::where('slug', $subcategory_slug)->firstOrFail();

    // Pastikan category dari relasi
    $category = $subcategory->category;

    // Validasi: apakah category.slug cocok dengan URL
    if ($category->slug !== $category_slug) {
        abort(404, 'Kategori tidak cocok');
    }

    // Ambil produk-produk dan decode images
    $products = $subcategory->products->map(function ($product) {
        $product->images_array = json_decode($product->images, true) ?? [];
        return $product;
    });

    return view('app.pages.products.products-list', compact('subcategory', 'products', 'category'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show($category_slug, $subcategory_slug, $product_slug)
{
    $subcategory = ProductSubcategory::where('slug', $subcategory_slug)->firstOrFail();
    $category = $subcategory->category;

    if ($category->slug !== $category_slug) {
        abort(404, 'Kategori tidak sesuai');
    }

    $product = Product::where('slug', $product_slug)
        ->where('product_subcategory_id', $subcategory->id)
        ->firstOrFail();

    // ✅ Force decode jika casting gagal
    $product->images = json_decode($product->images, true) ?? [];

    $relatedProducts = Product::where('product_subcategory_id', $subcategory->id)
        ->where('id', '!=', $product->id)
        ->latest()
        ->take(4)
        ->get();

    return view('app.pages.products.show', compact(
        'product',
        'subcategory',
        'category',
        'relatedProducts'
    ));
}


public function listGaleri(){
        $galeriList = Galerie::latest()->paginate(6); // Ambil 6 data per halaman
    return view('app.pages.galeries.index', compact('galeriList'));
}




public function singleGaleri($slug)
{
    $galeri = Galerie::with(['imageGaleri']) // ambil relasi gambar
        ->where('slug', $slug)
        ->firstOrFail();

    return view('app.pages.galeries.show', compact('galeri'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
