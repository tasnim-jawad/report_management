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
        Schema::create('dawah_and_prokashonas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            // $table->bigInteger('total_pathagar')->nullable();
            // $table->bigInteger('total_pathagar_increase')->nullable();
            // $table->bigInteger('total_pathagar_target')->nullable();

            // $table->bigInteger('total_online_pathagar')->nullable();
            // $table->bigInteger('total_online_pathagar_increase')->nullable();
            // $table->bigInteger('total_online_pathagar_target')->nullable();

            $table->bigInteger('books_in_pathagar')->nullable();
            $table->bigInteger('books_in_pathagar_increase')->nullable();
            // $table->bigInteger('books_in_pathagar_target')->nullable();

            // $table->bigInteger('books_in_online_pathagar')->nullable();
            // $table->bigInteger('books_in_online_pathagar_increase')->nullable();
            // $table->bigInteger('books_in_online_pathagar_target')->nullable();

            // $table->bigInteger('book_distribution')->nullable();
            // $table->bigInteger('book_distribution_increase')->nullable();
            // $table->bigInteger('book_distribution_target')->nullable();

            $table->bigInteger('unit_book_distribution_center')->nullable();
            $table->bigInteger('unit_book_distribution_center_increase')->nullable();
            // $table->bigInteger('unit_book_distribution_center_target')->nullable();

            $table->bigInteger('unit_book_distribution')->nullable();
            $table->bigInteger('unit_book_distribution_increase')->nullable();
            // $table->bigInteger('unit_book_distribution_target')->nullable();

            // $table->bigInteger('ward_book_sales_center')->nullable();
            // $table->bigInteger('ward_book_sales_center_increase')->nullable();

            // $table->bigInteger('ward_book_sales')->nullable();
            // $table->bigInteger('ward_book_sales_increase')->nullable();

            $table->bigInteger('soft_copy_book_distribution')->nullable();
            $table->bigInteger('soft_copy_book_distribution_increase')->nullable();

            $table->bigInteger('dawat_link_distribution')->nullable();
            $table->bigInteger('dawat_link_distribution_increase')->nullable();

            $table->bigInteger('sonar_bangla')->nullable();
            $table->bigInteger('sonar_bangla_increase')->nullable();

            $table->bigInteger('songram')->nullable();
            $table->bigInteger('songram_increase')->nullable();

            $table->bigInteger('prithibi')->nullable();
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
