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
        Schema::create('tabungans', function (Blueprint $table) {
            $table->integer('idTabungan', true);
            $table->integer('idUser');
            $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade');
            $table->string('namaTabungan', 30);
            $table->decimal('targetTabungan', 30, 2)->default(0);
            $table->string('rencanaPengisian', 30);
            $table->decimal('nominalPengisian', 30, 2)->default(0);
            $table->decimal('jumlahTabungan', 30, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungans');
    }
};
