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
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->integer('idPemasukan', true);
            $table->integer('idUser')->default(0);
            $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade');
            // $table->decimal('totalPemasukan', 10, 2)->default(0);
            $table->decimal('nominalPemasukan', 10, 2)->default(0);
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
        Schema::dropIfExists('pemasukans');
    }
};
