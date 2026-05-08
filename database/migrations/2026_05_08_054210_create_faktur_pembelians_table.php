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
        Schema::create('faktur_pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('no_faktur', 20)->unique();
            $table->date('tanggal');
            $table->foreignId('pemasok_id')->constrained('pemasoks')->cascadeOnDelete();
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('diskon', 15, 2)->default(0);
            $table->decimal('ppn', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);
            $table->enum('status', ['Draft', 'Confirmed', 'Received', 'Void']);
            $table->enum('status_bayar', ['Belum Bayar', 'Sebagian', 'Lunas']);
            $table->date('jatuh_tempo')->nullable();
            $table->text('keterangan')->nullable();
            $table->foreignId('jurnal_id')->nullable()->constrained('jurnal_umums')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur_pembelians');
    }
};
