<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syarat;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = [
            'title' => 'Home',
            'syarats' => Syarat::latest()->get()
        ];
        return view('page/home', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('page/dashboard', $data);
    }

    public function tentang()
    {
        return view('page/tentang', ['title' => 'Tentang']);
    }

    public function alurpendaftaran()
    {
        return view('page/alur_pendaftaran', ['title' => 'Alur Pendaftaran']);
    }
}
