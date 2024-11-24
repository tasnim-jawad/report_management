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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();
            $table->string('table_name')->nullable();
            $table->bigInteger('table_row_id')->nullable();
            $table->string('column_name')->nullable();
            $table->enum('org_type', ['unit', 'ward', 'thana', 'city'])->nullable();
            $table->date('month_year')->nullable();
            $table->bigInteger('commenter_id')->nullable();
            $table->string('commenter_responsibility_name')->nullable();
            $table->string('comment')->nullable();

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
        Schema::dropIfExists('comments');
    }
};
