<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PromotionalVideo;
use Illuminate\Http\Request;

class PromotionaVideoController extends Controller
{
    public function index()
    {
        $promotional_videos = PromotionalVideo::All();
        return view('panel.pages.promotional_video.index', compact('promotional_videos'));
    }

    public function create()
    {
        return view('panel.pages.promotional_video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'path_video' => 'required',
            'is_show' => 'required',
        ]);

        if ($request->file('path_video')) {
            if ($request->hasfile('path_video')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('path_video')->getClientOriginalName());
                $request->file('path_video')->move(public_path('/assets/video'), $filename);
            }
        }

        PromotionalVideo::create([
            'path_video' => $filename,
            'is_show' => $request->is_show
        ]);

        return redirect()->route('admin-panel.promotional_video.index')->with('success', 'Data Video Promosi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $promotional_video = PromotionalVideo::find($id);

        return view('panel.pages.promotional_video.show', [
            'promotional_video' => $promotional_video,
        ]);
    }

    public function edit($id)
    {
        $promotional_video = PromotionalVideo::find($id);

        return view('panel.pages.promotional_video.edit', [
            'promotional_video' => $promotional_video,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'is_show' => 'required',
        ]);

        $promotional_video = PromotionalVideo::find($id);
        $promotional_video->update([
            'is_show' => $request->is_show
        ]);

        if ($request->file('path_video')) {
            if ($request->hasfile('path_video')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('path_video')->getClientOriginalName());
                $request->file('path_video')->move(public_path('/assets/video'), $filename);
            }
            $promotional_video->update([
                'path_video' => $filename
            ]);
        }

        return redirect()->route('admin-panel.promotional_video.index')->with('success', 'Data Video Promosi berhasil diubah.');
    }

    public function destroy($id)
    {
        $promotional_video = PromotionalVideo::find($id);
        $promotional_video->delete();

        return redirect()->route('admin-panel.promotional_video.index')->with('success', 'Data Video Promosi berhasil dihapus.');
    }
}
