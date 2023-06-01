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
        Schema::create('versenyzok', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('rajtszam')->unique();
            $table->string('nev');
            $table->date('szuldatum')->nullable();
            $table->string('nem');
            $table->integer('tavokId');
            $table->string('korosztaly')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table');
    }
};
