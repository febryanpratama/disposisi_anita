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
        Schema::table('log_proposals', function (Blueprint $table) {
            //
            $table->integer('nominal_disetujui_walikota')->nullable();
            $table->text('catatan_walikota')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_proposals', function (Blueprint $table) {
            //

        });
    }
};
