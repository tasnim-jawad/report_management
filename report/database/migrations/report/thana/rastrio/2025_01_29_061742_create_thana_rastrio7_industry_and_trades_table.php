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
        Schema::create('thana_rastrio7_industry_and_trades', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('business_association_election')->nullable();
            $table->bigInteger('business_association_number_of_post')->nullable();
            $table->bigInteger('business_association_participated')->nullable();
            $table->bigInteger('business_association_elected')->nullable();

            $table->bigInteger('market_committee_election')->nullable();
            $table->bigInteger('market_committee_number_of_post')->nullable();
            $table->bigInteger('market_committee_participated')->nullable();
            $table->bigInteger('market_committee_elected')->nullable();

            $table->bigInteger('other_election')->nullable();
            $table->bigInteger('other_number_of_post')->nullable();
            $table->bigInteger('other_participated')->nullable();
            $table->bigInteger('other_elected')->nullable();

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
        Schema::dropIfExists('thana_rastrio7_industry_and_trades');
    }
};
