<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
 { 
 Schema::create('barang', function (Blueprint $table) {
 $table->string('id', 255);
 $table->string('namabarang',255);
 $table->string('deskripsi',255);
 $table->string('serialnumber',255);
 $table->year('tahun');
 $table->integer('jumlahbarang');
 $table->enum('satuan', ['unit', 'pcs', 'set']);
 $table->enum('kondisi', ['baik', 'kurangbaik', 'rusak']);
 $table->string('keterangan', 255);
 $table->enum('jenisbarang', ['laptop','storage','server','desktop','monitor','telekomunikasi','handphone','aksesoris','perangkatjaringan','elektronik']);
 $table->enum('ruang',['1', '18', 'site']);
 $table->enum('status', ['ready','keluar','rusak','stay','dalamperbaikan','hilang'])->default('ready');
 $table->timestamps();
 $table->primary('id');
 });
 }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
