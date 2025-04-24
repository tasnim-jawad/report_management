// note 1: সর্বোচ্চ ১ মাসের পারমিশন থাকবে ।
// note 1: description text area hobe


<div class="d-flex justify-content-center align-items-center">

<div class="parent_popup">



<div class="previous parent_popup">
    {{
        formatBangla(
            previous_present?._previous ??
                ""
        )
    }}
</div>
<div class="present parent_popup">
    {{
        formatBangla(
            previous_present?._present ??
                ""
        )
    }}
</div>

_present

_previous



{{
    get_sum_total(
        report_sum_data
            ?.thana_department1_talimul_qurans
            ?.teacher_rokon_man,
        report_sum_data
            ?.thana_department1_talimul_qurans
            ?.teacher_rokon_woman,
        report_sum_data
            ?.thana_department1_talimul_qurans
            ?.teacher_worker_man,
        report_sum_data
            ?.thana_department1_talimul_qurans
            ?.teacher_worker_woman
    )
}}




formatBangla(
    Number(
        previous_present?.associate_member_man_previous ??
            0
    ) +
    Number(
        previous_present?.associate_member_woman_previous ??
            0
    )
)





<td>
    {{
        implementation_rate(
            Number(
                report_sum_data
                    ?.thana_songothon3_departmental_information
                    ?.women_kormi_target
            ),
            Number(
                (report_sum_data?.thana_songothon3_departmental_information?.women_kormi_increase_manonnoyon ?? 0) +
                (report_sum_data?.thana_songothon3_departmental_information?.women_kormi_increase_agoto ?? 0)
            ),
        )
    }}
</td>



'pp_increase_both_gatti_both' => [
    'table' => 'ward_songothon5_dawat_and_paribarik_units',
    'columns' => [
        'increase_manonnoyon' => 'paribarik_unit_increase', 
        'increase_agoto' => 'paribarik_unit_gatti',
        'decrease_manonnoyon' => 'paribarik_unit_gatti',
        'decrease_sthanantor' => 'paribarik_unit_gatti'
    ],
    'type' => 'pp_increase_both_gatti_both',
],


'pp_increase_both_gatti_one' => [
    'table' => 'ward_songothon5_dawat_and_paribarik_units',
    'columns' => [
        'increase_manonnoyon' => 'paribarik_unit_increase', 
        'increase_agoto' => 'paribarik_unit_gatti',
        'decrease' => 'paribarik_unit_gatti'
    ],
    'type' => 'pp_increase_both_gatti_one',
],






















<div class="do_not_print">
    <!-- <popup-note
        :label="'সোনার বাংলা মোট সংখ্যা'"
        :thana_id="report_header?.thana_info?.id"
        :table_name="'ward_dawah_and_prokashonas'"
        :field_title="'sonar_bangla'"
        :month="month"
    /> -->
    <popup-note
        :label="'সোনার বাংলা বৃদ্ধি'"
        :thana_id="report_header?.thana_info?.id"
        :table_name="'ward_dawah_and_prokashonas'"
        :field_title="'sonar_bangla_increase'"
        :month="month"
    />
    <!-- <popup-note
        :label="'সংগ্রাম মোট সংখ্যা'"
        :thana_id="report_header?.thana_info?.id"
        :table_name="'ward_dawah_and_prokashonas'"
        :field_title="'songram'"
        :month="month"
    /> -->
    <popup-note
        :label="'সংগ্রাম বৃদ্ধি'"
        :thana_id="report_header?.thana_info?.id"
        :table_name="'ward_dawah_and_prokashonas'"
        :field_title="'songram_increase'"
        :month="month"
    />
    <!-- <popup-note
        :label="'পৃথিবী মোট সংখ্যা'"
        :thana_id="report_header?.thana_info?.id"
        :table_name="'ward_dawah_and_prokashonas'"
        :field_title="'prithibi'"
        :month="month"
    /> -->
    <popup-note
        :label="'পৃথিবী বৃদ্ধি'"
        :thana_id="report_header?.thana_info?.id"
        :table_name="'ward_dawah_and_prokashonas'"
        :field_title="'prithibi_increase'"
        :month="month"
    />
</div>

