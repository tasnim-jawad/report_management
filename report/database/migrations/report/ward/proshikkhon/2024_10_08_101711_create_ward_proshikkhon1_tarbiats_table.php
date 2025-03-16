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
        Schema::create('ward_proshikkhon1_tarbiats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->integer('unit_tarbiati_boithok')->unsigned()->nullable();
            $table->integer('unit_tarbiati_boithok_target')->unsigned()->nullable();
            $table->integer('unit_tarbiati_boithok_uposthiti')->unsigned()->nullable();

            $table->integer('ward_kormi_sikkha_boithok')->unsigned()->nullable();
            $table->integer('ward_kormi_sikkha_boithok_target')->unsigned()->nullable();
            $table->integer('ward_kormi_sikkha_boithok_uposthiti')->unsigned()->nullable();

            $table->integer('urdhotono_sikkha_shibir')->unsigned()->nullable();
            $table->integer('urdhotono_sikkha_shibir_target')->unsigned()->nullable();
            $table->integer('urdhotono_sikkha_shibir_uposthiti')->unsigned()->nullable();

            $table->integer('urdhotono_sikkha_boithok')->unsigned()->nullable();
            $table->integer('urdhotono_sikkha_boithok_target')->unsigned()->nullable();
            $table->integer('urdhotono_sikkha_boithok_uposthiti')->unsigned()->nullable();

            $table->integer('gono_sikkha_boithok')->unsigned()->nullable();
            $table->integer('gono_sikkha_boithok_target')->unsigned()->nullable();
            $table->integer('gono_sikkha_boithok_uposthiti')->unsigned()->nullable();

            $table->integer('gono_noisho_ibadot')->unsigned()->nullable();
            $table->integer('gono_noisho_ibadot_target')->unsigned()->nullable();
            $table->integer('gono_noisho_ibadot_uposthiti')->unsigned()->nullable();

            $table->integer('alochona_chokro_group')->unsigned()->nullable();
            $table->integer('alochona_chokro_program')->unsigned()->nullable();
            $table->integer('alochona_chokro_uposthiti')->unsigned()->nullable();

            $table->integer('darsul_quran_program')->unsigned()->nullable();
            $table->integer('darsul_quran_uposthiti')->unsigned()->nullable();

            $table->integer('sohih_tilawat_program')->unsigned()->nullable();
            $table->integer('sohih_tilawat_uposthiti')->unsigned()->nullable();

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
        Schema::dropIfExists('ward_proshikkhon1_tarbiats');
    }
};
