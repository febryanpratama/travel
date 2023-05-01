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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->integer('rental_id');
            $table->string('tipe_mobil');
            $table->string('merk_mobil');
            $table->string('nama_mobil');
            $table->string('transmisi_mobil');
            $table->string('kapasitas_mobil');
            $table->string('warna_mobil');
            $table->string('jenis_bbm');
            $table->string('fasilitas_mobil');
            $table->string('plat_mobil');
            $table->string('harga_sewa_mobil');
            $table->string('foto_mobil');
            $table->string('keterangan_mobil');
            $table->enum('status_mobil', ['tersedia', 'tidak tersedia']);
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
        Schema::dropIfExists('mobils');
    }
};
