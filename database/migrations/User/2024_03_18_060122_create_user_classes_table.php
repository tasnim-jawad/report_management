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
        Schema::create('user_classes', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'rokon',
                'worker',
                'supporter',
                'vinnodhormabolombi_worker',
                'vinnodhormabolombi_supporter'
            ])->nullable();
            $table->bigInteger('user_id')->nullable();
            // $table->string('added_type',50)->nullable();
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
        Schema::dropIfExists('user_classes');
    }
};
