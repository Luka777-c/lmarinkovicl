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
        Schema::create('zadatak', function (Blueprint $table) {
            $table->id();
            $table->text('opis');
            $table->string('status'); 
            $table->date('datum_dodele');
            $table->date('datum_zavrsetka')->nullable();
        
            // FK ka users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
            // FK ka proizvodna_tura (proveri da li ti je tabela "proizvodna_tura" ili "proizvodne_ture")
            $table->foreignId('tura_id')->constrained('proizvodna_tura')->onDelete('cascade');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zadatak');
    }
};
