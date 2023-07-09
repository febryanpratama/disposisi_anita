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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('anggota_id')->nullable();
            $table->string('judul_permohonan');
            $table->string('deskripsi_permohonan');
            $table->string('tanggal_pelaksanaan');
            $table->string('lokasi_pelaksanaan');
            $table->string('jumlah_biaya');
            $table->string('jenis_pemohon');
            $table->string('dokumen_proposal')->nullable();
            $table->string('surat_keterangan_domisili')->nullable();
            $table->string('surat_rekomendasi_kecamatan')->nullable();
            $table->string('surat_pernyataan_konflik')->nullable();
            $table->string('surat_duplikasi_biaya')->nullable();
            $table->string('rekening')->nullable();
            $table->string('surat_pernyataan_lembaga')->nullable();
            // $table->string('dokumen_proposal')->nullable();
            // $table->string('surat_keterangan')->nullable();
            // $table->string('surat_rekomendasi')->nullable();
            $table->enum('status', ['TU Umum', 'Verifikator', 'Setda', 'Walikota']);
            $table->enum('is_status', ['1', '0', '2'])->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('proposals');
    }
};
