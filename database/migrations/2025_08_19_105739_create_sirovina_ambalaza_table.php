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
        Schema::create('sirovina_ambalaza', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->string('tip'); // Ambalaža ili Sirovina
            $table->integer('kolicina_na_stanju');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sirovina_ambalaza');
    }
};
