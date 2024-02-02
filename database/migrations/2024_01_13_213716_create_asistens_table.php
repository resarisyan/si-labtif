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
        Schema::create('asistens', function (Blueprint $table) {
            $table->foreignUuid('user_id')->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->primary();
            $table->enum('jabatan', ['BENDAHARA', 'KOORDINATOR LAB', 'KOORDINATOR TEKNIS', 'WAKIL KOORDINATOR TEKNIS', 'PJ DASAR', 'PJ JARKOM', 'PJ MULTI', 'SEKRETARIS', 'ANGGOTA']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistens');
    }
};
