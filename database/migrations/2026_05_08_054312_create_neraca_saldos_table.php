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
        Schema::create('neraca_saldos', function (Blueprint $table) {
            $table->id();
            $table->integer('periode_bulan');
            $table->integer('periode_tahun');
            $table->foreignId('perkiraan_id')->constrained('perkiraans')->cascadeOnDelete();
            $table->decimal('saldo_debit', 15, 2)->default(0);
            $table->decimal('saldo_kredit', 15, 2)->default(0);
            $table->unique(['periode_bulan', 'periode_tahun', 'perkiraan_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neraca_saldos');
    }
};
