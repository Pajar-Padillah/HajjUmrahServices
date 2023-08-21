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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('no_pendaftaran')->unique();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->enum('jenis_daftar', ['haji', 'umroh']);
            $table->date('tanggal_pendaftaran');
            $table->date('tanggal_berangkat');
            $table->enum('fasilitas_kamar', ['double', 'triple', 'quad']);
            $table->enum('status_pendaftaran', ['proses', 'diterima', 'ditolak']);
            $table->string('keterangan');
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
        Schema::dropIfExists('pendaftaran');
    }
};
