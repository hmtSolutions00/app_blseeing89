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
        return view('panel.pages.galeries.index', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.galeries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'path_items' => 'required',
            'jenis_items' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $itemPath = null;
            if ($request->hasFile('path_items')) {
                $item = $request->file('path_items');
                $itemName = time() . '_' . uniqid() . '.' . $item->getClientOriginalExtension();
                $item->move(public_path('uploads/galeries/'), $itemName);
                $itemPath = 'uploads/galeries/' . $itemName;
            }

            // Simpan galeri
            $galeri = Galerie::create([
                'path_items' => $itemPath,
                'jenis_items' => $request->jenis_items,
            ]);

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

        return view('panel.pages.galeries.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $galeri = Galerie::with('imageGaleri')->findOrFail($id);
        return view('panel.pages.galeries.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $galeri = Galerie::with('imageGaleri')->findOrFail($id);

        $request->validate([
            'jenis_items' => 'required'
        ]);

        // Update data dasar (tanpa slug)
        $galeri->jenis_items = $request->jenis_items;

        $itemPath = null;
        if ($request->hasFile('path_items')) {
            $item = $request->file('path_items');
            $itemName = time() . '_' . uniqid() . '.' . $item->getClientOriginalExtension();
            $item->move(public_path('uploads/galeries/'), $itemName);
            $itemPath = 'uploads/galeries/' . $itemName;
            $galeri->path_items = $itemPath;
        }


        $galeri->save();

        return redirect()->route('admin-panel.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            $galeri = Galerie::with('imageGaleri')->findOrFail($id);

            if ($galeri->path_items && File::exists(public_path($galeri->path_items))) {
                File::delete(public_path($galeri->path_items));
            }

            $galeri->delete();
        });

        return redirect()->route('admin-panel.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
    public function deleteImage($id)
    {
        $image = ImageGalerie::findOrFail($id);

        if ($image->path_items && file_exists(public_path($image->path_items))) {
            unlink(public_path($image->path_items));
        }

        $image->delete();

        return back()->with('success', 'Galeri berhasil dihapus.');
    }
}
