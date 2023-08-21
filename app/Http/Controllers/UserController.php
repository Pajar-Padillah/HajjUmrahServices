<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.user.data_user', [
            'title' => 'Data User',
            'user' => User::latest()->get(),
        ]);
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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'foto' => 'required|image|file|mimes:jpg,jpeg,png,gif|max:2048',
            'password' => ['required'],
            'level' => ['required']
        ]);
        if ($request->input('level') == 'pimpinan') {
            $data['status_konfirmasi'] = 2;
        } else {
            $data['status_konfirmasi'] = 1;
        }
        $data['foto'] = $request->file('foto')->store('user-images');
        $data['password'] = Hash::make($request->password);
        $data['keterangan'] = '';
        User::create($data);
        toastr()->success('Tambah user berhasil!');
        return redirect('/user');
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
    public function edit(User $user)
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
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required'],
            'foto' => 'image|file|mimes:jpg,jpeg,png,gif|max:2048',
            'level' => ['required']
        ];
        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
            toastr()->warning('Email ' . $request->email . ' sudah terdaftar disistem!');
        }
        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
            toastr()->warning('Username ' . $request->username . ' sudah terdaftar disistem!');
        }
        $validate_data = $request->validate($rules);
        if ($request->password) {
            $validate_data['password'] = Hash::make($request->password);
        }
        if ($request->file('foto')) {
            if ($request->old_foto) {
                Storage::delete($request->old_foto);
            }
            $validate_data['foto'] = $request->file('foto')->store('user-images');
        }
        User::where('id', $user->id)->update($validate_data);
        toastr()->success('Edit data user berhasil!');
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = User::where('id', $id)->first();
        if ($foto) {
            Storage::delete($foto->foto);
            $foto->delete();
        }
        User::where('id', $id)->delete();
        toastr()->success('Hapus user berhasil!');
        return redirect('/user');
    }

    public function konfirmasiuser(Request $request)
    {
        if (!$request->input('status_konfirmasi') && !$request->input('keterangan')) {
            toastr()->warning('Kolom status konfirmasi dan keterangan harus diisi!');
            return back();
        }
        if (!$request->input('status_konfirmasi')) {
            toastr()->warning('Kolom status konfirmasi harus diisi!');
            return back();
        }
        if (!$request->input('keterangan')) {
            toastr()->warning('Kolom keterangan harus diisi!');
            return back();
        }
        $id = $request->input('id_user');
        $data['status_konfirmasi'] = $request->input('status_konfirmasi');
        $data['keterangan'] = $request->input('keterangan');

        User::where('id', $id)->update($data);
        toastr()->success('Ubah status konfirmasi user berhasil!');
        return redirect('/user');
    }

    public function profil()
    {
        return view('page.user.profil', [
            'title' => 'My Profile',
            'user' => Auth::user()
        ]);
    }

    public function updateprofil(Request $request, User $user)
    {
        $rules = [
            'name' => ['required'],
            'foto' => 'image|file|mimes:jpg,jpeg,png,gif|max:2048',
        ];
        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
            toastr()->warning('Email ' . $request->email . ' sudah terdaftar disistem!');
        }
        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
            toastr()->warning('Username ' . $request->username . ' sudah terdaftar disistem!');
        }
        $validate_data = $request->validate($rules);
        if ($request->password) {
            $validate_data['password'] = Hash::make($request->password);
        }
        if ($request->file('foto')) {
            if ($request->old_foto) {
                Storage::delete($request->old_foto);
            }
            $validate_data['foto'] = $request->file('foto')->store('user-images');
        }
        User::where('id', $user->id)->update($validate_data);
        toastr()->success('Edit profil berhasil!');
        return redirect('/profil');
    }
}
