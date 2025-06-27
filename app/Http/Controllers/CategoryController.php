<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::latest() ->paginate(10); //jika ingin paginasi
    return view('panel.pages.produk_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('panel.pages.produk_categories.create');
    }

    public function store(Request $request)
    {
      // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'slug' => 'nullable|string|unique:product_categories,slug',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'meta_og_title' => 'nullable|string',
        'meta_og_description' => 'nullable|string',
        'meta_og_type' => 'nullable|string',
    ]);

    // Slug otomatis jika kosong
    $slug = $request->slug ?? Str::slug($request->name);

    // Proses upload thumbnail asli (tanpa resize, tanpa webp)
    $thumbnailPath = null;
    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $relativePath = 'uploads/categories/' . $filename;
        $destinationPath = public_path($relativePath);

        // Buat folder jika belum ada
        if (!file_exists(dirname($destinationPath))) {
            mkdir(dirname($destinationPath), 0755, true);
        }

        // Pindahkan file ke folder tujuan
        $file->move(dirname($destinationPath), basename($destinationPath));

        // Simpan path relatif ke database
        $thumbnailPath = $relativePath; // Contoh: uploads/categories/abcd.jpg
    }

    // Simpan ke database
    ProductCategory::create([
        'name' => $request->name,
        'description' => $request->description,
        'slug' => $slug,
        'thumbnail' => $thumbnailPath,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        'meta_og_title' => $request->meta_og_title,
        'meta_og_description' => $request->meta_og_description,
        'meta_og_type' => $request->meta_og_type ?? 'website',
    ]);

    return redirect()
        ->route('admin-panel.categories.index')
        ->with('success', 'Kategori produk berhasil ditambahkan.');
    }

    public function show(string $id) { 
        $category = ProductCategory::findOrFail($id);

            return view('panel.pages.produk_categories.show', compact('category'));

     }

    public function edit(string $id) { 
        $category = ProductCategory::findOrFail($id);
        return view('panel.pages.produk_categories.edit', compact('category'));
     }
    public function update(Request $request, string $id) { 
        // Ambil data lama
    $category = ProductCategory::findOrFail($id);
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'slug' => 'nullable|string|unique:product_categories,slug,' . $category->id,
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'meta_og_title' => 'nullable|string',
        'meta_og_description' => 'nullable|string',
        'meta_og_type' => 'nullable|string',
    ]);

    // Slug otomatis jika kosong
    $slug = $request->slug ?? Str::slug($request->name);

    // Handle upload thumbnail jika ada
    $thumbnailPath = $category->thumbnail;
    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $relativePath = 'uploads/categories/' . $filename;
        $destinationPath = public_path($relativePath);

        // Buat folder jika belum ada
        if (!file_exists(dirname($destinationPath))) {
            mkdir(dirname($destinationPath), 0755, true);
        }

        // Hapus thumbnail lama jika ada
        if ($thumbnailPath && file_exists(public_path($thumbnailPath))) {
            unlink(public_path($thumbnailPath));
        }

        // Pindahkan file baru
        $file->move(dirname($destinationPath), basename($destinationPath));

        // Update path relatif
        $thumbnailPath = $relativePath;
    }

    // Update data di database
    $category->update([
        'name' => $request->name,
        'description' => $request->description,
        'slug' => $slug,
        'thumbnail' => $thumbnailPath,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        'meta_og_title' => $request->meta_og_title,
        'meta_og_description' => $request->meta_og_description,
        'meta_og_type' => $request->meta_og_type ?? 'website',
    ]);

    return redirect()
        ->route('admin-panel.categories.index')
        ->with('success', 'Kategori produk berhasil diperbarui.');
     }
    public function destroy(string $id) { 
        $category = ProductCategory::findOrFail($id);

    // Hapus file thumbnail jika ada dan filenya benar-benar ada di folder
    if ($category->thumbnail) {
        $thumbnailPath = public_path($category->thumbnail);
        if (file_exists($thumbnailPath)) {
            unlink($thumbnailPath);
        }
    }

    // Hapus data dari database
    $category->delete();
    return redirect()->route('admin-panel.categories.index')
        ->with('success', 'Kategori berhasil dihapus beserta thumbnail-nya.');
     }
}
