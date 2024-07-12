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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('namapegawai', 255);
            $table->string('nip', 255)->unique();
            $table->enum('jabatan', ['ceo','director','securityanalyst','reporting','ssm','hr','financeaccounting','operational','salesmarketing']);
            $table->enum('divisi',['all','tehnikal','training','finance','hr','operational']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
