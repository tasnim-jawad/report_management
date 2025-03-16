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
        Schema::create('thana_songothon8_associate_and_side_organizations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('total_trade_union')->nullable();
            $table->bigInteger('total_trade_union_increase')->nullable();
            $table->bigInteger('total_trade_union_gatti')->nullable();

            $table->bigInteger('total_trust')->nullable();
            $table->bigInteger('total_trust_increase')->nullable();
            $table->bigInteger('total_trust_gatti')->nullable();

            $table->bigInteger('total_foundation')->nullable();
            $table->bigInteger('total_foundation_increase')->nullable();
            $table->bigInteger('total_foundation_gatti')->nullable();

            $table->bigInteger('total_societie')->nullable();
            $table->bigInteger('total_societie_increase')->nullable();
            $table->bigInteger('total_societie_gatti')->nullable();

            $table->string('creator')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thana_songothon8_associate_and_side_organizations');
    }
};
