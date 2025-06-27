<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProductSubcategory::with('category');

    // Cek apakah ada filter kategori
    if ($request->filled('category_id')) {
        $query->where('product_category_id', $request->category_id);
    }

    $subcategories = $query->paginate(10)->appends($request->query()); // menjaga query di pagination
    $categories = ProductCategory::all();

    return view('panel.pages.produk_subcategories.index', compact('subcategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();

    return view('panel.pages.produk_subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'product_category_id' => 'required|exists:product_categories,id',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'meta_keywords' => 'nullable|string',
        'meta_og_title' => 'nullable|string',
        'meta_og_description' => 'nullable|string',
        'meta_og_type' => 'nullable|string',
    ]);

    $data = $request->only([
        'product_category_id',
        'name',
        'description',
        'meta_keywords',
        'meta_og_title',
        'meta_og_description',
        'meta_og_type',
    ]);

    // ✅ Tambah slug unik
    $data['slug'] = Str::slug($data['name']) . '-' . uniqid();

    // ✅ Upload thumbnail jika ada
    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/sub_categories'), $filename);
        $data['thumbnail'] = 'uploads/sub_categories/' . $filename;
    }

    ProductSubcategory::create($data);

    return redirect()->route('admin-panel.sub_categories.index')->with('success', 'Subkategori berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subcategory = ProductSubcategory::findOrFail($id);
    $categories = ProductCategory::all(); // Untuk menampilkan nama kategori induk di select (meskipun disabled)

    return view('panel.pages.produk_subcategories.show', compact('subcategory', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = ProductSubcategory::findOrFail($id);
        $categories = ProductCategory::all();

    return view('panel.pages.produk_subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory = ProductSubcategory::findOrFail($id);
$validated = $request->except('slug'); // Pastikan slug dikeluarkan jika dikirim
$validated = Validator::make($validated, [
    'product_category_id' => 'required|exists:product_categories,id',
    'name' => 'required|string|max:255',
    'description' => 'required|string|max:1000',
    'meta_keywords' => 'nullable|string|max:255',
    'meta_og_title' => 'nullable|string|max:255',
    'meta_og_description' => 'nullable|string|max:255',
    'meta_og_type' => 'nullable|string|max:255',
    'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
])->validate();

    try {
        // Handle thumbnail jika ada file baru
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

            // Hapus file lama jika ada
            if ($subcategory->thumbnail && File::exists(public_path($subcategory->thumbnail))) {
                File::delete(public_path($subcategory->thumbnail));
            }

            // Simpan file baru
            $filename = uniqid('thumb_') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/sub_categories'), $filename);
            $validated['thumbnail'] = '/uploads/sub_categories/' . $filename;
        }

        // Update data
        $subcategory->update($validated);

        return redirect()->route('admin-panel.sub_categories.index')
            ->with('success', 'Subkategori berhasil diperbarui.');
    } catch (\Exception $e) {
        Log::error('Gagal update subkategori: ' . $e->getMessage());
        return redirect()->back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = ProductSubcategory::findOrFail($id);

    // Hapus file thumbnail jika ada
    if ($subcategory->thumbnail && File::exists(public_path($subcategory->thumbnail))) {
        File::delete(public_path($subcategory->thumbnail));
    }

    // Hapus data subkategori
    $subcategory->delete();

    return redirect()->route('admin-panel.sub_categories.index')
        ->with('success', 'Subkategori berhasil dihapus beserta thumbnail-nya.');
    }
}
