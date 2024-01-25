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
        Schema::create('absensi_mahasiswas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('praktikum_id')->references('id')
                ->on('praktikums')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->char('pertemuan', 2);
            $table->foreignUuid('mahasiswa_id')->references('user_id')
                ->on('mahasiswas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->enum('status', ['Hadir', 'Tidak Hadir']);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_mahasiswas');
    }
};
