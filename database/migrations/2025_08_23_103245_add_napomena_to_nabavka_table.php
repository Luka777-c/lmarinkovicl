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
        Schema::table('nabavka', function (Blueprint $table) {
            $table->text('napomena')->nullable()->after('dobavljac');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nabavka', function (Blueprint $table) {
            $table->dropColumn('napomena');
        });
    }
};
