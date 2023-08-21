<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function biodataPendaftar()
    {
        return $this->hasOne(BiodataPendaftar::class);
    }

    public function pasporPendaftar()
    {
        return $this->hasOne(PasporPendaftar::class);
    }

    public function alamatPendaftar()
    {
        return $this->hasOne(AlamatPendaftar::class);
    }

    public function dokumenPendaftar()
    {
        return $this->hasOne(DokumenPendaftar::class);
    }

    public static function generateNoPendaftaran()
    {
        $no_pendaftaran = 'P-' . date('dmY') . '-' . rand(1000, 9999);
        while (self::where('no_pendaftaran', $no_pendaftaran)->exists()) {
            $no_pendaftaran = 'P-' . time() . '-' . rand(1000, 9999);
        }
        return $no_pendaftaran;
    }
}
