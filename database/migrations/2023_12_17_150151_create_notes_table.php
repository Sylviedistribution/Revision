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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->decimal("valeur");
            $table->unsignedBigInteger("etudiants_id");
            $table->unsignedBigInteger("matieres_id");
            $table->foreign("etudiants_id")-> references("id") -> on ("etudiants");
            $table->foreign("matieres_id")-> references("id") -> on ("matieres");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes_tables');
    }
};
