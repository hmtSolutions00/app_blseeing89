<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::All();
        return view('panel.pages.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('panel.pages.partner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo_path' => 'required',
            'website_url' => 'required',
        ]);

        if ($request->file('logo_path')) {
            if ($request->hasfile('logo_path')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('logo_path')->getClientOriginalName());
                $request->file('logo_path')->move(public_path('/uploads/partner'), $filename);
            }
        }

        Partner::create([
            'name' => $request->name,
            'logo_path' => $filename,
            'website_url' => $request->website_url,
            'description' => $request->description
        ]);

        return redirect()->route('admin-panel.partner.index')->with('success', 'Data Partner berhasil ditambahkan.');
    }

    public function show($id)
    {
        $partner = Partner::find($id);

        return view('panel.pages.partner.show', [
            'partner' => $partner,
        ]);
    }

    public function edit($id)
    {
        $partner = Partner::find($id);

        return view('panel.pages.partner.edit', [
            'partner' => $partner,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'website_url' => 'required',
        ]);

        $partner = Partner::find($id);
        $partner->update([
            'name' => $request->name,
            'website_url' => $request->website_url,
            'description' => $request->description
        ]);

        if ($request->file('logo_path')) {
            if ($request->hasfile('logo_path')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('logo_path')->getClientOriginalName());
                $request->file('logo_path')->move(public_path('/uploads/partner'), $filename);
                $partner->update([
                    'logo_path' => $filename,
                ]);
            }
        }

        return redirect()->route('admin-panel.partner.index')->with('success', 'Data Partner berhasil diubah.');
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect()->route('admin-panel.partner.index')->with('success', 'Data Partner berhasil dihapus.');
    }
}
