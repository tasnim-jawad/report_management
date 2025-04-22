// note 1: সর্বোচ্চ ১ মাসের পারমিশন থাকবে ।
// note 1: description text area hobe


<div class="d-flex justify-content-center align-items-center">

<div class="parent_popup">


[
    
    'table_name_1':[
        'column_name_1',
        'column_name_2',
        'column_name_3',
        'column_name_4',
    ],
    'table_name_2':[
        'column_name_1',
        'column_name_2',
        'column_name_3',
        'column_name_4',
    ],
    
]


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