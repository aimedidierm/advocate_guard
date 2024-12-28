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
        Schema::table('reports', function (Blueprint $table) {
            // Drop unused columns
            $table->dropColumn(['subject']);
            
            // Add new columns
            $table->string('type_abuse');
            $table->string('province');
            $table->string('district');
            $table->string('sector');
            $table->date('date_incident');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            // Reverse the changes
           
            $table->string('subject');
            $table->dropColumn(['type_abuse', 'province', 'district', 'sector', 'date_incident']);
        });
    }
};
