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
        Schema::create('praktikums', function (Blueprint $table) {
            $table->uuid('id')->primary();
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
            $table->foreignUuid('penjadwalan_id')->references('id')
                ->on('penjadwalans')
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
        Schema::dropIfExists('praktikums');
    }
};