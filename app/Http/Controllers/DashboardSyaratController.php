<?php

namespace App\Http\Controllers;

use App\Models\Syarat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardSyaratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.syarat.data_syarat', [
            'title' => 'Syarat',
            'syarats' => Syarat::latest()->get(),
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
     * @param  \App\Http\Requests\StoreSyaratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->file('file_syarat')) {
            toastr()->warning('File syarat belum di upload!')->error('Tambah data syarat gagal!');
            return back();
        }
        $syarat = $request->file('file_syarat')->store('syarat');
        Syarat::create([
            'file_syarat' => $syarat,
        ]);
        toastr()->success('Tambah data syarat berhasil!');
        return redirect('/syarat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Syarat  $syarat
     * @return \Illuminate\Http\Response
     */
    public function show(Syarat $syarat)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Syarat  $syarat
     * @return \Illuminate\Http\Response
     */
    public function edit(Syarat $syarat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSyaratRequest  $request
     * @param  \App\Models\Syarat  $syarat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->file('file_syarat')) {
            toastr()->warning('File syarat belum di upload!')->error('Edit data syarat gagal!');
            return back();
        }
        $id = $request->input('id_syarat');
        $namaupload['file_syarat'] = $request->file('file_syarat')->store('syarat');
        if ($request->old_file_syarat) {
            Storage::delete($request->old_file_syarat);
        }
        Syarat::where('id', $id)->update($namaupload);
        toastr()->success('Edit data syarat berhasil!');
        return redirect('/syarat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Syarat  $syarat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syarat $syarat)
    {
        $file = Syarat::where('id', $syarat->id)->first();
        if ($file) {
            Storage::delete($file->file_syarat);
            $file->delete();
        }
        toastr()->success('Hapus data syarat berhasil!');
        return redirect('/syarat');
    }
}
