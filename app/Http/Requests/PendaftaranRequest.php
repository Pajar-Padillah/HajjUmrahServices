<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'no_pendaftaran' => 'required',
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
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
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
            'bukti_tabungan' => 'required|mimes:pdf|max:2048',
            'bukti_setoran_bpih' => 'required|mimes:pdf|max:2048',
            'bukti_setoran_bipij' => 'required|mimes:pdf|max:2048',
            'ktp' => 'required|mimes:pdf|max:2048',
            'kk' => 'required|mimes:pdf|max:2048',
            'akte' => 'required|mimes:pdf|max:2048'
        ];
    }
}
