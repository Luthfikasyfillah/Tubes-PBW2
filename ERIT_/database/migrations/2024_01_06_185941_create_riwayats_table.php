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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->integer('idPemasukan')->nullable();
            $table->foreign('idPemasukan')->references('idPemasukan')->on('pemasukans')->onDelete('cascade');
            $table->integer('idPengeluaran')->nullable();
            $table->foreign('idPengeluaran')->references('idPengeluaran')->on('pengeluarans')->onDelete('cascade');
            $table->decimal('nominalTabungan', 30, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
