<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangkeluar', function (Blueprint $table) {
            $table->string('id', 255);
            $table->string('idbarang', 255);
            $table->unsignedBigInteger('idpegawai');
            $table->enum('statuskeluar', ['keluar', 'ready'])->default('keluar');
            $table->integer('jumlahkeluar');
            $table->date('tanggal');
            $table->foreign('idbarang')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idpegawai')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
