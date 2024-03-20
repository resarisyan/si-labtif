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
        Schema::create('absensi_asistens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('asisten_id')->references('user_id')
                ->on('asistens')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('penjadwalan_id')->references('id')
                ->on('penjadwalans')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->char('pertemuan', 2);
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
        Schema::dropIfExists('absensi_asistens');
    }
};
