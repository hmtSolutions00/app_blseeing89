<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{

        public function detail($id){
        $carousel = Carousel::find($id);
        return view('app.pages.carousel.show',[
            'carousel' => $carousel
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
        return view('panel.pages.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'url_images' => 'required',
            'deskripsi' => 'required',
        ]);

        // dd($request->all());

        if ($request->file('url_images')) {
            if ($request->hasfile('url_images')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('url_images')->getClientOriginalName());
                $request->file('url_images')->move(public_path('carousel-images'), $filename);
            }
        }
        Carousel::create([
            'judul' => $request->judul,
            'url_images' => $filename,
            'deskripsi' => $request->deskripsi,
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_og_title' => $request->meta_og_title,
            'meta_og_description' => $request->meta_og_description,
            'meta_og_type' => $request->meta_og_type
        ]);

        return redirect()->route('admin-panel.carousel.index')->with('success', 'Data Carousel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $carousel = Carousel::find($id);
        return view('panel.pages.carousel.show', [
            'carousel' => $carousel
        ]);
    }

    public function edit($id)
    {
        $carousel = Carousel::find($id);
        return view('panel.pages.carousel.edit', [
            'carousel' => $carousel
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
        $carousel->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_og_title' => $request->meta_og_title,
            'meta_og_description' => $request->meta_og_description,
            'meta_og_type' => $request->meta_og_type
        ]);

        return redirect()->route('admin-panel.carousel.index')->with('success', 'Data Carousel berhasil diubah.');
    }

    public function destroy($id){
        $carousel = Carousel::find($id);

        $carousel->delete();

        return redirect()->route('admin-panel.carousel.index')->with('success', 'Data Carousel berhasil dihapus.');

    }



}
