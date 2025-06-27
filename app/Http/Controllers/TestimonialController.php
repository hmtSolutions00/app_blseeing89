<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(){
         $testimonials = Testimonial::all();
        return view('panel.pages.testimonial.index', [
            'testimonials' => $testimonials
        ]);
    }

    public function create(){
        return view('panel.pages.testimonial.create');
    }

    public function store(Request $request){
         $request->validate([
            'customer_name' => 'required',
            'testimonial_text' => 'required',
            'customer_photo_path' => 'required',
        ]);

        if ($request->file('customer_photo_path')) {
            if ($request->hasfile('customer_photo_path')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('customer_photo_path')->getClientOriginalName());
                $request->file('customer_photo_path')->move(public_path('/uploads/testimonial'), $filename);
            }
        }

        Testimonial::create([
            'customer_name' => $request->customer_name,
            'testimonial_text' => $request->testimonial_text,
            'customer_photo_path' => $filename
        ]);

        return redirect()->route('admin-panel.testimonial.index')->with('success', 'Data Testimonial berhasil ditambahkan.');
    }

    public function edit($id){
         $testimonial = Testimonial::find($id);
        return view('panel.pages.testimonial.edit',[
            'testimonial' => $testimonial
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'customer_name' => 'required',
            'testimonial_text' => 'required',
        ]);
        $testimonial = Testimonial::find($id);

        if ($request->file('customer_photo_path')) {
            if ($request->hasfile('customer_photo_path')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('customer_photo_path')->getClientOriginalName());
                $request->file('customer_photo_path')->move(public_path('/uploads/testimonial'), $filename);
            }
            $testimonial->update([
                'customer_photo_path' => $filename
            ]);
        }

        $testimonial->update([
            'customer_name' => $request->customer_name,
            'testimonial_text' => $request->testimonial_text,
        ]);

        return redirect()->route('admin-panel.testimonial.index')->with('success', 'Data Testimonial berhasil diubah.');
    }

    public function show($id){
        $testimonial = Testimonial::find($id);
        return view('panel.pages.testimonial.show',[
            'testimonial' => $testimonial
        ]);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if($testimonial->is_published == true){
            $testimonial->update([
                'is_published' => false
            ]);
        }else{
            $testimonial->update([
                'is_published' => true
            ]);
        }

        return redirect()->route('admin-panel.testimonial.index')->with('success', 'Status Testimonial berhasil diubah.');
    }
}
