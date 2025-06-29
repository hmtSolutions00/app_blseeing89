<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use App\Models\ImageGalerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeris = Galerie::latest()->paginate(10);
    return view('panel.pages.galerie.index', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.galerie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'judul' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'images' => 'nullable|array|max:20',
    ]);

    DB::beginTransaction();

    try {
        // Simpan thumbnail
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/galeries/thumbnail'), $thumbnailName);
            $thumbnailPath = 'uploads/galeries/thumbnail/' . $thumbnailName;
        }

        // Slug unik
        $slug = Str::slug($request->judul) . '-' . Str::uuid();

        // Simpan galeri
        $galeri = Galerie::create([
            'judul' => $request->judul,
            'description' => $request->description,
            'slug' => $slug,
            'thumbnail' => $thumbnailPath,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_og_title' => $request->meta_og_title,
            'meta_og_description' => $request->meta_og_description,
            'meta_og_type' => $request->meta_og_type ?? 'website',
        ]);

        // Simpan gambar galeri
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/galeries/images'), $imageName);
                $imagePath = 'uploads/galeries/images/' . $imageName;

                ImageGalerie::create([
                    'galeri_id' => $galeri->id,
                    'image_url' => $imagePath,
                ]);
            }
        }

        DB::commit();

        return redirect()->route('admin-panel.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    } catch (\Exception $e) {
        DB::rollBack();

        return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $galeri = Galerie::with('imageGaleri')->findOrFail($id);

    return view('panel.pages.galerie.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $galeri = Galerie::with('imageGaleri')->findOrFail($id);
    return view('panel.pages.galerie.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $galeri = Galerie::with('imageGaleri')->findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Update data dasar (tanpa slug)
    $galeri->judul = $request->judul;
    $galeri->description = $request->description;
    $galeri->meta_description = $request->meta_description;
    $galeri->meta_keywords = $request->meta_keywords;
    $galeri->meta_og_title = $request->meta_og_title;
    $galeri->meta_og_description = $request->meta_og_description;
    $galeri->meta_og_type = $request->meta_og_type;

    // Thumbnail baru
    if ($request->hasFile('thumbnail')) {
        // Hapus thumbnail lama
        if ($galeri->thumbnail && file_exists(public_path($galeri->thumbnail))) {
            unlink(public_path($galeri->thumbnail));
        }

        $thumbnail = $request->file('thumbnail');
        $filename = time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
        $path = 'uploads/galeries/thumbnail/';
        $thumbnail->move(public_path($path), $filename);
        $galeri->thumbnail = $path . $filename;
    }

    $galeri->save();

    // Upload gambar tambahan
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/galeries/images/';
            $image->move(public_path($path), $filename);

            ImageGalerie::create([
                'galeri_id' => $galeri->id,
                'image_url' => $path . $filename,
            ]);
        }
    }

    return redirect()->route('admin-panel.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       DB::transaction(function () use ($id) {
        $galeri = Galerie::with('imageGaleri')->findOrFail($id);

        if ($galeri->thumbnail && File::exists(public_path($galeri->thumbnail))) {
            File::delete(public_path($galeri->thumbnail));
        }

        foreach ($galeri->imageGaleri as $image) {
            if ($image->image_url && File::exists(public_path($image->image_url))) {
                File::delete(public_path($image->image_url));
            }
            $image->delete();
        }

        $galeri->delete();
    });

    return redirect()->route('admin-panel.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
    public function deleteImage($id)
{
    $image = ImageGalerie::findOrFail($id);

    if ($image->image_url && file_exists(public_path($image->image_url))) {
        unlink(public_path($image->image_url));
    }

    $image->delete();

    return back()->with('success', 'Gambar berhasil dihapus.');
}
}
