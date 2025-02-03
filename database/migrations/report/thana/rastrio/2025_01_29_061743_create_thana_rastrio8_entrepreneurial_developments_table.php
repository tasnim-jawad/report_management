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
        Schema::create('thana_rastrio8_entrepreneurial_developments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('krishi_uddogta_toiri_total')->nullable();
            $table->bigInteger('krishi_uddogta_toiri_increase')->nullable();
            $table->bigInteger('krishi_uddogta_toiri_target')->nullable();

            $table->bigInteger('sheba_uddogta_toiri_total')->nullable();
            $table->bigInteger('sheba_uddogta_toiri_increase')->nullable();
            $table->bigInteger('sheba_uddogta_toiri_target')->nullable();

            $table->bigInteger('shilpo_uddogta_toiri_total')->nullable();
            $table->bigInteger('shilpo_uddogta_toiri_increase')->nullable();
            $table->bigInteger('shilpo_uddogta_toiri_target')->nullable();

            $table->bigInteger('banijjo_uddogta_toiri_total')->nullable();
            $table->bigInteger('banijjo_uddogta_toiri_increase')->nullable();
            $table->bigInteger('banijjo_uddogta_toiri_target')->nullable();

            $table->bigInteger('other_uddogta_toiri_total')->nullable();
            $table->bigInteger('other_uddogta_toiri_increase')->nullable();
            $table->bigInteger('other_uddogta_toiri_target')->nullable();

            $table->bigInteger('other_total')->nullable();
            $table->bigInteger('other_increase')->nullable();
            $table->bigInteger('other_target')->nullable();

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
        Schema::dropIfExists('thana_rastrio8_entrepreneurial_developments');
    }
};
