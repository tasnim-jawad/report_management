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
        Schema::create('thana_rastrio6_human_rights', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('human_rights_organizations_established')->nullable();
            $table->bigInteger('national_human_rights_organizations_local_branches_launched')->nullable();
            $table->bigInteger('international_human_rights_organizations_local_branches_launched')->nullable();

            $table->bigInteger('human_rights_activist_produced_total')->nullable();
            $table->bigInteger('human_rights_activist_produced_increase')->nullable();
            $table->bigInteger('human_rights_activist_produced_target')->nullable();

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
        Schema::dropIfExists('thana_rastrio6_human_rights');
    }
};
