<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report || ward</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('css/ward/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ward/ward_report.css') }}">
    <style>
        @media print {
            .print_preview,
            .go_back_to_dashboard {
                display: none;
            }
        }
    </style>
</head>

<body>
    <section id="heading" class="mt-3">
        <div class="report_heading position-relative mb-1">
            <h3 class="text-center fs-6">বিসমিল্লাহির রাহমানির রাহীম</h3>
            <h1 class="text-center fs-4">ওয়ার্ড সংগঠনের</h1>
            <h1 class="text-center mb-2 fs-4">মাসিক/ত্রৈমাসিক/ষান্মাসিক/নয় মাসিক/বার্ষিক রিপোর্ট</h1>
            <div class="org_gender position-absolute">
                <p>পুরুষ</p>
            </div>
        </div>
        <div class="unit_info">
            <div class="line d-flex flex-wrap ">
                <p class="w-75">মাস: {{ bangla_month(date('F', strtotime($start_month))) }}</p>
                <p class="w-25">সন: {{ bangla(date('Y', strtotime($end_month))) }}</p>
            </div>
            <div class="line d-flex flex-wrap justify-content-between ">
                <p>ওয়ার্ড নং ও নাম : {{ $report_header?->ward_info?->no ?? '' }} ও
                    {{ $report_header?->ward_info?->title ?? '' }}</p>
                <p>পৌরসভা/ইউনিয়ন: </p>
                <p class="w-25">উপজেলা/থানা: {{ $report_header?->thana_info?->title ?? '' }}</p>
            </div>
            <div class="line d-flex flex-wrap justify-content-between ">
                <p>আমীর/সভাপতির নাম : {{ $report_header->president ?? '' }}</p>
            </div>
        </div>
    </section>
    <section id="report">
        <div class="dawat mt-1">
            <h1 class="font-18">দাওয়াত ও তাবলিগ :</h1>
            <div class="jonoshadharon d-flex flex-wrap justify-content-between ">
                <p class="fw-bold w-75">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদান সংখ্যা* :
                    <span>
                        {{ bangla(
                            collect([
                                $report_sum_data->ward_dawat1_regular_group_wises->how_many_have_been_invited ?? 0,
                                $report_sum_data->ward_dawat2_personal_and_targets->how_many_have_been_invited ?? 0,
                                $report_sum_data->ward_dawat3_general_program_and_others->how_many_were_give_dawat ?? 0,
                                $report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->how_many_have_been_invited ?? 0,
                                $report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->jela_mohanogor_declared_gonosonjog_invited ?? 0,
                                $report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->election_how_many_have_been_invited ?? 0,
                                $report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->other_how_many_have_been_invited ?? 0,
                            ])->map(fn($value) => is_numeric($value) ? $value : 0)->sum(),
                        ) }}
                    </span>
                </p>
                <p class="fw-bold w-25">মোট জনসংখ্যা:   <span>{{ bangla($report_sum_data?->ward_dawat5_jonoshadharons?->total_population ?? '') }}</span></p>
                <p class="fw-bold ps-3 w-100">টার্গেট (মাসিক/ত্রৈমাসিক / ষান্মাসিক/ নয় মাসিক/বার্ষিক) :</p>
                <p class="ps-3 font-13">* দাওয়াত ও তাবলিগের 'ক' এর অধীনে ক্রমিক ১ - ৪নং পর্যন্ত দাওয়াত প্রদান সংখ্যা
                    যোগ করে এখানে বসাতে হবে ।</p>
            </div>
            <div class="group_dawat mb-1">
                <h4 class="fs-6 fw-bold">১. নিয়মিত গ্রুপভিত্তিক দাওয়াত :</h4>
                <table class="text-center  ">
                    <thead>
                        <tr>
                            <th>কতটি গ্রুপ বের হয়েছে</th>
                            <th>অংশগ্রহণকারীর সংখ্যা </th>
                            <th>কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                            <th>কতজন সহযোগী সদস্য হয়েছেন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ bangla($report_sum_data->ward_dawat1_regular_group_wises->how_many_groups_are_out ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat1_regular_group_wises->number_of_participants ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat1_regular_group_wises->how_many_have_been_invited ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat1_regular_group_wises->how_many_associate_members_created ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="personal_dawat mb-1">
                <h4 class="fs-6 fw-bold">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:</h4>
                <table class="text-center  ">
                    <thead>
                        <tr>
                            <th>বিবরণ</th>
                            <th class="width-15">সদস্য (রুকন)</th>
                            <th class="width-15">কর্মী</th>
                            <th>বিবরণ</th>
                            <th class="width-15">সংখ্যা</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">মোট জনশক্তি সংখ্যা</td>
                            <td>{{ bangla($report_sum_data->ward_dawat2_personal_and_targets->total_rokon ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat2_personal_and_targets->total_worker ?? '') }}
                            </td>
                            <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                            <td>{{ bangla($report_sum_data->ward_dawat2_personal_and_targets->how_many_have_been_invited ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                            <td>{{ bangla($report_sum_data->ward_dawat2_personal_and_targets->how_many_were_give_dawat_rokon ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat2_personal_and_targets->how_many_were_give_dawat_worker ?? '') }}
                            </td>
                            <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                            <td>{{ bangla($report_sum_data->ward_dawat2_personal_and_targets->how_many_associate_members_created ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="shadharon_shova mb-2">
                <h4 class="fs-6 fw-bold">৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের মাধ্যমে দাওয়াত :</h4>
                <table class="text-center  table_layout_fixed">
                    <tbody>
                        <tr>
                            <td class="width-35">মোট কতজনকে দাওয়াত প্রদান করা হয়েছে</td>
                            <td>{{ bangla($report_sum_data->ward_dawat3_general_program_and_others->how_many_were_give_dawat ?? '') }}
                            </td>
                            <td class="width-35">মোট কতজন সহযোগী সদস্য হয়েছেন</td>
                            <td>{{ bangla($report_sum_data->ward_dawat3_general_program_and_others->how_many_associate_members_created ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="gonoshongjog mb-2">
                <h4 class="fs-6 fw-bold">৪. গণসংযোগ ও দাওয়াতি অভিযান পালন*:</h4>
                <table class="text-center  ">
                    <thead>
                        <tr>
                            <th class="">বিবরণ</th>
                            <th class="width-10 px-0">মোট গ্রুপ সংখ্যা</th>
                            <th class="width-15">অংশগ্রহণকারীর সংখ্যা</th>
                            <th class="w-25 px-0">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                            <th class="width-19 px-0">কতজন সহযোগী সদস্য হয়েছেন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">গণসংযোগ দশক / পক্ষ</td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->total_gono_songjog_group ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->total_attended ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->how_many_have_been_invited ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->how_many_associate_members_created ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান</td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->jela_mohanogor_declared_gonosonjog_group ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->jela_mohanogor_declared_gonosonjog_attended ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->jela_mohanogor_declared_gonosonjog_invited ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->jela_mohanogor_declared_gonosonjog_associated_created ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">নির্বাচনী আসনে গণসংযোগ সপ্তাহ</td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->election_gono_songjog_group ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->election_attended ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->election_how_many_have_been_invited ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->election_how_many_associate_members_created ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">অন্যান্য</td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->other_gono_songjog_group ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->other_attended ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->other_how_many_have_been_invited ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_dawat4_gono_songjog_and_dawat_ovijans->other_how_many_associate_members_created ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>* গণসংযোগ অভিযান পালনের সময় গ্রুপ সংখ্যা, ব্যক্তিগত ও গ্রুপভিত্তিক সহযোগী সদস্য বৃদ্ধি সংখ্যা
                    শুধুমাত্র এই ছকেই বসাতে হবে।</p>
            </div>
        </div>

        <h1 class="font-18 fw-bold">খ) বিভাগ ভিত্তিক তথ্য :</h1>
        <div class="bivag">
            <div class="talimul_quran mb-2">
                <h4 class="fs-6 fw-bold">১. তালিমুল কুরআনের মাধ্যমে দাওয়াত</h4>
                <table class="text-center  mb-2">
                    <thead>
                        <tr>
                            <th class="width-40">ব্যক্তিগত উদ্যোগ</th>
                            <th class="">সদস্য (রুকন)</th>
                            <th class="width-15">কর্মী</th>
                            <th class="width-20">মোট</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">কতজন কুরআন শিক্ষা প্রদান করেছেন</td>
                            <td>{{ bangla($report_sum_data->ward_department1_talimul_qurans->teacher_rokon ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_department1_talimul_qurans->teacher_worker ?? '') }}
                            </td>
                            {{-- <td>
                                {{ ($report_sum_data->ward_department1_talimul_qurans->teacher_rokon ?? null) !== null ||
                                ($report_sum_data->ward_department1_talimul_qurans->teacher_worker ?? null) !== null
                                    ? bangla(
                                        ($report_sum_data->ward_department1_talimul_qurans->teacher_rokon ?? 0) +
                                            ($report_sum_data->ward_department1_talimul_qurans->teacher_worker ?? 0),
                                    )
                                    : '' }}
                            </td> --}}
                            <td>
                                @php
                                    $sum = collect([
                                        $report_sum_data->ward_department1_talimul_qurans->teacher_rokon ?? 0,
                                        $report_sum_data->ward_department1_talimul_qurans->teacher_worker ?? 0,
                                    ])
                                        ->map(fn($value) => is_numeric($value) ? $value : 0)
                                        ->sum();
                                @endphp

                                {{ bangla($sum == 0 ? '' : $sum) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                            <td>{{ bangla($report_sum_data->ward_department1_talimul_qurans->student_rokon ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_department1_talimul_qurans->student_worker ?? '') }}
                            </td>
                            {{-- <td>
                                {{ ($report_sum_data->ward_department1_talimul_qurans->student_rokon ?? null) !== null ||
                                ($report_sum_data->ward_department1_talimul_qurans->student_worker ?? null) !== null
                                    ? bangla(
                                        ($report_sum_data->ward_department1_talimul_qurans->student_rokon ?? 0) +
                                            ($report_sum_data->ward_department1_talimul_qurans->student_worker ?? 0),
                                    )
                                    : '' }}
                            </td> --}}
                            <td>
                                @php
                                    $sum = collect([
                                        $report_sum_data->ward_department1_talimul_qurans->student_rokon ?? 0,
                                        $report_sum_data->ward_department1_talimul_qurans->student_worker ?? 0,
                                    ])
                                        ->map(fn($value) => is_numeric($value) ? $value : 0)
                                        ->sum();
                                @endphp

                                {{ bangla($sum == 0 ? '' : $sum) }}
                            </td>

                        </tr>
                    </tbody>
                </table>

                <div class="d-flex align-items-start gap-2">
                    <table class="text-center  mb-1">
                        <thead>
                            <tr>
                                <th class="w-40">সামষ্টিক উদ্যোগ</th>
                                <th class="w-30">মোট সংখ্যা</th>
                                <th class="width-30 px-0">মোট শিক্ষার্থী সংখ্যা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">কুরআন শিক্ষার গ্রুপ</td>
                                <td>{{ bangla($report_sum_data->ward_department1_talimul_qurans->quran_learning_total_group ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department1_talimul_qurans->quran_learning_total_students ?? '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মক্তব/ফোরকানিয়া মাদ্রাসা</td>
                                <td>
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->total_moktob ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->total_forkania_madrasah ?? '') }}
                                </td>
                                <td>
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->total_moktob_students ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->total_forkania_madrasah_students ?? '') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="text-center  mb-1">
                        <tbody>
                            <tr>
                                <td class="text-start width-70 px-2">মোট কতজন সহীহ তিলাওয়াত শিখেছেন</td>
                                <td class="width-30">
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->how_much_learned_sohih_tilawat ?? '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে (পু/ম)</td>
                                <td>
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->how_much_invited_man ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->how_much_invited_woman ?? '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মোট কতজন সহযোগী সদস্য হয়েছেন (পু/ম)</td>
                                <td>
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->how_much_been_associated_man ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_department1_talimul_qurans->how_much_been_associated_woman ?? '') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <table class="text-center table_layout_fixed">
                    <tbody>
                        <tr>
                            <td class="width-35 text-start">তা'লিমুল কুরআন : মুয়াল্লিম সংখ্যা (পু./ম.)</td>
                            <td>
                                {{ bangla($report_sum_data->ward_department1_talimul_qurans->total_muallim_man ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_department1_talimul_qurans->total_muallim_woman ?? '') }}
                            </td>
                            <td class="width-35 text-start">বৃদ্ধি সংখ্যা (পু./ম.) :</td>
                            <td>
                                {{ bangla($report_sum_data->ward_department1_talimul_qurans->total_muallim_increased_man ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_department1_talimul_qurans->total_muallim_increased_woman ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="moholla">
                <h4 class="fs-6 fw-bold">২. গ্রাম ও মহল্লাভিত্তিক দাওয়াত</h4>
                <div class="d-flex align-items-start gap-2">
                    <table class="text-center  mb-1">
                        <thead>
                            <tr>
                                <th class="width-60 text-start">সরকারি হিসাবে গ্রাম/মহল্লা সংখ্যা</th>
                                <th class="width-20">
                                    {{ bangla($report_sum_data->ward_department2_moholla_vittik_dawats->govment_calculated_village_amount ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_department2_moholla_vittik_dawats->govment_calculated_moholla_amount ?? '') }}
                                </th>
                                <th class="width-20 ">বৃদ্ধি</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">গ্রাম/মহল্লা কমিটি সংখ্যা</td>
                                <td>
                                    {{ bangla($previous_present->total_village_committee_present ?? '') }} /
                                    {{ bangla($previous_present->total_moholla_committee_present ?? '') }}
                                </td>
                                <td>
                                    {{ bangla($report_sum_data->ward_department2_moholla_vittik_dawats->total_village_committee_increased ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_department2_moholla_vittik_dawats->total_moholla_committee_increased ?? '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">বিশেষ দাওয়াতের অন্তর্ভুক্ত গ্রাম/মহল্লা* সংখ্যা</td>
                                <td>
                                    {{ bangla($previous_present->special_dawat_included_village_present ?? '') }} /
                                    {{ bangla($previous_present->special_dawat_included_moholla_present ?? '') }}
                                </td>
                                <td>
                                    {{ bangla($report_sum_data->ward_department2_moholla_vittik_dawats->special_dawat_included_village_increased ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_department2_moholla_vittik_dawats->special_dawat_included_moholla_increased ?? '') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="text-center  mb-1">
                        <tbody>
                            <tr>
                                <td class="text-start width-70 px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td class="width-30">
                                    {{ bangla($report_sum_data->ward_department2_moholla_vittik_dawats->how_many_been_invited ?? '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td>{{ bangla($report_sum_data->ward_department2_moholla_vittik_dawats->how_many_associated_created ?? '') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="font-12">* সেসব গ্রাম/মহল্লা বুঝাবে যেখানে ইউনিট/দাওয়াতি ইউনিট নেই।</p>
            </div>

            <div class="jubo mb-2">
                <h4 class="fs-6 fw-bold">৩. যুব বিভাগের মাধ্যমে দাওয়াত*:</h4>
                <div class="d-flex align-items-start gap-2">
                    <div class="left w-100">
                        <table class="text-center mb-1">
                            <thead>
                                <tr>
                                    <th class="width-60">বিবরণ</th>
                                    <th class="width-20">মোট সংখ্যা</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">কতজন যুবকের মাঝে দাওয়াত পৌঁছানো হয়েছে</td>
                                    <td>{{ bangla($report_sum_data->ward_department3_jubo_somaj_dawats->how_many_young_been_invited ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কতজন যুবক সহযোগী সদস্য হয়েছেন</td>
                                    <td>{{ bangla($report_sum_data->ward_department3_jubo_somaj_dawats->how_many_young_been_associated ?? '') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="font-11">* যুব বিভাগের কাজের ক্ষেত্রে ছাত্র সংগঠনের সাবেক জনশক্তি ব্যতিত সাধারণ
                            যুবকগণই যুবক হিসাবে গণ্য হবে।</p>
                    </div>
                    <table class="text-center mb-1">
                        <thead>
                            <tr>
                                <th class="width-60 ">বিবরণ</th>
                                <th class="width-20">মোট সংখ্যা</th>
                                <th class="width-20 ">বৃদ্ধি</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">যুব কমিটি</td>
                                <td>{{ bangla($previous_present->total_young_committee_present ?? '') }}</td>
                                <td>{{ bangla($report_sum_data->ward_department3_jubo_somaj_dawats->total_young_committee_increased ?? '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নতুন সমিতি/ক্লাব প্রতিষ্ঠা করা হয়েছে</td>
                                <td>{{ bangla($previous_present->total_new_club_present ?? '') }}</td>
                                <td>{{ bangla($report_sum_data->ward_department3_jubo_somaj_dawats->total_new_club_increased ?? '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো হয়েছে</td>
                                <td>{{ bangla($previous_present->stablished_club_total_invited_present ?? '') }}</td>
                                <td>{{ bangla($report_sum_data->ward_department3_jubo_somaj_dawats->stablished_club_total_increased ?? '') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="job_holder mb-2">
                <h4 class="fs-6 fw-bold">৪. বিভিন্ন শ্রেণি-পেশার মানুষের মাঝে দাওয়াত</h4>
                <div class="d-flex align-items-start gap-2">
                    <table class="text-center mb-1">
                        <thead>
                            <tr>
                                <th class="w-30 letter_spacing">শ্রেণি-পেশার বিবরণ</th>
                                <th class="w-25 px-0 font-13">কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে</th>
                                <th class="width-20 px-0 font-13">কতজন সহযোগী সদস্য হয়েছেন</th>
                                <th class="width-10">টার্গেট</th>
                                <th class="font-13 width-15">বাস্তবায়নের হার</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start letter_spacing ">রাজ: ও বিশিষ্ট ব্যক্তিবর্গ</td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->political_and_special_invited ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->political_and_special_been_associated ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->political_and_special_target ?? '') }}
                                </td>
                                <td>{{ bangla(implementation_rate($report_sum_data->ward_department4_different_job_holders_dawats->political_and_special_target ?? '', $report_sum_data->ward_department4_different_job_holders_dawats->political_and_special_been_associated ?? '')) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">পেশাজীবী</td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->pesha_jibi_invited ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->pesha_jibi_been_associated ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->pesha_jibi_target ?? '') }}
                                </td>
                                <td>{{ bangla(implementation_rate($report_sum_data->ward_department4_different_job_holders_dawats->pesha_jibi_target ?? '', $report_sum_data->ward_department4_different_job_holders_dawats->pesha_jibi_been_associated ?? '')) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">উলামা মাশায়েখ</td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->olama_masayekh_invited ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->olama_masayekh_been_associated ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->olama_masayekh_target ?? '') }}
                                </td>
                                <td>{{ bangla(implementation_rate($report_sum_data->ward_department4_different_job_holders_dawats->olama_masayekh_target ?? '', $report_sum_data->ward_department4_different_job_holders_dawats->olama_masayekh_been_associated ?? '')) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="text-center mb-1">
                        <thead>
                            <tr>
                                <th class="w-30 letter_spacing">শ্রেণি-পেশার বিবরণ</th>
                                <th class="w-25 px-0 font-13">কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে</th>
                                <th class="width-20 px-0 font-13">কতজন সহযোগী সদস্য হয়েছেন</th>
                                <th class="width-10">টার্গেট</th>
                                <th class="font-13 width-15">বাস্তবায়নের হার</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-1">শ্রমজীবী</td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->sromo_jibi_invited ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->sromo_jibi_been_associated ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->sromo_jibi_target ?? '') }}
                                </td>
                                <td>{{ bangla(implementation_rate($report_sum_data->ward_department4_different_job_holders_dawats->sromo_jibi_target ?? '', $report_sum_data->ward_department4_different_job_holders_dawats->sromo_jibi_been_associated ?? '')) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-1 letter_spacing font-13">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)</td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->prantik_jonogosti_invited ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->prantik_jonogosti_been_associated ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->prantik_jonogosti_target ?? '') }}
                                </td>
                                <td>{{ bangla(implementation_rate($report_sum_data->ward_department4_different_job_holders_dawats->prantik_jonogosti_target ?? '', $report_sum_data->ward_department4_different_job_holders_dawats->prantik_jonogosti_been_associated ?? '')) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-1">ভিন্নধর্মাবলম্বী</td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->vinno_dormalombi_invited ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->vinno_dormalombi_been_associated ?? '') }}
                                </td>
                                <td>{{ bangla($report_sum_data->ward_department4_different_job_holders_dawats->vinno_dormalombi_target ?? '') }}
                                </td>
                                <td>{{ bangla(implementation_rate($report_sum_data->ward_department4_different_job_holders_dawats->vinno_dormalombi_target ?? '', $report_sum_data->ward_department4_different_job_holders_dawats->vinno_dormalombi_been_associated ?? '')) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="paribarik mb-2">
                <h4 class="fs-6 fw-bold">৫. পরিবারভিত্তিক দাওয়াত</h4>
                <table class="text-center  table_layout_fixed">
                    <tbody>
                        <tr>
                            <td class="width-35">দাওয়াতি কাজে অংশগ্রহণকারী মোট পরিবার সংখ্যা</td>
                            <td>{{ bangla($report_sum_data->ward_department5_paribarik_dawats->total_attended_family ?? '') }}
                            </td>
                            <td class="width-35">মোট কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে</td>
                            <td>{{ bangla($report_sum_data->ward_department5_paribarik_dawats->how_many_new_family_invited ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mosjid_dawah_center mb-1">
                <h4 class="fs-6 fw-bold">৬. মসজিদ/দাওয়াহ্ সেন্টার/তথ্যসেবা কেন্দ্রভিত্তিক দাওয়াত</h4>
                <table class="text-center  ">
                    <thead>
                        <tr>
                            <th class="width-30">বিবরণ</th>
                            <th class="width-10">মোট সংখ্যা</th>
                            <th class="width-10">বৃদ্ধি</th>
                            <th class="width-30">বিবরণ</th>
                            <th class="width-10">মোট সংখ্যা</th>
                            <th class="width-10">বৃদ্ধি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">মসজিদ</td>
                            <td>{{ bangla($previous_present->total_mosjid_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_department6_mosjid_dawah_infomation_centers->total_mosjid_increase ?? '') }}
                            </td>
                            <td class="text-start px-2">সাধারণ দাওয়াহ্ সেন্টার</td>
                            <td>{{ bangla($previous_present->general_dawah_center_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_department6_mosjid_dawah_infomation_centers->general_dawah_center_increase ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">দাওয়াতের আওতাভুক্ত মসজিদ</td>
                            <td>{{ bangla($previous_present->dawat_included_mosjid_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_department6_mosjid_dawah_infomation_centers->dawat_included_mosjid_increase ?? '') }}
                            </td>
                            <td class="text-start px-2">তথ্যসেবা কেন্দ্র (মসজিদভিত্তিক /সাধারণ)</td>
                            <td>
                                {{ bangla($previous_present->mosjid_wise_information_center_present ?? '') }} /
                                {{ bangla($previous_present->general_information_center_present ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_department6_mosjid_dawah_infomation_centers->mosjid_wise_information_center_increase ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_department6_mosjid_dawah_infomation_centers->general_information_center_increase ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">মসজিদভিত্তিক দাওয়াহ্ সেন্টার</td>
                            <td>{{ bangla($previous_present->mosjid_wise_dawah_center_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_department6_mosjid_dawah_infomation_centers->mosjid_wise_dawah_center_increase ?? '') }}
                            </td>
                            <td class="text-start px-2"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="tottho_projukti d-flex flex-wrap justify-content-between mb-1">
                <p class="fw-bold fs-6 width-60 ">৭. তথ্যপ্রযুক্তির মাধ্যমে দাওয়াতি কাজের জন্য উপযুক্ত জনশক্তি সংখ্যা:
                    <span>{{ bangla($report_sum_data->ward_department7_dawat_in_technologies->total_well_known ?? '') }}</span>
                </p>
                <p class="fw-bold fs-6 width-40">,অংশগ্রহণকারীর সংখ্যা:
                    <span>{{ bangla($report_sum_data->ward_department7_dawat_in_technologies->total_attended ?? '') }}</span>
                </p>
            </div>
        </div>

    </section>
    <section>
        <h1 class="font-18 fw-bold">গ) দাওয়াহ্ ও প্রকাশনা:</h1>
        <div class="dawah_prokashona">
            <table class="text-center mb-1">
                <thead>
                    <tr>
                        <th class="width-20">বিবরণ</th>
                        <th class="width-10">মোট সংখ্যা</th>
                        <th class="width-10">বৃদ্ধি</th>
                        <th class="width-30">বিবরণ</th>
                        <th class="width-15">মোট সংখ্যা</th>
                        <th class="width-15">বৃদ্ধি</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-start px-2">পাঠাগার</td>
                        <td>{{ bangla($previous_present->total_pathagar_present ?? '') }}</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->total_pathagar_increase ?? '') }}
                        </td>

                        <td class="text-start px-2">ওয়ার্ডে বই বিক্রয় কেন্দ্র</td>
                        <td>{{ bangla($previous_present->ward_book_sales_center_present ?? '') }}</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->ward_book_sales_center_increase ?? '') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start px-2">বই</td>
                        <td>{{ bangla($previous_present->books_in_pathagar_present ?? '') }}</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->books_in_pathagar_increase ?? '') }}
                        </td>

                        <td class="text-start px-2">ওয়ার্ডে বই বিক্রয়</td>
                        <td>{{ bangla($previous_present->ward_book_sales_present ?? '') }}</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->ward_book_sales_increase ?? '') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start px-2">বই বিলি</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->book_distribution ?? '') }}</td>
                        <td>
                            {{-- {{ bangla($report_sum_data->ward_dawah_and_prokashonas->book_distribution_increase ?? '') }} --}}
                        </td>

                        <td class="text-start px-2">বইয়ের সফট কপি বিলি*</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->soft_copy_book_distribution ?? '') }}
                        </td>
                        <td>
                            {{-- {{ bangla($report_sum_data->ward_dawah_and_prokashonas->soft_copy_book_distribution_increase ?? '') }} --}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start px-2">ইউনিটে বই বিলিকেন্দ্র</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->unit_book_distribution_center ?? '') }}
                        </td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->unit_book_distribution_center_increase ?? '') }}
                        </td>

                        <td class="text-start px-2">দাওয়াতি লিংক বিতরণ*</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->dawat_link_distribution ?? '') }}
                        </td>
                        <td>
                            {{-- {{ bangla($report_sum_data->ward_dawah_and_prokashonas->dawat_link_distribution_increase ?? '') }} --}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start px-2">ইউনিটে বই বিলি</td>
                        <td>{{ bangla($report_sum_data->ward_dawah_and_prokashonas->unit_book_distribution ?? '') }}
                        </td>
                        <td>
                            {{-- {{ bangla($report_sum_data->ward_dawah_and_prokashonas->unit_book_distribution_increase ?? '') }} --}}
                        </td>

                        <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/পৃথিবী কত কপি চলে</td>
                        <td>
                            {{ bangla($previous_present->sonar_bangla_present ?? '') }} /
                            {{ bangla($previous_present->songram_present ?? '') }} /
                            {{ bangla($previous_present->prithibi_present ?? '') }}
                        </td>
                        <td>
                            {{ bangla($report_sum_data->ward_dawah_and_prokashonas->sonar_bangla_increase ?? '') }} /
                            {{ bangla($report_sum_data->ward_dawah_and_prokashonas->songram_increase ?? '') }} /
                            {{ bangla($report_sum_data->ward_dawah_and_prokashonas->prithibi_increase ?? '') }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>*সংগঠন অনুমোদিত</p>
        </div>

        <h1 class="font-18 fw-bold">ঘ) কর্মসূচি বাস্তবায়ন</h1>
        <div class="job_holder mb-1">
            <div class="d-flex align-items-start gap-2">
                <table class="text-center mb-1">
                    <thead>
                        <tr>
                            <th class="width-10px">ক্র</th>
                            <th class="width-50">কর্মসূচির বিবরণ</th>
                            <th class="">মোট সংখ্যা</th>
                            <th class="">টার্গেট</th>
                            <th class="">গড় উপস্থিতি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>১.</td>
                            <td class="text-start px-2">ইউনিটে মাসিক সাধারণ সভা</td>
                            <td>{{ bangla($report_sum_data->ward_kormosuci_bastobayons->unit_masik_sadaron_sova_total ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_kormosuci_bastobayons->unit_masik_sadaron_sova_target ?? '') }}
                            </td>
                            <td>{{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->unit_masik_sadaron_sova_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->unit_masik_sadaron_sova_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>২.</td>
                            <td class="text-start font-13 px-2">দাওয়াতি সভা/আলোচনা সভা/সুধী সমাবেশ</td>
                            <td class="font-13">
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->dawati_sova_total ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->alochona_sova_total ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->sudhi_somabesh_total ?? '') }}
                            </td>
                            <td class="font-13">
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->dawati_sova_target ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->alochona_sova_target ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->sudhi_somabesh_target ?? '') }}
                            </td>
                            <td class="font-13">
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->dawati_sova_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->dawati_sova_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->alochona_sova_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->alochona_sova_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->sudhi_somabesh_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->sudhi_somabesh_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৩.</td>
                            <td class="text-start px-2">সীরাতুন্নবী (সাঃ) মাহফিল</td>
                            <td>{{ bangla($report_sum_data->ward_kormosuci_bastobayons->siratunnabi_mahfil_total ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_kormosuci_bastobayons->siratunnabi_mahfil_target ?? '') }}
                            </td>
                            <td>{{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->siratunnabi_mahfil_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->siratunnabi_mahfil_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৪.</td>
                            <td class="text-start px-2">ঈদ পুনর্মিলনী</td>
                            <td>{{ bangla($report_sum_data->ward_kormosuci_bastobayons->eid_reunion_total ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_kormosuci_bastobayons->eid_reunion_target ?? '') }}
                            </td>
                            <td>{{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->eid_reunion_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->eid_reunion_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৫.</td>
                            <td class="text-start font-13 letter_spacing px-1">দারস/তাফসীর/দাওয়াতি জনসভা ও ইসলামী
                                মাহফিল</td>
                            <td class="font-13">
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->dars_total ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->tafsir_total ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->dawati_jonosova_total ?? '') }}
                            </td>
                            <td class="font-13">
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->dars_target ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->tafsir_target ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->dawati_jonosova_target ?? '') }}
                            </td>
                            <td class="font-13">
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->dars_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->dars_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->tafsir_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->tafsir_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->dawati_jonosova_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->dawati_jonosova_uposthiti ?? '')) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="text-center mb-1">
                    <thead>
                        <tr>
                            <th class="width-10px">ক্র</th>
                            <th class="w-50">কর্মসূচির বিবরণ</th>
                            <th class="">মোট সংখ্যা</th>
                            <th class="">টার্গেট</th>
                            <th class="">গড় উপস্থিতি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>৬.</td>
                            <td class="text-start ">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                            <td>
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->iftar_mahfil_personal_total ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->iftar_mahfil_samostic_total ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->iftar_mahfil_personal_target ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->iftar_mahfil_samostic_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->iftar_mahfil_personal_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->iftar_mahfil_personal_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->iftar_mahfil_samostic_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->iftar_mahfil_samostic_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৭.</td>
                            <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                            <td class="font-13">
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->cha_chakra_total ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->samostic_khawa_total ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->sikkha_sofor_total ?? '') }}
                            </td>
                            <td class="font-12">
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->cha_chakra_target ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->samostic_khawa_target ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->sikkha_sofor_target ?? '') }}
                            </td>
                            <td class="font-12">
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->cha_chakra_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->cha_chakra_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->samostic_khawa_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->samostic_khawa_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->sikkha_sofor_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->sikkha_sofor_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৮.</td>
                            <td class="text-start px-2">কিরাত/হামদ না'ত প্ৰতিযোগিতা</td>
                            <td class="font-13">
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->kirat_protijogita_total ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->hamd_nat_protijogita_total ?? '') }}
                            </td>
                            <td class="font-13">
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->kirat_protijogita_target ?? '') }}/
                                {{ bangla($report_sum_data->ward_kormosuci_bastobayons->hamd_nat_protijogita_target ?? '') }}
                            </td>
                            <td class="font-13">
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->kirat_protijogita_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->kirat_protijogita_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->hamd_nat_protijogita_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->hamd_nat_protijogita_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৯.</td>
                            <td class="text-start px-2">অন্যান্য</td>
                            <td>{{ bangla($report_sum_data->ward_kormosuci_bastobayons->others_total ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_kormosuci_bastobayons->others_target ?? '') }}</td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_kormosuci_bastobayons->others_total ?? '', $report_sum_data->ward_kormosuci_bastobayons->others_uposthiti ?? '')) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="">
        <div class="songothon">
            <h1 class="font-18 fw-bold">সংগঠন :</h1>
            <div class="jonoshokti mb-2">
                <h4 class="fs-6 fw-bold">১. জনশক্তি</h4>
                <table class="text-center  mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="width-20">জনশক্তি ধরন</th>
                            <th class="">বিগত মাসের সংখ্যা</th>
                            <th class="">বর্তমান সংখ্যা</th>
                            <th class="">বৃদ্ধি</th>
                            <th class="">ঘাটতি*</th>
                            <th class="">টার্গেট</th>
                            <th class="">বাস্তবায়নের হার</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">সর্বমোট সদস্য (রুকন)</td>
                            <td>{{ bangla($previous_present->rokon_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->rokon_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon1_jonosoktis->rokon_briddhi ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon1_jonosoktis->rokon_gatti ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon1_jonosoktis->rokon_target ?? '') }}</td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon1_jonosoktis->rokon_target ?? '', $report_sum_data->ward_songothon1_jonosoktis->rokon_briddhi ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">সর্বমোট কর্মী</td>
                            <td>{{ bangla($previous_present->worker_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->worker_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon1_jonosoktis->worker_briddhi ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon1_jonosoktis->worker_gatti ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon1_jonosoktis->worker_target ?? '') }}</td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon1_jonosoktis->worker_target ?? '', $report_sum_data->ward_songothon1_jonosoktis->worker_briddhi ?? '')) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="shohojogi mb-2">
                <h4 class="fs-6 fw-bold">২. সহযোগী সদস্য :</h4>
                <table class="text-center mb-1">
                    <thead>
                        <tr>
                            <th class="w-25">সহযোগী</th>
                            <th class="width-15">বিগত মাসের সংখ্যা</th>
                            <th class="width-15">বর্তমান সংখ্যা</th>
                            <th class="width-15">বৃদ্ধি</th>
                            <th class="width-15">টার্গেট</th>
                            <th class="width-15">বাস্তবায়নের হার</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">মোট সহযোগী সদস্য (পুরুষ)</td>
                            <td>{{ bangla($previous_present->associate_member_man_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->associate_member_man_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon2_associate_members->associate_member_man_briddhi ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon2_associate_members->associate_member_man_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(
                                    ((int) ($report_sum_data->ward_songothon2_associate_members->associate_member_man_briddhi ?? 0)) +
                                    ((int) ($report_sum_data->ward_songothon2_associate_members->associate_member_woman_briddhi ?? 0)) ?:
                                    '',
                                ) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">মোট সহযোগী সদস্য (মহিলা)</td>
                            <td>{{ bangla($previous_present->associate_member_woman_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->associate_member_woman_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon2_associate_members->associate_member_woman_briddhi ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon2_associate_members->associate_member_woman_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon2_associate_members->associate_member_woman_target ?? '', $report_sum_data->ward_songothon2_associate_members->associate_member_woman_briddhi ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">সর্বমোট সহযোগী সদস্য সংখ্যা**</td>
                            <td>
                                {{ bangla(($previous_present->associate_member_man_previous ?? 0) + ($previous_present->associate_member_woman_previous ?? 0) ?: '') }}
                            </td>
                            <td>
                                {{ bangla(($previous_present->associate_member_man_present ?? 0) + ($previous_present->associate_member_woman_present ?? 0) ?: '') }}
                            </td>
                            <td>
                                {{ bangla(
                                    ((int) ($report_sum_data->ward_songothon2_associate_members->associate_member_man_briddhi ?? 0)) +
                                    ((int) ($report_sum_data->ward_songothon2_associate_members->associate_member_woman_briddhi ?? 0)) ?:
                                    '',
                                ) }}
                            </td>
                            <td>
                                {{ bangla(
                                    (int) ($report_sum_data->ward_songothon2_associate_members->associate_member_man_target ?? 0) +
                                    (int) ($report_sum_data->ward_songothon2_associate_members->associate_member_woman_target ?? 0) ?:
                                    '',
                                ) }}
                            </td>
                            <td>
                                {{-- {{ bangla(($report_sum_data->ward_songothon2_associate_members->associate_member_man_previous ?? 0) + ($report_sum_data->ward_songothon2_associate_members->associate_member_woman_previous ?? 0) ?: '') }} --}}
                                {{ bangla(
                                    implementation_rate(
                                        (int) ($report_sum_data->ward_songothon2_associate_members->associate_member_man_target ?? 0) +
                                            (int) ($report_sum_data->ward_songothon2_associate_members->associate_member_woman_target ?? 0),

                                        (int) ($report_sum_data->ward_songothon2_associate_members->associate_member_man_briddhi ?? 0) +
                                            (int) ($report_sum_data->ward_songothon2_associate_members->associate_member_woman_briddhi ?? 0),
                                    ),
                                ) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="font-14">*সদস্য (রুকন) ঘাটতির ক্ষেত্রে স্থানান্তর, ইন্তেকাল, বাতিল, ইস্তফা ও বিদেশ গমন
                    সংখ্যার হিসাব আলাদাভাবে সংরক্ষণ করে মোট সংখ্যাটি এ ঘরে বসাতে হবে এবং এতদসংক্রান্ত তালিকা ঊর্ধ্বতন
                    সংগঠনে জমা দিতে হবে।</p>
                <p class="font-14">** দাওয়াত ও তাবলিগের 'ক' এর অধীনে উল্লেখিত সকল সহযোগী সদস্যের সংখ্যা সংগঠনের
                    জনশক্তির এ ছকে সর্বমোট সহযোগী সদস্যের ঘরে বসাতে হবে।</p>
            </div>

            <div class="bivag_vittik mb-5">
                <h4 class="fs-6 fw-bold">৩. বিভাগভিত্তিক তথ্য:</h4>
                <table class="text-center mb-1">
                    <thead>
                        <tr>
                            <th class="">বিভাগসমূহ</th>
                            <th class="width-15">ধরন</th>
                            <th class="width-15">বিগত সময়ের সংখ্যা</th>
                            <th class="width-15">বর্তমান সংখ্যা</th>
                            <th class="width-15">বৃদ্ধি</th>
                            <th class="width-15">ঘাটতি</th>
                            <th class="width-15">টার্গেট</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                                dd($previous_present->women_rokon_present --}}
                        <tr>
                            <td rowspan="3" class="text-center px-2">মহিলা</td>
                            <td class="text-start">সদস্য (রুকন)</td>
                            <td>{{ bangla($previous_present->women_rokon_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->women_rokon_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_rokon_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_rokon_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_rokon_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">কর্মী</td>
                            <td>{{ bangla($previous_present->women_kormi_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->women_kormi_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_kormi_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_kormi_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_kormi_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">সহযোগী সদস্য</td>
                            <td>{{ bangla($previous_present->women_associate_member_previous ?? '') }}
                            </td>
                            <td>{{ bangla($previous_present->women_associate_member_present ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_associate_member_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_associate_member_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->women_associate_member_target ?? '') }}
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="text-center px-2">শ্রম*</td>
                            <td class="text-start">সদস্য (রুকন)</td>
                            <td>{{ bangla($previous_present->sromojibi_rokon_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->sromojibi_rokon_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_rokon_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_rokon_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_rokon_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">কর্মী</td>
                            <td>{{ bangla($previous_present->sromojibi_kormi_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->sromojibi_kormi_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_kormi_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_kormi_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_kormi_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">সহযোগী সদস্য</td>
                            <td>{{ bangla($previous_present->sromojibi_associate_member_previous ?? '') }}
                            </td>
                            <td>{{ bangla($previous_present->sromojibi_associate_member_present ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_associate_member_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_associate_member_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->sromojibi_associate_member_target ?? '') }}
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="text-center px-2">উলামা</td>
                            <td class="text-start">সদস্য (রুকন)</td>
                            <td>{{ bangla($previous_present->ulama_rokon_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->ulama_rokon_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_rokon_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_rokon_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_rokon_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">কর্মী</td>
                            <td>{{ bangla($previous_present->ulama_kormi_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->ulama_kormi_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_kormi_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_kormi_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_kormi_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">সহযোগী সদস্য</td>
                            <td>{{ bangla($previous_present->ulama_associate_member_previous ?? '') }}
                            </td>
                            <td>{{ bangla($previous_present->ulama_associate_member_present ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_associate_member_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_associate_member_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->ulama_associate_member_target ?? '') }}
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="text-center px-2">পেশাজীবী</td>
                            <td class="text-start">সদস্য (রুকন)</td>
                            <td>{{ bangla($previous_present->pesha_jibi_rokon_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->pesha_jibi_rokon_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_rokon_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_rokon_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_rokon_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">কর্মী</td>
                            <td>{{ bangla($previous_present->pesha_jibi_kormi_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->pesha_jibi_kormi_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_kormi_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_kormi_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_kormi_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">সহযোগী সদস্য</td>
                            <td>{{ bangla($previous_present->pesha_jibi_associate_member_previous ?? '') }}
                            </td>
                            <td>{{ bangla($previous_present->pesha_jibi_associate_member_present ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_associate_member_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_associate_member_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->pesha_jibi_associate_member_target ?? '') }}
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="3" class="text-center px-2">যুব</td>
                            <td class="text-start">সদস্য (রুকন)</td>
                            <td>{{ bangla($previous_present->jubo_rokon_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->jubo_rokon_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_rokon_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_rokon_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_rokon_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">কর্মী</td>
                            <td>{{ bangla($previous_present->jubo_kormi_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->jubo_kormi_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_kormi_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_kormi_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_kormi_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">সহযোগী সদস্য</td>
                            <td>{{ bangla($previous_present->jubo_associate_member_previous ?? '') }}
                            </td>
                            <td>{{ bangla($previous_present->jubo_associate_member_present ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_associate_member_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_associate_member_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->jubo_associate_member_target ?? '') }}
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2" class="text-center px-2">ভিন্নধর্মাবলম্বী</td>
                            <td class="text-start">কর্মী</td>
                            <td>{{ bangla($previous_present->vinno_dormalombi_kormi_previous ?? '') }}
                            </td>
                            <td>{{ bangla($previous_present->vinno_dormalombi_kormi_present ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->vinno_dormalombi_kormi_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->vinno_dormalombi_kormi_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->vinno_dormalombi_kormi_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">সহযোগী সদস্য</td>
                            <td>{{ bangla($previous_present->vinno_dormalombi_associate_member_previous ?? '') }}
                            </td>
                            <td>{{ bangla($previous_present->vinno_dormalombi_associate_member_present ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->vinno_dormalombi_associate_member_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->vinno_dormalombi_associate_member_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon3_departmental_information->vinno_dormalombi_associate_member_target ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="font-12">*শ্রমিক কল্যাণের রিপোর্ট অনুযায়ী হবে।</p>
            </div>

            <div class="unit_shongothon mb-3 pt-3">
                <h4 class="fs-6">৪. ইউনিট সংগঠন:</h4>
                <table class="text-center mb-1">
                    <thead>
                        <tr>
                            <th class="width-20">ইউনিটের ধরন</th>
                            <th class="width-15">বিগত সময়ের সংখ্যা</th>
                            <th class="width-15">বর্তমান সংখ্যা</th>
                            <th class="width-10">বৃদ্ধি</th>
                            <th class="width-10">ঘাটতি</th>
                            <th class="width-15">টার্গেট</th>
                            <th class="width-15">বাস্তবায়নের হার</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">সাধারণ ইউনিট (পুরুষ)</td>
                            <td>{{ bangla($previous_present->general_unit_men_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->general_unit_men_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_target ?? '', $report_sum_data->ward_songothon4_unit_songothons->general_unit_men_increase ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">সাধারণ ইউনিট (মহিলা)</td>
                            <td>{{ bangla($previous_present->general_unit_women_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->general_unit_women_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_target ?? '', $report_sum_data->ward_songothon4_unit_songothons->general_unit_women_increase ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">উলামা ইউনিট</td>
                            <td>{{ bangla($previous_present->ulama_unit_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->ulama_unit_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_target ?? '', $report_sum_data->ward_songothon4_unit_songothons->ulama_unit_increase ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">পেশাজীবী ইউনিট</td>
                            <td>{{ bangla($previous_present->peshajibi_unit_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->peshajibi_unit_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_target ?? '', $report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_increase ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">শ্রমিক কল্যাণ ইউনিট</td>
                            <td>{{ bangla($previous_present->sromik_kollyan_unit_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->sromik_kollyan_unit_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_target ?? '', $report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_increase ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">যুব ইউনিট</td>
                            <td>{{ bangla($previous_present->jubo_unit_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->jubo_unit_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_target ?? '', $report_sum_data->ward_songothon4_unit_songothons->jubo_unit_increase ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">মিডিয়া ইউনিট</td>
                            <td>{{ bangla($previous_present->media_unit_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->media_unit_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->media_unit_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->media_unit_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon4_unit_songothons->media_unit_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(implementation_rate($report_sum_data->ward_songothon4_unit_songothons->media_unit_target ?? '', $report_sum_data->ward_songothon4_unit_songothons->media_unit_increase ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end">সর্বমোট ইউনিট সংখ্যা</td>
                            <td>
                                {{ bangla(
                                    ($previous_present->general_unit_men_previous ?? 0) +
                                    ($previous_present->general_unit_women_previous ?? 0) +
                                    ($previous_present->ulama_unit_previous ?? 0) +
                                    ($previous_present->peshajibi_unit_previous ?? 0) +
                                    ($previous_present->sromik_kollyan_unit_previous ?? 0) +
                                    ($previous_present->jubo_unit_previous ?? 0) +
                                    ($previous_present->media_unit_previous ?? 0) ?:
                                    '',
                                ) }}
                            </td>
                            <td>
                                {{ bangla(
                                    ($previous_present->general_unit_men_present ?? 0) +
                                    ($previous_present->general_unit_women_present ?? 0) +
                                    ($previous_present->ulama_unit_present ?? 0) +
                                    ($previous_present->peshajibi_unit_present ?? 0) +
                                    ($previous_present->sromik_kollyan_unit_present ?? 0) +
                                    ($previous_present->jubo_unit_present ?? 0) +
                                    ($previous_present->media_unit_present ?? 0) ?:
                                    '',
                                ) }}
                            </td>
                            <td>
                                {{ bangla(
                                    (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_increase ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_increase ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_increase ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_increase ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_increase ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_increase ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->media_unit_increase ?? 0),
                                ) }}
                            </td>
                            <td>
                                {{ bangla(
                                    (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_gatti ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_gatti ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_gatti ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_gatti ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_gatti ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_gatti ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->media_unit_gatti ?? 0),
                                ) }}
                            </td>
                            <td>
                                {{ bangla(
                                    (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_target ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_target ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_target ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_target ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_target ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_target ?? 0) +
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->media_unit_target ?? 0),
                                ) }}
                            </td>
                            <td>
                                {{ bangla(
                                    implementation_rate(
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_target ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_target ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_target ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_target ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_target ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_target ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->media_unit_target ?? 0),
                                        (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_men_increase ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->general_unit_women_increase ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->ulama_unit_increase ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->peshajibi_unit_increase ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->sromik_kollyan_unit_increase ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->jubo_unit_increase ?? 0) +
                                            (int) ($report_sum_data->ward_songothon4_unit_songothons->media_unit_increase ?? 0),
                                    ),
                                ) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="paribarik mb-2">
                <h4 class="fs-6">৫. দাওয়াতি ও পারিবারিক ইউনিট*:</h4>
                <table class="text-center mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="width">ইউনিটের ধরন</th>
                            <th class="width">বিগত সময়ের সংখ্যা</th>
                            <th class="width">বর্তমান সংখ্যা</th>
                            <th class="width">বৃদ্ধি</th>
                            <th class="width">ঘাটতি</th>
                            <th class="width">টার্গেট</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">মোট দাওয়াতি ইউনিট</td>
                            <td>{{ bangla($previous_present->dawati_unit_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->dawati_unit_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon5_dawat_and_paribarik_units->dawati_unit_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon5_dawat_and_paribarik_units->dawati_unit_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon5_dawat_and_paribarik_units->dawati_unit_target ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">মোট পারিবারিক ইউনিট</td>
                            <td>{{ bangla($previous_present->paribarik_unit_previous ?? '') }}</td>
                            <td>{{ bangla($previous_present->paribarik_unit_present ?? '') }}</td>
                            <td>{{ bangla($report_sum_data->ward_songothon5_dawat_and_paribarik_units->paribarik_unit_increase ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon5_dawat_and_paribarik_units->paribarik_unit_gatti ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon5_dawat_and_paribarik_units->paribarik_unit_target ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="font-13">*দাওয়াতি ইউনিট ও পারিবারিক ইউনিটের সংখ্যা মোট সাংগঠনিক ইউনিটে অন্তর্ভুক্ত হবে না।
                </p>
            </div>

            <div class="bidai_chatro mb-3">
                <h4 class="fs-6">৬. বিদায়ী ছাত্র-ছাত্রী জনশক্তির সংগঠনে যোগদান</h4>
                <table class="text-center  mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="">বিবরণ</th>
                            <th class="">সদস্য/ সদস্যা</th>
                            <th class="">সাথী/অগ্রসর কর্মী</th>
                            <th class="">কর্মী</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">যোগদানকৃত ছাত্র-ছাত্রীর সংখ্যা</td>
                            <td>
                                {{ bangla($report_sum_data->ward_songothon6_bidayi_students_connects->Joined_student_man_member ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon6_bidayi_students_connects->Joined_student_women_member ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_songothon6_bidayi_students_connects->Joined_student_man_associate ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon6_bidayi_students_connects->Joined_student_women_associate ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_songothon6_bidayi_students_connects->Joined_student_man_worker ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon6_bidayi_students_connects->Joined_student_women_worker ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="sofor mb-2">
                <div class="d-flex align-items-start gap-2">
                    <div class="left w-50">
                        <h4 class="fs-6 fw-bold">৭. সফর:</h4>
                        <table class="text-center  mb-1">
                            <thead>
                                <tr>
                                    <th class="">সফরের ধরন</th>
                                    <th class="width-40">মোট সংখ্যা</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">ঊর্ধ্বতন দায়িত্বশীলদের সফর</td>
                                    <td>{{ bangla($report_sum_data->ward_songothon7_sofors->upper_leader_sofor ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">ওয়ার্ড আমীর/সভাপতির সফর</td>
                                    <td>{{ bangla($report_sum_data->ward_songothon7_sofors->ward_sovapotir_sofor ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">ওয়ার্ড শূরা/কর্মপরিষদ/টিম সদস্যদের সফর</td>
                                    <td>{{ bangla($report_sum_data->ward_songothon7_sofors->word_sura_sodosso_sofor ?? '') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="right w-50">
                        <h4 class="fs-6 fw-bold">৮. ইয়ানত দাতা:</h4>
                        <table class="text-center  mb-1">
                            <thead>
                                <tr>
                                    <th class="">নতুন ইয়ানত দাতা</th>
                                    <th class="width-35">মোট সংখ্যা</th>
                                    <th class="width-35">অর্থের পরিমাণ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">সহযোগী সদস্য</td>
                                    <td>{{ bangla($report_sum_data->ward_songothon8_iyanot_data->associate_member_total ?? '') }}
                                    </td>
                                    <td>{{ bangla($report_sum_data->ward_songothon8_iyanot_data->associate_member_total_iyanot_amounts ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">সুধী</td>
                                    <td>{{ bangla($report_sum_data->ward_songothon8_iyanot_data->sudhi_total ?? '') }}
                                    </td>
                                    <td>{{ bangla($report_sum_data->ward_songothon8_iyanot_data->sudi_total_iyanot_amounts ?? '') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="boithok mb-4 pb-3">
                <h4 class="fs-6">৯. সাংগঠনিক বৈঠকাদিঃ</h4>
                <table class="text-center mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="width">ক্রমিক</th>
                            <th class="width-30">বৈঠকের ধরন</th>
                            <th class="width-20">সংখ্যা</th>
                            <th class="width-20">টার্গেট</th>
                            <th class="w-25">গড় উপস্থিতি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">১.</td>
                            <td class="text-start">ওয়ার্ড শূরা/কর্মপরিষদ / টিম বৈঠক</td>
                            <td>
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->word_sura_boithok_total ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->kormoporishod_boithok_total ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->team_boithok_total ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->word_sura_boithok_target ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->kormoporishod_boithok_target ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->team_boithok_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->word_sura_boithok_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->word_sura_boithok_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->kormoporishod_boithok_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->kormoporishod_boithok_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->team_boithok_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->team_boithok_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">২.</td>
                            <td class="text-start">ওয়ার্ড বৈঠক</td>
                            <td>{{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->word_boithok_total ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->word_boithok_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->word_boithok_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->word_boithok_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">৩.</td>
                            <td class="text-start">মাসিক সদস্য (রুকন) বৈঠক</td>
                            <td>{{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->masik_sodosso_boithok_total ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->masik_sodosso_boithok_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->masik_sodosso_boithok_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->masik_sodosso_boithok_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">৪.</td>
                            <td class="text-start">ইউনিটে মোট কর্মী বৈঠক</td>
                            <td>{{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->unit_kormi_boithok_total ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->unit_kormi_boithok_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->unit_kormi_boithok_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->unit_kormi_boithok_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">৫.</td>
                            <td class="text-start">উলামা/ যুবক/শ্রমিকদের বৈঠক/সমাবেশ</td>
                            <td>
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->ulama_somabesh_total ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->jubok_somabesh_total ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->sromik_somabesh_total ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->ulama_somabesh_target ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->jubok_somabesh_target ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_songothon9_sangothonik_boithoks->sromik_somabesh_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->ulama_somabesh_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->ulama_somabesh_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->jubok_somabesh_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->jubok_somabesh_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_songothon9_sangothonik_boithoks->sromik_somabesh_total ?? '', $report_sum_data->ward_songothon9_sangothonik_boithoks->sromik_somabesh_uposthiti ?? '')) }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="proshikkhon mb-2">
            <h1 class="font-18 fw-bold">প্ৰশিক্ষণ :</h1>
            <div class="tarbiat mb-3">
                <h4 class="fs-6 fw-bold">ক) তারবিয়াত (নৈতিক শিক্ষা ও সাংগঠনিক প্রশিক্ষণ):</h4>
                <table class="text-center mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="width-5">ক্রমিক</th>
                            <th class="width-40">প্রোগ্রামের ধরন</th>
                            <th class="width">মোট সংখ্যা</th>
                            <th class="width">টার্গেট</th>
                            <th class="">গড় উপস্থিতি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>১.</td>
                            <td class="text-start">ইউনিটে তারবিয়াতী বৈঠক</td>
                            <td>{{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->unit_tarbiati_boithok ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->unit_tarbiati_boithok_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->unit_tarbiati_boithok ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->unit_tarbiati_boithok_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>২.</td>
                            <td class="text-start">ওয়ার্ডভিত্তিক কর্মী শিক্ষা বৈঠক</td>
                            <td>{{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->ward_kormi_sikkha_boithok ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->ward_kormi_sikkha_boithok_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->ward_kormi_sikkha_boithok ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->ward_kormi_sikkha_boithok_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৩.</td>
                            <td class="text-start">ঊর্ধ্বতন সংগঠনের শিক্ষাশিবির/শিক্ষা বৈঠকে অংশগ্রহণকারী</td>
                            <td>
                                {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->urdhotono_sikkha_shibir ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->urdhotono_sikkha_boithok ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->urdhotono_sikkha_shibir_target ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->urdhotono_sikkha_boithok_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->urdhotono_sikkha_shibir ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->urdhotono_sikkha_shibir_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->urdhotono_sikkha_boithok ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->urdhotono_sikkha_boithok_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৪.</td>
                            <td class="text-start">গণশিক্ষা বৈঠক/ গণ নৈশ ইবাদত</td>
                            <td>
                                {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->gono_sikkha_boithok ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->gono_noisho_ibadot ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->gono_sikkha_boithok_target ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->gono_noisho_ibadot_target ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->gono_sikkha_boithok ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->gono_sikkha_boithok_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->gono_noisho_ibadot ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->gono_noisho_ibadot_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৫.</td>
                            <td class="text-start">আলোচনা চক্র</td>
                            <td class="text-start">
                                গ্রুপ সংখ্যা:
                                <span>{{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->alochona_chokro_group ?? '') }}</span>
                            </td>
                            <td class="text-start">
                                অধিবেশন সংখ্যা:
                                <span>{{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->alochona_chokro_program ?? '') }}</span>
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->alochona_chokro_program ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->alochona_chokro_uposthiti ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>৬.</td>
                            <td class="text-start">দারস্/সহীহ কুরআন তিলাওয়াত অনুশীলন</td>
                            <td class="text-start">
                                প্রোগ্রাম সংখ্যা :
                                <span>
                                    {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->darsul_quran_program ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_proshikkhon1_tarbiats->sohih_tilawat_program ?? '') }}
                                </span>
                            </td>
                            <td></td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->darsul_quran_program ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->darsul_quran_uposthiti ?? '')) }}/
                                {{ bangla(calculate_average($report_sum_data->ward_proshikkhon1_tarbiats->sohih_tilawat_program ?? '', $report_sum_data->ward_proshikkhon1_tarbiats->sohih_tilawat_uposthiti ?? '')) }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="hrd">
                <h4 class="fs-6 fw-bold">খ) মানব সম্পদ উন্নয়ন কোর্সসমূহ :</h4>
                <table class="text-center mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="">কোর্সের ধরন</th>
                            <th class="">অংশগ্রহণকারীর সংখ্যা</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">দাওয়াহ / সমাজকর্ম/ মিডিয়া</td>
                            <td>
                                {{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->dawah_uposthiti ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->shomajkormo_uposthiti ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->media_uposthiti ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">আইসিটি/ অফিস/ ফিন্যান্সিয়াল ম্যানেজমেন্ট/ ইংরেজি ভাষা/ আরবি
                                ভাষা</td>
                            <td>
                                {{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->ict_uposthiti ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->office_uposthiti ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->financial_management_uposthiti ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->english_language_uposthiti ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->arabic_language_uposthiti ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ*</td>
                            <td>{{ bangla($report_sum_data->ward_proshikkhon2_manob_shompod_unnoyons->trade_oriented_technical_training_uposthiti ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="font-14">* ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ কোর্সের আওতায় ফার্সিং (পোল্ট্রি, ফিশারিজ, ডেইরি),
                    সেলাই/এমব্রয়ডারী মেশিন অপারেটর, ড্রাইভিং কাম অটোমেকানিক, রন্ধন শিল্প, হর্টিকালচার/নার্সারি, তাঁত
                    শিল্প/বুটিকস, হস্ত শিল্প, ইলেক্ট্রিক্যাল এন্ড ইলেক্ট্রনিক্স সার্ভিসিং, সিভিল
                    কন্সট্রাকশন/প্লাম্বারিং, আমিনশীপ ইত্যাদি কোর্সসমূহের বাস্তবায়ন রিপোর্টের যোগফল এখানে বসাতে হবে।</p>
            </div>
        </div>

        <div class="shomajsheba mt-5">
            <h1 class="font-18 fw-bold">সমাজ সংস্কার ও সমাজসেবা :</h1>
            <div class="personal_shamajik_kaj mb-2">
                <h4 class="fs-6 fw-bold">১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h4>
                <table class="text-center  mb-1">
                    <tr>
                        <td class="text-start px-2 ">মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন</td>
                        <td class="width-20">
                            {{ bangla($report_sum_data->ward_shomajsheba1_personal_social_works->how_many_people_did ?? '') }}
                        </td>
                        <td class="text-start px-2 w-25">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                        <td class="width-20">
                            {{ bangla($report_sum_data->ward_shomajsheba1_personal_social_works->service_received_total ?? '') }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="samostik_shamajik_kaj pt-3 mb-2">
                <h4 class="fs-6 fw-bold">২. সামষ্টিক/সেবা টিমের মাধ্যমে সামাজিক কাজ (প্রযোজ্য ক্ষেত্রে):</h4>
                <table class="mb-1">
                    <tbody>
                        <td class="w-25 text-center">সাধারণ সেবা টিম সংখ্যা</td>
                        <td class="text-center">
                            {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->number_of_general_service_teams ?? '') }}
                        </td>
                        <td class="w-25 text-center">টেকনিক্যাল সেবা টিম সংখ্যা</td>
                        <td class="text-center">
                            {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->number_of_technical_service_teams ?? '') }}
                        </td>
                        <td class="w-25 text-center">স্বেচ্ছাসেবক টিম সংখ্যা</td>
                        <td class="text-center">
                            {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->number_of_volunteer_teams ?? '') }}
                        </td>
                    </tbody>
                </table>
                <table class="text-center  mb-1">
                    <thead>
                        <tr>
                            <th class="width-35">বিবরণ</th>
                            <th class="width-15">সংখ্যা</th>
                            <th class="width-35">বিবরণ</th>
                            <th class="width-15">সংখ্যা</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">ছোট-ছোট উন্নয়নমূলক কাজ</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->minor_unnoyonmulok_kaj ?? '') }}
                            </td>
                            <td class="text-start px-2">টেকনিক্যাল সেবা প্রদান (কতজন / কতজনকে)</td>
                            <td>
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->technical_services_prodan_kotojonke ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->online_services_prodan_kotojonke ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2 font-13">সামাজিক অনুষ্ঠানে অশংগ্রহণ/সহায়তা প্রদান (সংখ্যা /
                                কতজনকে)</td>
                            <td>
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->shamajik_onusthane_ongshogrohon ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->shamajik_onusthane_shohayota_prodan ?? '') }}
                            </td>
                            <td class="text-start px-2">অনলাইনের মাধ্যমে সেবা প্রদান (কতজনকে)</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->online_services_prodan_kotojonke ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->shamajik_birodh_mimangsha ?? '') }}
                            </td>
                            <td class="text-start px-2">বৃক্ষরোপন (কতটি)</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->brikkho_ropon ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">মানবিক সহায়তা প্রদান (কতজনকে)</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->manobik_shohayota_prodan ?? '') }}
                            </td>
                            <td class="text-start px-2">জনসচেতনতামূলক প্রোগ্রাম (কতটি)</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->public_awareness_programs ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">কর্জে হাসানা প্রদান (কতজনকে )</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->korje_hasana_prodan ?? '') }}
                            </td>
                            <td class="text-start px-2">ত্রাণ বিতরণ (কতজনকে)</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->tran_bitoron ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">পরিষ্কার-পরিচ্ছন্নতা/মশক নিধন অভিযান</td>
                            <td>
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->porishkar_poricchonnota_ovijan ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->moshok_nidhon_ovijan ?? '') }}
                            </td>
                            <td class="text-start px-2">ভিন্নধর্মাবলম্বীদের সেবা প্রদান (কতজন/কতজনকে)</td>
                            <td>
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->vinnodhormabolombider_service_prodan_kotojon ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->vinnodhormabolombider_service_prodan_kotojonke ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)</td>
                            <td>
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->rogir_poricorja ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->medical_shohayota_prodan ?? '') }}
                            </td>
                            <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে )</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->mayeter_gosol_kotojonke ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                            <td>
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->voluntarily_blood_donation_kotojon ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->voluntarily_blood_donation_kotojonke ?? '') }}
                            </td>
                            <td class="text-start px-2">জানাযায় অংশগ্রহণ</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->janajay_ongshogrohon ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">নবজাতককে গিফ্‌ট প্রদান (কতজনকে)</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->nobojatokke_gift_prodan ?? '') }}
                            </td>
                            <td class="text-start px-2">স্বল্প পুঁজিতে কর্মসংস্থানের সহায়তা (কতজনকে)</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->low_capital_employment_kotojonke ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ভ্রাম্যমান স্কুল/মক্তব চালু</td>
                            <td>
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->vrammoman_school_calu ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->vrammoman_moktob_calu ?? '') }}
                            </td>
                            <td class="text-start px-2">অন্যান্য......</td>
                            <td>{{ bangla($report_sum_data->ward_shomajsheba2_group_social_works->others ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="shastho_poribar_kollan mb-2">
                <div class="d-flex align-items-start gap-2">
                    <div class="left w-50">
                        <h4 class="fs-6 fw-bold">৩. স্বাস্থ্য ও পরিবার কল্যাণমূলক কাজ</h4>
                        <table class="text-center  mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-start px-2 width-70">স্বাস্থ্যকর্মী প্রশিক্ষণ প্রোগ্রামে মোট
                                        অংশগ্রহণকারীর সংখ্যা</td>
                                    <td>{{ bangla($report_sum_data->ward_shomajsheba3_health_and_family_kollans->health_worker_training_programs_attendance ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কতজন স্বাস্থ্যসেবা কাজে অংশগ্রহণ করেছেন</td>
                                    <td>{{ bangla($report_sum_data->ward_shomajsheba3_health_and_family_kollans->participated_in_health_care_work ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">সেবাপ্রাপ্ত সংখ্যা</td>
                                    <td>{{ bangla($report_sum_data->ward_shomajsheba3_health_and_family_kollans->served_people ?? '') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="right w-50">
                        <h4 class="fs-6 fw-bold">৪. প্রাতিষ্ঠানিক উদ্যোগে সামাজিক কাজ:</h4>
                        <table class="text-center  mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-start px-2 width-70">কতটি সামাজিক প্রতিষ্ঠান রয়েছে</td>
                                    <td>{{ bangla($report_sum_data->ward_shomajsheba4_institutional_social_works->shamajik_protishthan_kototi ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কতটি প্রতিষ্ঠানে সামাজিক কাজ হয়েছে</td>
                                    <td>{{ bangla($report_sum_data->ward_shomajsheba4_institutional_social_works->shamajik_protishthan_kototite_kaj_hoyeche ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2 font-13">কতটি নতুন সামাজিক প্রতিষ্ঠান চালু করা হয়েছে
                                        (প্রযোজ্য ক্ষেত্রে)</td>
                                    <td>{{ bangla($report_sum_data->ward_shomajsheba4_institutional_social_works->new_shamajik_protishthan ?? '') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="rartrio">
            <h1 class="font-18 fw-bold">রাষ্ট্রীয় সংস্কার ও সংশোধন :</h1>
            <div class="rajnoitik_jogajog">
                <h4 class="fs-6 fw-bold">১. রাজনৈতিক ও প্রশাসনিক যোগাযোগ</h4>
                <table class="text-center  mb-1">
                    <thead>
                        <tr>
                            <th>যোগাযোগের ধরন</th>
                            <th>মোট কতজন যোগাযোগ করেছেন</th>
                            <th>মোট কতজনের সাথে যোগাযোগ হয়েছে</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">রাজনৈতিক ব্যক্তিবর্গ</td>
                            <td>{{ bangla($report_sum_data->ward_rastrio1_political_communications->rajnoitik_bekti_jogajog_koreche_kotojon ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_rastrio1_political_communications->rajnoitik_bekti_jogajog_koreche_kotojonke ?? '') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">প্রশাসনিক ব্যক্তিবর্গ</td>
                            <td>{{ bangla($report_sum_data->ward_rastrio1_political_communications->proshoshonik_bekti_jogajog_koreche_kotojon ?? '') }}
                            </td>
                            <td>{{ bangla($report_sum_data->ward_rastrio1_political_communications->proshoshonik_bekti_jogajog_koreche_kotojonke ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="kormoshuchi_bastobayon">
                <h4 class="fs-6 fw-bold">২. কর্মসূচি বাস্তবায়ন</h4>
                <div class="d-flex align-items-start gap-2">
                    <div class="left width-55">
                        <table class="text-center mb-1">
                            <thead>
                                <tr>
                                    <th class="width-55">কর্মসূচির বিবরণ</th>
                                    <th>মোট সংখ্যা</th>
                                    <th>গড় উপস্থিতি</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2 ">কেন্দ্র ঘোষিত রাজনৈতিক কর্মসূচি পালন</td>
                                    <td>{{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->centrally_announced_political_program ?? '') }}
                                    </td>
                                    <td>
                                        {{ bangla(calculate_average($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->centrally_announced_political_program ?? '', $report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->centrally_announced_political_program_attend ?? '')) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2 font-13">স্থানীয়ভাবে ঘোষিত কর্মসূচি :
                                        জনসভা/সমাবেশ/মিছিল</td>
                                    <td class="font-13">
                                        {{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_jonoshova ?? '') }}/
                                        {{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_shomabesh ?? '') }}/
                                        {{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_michil ?? '') }}
                                    </td>
                                    <td class="font-13">
                                        {{ bangla(calculate_average($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_jonoshova ?? '', $report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_jonoshova_attend ?? '')) }}/
                                        {{ bangla(calculate_average($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_shomabesh ?? '', $report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_shomabesh_attend ?? '')) }}/
                                        {{ bangla(calculate_average($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_michil ?? '', $report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->locally_announced_michil_attend ?? '')) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="right width-45">
                        <table class="text-center  mb-1">
                            <thead>
                                <tr>
                                    <th class="width-60">কর্মসূচির বিবরণ</th>
                                    <th>মোট সংখ্যা</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2 font-14">পোস্টার/লিফলেট/বুকলেট/স্মারকলিপি বিতরণ</td>
                                    <td class="font-13">
                                        {{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->poster_bitoron ?? '') }}/
                                        {{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->leaflet_bitoron ?? '') }}/
                                        {{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->booklet_bitoron ?? '') }}/
                                        {{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->sharoklipi_bitoron ?? '') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">অন্যান্য</td>
                                    <td>{{ bangla($report_sum_data->ward_rastrio2_kormoshuchi_bastobayons->others ?? '') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="dibosh">
                <h4 class="fs-6 fw-bold">৩. জাতীয় ও আন্তর্জাতিক দিবস পালন:</h4>
                <table class="text-center  mb-1">
                    <thead>
                        <tr>
                            <th>দিবসসমূহ</th>
                            <th>মোট প্রোগ্রাম সংখ্যা</th>
                            <th>গড় উপস্থিতি</th>
                            <th>দিবসসমূহ</th>
                            <th>মোট প্রোগ্রাম সংখ্যা</th>
                            <th>গড় উপস্থিতি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">স্বাধীনতা ও জাতীয় দিবস</td>
                            <td>{{ bangla($report_sum_data->ward_rastrio3_dibosh_palons->shadhinota_o_jatio_dibosh_total_programs ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_rastrio3_dibosh_palons->shadhinota_o_jatio_dibosh_total_programs ?? '', $report_sum_data->ward_rastrio3_dibosh_palons->shadhinota_o_jatio_dibosh_attend ?? '')) }}
                            </td>
                            <td class="text-start">আন্তর্জাতিক মাতৃভাষা দিবস</td>
                            <td>{{ bangla($report_sum_data->ward_rastrio3_dibosh_palons->mattrivasha_dibosh_total_programs ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_rastrio3_dibosh_palons->mattrivasha_dibosh_total_programs ?? '', $report_sum_data->ward_rastrio3_dibosh_palons->mattrivasha_dibosh_attend ?? '')) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">বিজয় দিবস</td>
                            <td>{{ bangla($report_sum_data->ward_rastrio3_dibosh_palons->bijoy_dibosh_total_programs ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_rastrio3_dibosh_palons->bijoy_dibosh_total_programs ?? '', $report_sum_data->ward_rastrio3_dibosh_palons->bijoy_dibosh_attend ?? '')) }}
                            </td>
                            <td class="text-start">অন্যান্য</td>
                            <td>{{ bangla($report_sum_data->ward_rastrio3_dibosh_palons->others_total_programs ?? '') }}
                            </td>
                            <td>
                                {{ bangla(calculate_average($report_sum_data->ward_rastrio3_dibosh_palons->others_total_programs ?? '', $report_sum_data->ward_rastrio3_dibosh_palons->others_attend ?? '')) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="nirbachon">
                <h4 class="fs-6 fw-bold">৪. জাতীয় ও স্থানীয় নির্বাচনভিত্তিক কার্যক্রম:</h4>
                <table class="text-center  mb-1">
                    <thead>
                        <tr>
                            <th>নির্বাচনের ধরন</th>
                            <th>মোট প্রার্থী সংখ্যা</th>
                            <th>নির্বাচিত সংখ্যা</th>
                            <th>দ্বিতীয় অবস্থান</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">কাউন্সিলর/মেম্বার</td>
                            <td>
                                {{ bangla($report_sum_data->ward_rastrio4_election_activities->councilor_candidate ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_rastrio4_election_activities->member_candidate ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_rastrio4_election_activities->councilor_candidate_elected ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_rastrio4_election_activities->member_candidate_elected ?? '') }}
                            </td>
                            <td>
                                {{ bangla($report_sum_data->ward_rastrio4_election_activities->councilor_candidate_second_position ?? '') }}
                                /
                                {{ bangla($report_sum_data->ward_rastrio4_election_activities->member_candidate_second_position ?? '') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex align-items-start gap-2">
                    <table class="text-center mb-2 width-60">
                        <thead>
                            <tr>
                                <th class="width-45">প্রস্তুতিমূলক কার্যক্রমের ধরন</th>
                                <th>সংখ্যা</th>
                                <th>বৃদ্ধি</th>
                                <th>টার্গেট</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">মোট ভোট কেন্দ্র (জাতীয়/স্থানীয়)</td>
                                <td>
                                    {{ bangla($previous_present->national_vote_kendro_present ?? '') }} /
                                    {{ bangla($previous_present->local_vote_kendro_present ?? '') }}
                                </td>
                                <td>
                                    {{ bangla($report_sum_data->ward_rastrio4_election_activities->national_vote_kendro_increase ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_rastrio4_election_activities->local_vote_kendro_increase ?? '') }}
                                </td>
                                <td>
                                    {{ bangla($report_sum_data->ward_rastrio4_election_activities->national_vote_kendro_target ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_rastrio4_election_activities->local_vote_kendro_target ?? '') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">ভোট কেন্দ্র কমিটি/কেন্দ্র/ বুথভিত্তিক ইউনিট</td>
                                <td>
                                    {{ bangla($previous_present->vote_kendro_committee_present ?? '') }} /
                                    {{ bangla($previous_present->vote_kendro_vittik_unit_present ?? '') }}
                                </td>
                                <td>
                                    {{ bangla($report_sum_data->ward_rastrio4_election_activities->vote_kendro_committee_increase ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_rastrio4_election_activities->vote_kendro_vittik_unit_increase ?? '') }}
                                </td>
                                <td>
                                    {{ bangla($report_sum_data->ward_rastrio4_election_activities->vote_kendro_committee_target ?? '') }}
                                    /
                                    {{ bangla($report_sum_data->ward_rastrio4_election_activities->vote_kendro_vittik_unit_target ?? '') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="text-center w-25">
                        <thead>
                            <tr>
                                <th>নির্বাচন পরিচালনা কমিটির বৈঠক সংখ্যা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ bangla($report_sum_data->ward_rastrio4_election_activities->election_management_committee_meeting ?? '') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="baytulmal">
            <div class="title negative_margine">
                <h1>বাইতুলমাল</h1>
            </div>
            <p class="fs-6 fw-bold">ধার্যকৃত নিছাব :</p>
            <table class="text-center  mb-1 table_layout_fixed">
                <thead>
                    <tr>
                        <th class="text-center" colspan="2">আয়ের বিবরণ</th>
                        <th class="text-center" colspan="2">জমার পরিমাণ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-0 vertical_align_baseline" colspan="2">
                            <table class="border_none">
                                <tbody>
                                    @foreach ($income_report->category_wise_data as $income_category)
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">
                                                {{ $income_category->category_name }}</td>
                                            <td class="border_left_bottom">{{ bangla($income_category->amount) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                        <td class="p-0 vertical_align_baseline" colspan="2">
                            <table class="border_none">
                                <tbody>
                                    @foreach ($expense_report->category_wise_data as $expense_category)
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">
                                                {{ $expense_category->category_name }}</td>
                                            <td class="border_left_bottom">{{ bangla($expense_category->amount) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-end px-2">মোট</td>
                        <td>{{ bangla($income_report->total_amount) }}</td>
                        <td class="text-end px-2">মোট</td>
                        <td>{{ bangla($expense_report->total_amount) }}</td>
                    </tr>
                    <tr>
                        <td class="text-end px-2">গত মাসের উদ্বৃত্ত</td>
                        <td>{{ bangla($total_previous) }}</td>
                        <td class="text-end px-2">এ মাসের উদ্বৃত্ত</td>
                        <td>{{ bangla($total_current_income) }}</td>
                    </tr>
                    <tr>
                        <td class="text-end px-2">সর্বমোট</td>
                        <td>{{ bangla($total_current_income) }}</td>
                        <td class="text-end px-2">সর্বমোট</td>
                        <td>{{ bangla($in_total) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="montobbo">
            <h1 class="fs-6 fw-bold">ওয়ার্ড আমীর/সভাপতির মন্তব্য :</h1>
            <p>{{ $report_sum_data->ward_montobbos?->montobbo }}</p>
        </div>
    </section>

    <a href="javascript:void(0)" class="print_preview" onclick="print_upload_page(event)">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" class="go_back_to_dashboard" onclick="go_back_to_dashboard(event)">
        <i class="fa-solid fa-door-open"></i>
    </a>

    <script>
        function print_upload_page(event) {
            event.preventDefault();

            // Get the current URL query parameters
            const queryParams = new URLSearchParams(window.location.search);

            // Extract the user_id and month from the URL
            const user_id = queryParams.get('user_id');
            const month = queryParams.get('month');

            if (user_id && month) {
                // Construct the new URL
                const redirectUrl = `/dashboard/ward#/ward-report-upload/${month}/${user_id}`;

                // Redirect to the new URL
                window.location.href = redirectUrl;
            } else {
                console.error("Required query parameters are missing in the current URL.");
            }
        }

        function go_back_to_dashboard(event) {
            event.preventDefault();

            // Get the current URL query parameters
            const queryParams = new URLSearchParams(window.location.search);

            // Extract the user_id and month from the URL
            const user_id = queryParams.get('user_id');
            const month = queryParams.get('month');

            if (user_id && month) {
                // Construct the new URL
                const redirectUrl = `/dashboard/ward#/dashboard`;

                // Redirect to the new URL
                window.location.href = redirectUrl;
            } else {
                console.error("Required query parameters are missing in the current URL.");
            }
        }
        // for  print report autometicly
        window.addEventListener('load', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('print') === 'true') {
                setTimeout(() => {
                    window.print();
                }, 200);
            }
        });
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
