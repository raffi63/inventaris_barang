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
        Schema::create('logbarang', function (Blueprint $table) {
            $table->id();
            $table->string('idbarang', 255);
            $table->enum('statuslama',['ready','keluar','rusak','stay','dalamperbaikan','gantibaru','kembali','belumkembali','hilang','kembalikurang']);
            $table->enum('statusbaru',['ready','keluar','rusak','stay','dalamperbaikan','gantibaru','kembali','belumkembali','hilang','kembalikurang']);
            $table->date('logtanggal');
            $table->foreign('idbarang')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_barang');
    }
};
