<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Galerie;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{    
    $categories = ProductCategory::with('subcategories')
    ->withCount('products')
    ->orderBy('sortir')
    ->get()
    ->groupBy('label');
    $subcategories = ProductSubcategory::select('id', 'name', 'slug')->get();

    // Ambil 4 produk terbaru untuk tab "All"
    $latestProducts = Product::with('subcategory.category') // <-- penting
    ->orderBy('created_at', 'desc')
    ->take(4)
    ->get()
    ->map(function ($product) {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'price_start' => $product->price_start,
            'thumbnail' => asset($product->thumbnail),
            'subcategory_slug' => $product->subcategory->slug ?? null,
            'category_slug' => $product->subcategory->category->slug ?? null,
        ];
    });
    // ✅ Ambil 4 galeri terbaru
    $galeriList = Galerie::orderBy('created_at', 'desc')
        ->take(4)
        ->get();

    $carousels = Carousel::all();
    $partners = Partner::all();
    $testimonials = Testimonial::where('is_published', true)->get();

    return view('app.pages.index.index', compact(
        'categories',
        'subcategories',
        'carousels',
        'partners',
        'testimonials',
        'latestProducts',
        'galeriList' // ← kirim ke view
    ));
}


public function getLatestProductsBySubcategory($slug)
{
    $subcategory = ProductSubcategory::where('slug', $slug)
        ->with('category') // ← ini penting
        ->firstOrFail();

    $products = Product::with('subcategory.category') // ← eager load juga di sini
        ->where('product_subcategory_id', $subcategory->id)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get()
        ->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price_start' => $product->price_start,
                'thumbnail' => asset($product->thumbnail),
                'subcategory_slug' => $product->subcategory->slug ?? null,
                'category_slug' => $product->subcategory->category->slug ?? null,
            ];
        });

    return response()->json(['products' => $products]);
}


public function product_layanan()
{
    $tourCategories = ProductCategory::with('subcategories')
        ->withCount('products')
        ->where('label', 'tour')
        ->get();

    $pendukungCategories = ProductCategory::with('subcategories')
        ->withCount('products')
        ->where('label', 'pendukung_tour')
        ->get();

    return view('app.pages.products.categories', compact('tourCategories', 'pendukungCategories'));
}


    public function privacyPolicy(){
        return view ('app.pages.other.privacy');
    }
     public function termsCondition(){
        return view ('app.pages.other.terms_condition');
    }
}
