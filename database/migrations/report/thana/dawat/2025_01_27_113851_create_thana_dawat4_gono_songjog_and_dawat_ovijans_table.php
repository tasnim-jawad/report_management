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

            $table->bigInteger('gono_songjog_doshok_group_man')->nullable();
            $table->bigInteger('gono_songjog_doshok_attended_man')->nullable();
            $table->bigInteger('gono_songjog_doshok_invited_man')->nullable();
            $table->bigInteger('gono_songjog_doshok_associate_members_created_man')->nullable();

            $table->bigInteger('gono_songjog_doshok_group_woman')->nullable();
            $table->bigInteger('gono_songjog_doshok_attended_woman')->nullable();
            $table->bigInteger('gono_songjog_doshok_invited_woman')->nullable();
            $table->bigInteger('gono_songjog_doshok_associate_members_created_woman')->nullable();

            $table->bigInteger('gono_songjog_pokkho_group_man')->nullable();
            $table->bigInteger('gono_songjog_pokkho_attended_man')->nullable();
            $table->bigInteger('gono_songjog_pokkho_invited_man')->nullable();
            $table->bigInteger('gono_songjog_pokkho_associate_members_created_man')->nullable();

            $table->bigInteger('gono_songjog_pokkho_group_woman')->nullable();
            $table->bigInteger('gono_songjog_pokkho_attended_woman')->nullable();
            $table->bigInteger('gono_songjog_pokkho_invited_woman')->nullable();
            $table->bigInteger('gono_songjog_pokkho_associate_members_created_woman')->nullable();

            $table->bigInteger('jela_declared_gonosonjog_dawati_ovi_group')->nullable();
            $table->bigInteger('jela_declared_gonosonjog_dawati_ovi_attended')->nullable();
            $table->bigInteger('jela_declared_gonosonjog_dawati_ovi_invited')->nullable();
            $table->bigInteger('jela_declared_gonosonjog_dawati_ovi_associated_created')->nullable();

            $table->bigInteger('mohanogor_declared_gonosonjog_dawati_ovi_group')->nullable();
            $table->bigInteger('mohanogor_declared_gonosonjog_dawati_ovi_attended')->nullable();
            $table->bigInteger('mohanogor_declared_gonosonjog_dawati_ovi_invited')->nullable();
            $table->bigInteger('mohanogor_declared_gonosonjog_dawati_ovi_associated_crt_man')->nullable();
            $table->bigInteger('mohanogor_declared_gonosonjog_dawati_ovi_associated_crt_woman')->nullable();

            $table->bigInteger('election_gono_songjog_group_man')->nullable();
            $table->bigInteger('election_attended_man')->nullable();
            $table->bigInteger('election_how_many_have_been_invited_man')->nullable();
            $table->bigInteger('election_how_many_associate_members_created_man')->nullable();

            $table->bigInteger('election_gono_songjog_group_woman')->nullable();
            $table->bigInteger('election_attended_woman')->nullable();
            $table->bigInteger('election_how_many_have_been_invited_woman')->nullable();
            $table->bigInteger('election_how_many_associate_members_created_woman')->nullable();

            $table->bigInteger('ulama_gono_songjog_group_man')->nullable();
            $table->bigInteger('ulama_attended_man')->nullable();
            $table->bigInteger('ulama_how_many_have_been_invited_man')->nullable();
            $table->bigInteger('ulama_how_many_associate_members_created_man')->nullable();

            $table->bigInteger('ulama_gono_songjog_group_woman')->nullable();
            $table->bigInteger('ulama_attended_woman')->nullable();
            $table->bigInteger('ulama_how_many_have_been_invited_woman')->nullable();
            $table->bigInteger('ulama_how_many_associate_members_created_woman')->nullable();

            $table->bigInteger('peshajibi_gono_songjog_group_man')->nullable();
            $table->bigInteger('peshajibi_attended_man')->nullable();
            $table->bigInteger('peshajibi_how_many_have_been_invited_man')->nullable();
            $table->bigInteger('peshajibi_how_many_associate_members_created_man')->nullable();

            $table->bigInteger('peshajibi_gono_songjog_group_woman')->nullable();
            $table->bigInteger('peshajibi_attended_woman')->nullable();
            $table->bigInteger('peshajibi_how_many_have_been_invited_woman')->nullable();
            $table->bigInteger('peshajibi_how_many_associate_members_created_woman')->nullable();





            $table->bigInteger('other_gono_songjog_group')->nullable();
            $table->bigInteger('other_attended')->nullable();
            $table->bigInteger('other_how_many_have_been_invited')->nullable();
            $table->bigInteger('other_how_many_associate_members_created_man')->nullable();
            $table->bigInteger('other_how_many_associate_members_created_woman')->nullable();

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
