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
        Schema::create('dokumen_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pendaftaran_id');
            $table->string('image');
            $table->string('bukti_tabungan');
            $table->string('bukti_setoran_bpih');
            $table->string('bukti_setoran_bipij');
            $table->string('ktp');
            $table->string('kk');
            $table->string('akte');
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
        Schema::dropIfExists('dokumen_pendaftar');
    }
};
