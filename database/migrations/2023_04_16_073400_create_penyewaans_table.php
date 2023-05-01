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
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->id();
            $table->integer('rental_id');
            $table->integer('customer_id');
            $table->integer('mobil_id');
            $table->integer('supir_id')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('total_hari');
            $table->integer('harga');
            $table->integer('total_harga');
            $table->enum('is_status', ['Keranjang',  'Dalam Persiapan', 'Sedang Digunakan', 'Sudah Dikembalikan'])->default('Keranjang');
            // $table->enum('is_status', )

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
        Schema::dropIfExists('penyewaans');
    }
};
