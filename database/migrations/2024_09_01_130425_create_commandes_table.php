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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entreprise_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('fournisseur_id')->constrained('users')->onDelete('cascade');
            $table->string('designation');
            $table->string('description')->nullable();
            $table->integer('quantite');
            $table->date('delai_de_livraison');
            $table->string('status')->default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
