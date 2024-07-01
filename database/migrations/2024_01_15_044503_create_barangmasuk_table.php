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
        Schema::create('barangmasuk', function (Blueprint $table) {
            $table->string('id', 255);
            $table->string('idkeluar', 255);
            $table->integer('jumlahmasuk');
            $table->enum('statusmasuk', ['ready'])->default('ready');
            $table->date('tanggal');
            $table->foreign('idkeluar')->references('id')->on('barangkeluar')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
