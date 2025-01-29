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
        Schema::create('dawat4_gono_songjog_and_dawat_ovijans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('total_gono_songjog_group')->nullable();
            $table->bigInteger('total_attended')->nullable();
            $table->bigInteger('how_many_have_been_invited')->nullable();
            $table->bigInteger('how_many_associate_members_created')->nullable();

            $table->bigInteger('jela_mohanogor_declared_gonosonjog_group')->nullable();
            $table->bigInteger('jela_mohanogor_declared_gonosonjog_attended')->nullable();
            $table->bigInteger('jela_mohanogor_declared_gonosonjog_invited')->nullable();
            $table->bigInteger('jela_mohanogor_declared_gonosonjog_associated_created')->nullable();

            // $table->bigInteger('election_gono_songjog_group')->nullable();
            // $table->bigInteger('election_attended')->nullable();
            // $table->bigInteger('election_how_many_have_been_invited')->nullable();
            // $table->bigInteger('election_how_many_associate_members_created')->nullable();

            // $table->bigInteger('olama_gono_songjog_group')->nullable();
            // $table->bigInteger('olama_attended')->nullable();
            // $table->bigInteger('olama_how_many_have_been_invited')->nullable();
            // $table->bigInteger('olama_how_many_associate_members_created')->nullable();

            // $table->bigInteger('other_gono_songjog_group')->nullable();
            // $table->bigInteger('other_attended')->nullable();
            // $table->bigInteger('other_how_many_have_been_invited')->nullable();
            // $table->bigInteger('other_how_many_associate_members_created')->nullable();

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
        Schema::dropIfExists('dawat4_gono_songjog_and_dawat_ovijans');
    }
};
