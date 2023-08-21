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
        Schema::create('paspor_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pendaftaran_id');
            $table->string('no_paspor');
            $table->string('tempat_paspor_terbit');
            $table->date('tanggal_paspor_dibuat');
            $table->date('tanggal_akhir_paspor');
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
        Schema::dropIfExists('paspor_pendaftar');
    }
};
