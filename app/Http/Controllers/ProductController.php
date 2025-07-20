<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Ambil semua kategori untuk filter dropdown pertama
        $categories = ProductCategory::orderBy('name')->get();

        // 2. Siapkan query builder untuk produk
        // Gunakan eager loading untuk efisiensi (menghindari N+1 problem)
        $query = Product::with('subcategory.category');

        // 3. Terapkan filter berdasarkan Kategori
        if ($request->filled('category_id')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('product_category_id', $request->category_id);
            });
        }

        // 4. Terapkan filter berdasarkan Sub Kategori
        if ($request->filled('subcategory_id')) {
            $query->where('product_subcategory_id', $request->subcategory_id);
        }

        // 5. Ambil data produk yang sudah difilter dan paginasi
        $products = $query->latest()->paginate(10)->withQueryString();

        // 6. Ambil data subkategori HANYA JIKA sebuah kategori telah dipilih
        // Ini untuk mengisi dropdown filter kedua secara dinamis
        $subcategories = collect(); // Defaultnya koleksi kosong
        if ($request->filled('category_id')) {
            $subcategories = ProductSubcategory::where('product_category_id', $request->category_id)->orderBy('name')->get();
        }

        // 7. Kirim semua data ke view
        return view('panel.pages.products.index', compact('products', 'categories', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Hanya perlu mengirim data kategori, subkategori akan diambil via AJAX.
        $categories = ProductCategory::orderBy('name')->get();
        return view('panel.pages.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // 1. Validasi Request
        $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'product_subcategory_id' => 'required|exists:product_subcategories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'price_start' => 'nullable|string',
            'masa_berlaku' => 'nullable|string|max:255',
            'description' => 'required|string',
            'full_detail' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            // Meta data validation
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_og_title' => 'nullable|string|max:255',
            'meta_og_description' => 'nullable|string|max:255',
            'meta_og_type' => 'nullable|string|max:100',
        ]);

        DB::beginTransaction();
        try {
            $data = $request->except(['_token', 'thumbnail', 'images', 'product_category_id']);

            // 2. Handle Slug
            $data['slug'] = $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->name) . '-' . Str::uuid();

            // 3. Handle Upload Thumbnail
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/produk/thumbnail'), $filename);
                $data['thumbnail'] = 'uploads/produk/thumbnail/' . $filename;
            }

            // 4. Handle Upload Multiple Images
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imageFile) {
                    $filename = Str::uuid() . '.' . $imageFile->getClientOriginalExtension();
                    $imageFile->move(public_path('uploads/produk/images'), $filename);
                    $imagePaths[] = 'uploads/produk/images/' . $filename;
                }
            }
            $data['images'] = json_encode($imagePaths);

            // 5. Simpan Produk
            Product::create($data);

            DB::commit();
            return redirect()->route('admin-panel.products.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan produk: ' . $e->getMessage())->withInput();
        }
    }


    /**
     * Endpoint untuk AJAX request mengambil subkategori.
     */
    public function getSubcategories($categoryId)
    {
        $subcategories = ProductSubcategory::where('product_category_id', $categoryId)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($subcategories);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['subcategory.category', 'details.subDetails'])->findOrFail($id);
        $categories = ProductCategory::all();

        return view('panel.pages.products.show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil produk dengan subkategori (dan kategori via subkategori)
        $product = Product::with('subcategory')->findOrFail($id);

        // Ambil semua kategori untuk opsi select
        $categories = \App\Models\ProductCategory::all();

        // Ambil subkategori berdasarkan kategori dari relasi subkategori produk
        $subcategories = \App\Models\ProductSubcategory::where(
            'product_category_id',
            optional($product->subcategory)->product_category_id // lebih aman
        )->get();

        // Pastikan images selalu dalam bentuk array (safety untuk form edit)
        if (!is_array($product->images)) {
            $product->images = json_decode($product->images ?? '[]', true);
        }

        return view('panel.pages.products.edit', compact('product', 'categories', 'subcategories'));
    }


    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Product $product)
{
    $request->validate([
        'product_category_id' => 'required|exists:product_categories,id',
        'product_subcategory_id' => 'required|exists:product_subcategories,id',
        'name' => 'required|string|max:255',
        'price_start' => 'nullable|string',
        'masa_berlaku' => 'nullable|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        'full_detail' => 'required|string',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'meta_og_title' => 'nullable|string',
        'meta_og_description' => 'nullable|string',
        'meta_og_type' => 'nullable|string',
        'slug' => 'nullable|string|max:255',
    ]);

    DB::beginTransaction();

    try {
        // === Slug
        $slugInput = $request->input('slug');
        $slug = $slugInput ? Str::slug($slugInput) : $product->slug;

        if ($slug !== $product->slug) {
            $request->validate([
                'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            ]);
        }

        // === Prepare Data
        $data = $request->except([
            '_token', '_method', 'thumbnail', 'images', 'images_to_remove'
        ]);

        $data['slug'] = $slug;

        // === Handle Thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail && File::exists(public_path($product->thumbnail))) {
                File::delete(public_path($product->thumbnail));
            }
            $file = $request->file('thumbnail');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/produk/thumbnail'), $filename);
            $data['thumbnail'] = 'uploads/produk/thumbnail/' . $filename;
        }

        // === Ambil gambar saat ini
        $currentImages = is_array($product->images)
            ? $product->images
            : json_decode($product->images ?? '[]', true);

        if (!is_array($currentImages)) {
            $currentImages = [];
        }

        // === Hapus gambar jika diminta
      
        if ($request->has('images_to_remove')) {
            foreach ($request->images_to_remove as $imageToRemove) {
                if (File::exists(public_path($imageToRemove))) {
                    File::delete(public_path($imageToRemove));
                }
                $currentImages = array_values(array_diff($currentImages, [$imageToRemove]));
            }
        }

        // === Tambah gambar baru jika masih cukup slot
        $maxImages = 5;
        $newImages = [];

        if ($request->hasFile('images')) {
            $remainingSlots = $maxImages - count($currentImages);

            $files = $request->file('images');
            $files = array_slice($files, 0, $remainingSlots); // batasi jumlah yang diupload

            foreach ($files as $imageFile) {
                $filename = Str::uuid() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('uploads/produk/images'), $filename);
                $newImages[] = 'uploads/produk/images/' . $filename;
            }
        }

        $currentImages = array_merge($currentImages, $newImages);

        // === Simpan array images
        $data['images'] = json_encode(array_values($currentImages));

        // === Simpan ke database
        $product->update($data);

        DB::commit();
        return redirect()->route('admin-panel.products.index')->with('success', 'Produk berhasil diperbarui.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $product = Product::findOrFail($id);

    // Ambil dan decode array gambar
    $images = is_array($product->images) ? $product->images : json_decode($product->images, true);

    if (is_array($images)) {
        foreach ($images as $imagePath) {
            $fullPath = public_path($imagePath);

            // Hapus file jika ada
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
        }
    }

    // Jika ada thumbnail, hapus juga
    if ($product->thumbnail && File::exists(public_path($product->thumbnail))) {
        File::delete(public_path($product->thumbnail));
    }

    // Hapus data dari database
    $product->delete();

    return redirect()->back()->with('success', 'Produk berhasil dihapus.');
}

    public function getProducts($subcategoryId)
    {
        $products = Product::where('product_subcategory_id', $subcategoryId)
            ->get();

        return response()->json($products);
    }
}
