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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('no_pembayaran', 20)->unique();
            $table->date('tanggal');
            $table->enum('tipe', ['Penerimaan', 'Pengeluaran']);
            $table->string('sumber_type', 50)->nullable();
            $table->unsignedBigInteger('sumber_id')->nullable();
            $table->foreignId('pelanggan_id')->nullable()->constrained('pelanggans')->nullOnDelete();
            $table->foreignId('pemasok_id')->nullable()->constrained('pemasoks')->nullOnDelete();
            $table->decimal('jumlah', 15, 2)->default(0);
            $table->enum('metode', ['Tunai', 'Transfer', 'Cek', 'Giro']);
            $table->string('no_referensi', 50)->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
};
