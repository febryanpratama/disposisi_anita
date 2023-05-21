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
        Schema::table('detail_users', function (Blueprint $table) {
            //
            $table->string('no_telp');
            $table->string('nama_pimpinan');
            $table->string('bank');
            $table->string('no_rek');
            $table->string('nama_pemilik_rek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_detail_user', function (Blueprint $table) {
            //
        });
    }
};
