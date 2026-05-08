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
        Schema::create('saldo_akuns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perkiraan_id')->constrained('perkiraans')->cascadeOnDelete();
            $table->integer('tahun');
            $table->integer('bulan');
            $table->decimal('saldo_awal', 15, 2)->default(0);
            $table->decimal('debit', 15, 2)->default(0);
            $table->decimal('kredit', 15, 2)->default(0);
            $table->decimal('saldo_akhir', 15, 2)->default(0);
            $table->unique(['perkiraan_id', 'tahun', 'bulan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldo_akuns');
    }
};
