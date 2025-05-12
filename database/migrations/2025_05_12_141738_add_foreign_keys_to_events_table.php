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
        Schema::table('events', function (Blueprint $table) {
           
            
            
            
            // 3. Clé étrangère vers la table locations (lieu de l'événement)
            $table->unsignedBigInteger('place_id')->nullable();
            $table->foreign('place_id')
                  ->references('id')
                  ->on('places')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Suppression des contraintes puis des colonnes
            $table->dropForeign(['organizer_id']);
            $table->dropColumn('organizer_id');
            
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            
            $table->dropForeign(['location_id']);
            $table->dropColumn('location_id');
        });
    }
};