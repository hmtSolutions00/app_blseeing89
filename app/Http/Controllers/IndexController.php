<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Galerie;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\PromotionalVideo;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $categories = ProductCategory::with('subcategories')->withCount('products')->get();
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
        ->take(3)
        ->get();
    $allGaleri = Galerie::count();

    $promoVideos = PromotionalVideo::where('is_show', true)->get();
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
        'promoVideos',
        'allGaleri',
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


public function product_layanan(){
        $categories = ProductCategory::with('subcategories')
        ->withCount('products')
        ->get();
        return view('app.pages.products.categories', compact('categories'));
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
    public function show(string $id)
    {
        //
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
