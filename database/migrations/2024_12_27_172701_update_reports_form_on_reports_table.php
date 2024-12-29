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
            $table->dropColumn(['victim']);
            $table->dropColumn(['location']);
            $table->dropColumn(['when']);
            $table->dropColumn(['leaning']);
            $table->dropColumn(['category']);

            // Add new columns
            $table->string('type_abuse')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('sector')->nullable();
            $table->date('date_incident')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['type_abuse', 'province', 'district', 'sector', 'date_incident']);
        });
    }
};
