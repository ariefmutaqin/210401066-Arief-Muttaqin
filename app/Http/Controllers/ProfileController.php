<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('auth.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required', 'email' => 'required', 'password' => 'required|min:6', 'gambar' => 'image|mimes:jpg,jpeg,png,svg|max:2048', // Tambahkan validasi untuk gambar
        ]);
        
        $user = User::find($id);

        // Periksa apakah ada file gambar yang dikirimkan
        if ($request->hasFile('gambar')) {
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('img/petugas', 'public');

            // Hapus gambar lama jika ada
            if ($user->gambar) {
                Storage::disk('public')->delete($user->gambar);
            }

            // Update kolom gambar di database
            $user->update(['gambar' => $gambarPath]);
        }

        // Update informasi pengguna lainnya
        $user->update(['name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Data berhasil diedit');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function editPass()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('auth.change-password', compact('user'));
    }

    public function showUpdatePasswordForm($id)
    {
        $user = User::find($id);
        return view('auth.update-password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::find($id);

        // Periksa apakah password lama sesuai
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak cocok.'])->withInput();
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Password berhasil diubah');
    }

}
