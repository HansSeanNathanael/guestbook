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
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->uuid("id");
            $table->string('nama');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->dateTime('tanggal_kunjungan');
            $table->string('instansi')->nullable();
            $table->mediumText('tanda_tangan')->nullable();
            $table->string('tujuan_kunjungan');
            $table->boolean('deleted');
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
        Schema::dropIfExists('kunjungan');
    }
};
