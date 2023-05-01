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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_pemilik');
            $table->string('nama_rental');
            $table->bigInteger('no_ijin_usaha');
            $table->text('alamat');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('foto_rental');
            $table->softDeletes();
            // $table->string('longitude');
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
        Schema::dropIfExists('rentals');
    }
};
