<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('/auth/login', [
            'title' => 'Login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->level == 'user') {
                if ($user->status_konfirmasi == 1) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    toastr()->warning('Akun anda belum terkonfirmasi, Silahkan tunggu konfirmasi dari pimpinan')->error('Login Gagal!');
                    return redirect('/login');
                } elseif ($user->status_konfirmasi == 3) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    toastr()->warning('Konfirmasi akun anda ditolak!')->error('Login Gagal!');
                    return redirect('/login');
                } elseif ($user->status_konfirmasi == 2) {
                    $request->Session()->regenerate();
                    toastr()->success('Login Berhasil')->info($user->name, 'Welcome back ' . $user->level);
                    return redirect()->intended('/');
                }
            }

            $request->Session()->regenerate();
            toastr()->success('Login Berhasil')->info($user->name, 'Welcome back ' . $user->level);
            return redirect()->intended('/dashboard');
        }
        toastr()->warning('Username atau password anda tidak valid, silahkan ulangi kembali!')->error('Login Gagal!');
        return back();
    }

    public function register()
    {
        return view('/auth/register', [
            'title' => 'Register'
        ]);
    }
    public function registration(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:5|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20|confirmed'
        ]);
        $validate_data['password'] = Hash::make($validate_data['password']);
        $validate_data['level'] = 'user';
        $validate_data['status_konfirmasi'] = 1;
        $validate_data['keterangan'] = '';
        User::create($validate_data);
        toastr()->info('Registrasi berhasil, Silahkan menunggu pimpinan mengkonfirmasi akun anda!');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->success('Logout Berhasil!');
        return redirect('/');
    }
}
