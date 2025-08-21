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
        Schema::create('proizvodna_tura', function (Blueprint $table) {
            $table->id();
            $table->string('naziv_ture');
            $table->string('vrsta_grozdja');
            $table->integer('kolicina');
            $table->date('datum_branja');
            $table->string('status'); // možeš char/string, izbegavaj enum
            $table->date('datum_pocetka_fermentacije')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proizvodna_tura');
    }
};
