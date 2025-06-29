<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\CarouselProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;

class CarouselController extends Controller
{

    public function detail($id)
    {
        $carousel = Carousel::find($id);
        $related_products = Product::join('product_subcategories', "product_subcategories.id", '=', 'products.product_subcategory_id')
            ->join('product_categories', 'product_categories.id', '=', 'product_subcategories.product_category_id')
            ->join('carousel_products', 'products.id', '=', 'carousel_products.product_id')
            ->where('carousel_products.carousel_id', $carousel->id)
            ->select('products.*', 'product_categories.name as category_name', 'product_subcategories.name as subcategory_name')
            ->get();
        return view('app.pages.carousel.show', [
            'carousel' => $carousel,
            'related_products' => $related_products
        ]);
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $carousels = Carousel::all();
        return view('panel.pages.carousel.index', [
            'carousels' => $carousels
        ]);
    }

    public function create()
    {
        $productCategories = ProductCategory::all();
        // $productss = Product::all();
        $productss = Product::join('product_subcategories', "product_subcategories.id", '=', 'products.product_subcategory_id')
            ->join('product_categories', 'product_categories.id', '=', 'product_subcategories.product_category_id')
            ->select('products.id as id', 'products.name as name', 'product_categories.name as category_name', 'product_subcategories.name as subcategory_name')
            ->get();
        return view('panel.pages.carousel.create', [
            "productCategories" => $productCategories,
            "productss" => $productss
        ]);
    }

   public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'url_images' => 'required',
        'thumbnail' => 'required',
        'deskripsi' => 'required',
    ]);

    // Upload image utama
    if ($request->file('url_images')) {
        $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('url_images')->getClientOriginalName());
        $request->file('url_images')->move(public_path('carousel-images'), $filename);
    }

    // Upload thumbnail
    if ($request->file('thumbnail')) {
        $file_thumbnail = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('thumbnail')->getClientOriginalName());
        $request->file('thumbnail')->move(public_path('carousel-images'), $file_thumbnail);
    }

    // Simpan ke tabel Carousel
    $carousel = Carousel::create([
        'judul' => $request->judul,
        'url_images' => $filename ?? null,
        'thumbnail' => $file_thumbnail ?? null,
        'deskripsi' => $request->deskripsi,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        'meta_og_title' => $request->meta_og_title,
        'meta_og_description' => $request->meta_og_description,
        'meta_og_type' => $request->meta_og_type
    ]);

    // Cek apakah product_id dikirim dan berisi array
    if ($request->has('product_id') && is_array($request->product_id)) {
        foreach ($request->product_id as $product) {
            CarouselProduct::create([
                'product_id' => $product,
                'carousel_id' => $carousel->id
            ]);
        }
    }

    return redirect()->route('admin-panel.carousel.index')->with('success', 'Data Carousel berhasil ditambahkan.');
}


    public function show($id)
    {
        $carousel = Carousel::find($id);
        $related_products = Product::join('product_subcategories', "product_subcategories.id", '=', 'products.product_subcategory_id')
            ->join('product_categories', 'product_categories.id', '=', 'product_subcategories.product_category_id')
            ->join('carousel_products', 'products.id', '=', 'carousel_products.product_id')
            ->where('carousel_products.carousel_id', $carousel->id)
            ->select('products.*', 'product_categories.name as category_name', 'product_subcategories.name as subcategory_name')
            ->get();
        return view('panel.pages.carousel.show', [
            'carousel' => $carousel,
            'related_products' => $related_products
        ]);
    }

    public function edit($id)
    {
        $carousel = Carousel::find($id);
        $productss = Product::join('product_subcategories', "product_subcategories.id", '=', 'products.product_subcategory_id')
            ->join('product_categories', 'product_categories.id', '=', 'product_subcategories.product_category_id')
            ->select('products.id as id', 'products.name as name', 'product_categories.name as category_name', 'product_subcategories.name as subcategory_name')
            ->get();
        $selectedProductIds = CarouselProduct::where('carousel_id', $id)->pluck('id')->toArray();
        // dd($selectedProductIds);
        return view('panel.pages.carousel.edit', [
            'carousel' => $carousel,
            'productss' => $productss,
            'selectedProductIds' => $selectedProductIds
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
        $carousel = Carousel::find($id);
        if ($request->file('url_images')) {
            if ($request->hasfile('url_images')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('url_images')->getClientOriginalName());
                $request->file('url_images')->move(public_path('carousel-images'), $filename);
                $carousel->update([
                    'url_images' => $filename,
                ]);
            }
        }

        if ($request->file('thumbnail')) {
            if ($request->hasfile('thumbnail')) {
                $file_thumbnail = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('thumbnail')->getClientOriginalName());
                $request->file('thumbnail')->move(public_path('carousel-images'), $file_thumbnail);
                $carousel->update([
                    'thumbnail' => $file_thumbnail,
                ]);
            }
        }

        $carousel->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_og_title' => $request->meta_og_title,
            'meta_og_description' => $request->meta_og_description,
            'meta_og_type' => $request->meta_og_type
        ]);

        $product_id = $request->product_id; //array

        $arr_carousel_products = CarouselProduct::where('carousel_id', $id)->pluck("product_id")->toArray();
        if ($product_id != null) {
            foreach ($product_id as $product) {
                if (!in_array($product, $arr_carousel_products, false)) {
                    CarouselProduct::create([
                        'carousel_id' => $id,
                        'product_id' => $product
                    ]);
                }
            }
            foreach ($arr_carousel_products as $arr_carousel_product) {
                if (!in_array($arr_carousel_product, $product_id, false)) {
                    $carpro = CarouselProduct::where("carousel_id", $id)->where('product_id', $arr_carousel_product)->first();
                    $carpro->delete();
                }
            }
        } else {
            if (count($arr_carousel_products) > 0) {
                foreach ($arr_carousel_products as $arr_carousel_product) {
                    $carpro = CarouselProduct::where("carousel_id", $id)->where('product_id', $arr_carousel_product)->first();
                    $carpro->delete();
                }
            }
        }


        return redirect()->route('admin-panel.carousel.index')->with('success', 'Data Carousel berhasil diubah.');
    }

    public function destroy($id)
    {
        $carousel = Carousel::find($id);

        $carousel_products = CarouselProduct::where("carousel_id", $id)->get();

        foreach ($carousel_products as $carousel_product) {
            $carousel_product->delete();
        }

        $carousel->delete();

        return redirect()->route('admin-panel.carousel.index')->with('success', 'Data Carousel berhasil dihapus.');
    }
}
