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
        Schema::create('registrasi_praktikums', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('mahasiswa_id')->references('user_id')
                ->on('mahasiswas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('penjadwalan_id')->references('id')
                ->on('penjadwalans')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('nilai_id')->references('id')
                ->on('nilais')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_praktikums');
    }
};
