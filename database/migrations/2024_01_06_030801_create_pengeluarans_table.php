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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->integer('idPengeluaran', true);
            $table->integer('idUser');
            $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade');
            // $table->decimal('totalPengeluaran', 10, 2)->default(0);
            $table->decimal('nominalPengeluaran', 30, 2)->default(0);
            $table->string('keterangan');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
