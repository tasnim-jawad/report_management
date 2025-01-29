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
        Schema::create('thana_dawat4_gono_songjog_and_dawat_ovijans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('total_gono_songjog_group_man')->nullable();
            $table->bigInteger('total_attended_man')->nullable();
            $table->bigInteger('how_many_have_been_invited_man')->nullable();
            $table->bigInteger('how_many_associate_members_created_man')->nullable();


            $table->bigInteger('total_gono_songjog_group_woman')->nullable();
            $table->bigInteger('total_attended_woman')->nullable();
            $table->bigInteger('how_many_have_been_invited_woman')->nullable();
            $table->bigInteger('how_many_associate_members_created_woman')->nullable();

            $table->bigInteger('jela_mohanogor_declared_gonosonjog_group')->nullable();
            $table->bigInteger('jela_mohanogor_declared_gonosonjog_attended')->nullable();
            $table->bigInteger('jela_mohanogor_declared_gonosonjog_invited')->nullable();
            $table->bigInteger('jela_mohanogor_declared_gonosonjog_associated_created')->nullable();

            $table->bigInteger('election_gono_songjog_group_man')->nullable();
            $table->bigInteger('election_attended_man')->nullable();
            $table->bigInteger('election_how_many_have_been_invited_man')->nullable();
            $table->bigInteger('election_how_many_associate_members_created_man')->nullable();

            $table->bigInteger('election_gono_songjog_group_woman')->nullable();
            $table->bigInteger('election_attended_woman')->nullable();
            $table->bigInteger('election_how_many_have_been_invited_woman')->nullable();
            $table->bigInteger('election_how_many_associate_members_created_woman')->nullable();

            $table->bigInteger('ulama_peshajibi_gono_songjog_group_man')->nullable();
            $table->bigInteger('ulama_peshajibi_attended_man')->nullable();
            $table->bigInteger('ulama_peshajibi_how_many_have_been_invited_man')->nullable();
            $table->bigInteger('ulama_peshajibi_how_many_associate_members_created_man')->nullable();

            $table->bigInteger('ulama_peshajibi_gono_songjog_group_woman')->nullable();
            $table->bigInteger('ulama_peshajibi_attended_woman')->nullable();
            $table->bigInteger('ulama_peshajibi_how_many_have_been_invited_woman')->nullable();
            $table->bigInteger('ulama_peshajibi_how_many_associate_members_created_woman')->nullable();

            $table->bigInteger('other_gono_songjog_group')->nullable();
            $table->bigInteger('other_attended')->nullable();
            $table->bigInteger('other_how_many_have_been_invited')->nullable();
            $table->bigInteger('other_how_many_associate_members_created')->nullable();

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
        Schema::dropIfExists('thana_dawat4_gono_songjog_and_dawat_ovijans');
    }
};
