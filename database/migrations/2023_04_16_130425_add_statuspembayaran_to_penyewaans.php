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
        Schema::table('penyewaans', function (Blueprint $table) {
            //
            $table->enum('is_pembayaran', ['Belum Dibayar', 'Lunas', 'Belum Lunas',])->default('Belum Dibayar')->after('is_status');
            $table->string('kd_invoice')->nullable()->before('tanggal_mulai');
            $table->integer('pembayaran_awal')->nullable()->after('total_harga');
            $table->integer('sisa_pembayaran')->nullable()->after('pembayaran_awal');
            $table->integer('total_pembayaran')->after('sisa_pembayaran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penyewaans', function (Blueprint $table) {
            //
        });
    }
};
