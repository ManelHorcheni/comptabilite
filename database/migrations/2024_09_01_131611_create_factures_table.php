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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entreprise_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('fournisseur_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('livraison_id')->constrained('livraisons')->onDelete('cascade');
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');
            $table->integer('prix_unitaire');
            $table->integer('montant');
            $table->integer('remise')->nullable();
            $table->integer('montant_total');
            $table->string('mode_de_paiement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
