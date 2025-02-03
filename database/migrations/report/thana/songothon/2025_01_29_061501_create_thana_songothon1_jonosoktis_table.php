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
        Schema::create('thana_songothon1_jonosoktis', function (Blueprint $table) {
            $table->id();
            // Report Reference ID
            $table->bigInteger('report_info_id')->nullable();

            // Rokon Briddhi (Membership Growth)
            $table->bigInteger('rokon_briddhi_manonnoyon')->nullable();
            $table->bigInteger('rokon_briddhi_agoto')->nullable();
            $table->bigInteger('rokon_gatti')->nullable();
            $table->bigInteger('rokon_target')->nullable();

            // Worker Growth
            $table->bigInteger('worker_briddhi')->nullable();
            $table->bigInteger('worker_gatti')->nullable();
            $table->bigInteger('worker_target')->nullable();

            // Common Fields
            $table->bigInteger('creator')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thana_songothon1_jonosoktis');
    }
};
