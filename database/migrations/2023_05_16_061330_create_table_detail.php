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
        Schema::create('table_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("artikel_id")->nullable(false);
            $table->unsignedBigInteger("komentar_id")->nullable(false);
            $table->foreign("artikel_id")->references("id")->on("table_artikel")->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("komentar_id")->references("id")->on("table_komentar")->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_detail');
    }
};
