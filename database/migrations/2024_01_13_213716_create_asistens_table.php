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
            $table->enum('jabatan', ['KETUA', 'SEKRETARIS', 'ANGGOTA', 'BENDAHARA']);
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
