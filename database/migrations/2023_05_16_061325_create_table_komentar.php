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
        Schema::create('table_komentar', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(false);
            $table->string("isi_komentar")->nullable(false);
            $table->string('email')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_komentar');
    }
};
