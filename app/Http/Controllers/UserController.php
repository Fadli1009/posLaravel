<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tambah-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'konfirmasi_password' => 'required'
        ]);
        if ($val['konfirmasi_password'] != $val['password']) {
            return redirect()->route('user.create')->withInput()->with('error', 'Konfirmasi Password gagal');
        }
        $cekEmail = User::where('email', $request->email)->exists();
        if ($cekEmail) {
            return redirect()->route('user.create')->withInput()->with('error', 'Email sudah digunakan')->withInput();
        }
        User::create($val);
        toast('data berhasil di simpan', 'success');

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        return view('user.edit-user', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $val = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'konfirmasi_password' => 'nullable'
        ]);
        $val['password'] = Hash::make($val['password']);
        $data->update($val);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user.index');
    }
}
