// git hub test
// git connect with remote 
average_data: async function ($table_name) {
    const field_mappings = {
        ward_kormosuci_bastobayons: [
            "unit_masik_sadaron_sova",
            "dawati_sova",
            "alochona_sova",
            "sudhi_somabesh",
            "siratunnabi_mahfil",
            "eid_reunion",
            "dars",
            "tafsir",
            "dawati_jonosova",
            "iftar_mahfil_personal",
            "iftar_mahfil_samostic",
            "cha_chakra",
            "samostic_khawa",
            "sikkha_sofor",
            "kirat_protijogita",
            "hamd_nat_protijogita",
            "others"
        ],
        ward_songothon9_sangothonik_boithoks: [
            "word_sura_boithok",
            "kormoporishod_boithok",
            "team_boithok",
            "word_boithok",
            "masik_sodosso_boithok",
            "unit_kormi_boithok",
            "ulama_somabesh",
            "jubok_somabesh",
            "sromik_somabesh"
        ],
        ward_proshikkhon1_tarbiats: [
            "unit_tarbiati_boithok",
            "ward_kormi_sikkha_boithok",
            "urdhotono_sikkha_shibir",
            "urdhotono_sikkha_boithok",
            "gono_sikkha_boithok",
            "gono_noisho_ibadot",
            "alochona_chokro",
            "darsul_quran",
            "sohih_tilawat"
        ],
        ward_rastrio2_kormoshuchi_bastobayons: [
            "centrally_announced_political_program",
            "locally_announced_jonoshova",
            "locally_announced_shomabesh",
            "locally_announced_michil"
        ],
        ward_rastrio3_dibosh_palons: [
            "shadhinota_o_jatio_dibosh",
            "bijoy_dibosh",
            "mattrivasha_dibosh",
            "others"
        ]
    };

    const attendance_key_suffix = {
        ward_kormosuci_bastobayons: "_uposthiti",
        ward_songothon9_sangothonik_boithoks: "_uposthiti",
        ward_proshikkhon1_tarbiats: "_uposthiti",
        ward_rastrio2_kormoshuchi_bastobayons: "_attend",
        ward_rastrio3_dibosh_palons: "_attend"
    };

    const total_key_suffix = {
        ward_kormosuci_bastobayons: "_total",
        ward_songothon9_sangothonik_boithoks: "_total",
        ward_proshikkhon1_tarbiats: "_total",
        ward_rastrio2_kormoshuchi_bastobayons: "",
        ward_rastrio3_dibosh_palons: ""
    };

    if (field_mappings[$table_name] && this.report_sum_data[$table_name]) {
        const fields = field_mappings[$table_name];
        const attendance_suffix = attendance_key_suffix[$table_name];
        const total_suffix = total_key_suffix[$table_name];

        fields.forEach(field => {
            const uposthiti_key = `${field}${attendance_suffix}`;
            const total_key = `${field}${total_suffix}`;
            this.average_uposthiti[$table_name][field] = Math.round(
                (this.report_sum_data[$table_name][uposthiti_key] ?? 0) /
                (this.report_sum_data[$table_name][total_key] ?? 1)
            );
        });
    }
},
average_uposthiti: {
    ward_kormosuci_bastobayons: {
        unit_masik_sadaron_sova: null,
        dawati_sova: null,
        alochona_sova: null,
        sudhi_somabesh: null,
        siratunnabi_mahfil: null,
        eid_reunion: null,
        dars: null,
        tafsir: null,
        dawati_jonosova: null,
        iftar_mahfil_personal: null,
        iftar_mahfil_samostic: null,
        cha_chakra: null,
        samostic_khawa: null,
        sikkha_sofor: null,
        kirat_protijogita: null,
        hamd_nat_protijogita: null,
        others: null,
    },
    ward_songothon9_sangothonik_boithoks: {
        word_sura_boithok: null,
        kormoporishod_boithok: null,
        team_boithok: null,
        word_boithok: null,
        masik_sodosso_boithok: null,
        unit_kormi_boithok: null,
        ulama_somabesh: null,
        jubok_somabesh: null,
        sromik_somabesh: null,
    },
    ward_proshikkhon1_tarbiats: {
        unit_tarbiati_boithok: null,
        ward_kormi_sikkha_boithok: null,
        urdhotono_sikkha_shibir: null,
        urdhotono_sikkha_boithok: null,
        gono_sikkha_boithok: null,
        gono_noisho_ibadot: null,
        alochona_chokro: null,
        darsul_quran: null,
        sohih_tilawat: null,
    },
    ward_rastrio2_kormoshuchi_bastobayons: {
        centrally_announced_political_program: null,
        locally_announced_jonoshova: null,
        locally_announced_shomabesh: null,
        locally_announced_michil: null,
    },
    ward_rastrio3_dibosh_palons: {
        shadhinota_o_jatio_dibosh: null,
        bijoy_dibosh: null,
        mattrivasha_dibosh: null,
        others: null,
    },
},

// dfdlsaf


-----------------man-----------------------

thana_dawat1_regular_group_wises.how_many_associate_members_created_man
thana_dawat2_personal_and_targets.how_many_associate_members_created_man
thana_dawat3_general_program_and_others.how_many_associate_members_created_man

thana_dawat4_gono_songjog_and_dawat_ovijans.gono_songjog_doshok_associate_members_created_man
thana_dawat4_gono_songjog_and_dawat_ovijans.mohanogor_declared_gonosonjog_dawati_ovi_associated_crt_man
thana_dawat4_gono_songjog_and_dawat_ovijans.election_how_many_associate_members_created_man
thana_dawat4_gono_songjog_and_dawat_ovijans.peshajibi_how_many_associate_members_created_man
thana_dawat4_gono_songjog_and_dawat_ovijans.other_how_many_associate_members_created_man




-----------------woman-----------------------

thana_dawat1_regular_group_wises.how_many_associate_members_created_woman
thana_dawat2_personal_and_targets.how_many_associate_members_created_woman
thana_dawat3_general_program_and_others.how_many_associate_members_created_woman

thana_dawat4_gono_songjog_and_dawat_ovijans.gono_songjog_doshok_associate_members_created_woman
thana_dawat4_gono_songjog_and_dawat_ovijans.mohanogor_declared_gonosonjog_dawati_ovi_associated_crt_woman
thana_dawat4_gono_songjog_and_dawat_ovijans.election_how_many_associate_members_created_woman
thana_dawat4_gono_songjog_and_dawat_ovijans.peshajibi_how_many_associate_members_created_woman
thana_dawat4_gono_songjog_and_dawat_ovijans.other_how_many_associate_members_created_woman



"thana_songothon8_associate_and_side_organizations": [

    "total_trade_union",
    "total_trade_union_increase",
    "total_trade_union_gatti",
    "total_trust",
    "total_trust_increase",
    "total_trust_gatti",
    "total_foundation",
    "total_foundation_increase",
    "total_foundation_gatti",
    "total_societie",
    "total_societie_increase",
    "total_societie_gatti",
    
  ],

"male_student_daittoshil_boithok_man",
"male_student_daittoshil_boithok_women",
"female_student_daittoshil_boithok_man",
"female_student_daittoshil_boithok_women",