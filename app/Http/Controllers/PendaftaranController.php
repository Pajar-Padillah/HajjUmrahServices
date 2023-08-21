<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftaranRequest;
use App\Models\AlamatPendaftar;
use App\Models\BiodataPendaftar;
use App\Models\DokumenPendaftar;
use App\Models\PasporPendaftar;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->level != 'user') {
            $data = [
                'user' => $user,
                'title' => 'Data Pendaftaran Haji/Umroh',
                'pendaftaran' => Pendaftaran::with('biodataPendaftar', 'pasporPendaftar', 'alamatPendaftar', 'dokumenPendaftar')->get()
            ];
        } else {
            $data = [
                'user' => $user,
                'title' => 'Data Pendaftaran Haji/Umroh ' . $user->name,
                'pendaftaran' => Pendaftaran::where('user_id', $user->id)->with('biodataPendaftar', 'pasporPendaftar', 'alamatPendaftar', 'dokumenPendaftar')->latest()->get()
            ];
        }
        return view('page/pendaftaran/data_pendaftaran', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level !== 'user') {
            abort(403);
        }
        $data = [
            'title' => 'Form Pendaftaran Haji/Umroh',
            'no_pendaftaran' => Pendaftaran::generateNoPendaftaran(),
            'tgl_skrg' => Carbon::now()->toDateString()
        ];
        return view('page/pendaftaran/form_pendaftaran', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendaftaranRequest $request)
    {
        $user = Auth::user();
        $sudahDaftar = Pendaftaran::where('user_id', $user->id)->where('status_pendaftaran', 'proses')->first();

        if ($sudahDaftar) {
            toastr()->warning('Anda sudah memiliki pendaftaran yang sedang diproses!')->error('Tambah data pendaftaran gagal!');
            return back();
        }

        DB::beginTransaction();
        try {
            $pendaftaran = Pendaftaran::create([
                'user_id' => $user->id,
                'no_pendaftaran' => $request->input('no_pendaftaran'),
                'nama_lengkap' => $request->input('nama_lengkap'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'pekerjaan' => $request->input('pekerjaan'),
                'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
                'jenis_daftar' => $request->input('jenis_daftar'),
                'tanggal_pendaftaran' => $request->input('tanggal_pendaftaran'),
                'tanggal_berangkat' => $request->input('tanggal_berangkat'),
                'fasilitas_kamar' => $request->input('fasilitas_kamar'),
                'status_pendaftaran' => 'proses',
                'keterangan' => ''
            ]);
            $pendaftaran_id = $pendaftaran->id;
            BiodataPendaftar::create([
                'pendaftaran_id' => $pendaftaran_id,
                'nama_ayah' => $request->input('nama_ayah'),
                'nama_ibu' => $request->input('nama_ibu'),
                'nama_mahram' => $request->input('nama_mahram'),
                'status_mahram' => $request->input('status_mahram'),
                'pernah_haji' => $request->input('pernah_haji'),
                'pernah_umroh' => $request->input('pernah_umroh'),
                'merokok' => $request->input('merokok'),
                'memiliki_penyakit' => $request->input('memiliki_penyakit'),
                'nama_penyakit' => $request->input('nama_penyakit'),
                'perlu_penanganan_khusus' => $request->input('perlu_penanganan_khusus'),
                'perlu_kursi_roda' => $request->input('perlu_kursi_roda')
            ]);
            PasporPendaftar::create([
                'pendaftaran_id' => $pendaftaran_id,
                'no_paspor' => $request->input('no_paspor'),
                'tempat_paspor_terbit' => $request->input('tempat_paspor_terbit'),
                'tanggal_paspor_dibuat' => $request->input('tanggal_paspor_dibuat'),
                'tanggal_akhir_paspor' => $request->input('tanggal_akhir_paspor')
            ]);
            AlamatPendaftar::create([
                'pendaftaran_id' => $pendaftaran_id,
                'alamat' => $request->input('alamat'),
                'kelurahan' => $request->input('kelurahan'),
                'kecamatan' => $request->input('kecamatan'),
                'kota' => $request->input('kota'),
                'kode_pos' => $request->input('kode_pos'),
                'email' => $request->input('email'),
                'no_telp' => $request->input('no_telp')
            ]);
            DokumenPendaftar::create([
                'pendaftaran_id' => $pendaftaran_id,
                'image' => $request->file('image')->store('pendaftar-images'),
                'bukti_tabungan' => $request->file('bukti_tabungan')->store('berkas'),
                'bukti_setoran_bpih' => $request->file('bukti_setoran_bpih')->store('berkas'),
                'bukti_setoran_bipij' => $request->file('bukti_setoran_bipij')->store('berkas'),
                'ktp' => $request->file('ktp')->store('berkas'),
                'kk' => $request->file('kk')->store('berkas'),
                'akte' => $request->file('akte')->store('berkas')
            ]);
            DB::commit();
            toastr()->info('Silahkan menunggu pimpinan memvalidasi data pendaftaran anda!')->success('Tambah data pendaftaran berhasil!');
            return redirect('/pendaftaran');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Tambah pendaftaran gagal!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title' => 'Detail Data Pendaftaran Haji/Umroh',
            'pendaftaran' => Pendaftaran::where('id', $id)->with('biodataPendaftar', 'pasporPendaftar', 'alamatPendaftar', 'dokumenPendaftar')->first()
        ];
        return view('page/pendaftaran/detail_pendaftaran', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->level !== 'user') {
            abort(403);
        }
        $user = Auth::user();
        $data = [
            'title' => 'Data Pendaftaran Haji/Umroh ' . $user->name,
            'pendaftaran' => Pendaftaran::where('id', $id)->with('biodataPendaftar', 'pasporPendaftar', 'alamatPendaftar', 'dokumenPendaftar')->first()
        ];
        return view('page/pendaftaran/edit_pendaftaran', $data);
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
        $validator = $this->validatorUpdate($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            Pendaftaran::where('id', $id)->update([
                'nama_lengkap' => $request->input('nama_lengkap'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'pekerjaan' => $request->input('pekerjaan'),
                'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
                'jenis_daftar' => $request->input('jenis_daftar'),
                'tanggal_pendaftaran' => $request->input('tanggal_pendaftaran'),
                'tanggal_berangkat' => $request->input('tanggal_berangkat'),
                'fasilitas_kamar' => $request->input('fasilitas_kamar'),
            ]);
            BiodataPendaftar::where('pendaftaran_id', $id)->update([
                'nama_ayah' => $request->input('nama_ayah'),
                'nama_ibu' => $request->input('nama_ibu'),
                'nama_mahram' => $request->input('nama_mahram'),
                'status_mahram' => $request->input('status_mahram'),
                'pernah_haji' => $request->input('pernah_haji'),
                'pernah_umroh' => $request->input('pernah_umroh'),
                'merokok' => $request->input('merokok'),
                'memiliki_penyakit' => $request->input('memiliki_penyakit'),
                'nama_penyakit' => $request->input('nama_penyakit'),
                'perlu_penanganan_khusus' => $request->input('perlu_penanganan_khusus'),
                'perlu_kursi_roda' => $request->input('perlu_kursi_roda')
            ]);
            PasporPendaftar::where('pendaftaran_id', $id)->update([
                'no_paspor' => $request->input('no_paspor'),
                'tempat_paspor_terbit' => $request->input('tempat_paspor_terbit'),
                'tanggal_paspor_dibuat' => $request->input('tanggal_paspor_dibuat'),
                'tanggal_akhir_paspor' => $request->input('tanggal_akhir_paspor')
            ]);
            AlamatPendaftar::where('pendaftaran_id', $id)->update([
                'alamat' => $request->input('alamat'),
                'kelurahan' => $request->input('kelurahan'),
                'kecamatan' => $request->input('kecamatan'),
                'kota' => $request->input('kota'),
                'kode_pos' => $request->input('kode_pos'),
                'email' => $request->input('email'),
                'no_telp' => $request->input('no_telp')
            ]);
            if ($request->File('image')) {
                if ($request->old_image) {
                    Storage::delete($request->old_image);
                }
                $image_name = $request->file('image')->store('pendaftar-images');
                DokumenPendaftar::where('pendaftaran_id', $id)->update(['image' => $image_name]);
            }
            if ($request->File('bukti_tabungan')) {
                if ($request->old_bukti_tabungan) {
                    Storage::delete($request->old_bukti_tabungan);
                }
                $bukti_tabungan_name = $request->file('bukti_tabungan')->store('berkas');
                DokumenPendaftar::where('pendaftaran_id', $id)->update(['bukti_tabungan' => $bukti_tabungan_name]);
            }
            if ($request->File('bukti_setoran_bpih')) {
                if ($request->old_bukti_setoran_bpih) {
                    Storage::delete($request->old_bukti_setoran_bpih);
                }
                $bukti_setoran_bpih_name = $request->file('bukti_setoran_bpih')->store('berkas');
                DokumenPendaftar::where('pendaftaran_id', $id)->update(['bukti_setoran_bpih' => $bukti_setoran_bpih_name]);
            }
            if ($request->File('bukti_setoran_bipij')) {
                if ($request->old_bukti_setoran_bipij) {
                    Storage::delete($request->old_bukti_setoran_bipij);
                }
                $bukti_setoran_bipij_name = $request->file('bukti_setoran_bipij')->store('berkas');
                DokumenPendaftar::where('pendaftaran_id', $id)->update(['bukti_setoran_bipij' => $bukti_setoran_bipij_name]);
            }
            if ($request->File('ktp')) {
                if ($request->old_ktp) {
                    Storage::delete($request->old_ktp);
                }
                $ktp_name = $request->file('ktp')->store('berkas');
                DokumenPendaftar::where('pendaftaran_id', $id)->update(['ktp' => $ktp_name]);
            }
            if ($request->File('kk')) {
                if ($request->old_kk) {
                    Storage::delete($request->old_kk);
                }
                $kk_name = $request->file('kk')->store('berkas');
                DokumenPendaftar::where('pendaftaran_id', $id)->update(['kk' => $kk_name]);
            }
            if ($request->File('akte')) {
                if ($request->old_akte) {
                    Storage::delete($request->old_akte);
                }
                $akte_name = $request->file('akte')->store('berkas');
                DokumenPendaftar::where('pendaftaran_id', $id)->update(['akte' => $akte_name]);
            }
            DB::commit();
            toastr()->success('Edit data pendaftaran berhasil!');
            return redirect('/pendaftaran');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Edit data pendaftaran gagal!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Pendaftaran::destroy($id);
            BiodataPendaftar::where('pendaftaran_id', $id)->delete();
            AlamatPendaftar::where('pendaftaran_id', $id)->delete();
            PasporPendaftar::where('pendaftaran_id', $id)->delete();
            $dokumen = DokumenPendaftar::where('pendaftaran_id', $id)->first();
            if ($dokumen) {
                Storage::delete($dokumen->image);
                Storage::delete($dokumen->bukti_tabungan);
                Storage::delete($dokumen->bukti_setoran_bpih);
                Storage::delete($dokumen->bukti_setoran_bipij);
                Storage::delete($dokumen->ktp);
                Storage::delete($dokumen->kk);
                Storage::delete($dokumen->akte);
                $dokumen->delete();
            }
            DB::commit();
            toastr()->success('Hapus data pendaftaran berhasil!');
            return redirect('/pendaftaran');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Hapus data pendaftaran gagal!');
            return back();
        }
    }

    public function validasiterima(Request $request)
    {
        if (!$request->input('keterangan')) {
            toastr()->warning('Kolom keterangan harus diisi!')->error('Ubah status pendaftaran gagal!');
            return back();
        }
        $id = $request->input('id_pendaftaran');
        $data['keterangan'] = $request->input('keterangan');
        $data['status_pendaftaran'] = 'diterima';
        Pendaftaran::where('id', $id)->update($data);
        toastr()->success('Ubah status pendaftaran diterima berhasil!');
        return redirect('/pendaftaran');
    }

    public function validasitolak(Request $request)
    {
        if (!$request->input('keterangan')) {
            toastr()->warning('Kolom keterangan harus diisi!')->error('Ubah status pendaftaran gagal!');
            return back();
        }
        $id = $request->input('id_pendaftaran');
        $data['keterangan'] = $request->input('keterangan');
        $data['status_pendaftaran'] = 'ditolak';
        Pendaftaran::where('id', $id)->update($data);
        toastr()->success('Ubah status pendaftaran ditolak berhasil!');
        return redirect('/pendaftaran');
    }

    private function validatorUpdate(array $data)
    {
        $validator = Validator::make($data, [
            'jenis_daftar' => 'required',
            'tanggal_pendaftaran' => 'required',
            'tanggal_berangkat' => 'required',
            'nama_lengkap' => 'required|regex:/^[A-Za-z\s]+$/',
            'tempat_lahir' => 'required|regex:/^[A-Za-z\s]+$/',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
            'nama_ayah' => 'required|regex:/^[A-Za-z\s]+$/',
            'nama_ibu' => 'required|regex:/^[A-Za-z\s]+$/',
            'nama_mahram' => 'nullable',
            'status_mahram' => 'nullable',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            'no_paspor' => 'required',
            'tempat_paspor_terbit' => 'required|regex:/^[A-Za-z\s]+$/',
            'tanggal_paspor_dibuat' => 'required',
            'tanggal_akhir_paspor' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required|regex:/^[A-Za-z\s]+$/',
            'kecamatan' => 'required|regex:/^[A-Za-z\s]+$/',
            'kota' => 'required|regex:/^[A-Za-z\s]+$/',
            'kode_pos' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'pernah_haji' => 'required',
            'pernah_umroh' => 'required',
            'fasilitas_kamar' => 'required',
            'merokok' => 'nullable',
            'memiliki_penyakit' => 'required',
            'nama_penyakit' => 'nullable',
            'perlu_penanganan_khusus' => 'required',
            'perlu_kursi_roda' => 'required',
            'bukti_tabungan' => 'mimes:pdf|max:2048',
            'bukti_setoran_bpih' => 'mimes:pdf|max:2048',
            'bukti_setoran_bipij' => 'mimes:pdf|max:2048',
            'ktp' => 'mimes:pdf|max:2048',
            'kk' => 'mimes:pdf|max:2048',
            'akte' => 'mimes:pdf|max:2048'
        ]);
        return $validator;
    }
}
