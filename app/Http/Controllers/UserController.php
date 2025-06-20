<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('panel.pages.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('panel.pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'konfirmasi_password' => 'required',
        ]);

        if ($request->password !== $request->konfirmasi_password) {
            return back()->with('error', "Password dan Konfirmasi Password tidak sama!")->withInput($request->all());
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admin-panel.user.index')->with('success', 'Data Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('panel.pages.user.edit', [
            'user' => $user
        ]);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);

        if ($request->password !== null && $request->konfirmasi_password !== null) {
            if ($request->password !== $request->konfirmasi_password) {
                return back()->with('error', "Password dan Konfirmasi Password tidak sama!")->withInput($request->all());
            }
            $user->update([
                'password' => $request->password
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('admin-panel.user.index')->with('success', 'Data Pengguna berhasil diubah.');
    }

    public function destroy($id){
        $user = User::find($id);

        $user->delete();

        return redirect()->route('admin-panel.user.index')->with('success', 'Data Pengguna berhasil dihapus.');

    }
}
