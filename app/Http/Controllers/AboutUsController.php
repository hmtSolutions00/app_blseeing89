<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about_us = AboutUs::first();
        return view('panel.pages.about_us.index', compact('about_us'));
    }

    public function update(Request $request, $id) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $about_us = AboutUs::find($id);
        $about_us->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if ($request->file('image_path')) {
            if ($request->hasfile('image_path')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image_path')->getClientOriginalName());
                $request->file('image_path')->move(public_path('/uploads/about_us'), $filename);
            }
            $about_us->update([
                'image_path' => $filename
            ]);
        }
        return redirect()->route('admin-panel.about-us.index')->with('success', 'About Us berhasil diupdate.');
    }

    public function index2(){
        $about_us = AboutUs::first();

        return view('app.pages.about_us.index', [
            'about_us' => $about_us
        ]);
    }
}
