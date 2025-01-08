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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->boolean("objective")->default(false);
            $table->boolean("goals")->default(false);
            $table->boolean("target_audience")->default(false);
            $table->boolean("budget_resources")->default(false);
            $table->unsignedBigInteger("campaign_id");
            $table->foreign("campaign_id")
                ->references("id")
                ->on("campaigns")
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
