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
        Schema::create('buku_besars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perkiraan_id')->constrained('perkiraans')->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('no_ref', 50)->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('debit', 15, 2)->default(0);
            $table->decimal('kredit', 15, 2)->default(0);
            $table->decimal('saldo', 15, 2)->default(0);
            $table->foreignId('jurnal_detail_id')->constrained('jurnal_details')->cascadeOnDelete();
            $table->enum('posisi', ['Debit', 'Kredit']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_besars');
    }
};
