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
        Schema::create('penjadwalans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('asisten_1_id')->references('user_id')
                ->on('asistens')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('asisten_2_id')->references('user_id')
                ->on('asistens')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->enum('hari', ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU']);
            $table->time('jam_mulai');
            $table->time('jam_berakhir');
            $table->foreignUuid('mata_praktikum_id')->references('id')
                ->on('mata_praktikums')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('kelas_id')->references('id')
                ->on('kelas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('ruangan_id')->references('id')
                ->on('ruangans')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('periode_id')->references('id')
                ->on('periodes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjadwalans');
    }
};
