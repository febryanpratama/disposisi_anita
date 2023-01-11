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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nomor_surat');
            $table->string('asal_surat');
            $table->string('tujuan_surat');
            $table->string('perihal');
            $table->string('sifat');
            $table->string('ringkasan');
            $table->string('keterangan');
            $table->date('tanggal_diterima');
            $table->date('tanggal_distribusi');
            $table->string('gambar_surat');
            $table->enum('status', ['Dikirim', 'Verifikasi', 'Diterima', 'Ditolak']);
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
        Schema::dropIfExists('surats');
    }
};
