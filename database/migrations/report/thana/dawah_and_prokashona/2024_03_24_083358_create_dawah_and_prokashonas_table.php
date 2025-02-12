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
        Schema::create('thana_dawah_and_prokashonas', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->unsigned()->nullable();
            // Pathagar (Library) Related
            $table->bigInteger('total_pathagar_increase')->nullable();
            $table->bigInteger('total_pathagar_target')->nullable();

            // Online Library Related
            $table->bigInteger('total_online_library_increase')->nullable();
            $table->bigInteger('total_online_library_target')->nullable();

            // Online Pathagar (Library) Related
            $table->bigInteger('total_online_pathagar_increase')->nullable();
            $table->bigInteger('total_online_pathagar_target')->nullable();

            // Books in Pathagar (Library)
            $table->bigInteger('books_in_pathagar')->nullable();
            $table->bigInteger('books_in_pathagar_increase')->nullable();
            $table->bigInteger('books_in_pathagar_target')->nullable();

            // Books in Online Library
            $table->bigInteger('books_in_online_library_increase')->nullable();
            $table->bigInteger('books_in_online_library_target')->nullable();

            // Book Distribution Related
            $table->bigInteger('book_distribution')->nullable();

            // Unit Book Distribution Center Related
            $table->bigInteger('unit_book_distribution_center_increase')->nullable();
            $table->bigInteger('unit_book_distribution_center_target')->nullable();

            // Unit Book Distribution
            $table->bigInteger('unit_book_distribution')->nullable();
            $table->bigInteger('unit_book_distribution_target')->nullable();

            // Ward Book Sales Center Related
            $table->bigInteger('ward_book_sales_center_increase')->nullable();

            // Book Sales and Distribution
            $table->bigInteger('ward_book_sales')->nullable();
            $table->bigInteger('soft_copy_book_distribution')->nullable();
            $table->bigInteger('dawat_link_distribution')->nullable();

            // Other Increases
            $table->bigInteger('sonar_bangla_increase')->nullable();
            $table->bigInteger('songram_increase')->nullable();
            $table->bigInteger('prithibi_increase')->nullable();

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
        Schema::dropIfExists('dawah_and_prokashonas');
    }
};
