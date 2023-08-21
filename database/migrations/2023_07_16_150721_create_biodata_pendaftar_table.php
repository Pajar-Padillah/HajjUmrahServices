<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pendaftaran_id');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('nama_mahram')->nullable();
            $table->enum('status_mahram', [null, 'suami', 'ayah', 'anak', 'adik', 'kakak', 'lain-lain'])->nullable();
            $table->enum('pernah_haji', ['pernah', 'belum']);
            $table->enum('pernah_umroh', ['pernah', 'belum']);
            $table->enum('merokok', ['ya', 'tidak'])->nullable();
            $table->enum('memiliki_penyakit', ['ya', 'tidak']);
            $table->string('nama_penyakit')->nullable();
            $table->enum('perlu_penanganan_khusus', ['ya', 'tidak']);
            $table->enum('perlu_kursi_roda', ['ya', 'tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_pendaftar');
    }
};
