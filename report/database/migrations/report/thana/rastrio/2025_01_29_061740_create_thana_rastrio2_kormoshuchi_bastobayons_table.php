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
        Schema::create('thana_rastrio2_kormoshuchi_bastobayons', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('centrally_announced_political_program')->nullable();
            $table->bigInteger('centrally_announced_political_program_attend')->nullable();

            $table->bigInteger('locally_announced_jonoshova')->nullable();
            $table->bigInteger('locally_announced_jonoshova_attend')->nullable();

            $table->bigInteger('locally_announced_shomabesh')->nullable();
            $table->bigInteger('locally_announced_shomabesh_attend')->nullable();

            $table->bigInteger('locally_announced_michil')->nullable();
            $table->bigInteger('locally_announced_michil_attend')->nullable();

            $table->bigInteger('poster_bitoron')->nullable();
            $table->bigInteger('leaflet_bitoron')->nullable();
            $table->bigInteger('booklet_bitoron')->nullable();
            $table->bigInteger('sharoklipi_bitoron')->nullable();
            $table->bigInteger('others')->nullable();

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
        Schema::dropIfExists('thana_rastrio2_kormoshuchi_bastobayons');
    }
};
