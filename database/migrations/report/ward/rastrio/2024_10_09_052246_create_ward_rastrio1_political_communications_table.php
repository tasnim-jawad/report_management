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
        Schema::create('ward_rastrio1_political_communications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->bigInteger('rajnoitik_bekti_jogajog_koreche_kotojon')->nullable();
            $table->bigInteger('rajnoitik_bekti_jogajog_koreche_kotojonke')->nullable();

            $table->bigInteger('proshoshonik_bekti_jogajog_koreche_kotojon')->nullable();
            $table->bigInteger('proshoshonik_bekti_jogajog_koreche_kotojonke')->nullable();

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
        Schema::dropIfExists('ward_rastrio1_political_communications');
    }
};
