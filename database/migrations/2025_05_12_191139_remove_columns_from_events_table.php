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
            // 1. Supprimer la contrainte de clé étrangère
            $table->dropForeign(['user_id']); // Ex: ['user_id']
            
            // 2. Supprimer la colonne
            $table->dropColumn('user_id');
            
               // 1. Supprimer la contrainte de clé étrangère
            $table->dropForeign(['event_id']); // Ex: ['user_id']
            
               // 2. Supprimer la colonne
            $table->dropColumn('event_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
};
