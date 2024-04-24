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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('no_asset')->unique();
            $table->string('nama_barang');
            $table->string('kategoriasset_id');
            $table->string('no_serial')->unique();
            $table->string('lokasi_id');
            $table->string('merk');
            $table->string('model');
            $table->enum('status',['DI GUNAKAN','RUKSAK']);
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
        Schema::dropIfExists('assets');
    }
};
