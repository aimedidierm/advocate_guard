<?php

use App\Enums\CampaignStage;
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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('objective');
            $table->text('goals');
            $table->text('target_audience');
            $table->text('budget_resources');
            $table->string('timeline');
            $table->text('role_responsibilities');
            $table->string('stage')->default(CampaignStage::PLANNING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
