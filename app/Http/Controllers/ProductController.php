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
        'price_start' => 'required|numeric',
        'masa_berlaku' => 'nullable|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'images' => 'nullable|array|max:5',
        'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        'details' => 'required|array',
        'details.*.title' => 'required|string|max:255',
        'details.*.content' => 'nullable|string',
        'details.*.subdetails' => 'nullable|array',
        'details.*.subdetails.*.content' => 'required_with:details.*.subdetails|string',

        // Meta data validation
        'meta_description' => 'nullable|string|max:255',
        'meta_keywords' => 'nullable|string|max:255',
        'meta_og_title' => 'nullable|string|max:255',
        'meta_og_description' => 'nullable|string|max:255',
        'meta_og_type' => 'nullable|string|max:100',
    ]);

    DB::beginTransaction();
    try {
        $data = $request->except(['_token', 'details', 'thumbnail', 'images', 'product_category_id']);

        // 2. Handle Slug
        $data['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);

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

        // 5. Simpan Produk Utama (termasuk meta data)
        $product = Product::create($data);

        // 6. Simpan Detail dan Sub-Detail
        if ($request->has('details')) {
            foreach ($request->details as $detailData) {
                $productDetail = $product->details()->create([
                    'title' => $detailData['title'],
                    'content' => $detailData['content'] ?? null,
                ]);

                if (isset($detailData['subdetails'])) {
                    foreach ($detailData['subdetails'] as $subDetailData) {
                        $productDetail->subDetails()->create([
                            'content' => $subDetailData['content'],
                        ]);
                    }
                }
            }
        }

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
        $product = Product::with(['details.subDetails', 'subcategory'])->findOrFail($id);
    $categories = \App\Models\ProductCategory::all();

    // Ambil subkategori berdasarkan relasi kategori dari subkategori produk
    $subcategories = \App\Models\ProductSubcategory::where(
        'product_category_id',
        $product->subcategory->product_category_id
    )->get();

    // ✅ Perbaikan PENTING: pastikan images adalah array
    $product->images = is_array($product->images)
        ? $product->images
        : json_decode($product->images ?? '[]', true);

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
        'price_start' => 'required|numeric',
        'masa_berlaku' => 'nullable|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'images' => 'nullable|array|max:5',
        'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        'details' => 'required|array',
        'details.*.title' => 'required|string|max:255',
        'details.*.content' => 'nullable|string',
        'details.*.subdetails' => 'nullable|array',
        'details.*.subdetails.*.content' => 'required_with:details.*.subdetails|string',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'meta_og_title' => 'nullable|string',
        'meta_og_description' => 'nullable|string',
        'meta_og_type' => 'nullable|string',
        'slug' => 'nullable|string|max:255',
    ]);

    DB::beginTransaction();

    try {
        // === Slug: hanya diubah jika user ubah
        $slugInput = $request->input('slug');
        $slug = $slugInput ? Str::slug($slugInput) : $product->slug;

        if ($slug !== $product->slug) {
            $request->validate([
                'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            ]);
        }

        // === Siapkan data
        $data = $request->except([
            '_token', '_method', 'details', 'thumbnail', 'images', 'images_to_remove'
        ]);

        $data['slug'] = $slug;
        $data['product_subcategory_id'] = $request->product_subcategory_id;

        // === Thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail && File::exists(public_path($product->thumbnail))) {
                File::delete(public_path($product->thumbnail));
            }
            $file = $request->file('thumbnail');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/produk/thumbnail'), $filename);
            $data['thumbnail'] = 'uploads/produk/thumbnail/' . $filename;
        }

        // === Images
        $currentImages = is_array($product->images)
            ? $product->images
            : json_decode($product->images ?? '[]', true);

        if ($request->has('images_to_remove')) {
            foreach ($request->images_to_remove as $imageToRemove) {
                if (File::exists(public_path($imageToRemove))) {
                    File::delete(public_path($imageToRemove));
                }
                $currentImages = array_diff($currentImages, [$imageToRemove]);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $filename = Str::uuid() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('uploads/produk/images'), $filename);
                $currentImages[] = 'uploads/produk/images/' . $filename;
            }
        }

        $data['images'] = array_values($currentImages); // tetap array, bukan json string

        // === Update produk
        $product->update($data);
        $product->refresh(); // jaga-jaga ID dan relasi terupdate
        // dd($product->id, $product->wasRecentlyCreated, $product->exists);

        // === Hapus sub-detail dulu, lalu detail
        foreach ($product->details as $detail) {
            $detail->subDetails()->delete();
        }
        $product->details()->delete();

        // === Simpan detail dan subdetail baru
        foreach ($request->details as $detailData) {
            $productDetail = $product->details()->create([
                'title' => $detailData['title'],
                'content' => $detailData['content'] ?? null,
            ]);

            if (!empty($detailData['subdetails'])) {
                foreach ($detailData['subdetails'] as $subDetailData) {
                    $productDetail->subDetails()->create([
                        'content' => $subDetailData['content'],
                    ]);
                }
            }
        }

        DB::commit();
        return redirect()->route('admin-panel.products.index')->with('success', 'Produk berhasil diperbarui.');

    } catch (\Exception $e) {
        DB::rollBack();
        dd($e->getMessage()); // Debug sementara
        // return redirect()->back()->with('error', 'Gagal update produk: ' . $e->getMessage())->withInput();
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
