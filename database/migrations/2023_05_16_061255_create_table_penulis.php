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
        Schema::create('table_penulis', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string("name")->nullable(false);
            $table->enum("status_user" , [1 , 0])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_penulis');
    }
};
