<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Report || unit</title>

        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
        {{-- <link rel="stylesheet" href="{{ asset('css/unit/default.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/unit/unit_report.css') }}">
        <style>
            @media print {
                .print_preview {
                    display: none;
                }
            }
        </style>

    </head>
    <body>
        <section id="heading" class="mt-3">
            <div class="report_heading position-relative mb-1">
                <h3 class="text-center fs-6">বিসমিল্লাহির রাহমানির রাহীম</h3>
                <h1 class="text-center mb-2 fs-4">ইউনিট সংগঠনের মাসিক রিপোর্ট (জমা দেওয়া ইউনিটের টোটাল)</h1>
                {{-- <div class="org_gender position-absolute">
                    <p>{{$unit_info['org_gender']?? ""}}</p>
                </div> --}}
            </div>
            <div class="unit_info">
                <div class="line d-flex flex-wrap mb-1">
                    <p class="w-75">মাস: {{ bangla_month(date('F', strtotime($month))) }}</p>
                    <p class="w-25">সন: {{ bangla(date('Y', strtotime($month))) }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between mb-1">
                    <p>ইউনিটের সংখ্যা: {{bangla($number_of_unit)?? ""}}</p>
                    {{-- <p>ওয়ার্ড নং ও নাম: {{$ward_info['no']?? ""}} ও {{$ward_info['title']?? ""}}</p> --}}
                    {{-- <p class="w-25">উপজেলা/থানা: {{$thana_info['title']?? ""}}</p> --}}
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>ইউনিট সমুহের নাম :
                        @foreach ($unit_names as $unit_name)
                            <span class="">{{$unit_name}},</span>
                        @endforeach
                    </p>
                    {{-- <p class="width-30">ইউনিটের ধরন: {{$org_type['title']?? "" }}</p> --}}
                </div>
            </div>
        </section>

        <section id="report">
                <div class="dawat mt-1">
                    <h1 class="font-18">দাওয়াত ও তাবলিগ :</h1>
                    <div class="jonoshadharon d-flex flex-wrap justify-content-between mb-2">
                        <p class="fw-bold w-75">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদান সংখ্যা* :
                            <span>
                                {{bangla(
                                    ($data->dawat1_how_many_have_been_invited ?? 0) +
                                    ($data->dawat2_how_many_have_been_invited ?? 0) +
                                    ($data->dawat3_how_many_were_give_dawat?? 0) +
                                    ($data->dawat4_how_many_have_been_invited?? 0) +
                                    ($data->dawat4_jela_mohanogor_declared_gonosonjog_invited?? 0)
                                )}}
                            </span>
                        </p>
                        <p class="fw-bold w-25">টার্গেট:</p>
                        <p class="mt-1 ps-3 font-13">* দাওয়াত ও তাবলিগের 'ক' এর অধীনে ক্রমিক ১ - ৪নং পর্যন্ত দাওয়াত প্রদান সংখ্যা যোগ করে এখানে বসাতে হবে ।</p>
                    </div>
                    <div class="group_dawat mb-2">
                        <h4 class="fs-6">১. নিয়মিত গ্রুপভিত্তিক দাওয়াত :</h4>
                        <table class="text-center  ">
                            <thead>
                                <tr>
                                    <th >কতটি গ্রুপ বের হয়েছে</th>
                                    <th >অংশগ্রহণকারীর সংখ্যা </th>
                                    <th >কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                                    <th >কতজন সহযোগী সদস্য হয়েছেন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >{{bangla($data->dawat1_how_many_groups_are_out?? "")}}</td>
                                    <td >{{bangla($data->dawat1_number_of_participants?? "")}}</td>
                                    <td >{{bangla($data->dawat1_how_many_have_been_invited?? "")}}</td>
                                    <td >{{bangla($data->dawat1_how_many_associate_members_created?? "")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- {{dd($data);}} --}}
                    <div class="personal_dawat mb-2">
                        <h4 class="fs-6">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:</h4>
                        <table class="text-center  ">
                            <thead>
                                <tr>
                                    <th >বিবরণ</th>
                                    <th class="width-15">সদস্য (রুকন)</th>
                                    <th class="width-15">কর্মী</th>
                                    <th >বিবরণ</th>
                                    <th class="width-15">সংখ্যা</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">মোট জনশক্তি সংখ্যা</td>
                                    <td >{{bangla($data->dawat2_total_rokon?? "")}}</td>
                                    <td >{{bangla($data->dawat2_total_worker?? "")}}</td>
                                    <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                    <td >{{bangla($data->dawat2_how_many_have_been_invited?? "")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                                    <td >{{bangla($data->dawat2_how_many_were_give_dawat_rokon?? "")}}</td>
                                    <td >{{bangla($data->dawat2_how_many_were_give_dawat_worker?? "")}}</td>
                                    <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                    <td >{{bangla($data->dawat2_how_many_associate_members_created?? "")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="shadharon_shova mb-2">
                        <h4 class="fs-6">৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের মাধ্যমে দাওয়াত :</h4>
                        <table class="text-center  table_layout_fixed">
                            <thead>
                                <tr>
                                    <th >মোট কতজনকে দাওয়াত প্রদান করা হয়েছে</th>
                                    <th >মোট কতজন সহযোগী সদস্য হয়েছেন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >{{bangla($data->dawat3_how_many_were_give_dawat?? "")}}</td>
                                    <td >{{bangla($data->dawat3_how_many_associate_members_created?? "")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="gonoshongjog mb-2">
                        <h4 class="fs-6">৪. গণসংযোগ ও দাওয়াতি অভিযান পালন*:</h4>
                        <table class="text-center  ">
                            <thead>
                                <tr>
                                    <th class="width">বিবরণ</th>
                                    <th class="width-15">মোট গ্রুপ সংখ্যা</th>
                                    <th class="width-15">অংশগ্রহণকারীর সংখ্যা</th>
                                    <th class="width-20">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                                    <th class="width-15">কতজন সহযোগী সদস্য হয়েছেন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">গণসংযোগ দশক / পক্ষ</td>
                                    <td >{{bangla($data->dawat4_total_gono_songjog_group?? "")}}</td>
                                    <td >{{bangla($data->dawat4_total_attended?? "")}}</td>
                                    <td >{{bangla($data->dawat4_how_many_have_been_invited?? "")}}</td>
                                    <td >{{bangla($data->dawat4_how_many_associate_members_created?? "")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান</td>
                                    <td >{{bangla($data->dawat4_jela_mohanogor_declared_gonosonjog_group?? "")}}</td>
                                    <td >{{bangla($data->dawat4_jela_mohanogor_declared_gonosonjog_attended?? "")}}</td>
                                    <td >{{bangla($data->dawat4_jela_mohanogor_declared_gonosonjog_invited?? "")}}</td>
                                    <td >{{bangla($data->dawat4_jela_mohanogor_declared_gonosonjog_associated_created?? "")}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>* গণসংযোগ অভিযান পালনের সময় গ্রুপ সংখ্যা, ব্যক্তিগত ও গ্রুপভিত্তিক সহযোগী সদস্য বৃদ্ধি সংখ্যা শুধুমাত্র এই ছকেই বসাতে হবে।</p>
                    </div>
                </div>
                <h1 class="font-18">খ) বিভাগ ভিত্তিক তথ্য :</h1>
                <div class="bivag">
                    <div class="talimul_quran mb-2">
                        <h4 class="fs-6">১. তালিমুল কুরআনের মাধ্যমে দাওয়াত</h4>
                        <table class="text-center  mb-1">
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
                                    <td >{{bangla($data->department1_teacher_rokon?? "")}}</td>
                                    <td >{{bangla($data->department1_teacher_worker?? "")}}</td>
                                    <td>
                                        {{ ($data->department1_teacher_rokon ?? null) !== null || ($data->department1_teacher_worker ?? null) !== null
                                            ? bangla(($data->department1_teacher_rokon ?? 0) + ($data->department1_teacher_worker ?? 0))
                                            : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                                    <td >{{bangla($data->department1_student_rokon?? "")}}</td>
                                    <td >{{bangla($data->department1_student_worker?? "")}}</td>
                                    <td>
                                        {{ ($data->department1_student_rokon ?? null) !== null || ($data->department1_student_worker ?? null) !== null
                                            ? bangla(($data->department1_student_rokon ?? 0) + ($data->department1_student_worker ?? 0))
                                            : ""
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center table_layout_fixed">
                            <thead>
                                <tr>
                                    <th class="">কতজন সহীহ তিলাওয়াত শিখেছেন</th>
                                    <th class="">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                                    <th class="">কতজন সহযোগী সদস্য হয়েছেন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >{{bangla($data->department1_how_much_learned_quran?? "")}}</td>
                                    <td >{{bangla($data->department1_how_much_invited?? "")}}</td>
                                    <td >{{bangla($data->department1_how_much_been_associated?? "")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="job_holder">
                        <h4 class="fs-6">২. বিভিন্ন শ্রেণি-পেশার মানুষের মাঝে দাওয়াত</h4>
                        <table class="text-center  mb-1">
                            <thead>
                                <tr>
                                    <th class="">শ্রেণি-পেশার বিবরণ</th>
                                    <th class="">কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে</th>
                                    <th class="">কতজন সহযোগী সদস্য হয়েছেন</th>
                                    <th class="width-20">টার্গেট</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">রাজনৈতিক ও বিশিষ্ট ব্যক্তিবর্গ</td>
                                    <td >{{bangla($data->department4_political_and_special_invited?? "")}}</td>
                                    <td >{{bangla($data->department4_political_and_special_been_associated?? "")}}</td>
                                    <td >{{bangla($data->department4_political_and_special_target?? "")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)</td>
                                    <td >{{bangla($data->department4_prantik_jonogosti_invited?? "")}}</td>
                                    <td >{{bangla($data->department4_prantik_jonogosti_been_associated?? "")}}</td>
                                    <td >{{bangla($data->department4_prantik_jonogosti_target?? "")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">ভিন্নধর্মাবলম্বী</td>
                                    <td >{{bangla($data->department4_vinno_dormalombi_invited?? "")}}</td>
                                    <td >{{bangla($data->department4_vinno_dormalombi_been_associated?? "")}}</td>
                                    <td >{{bangla($data->department4_vinno_dormalombi_target?? "")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="poribar mb-2">
                        <h4 class="fs-6">৩. পরিবারভিত্তিক দাওয়াত:</h4>
                        <table class="text-center mb-1 table_layout_fixed">
                            <thead>
                                <tr>
                                    <th class="">দাওয়াতি কাজে অংশগ্রহণকারী পরিবার সংখ্যা</th>
                                    <th class="">কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >{{bangla($data->department5_total_attended_family?? "")}}</td>
                                    <td >{{bangla($data->department5_how_many_new_family_invited?? "")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h1 class="font-18">গ) দাওয়াহ্ ও প্রকাশনা:</h1>
                <div class="dawah_prokashona">
                    <table class="text-center mb-1">
                        <thead>
                            <tr>
                                <th class="width-20">বিবরণ</th>
                                <th class="width-10">সংখ্যা</th>
                                <th class="width-10">বৃদ্ধি</th>
                                <th class="width-30">বিবরণ</th>
                                <th class="">সংখ্যা</th>
                                <th class="">বৃদ্ধি</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">বই বিলিকেন্দ্ৰ</td>
                                <td >{{bangla($data->prokashona_unit_book_distribution_center?? "")}}</td>
                                <td >{{bangla($data->prokashona_unit_book_distribution_center_increase?? "")}}</td>

                                <td class="text-start px-2">বইয়ের সফ্ট কপি বিলি<span>(সংগঠন অনুমোদিত)</span></td>
                                <td >{{bangla($data->prokashona_soft_copy_book_distribution?? "")}}</td>
                                <td >{{bangla($data->prokashona_soft_copy_book_distribution_increase?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">বই</td>
                                <td >{{bangla($data->prokashona_books_in_pathagar?? "")}}</td>
                                <td >{{bangla($data->prokashona_books_in_pathagar_increase?? "")}}</td>

                                <td class="text-start px-2">দাওয়াতি লিংক বিতরণ<span>(সংগঠন অনুমোদিত)</span></td>
                                <td >{{bangla($data->prokashona_dawat_link_distribution?? "")}}</td>
                                <td >{{bangla($data->prokashona_dawat_link_distribution_increase?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">বই বিলি/বিক্রি</td>
                                <td >{{bangla($data->prokashona_unit_book_distribution?? "")}}</td>
                                <td >{{bangla($data->prokashona_unit_book_distribution_increase?? "")}}</td>

                                <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/ পৃথিবী কত কপি চলে</td>
                                <td >
                                    {{bangla($data->prokashona_sonar_bangla?? "")}} /
                                    {{bangla($data->prokashona_songram?? "")}} /
                                    {{bangla($data->prokashona_prithibi?? "")}}
                                </td>
                                <td >
                                    {{bangla($data->prokashona_sonar_bangla_increase?? "")}} /
                                    {{bangla($data->prokashona_songram_increase?? "")}} /
                                    {{bangla($data->prokashona_prithibi_increase?? "")}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h1 class="font-18">ঘ) কর্মসূচি বাস্তবায়ন</h1>
                <div class="dawah_prokashona">
                    <table class="text-center mb-1">
                        <thead>
                            <tr>
                                <th class="width-10px">ক্র</th>
                                <th class="width-30">কর্মসূচির বিবরণ</th>
                                <th class="">সংখ্যা</th>
                                <th class="">টার্গেট</th>
                                <th class="">গড় উপস্থিতি</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td >১.</td>
                                <td class="text-start px-2">মাসিক সাধারণ সভা</td>
                                <td >{{bangla($data->kormosuci_unit_masik_sadaron_sova_total?? "")}}</td>
                                <td >{{bangla($data->kormosuci_unit_masik_sadaron_sova_target?? "")}}</td>
                                <td >
                                    @if($data && isset($data->kormosuci_unit_masik_sadaron_sova_uposthiti) && isset($data->kormosuci_unit_masik_sadaron_sova_total) && $data->kormosuci_unit_masik_sadaron_sova_total != 0)
                                        {{bangla(round($data->kormosuci_unit_masik_sadaron_sova_uposthiti / $data->kormosuci_unit_masik_sadaron_sova_total))}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td >২.</td>
                                <td class="text-start px-2">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                                <td >
                                    {{bangla($data->kormosuci_iftar_mahfil_personal_total?? "  ")}} /
                                    {{bangla($data->kormosuci_iftar_mahfil_samostic_total?? "")}}
                                </td>
                                <td >
                                    {{bangla($data->kormosuci_iftar_mahfil_personal_target?? "  ")}} /
                                    {{bangla($data->kormosuci_iftar_mahfil_samostic_target?? "")}}
                                </td>
                                <td >
                                    @if($data && isset($data->kormosuci_iftar_mahfil_personal_uposthiti) && isset($data->kormosuci_iftar_mahfil_personal_total) && $data->kormosuci_iftar_mahfil_personal_total != 0)
                                        {{bangla(round($data->kormosuci_iftar_mahfil_personal_uposthiti / $data->kormosuci_iftar_mahfil_personal_total))}}
                                    @else
                                        {{"  "}}
                                    @endif
                                     /
                                     @if($data && isset($data->kormosuci_iftar_mahfil_samostic_uposthiti) && isset($data->kormosuci_iftar_mahfil_samostic_total) && $data->kormosuci_iftar_mahfil_samostic_total != 0)
                                        {{bangla(round($data->kormosuci_iftar_mahfil_samostic_uposthiti / $data->kormosuci_iftar_mahfil_samostic_total))}}
                                    @else
                                        {{"  "}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td >৩.</td>
                                <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                                <td >
                                    {{bangla($data->kormosuci_cha_chakra_total?? "")}} /
                                    {{bangla($data->kormosuci_samostic_khawa_total?? "")}} /
                                    {{bangla($data->kormosuci_sikkha_sofor_total?? "")}}
                                </td>
                                <td >
                                    {{bangla($data->kormosuci_cha_chakra_target?? "")}} /
                                    {{bangla($data->kormosuci_samostic_khawa_target?? "  ")}} /
                                    {{bangla($data->kormosuci_sikkha_sofor_target?? "  ")}}
                                </td>
                                <td >
                                    @if($data && isset($data->kormosuci_cha_chakra_uposthiti) && isset($data->kormosuci_cha_chakra_total) && $data->kormosuci_cha_chakra_total != 0)
                                        {{bangla(round($data->kormosuci_cha_chakra_uposthiti / $data->kormosuci_cha_chakra_total))}}
                                    @else
                                        {{""}}
                                    @endif
                                    /
                                    @if($data && isset($data->kormosuci_samostic_khawa_uposthiti) && isset($data->kormosuci_samostic_khawa_total) && $data->kormosuci_samostic_khawa_total != 0)
                                        {{bangla(round($data->kormosuci_samostic_khawa_uposthiti / $data->kormosuci_samostic_khawa_total?? 0))}}
                                    @else
                                        {{""}}
                                    @endif
                                    /
                                    @if($data && isset($data->kormosuci_sikkha_sofor_uposthiti) && isset($data->kormosuci_sikkha_sofor_total) && $data->kormosuci_sikkha_sofor_total != 0)
                                        {{bangla(round($data->kormosuci_sikkha_sofor_uposthiti / $data->kormosuci_sikkha_sofor_total?? 0))}}
                                    @else
                                        {{""}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </section>
        <section class="margine_top_page_change">
            <div class="songothon">
                <h1 class="font-18">সংগঠন :</h1>
                <div class="jonoshokti mb-2">
                    <h4 class="fs-6">১. জনশক্তি</h4>
                    <table class="text-center  mb-1 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="">জনশক্তি ধরন</th>
                                <th class="">বিগত মাসের সংখ্যা</th>
                                <th class="">বর্তমান সংখ্যা</th>
                                <th class="">বৃদ্ধি</th>
                                <th class="">ঘাটতি</th>
                                <th class="">টার্গেট</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">সদস্য (রুকন)</td>
                                <td >{{bangla($data->songothon1_rokon_previous?? "")}} </td>
                                <td >{{bangla($data->songothon1_rokon_present?? "")}} </td>
                                <td >{{bangla($data->songothon1_rokon_briddhi?? "")}} </td>
                                <td >{{bangla($data->songothon1_rokon_gatti?? "")}} </td>
                                <td >{{bangla($data->songothon1_rokon_target?? "")}} </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কর্মী</td>
                                <td >{{bangla($data->songothon1_worker_previous?? "")}} </td>
                                <td >{{bangla($data->songothon1_worker_present?? "")}} </td>
                                <td >{{bangla($data->songothon1_worker_briddhi?? "")}} </td>
                                <td >{{bangla($data->songothon1_worker_gatti?? "")}} </td>
                                <td >{{bangla($data->songothon1_worker_target?? "")}} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="shohojogi mb-2">
                    <h4 class="fs-6">২. সহযোগী সদস্য ও ভিন্নধর্মাবলম্বী :</h4>
                    <table class="text-center  mb-1">
                        <thead>
                            <tr>
                                <th class="w-25">সহযোগী</th>
                                <th class="width-20">বিগত মাসের সংখ্যা</th>
                                <th class="width-20">বর্তমান সংখ্যা</th>
                                <th class="width-15">বৃদ্ধি</th>
                                <th class="width-20">টার্গেট</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">সহযোগী সদস্য*</td>
                                <td >{{bangla($data->songothon2_associate_member_previous?? "")}}</td>
                                <td >{{bangla($data->songothon2_associate_member_present?? "")}}</td>
                                <td >{{bangla($data->songothon2_associate_member_briddhi?? "")}}</td>
                                <td >{{bangla($data->songothon2_associate_member_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ভিন্নধর্মাবলম্বী কর্মী/সহযোগী সদস্য</td>
                                <td >
                                    {{bangla($data->songothon2_vinno_dormalombi_worker_previous?? "")}} /
                                    {{bangla($data->songothon2_vinno_dormalombi_associate_member_previous?? "")}}
                                </td>
                                <td >
                                    {{bangla($data->songothon2_vinno_dormalombi_worker_present?? "")}} /
                                    {{bangla($data->songothon2_vinno_dormalombi_associate_member_present?? "")}}
                                </td>
                                <td >
                                    {{bangla($data->songothon2_vinno_dormalombi_worker_briddhi?? "")}} /
                                    {{bangla($data->songothon2_vinno_dormalombi_associate_member_briddhi?? "")}}
                                </td>
                                <td >
                                    {{bangla($data->songothon2_vinno_dormalombi_worker_target?? "")}} /
                                    {{bangla($data->songothon2_vinno_dormalombi_associate_member_target?? "")}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>*দাওয়াত ও তাবলিগের 'ক' এর অধীনে উল্লেখিত সকল সহযোগী সদস্যের সংখ্যা এ ছকে সহযোগী সদস্যের ঘরে বসাতে হবে।</p>
                </div>
                <div class="kormi_boithok d-flex flex-wrap justify-content-between mb-1">
                    <p class="fw-bold fs-6 w-50 ">৩. মাসিক কর্মী বৈঠক সংখ্যা :  {{bangla($data->songothon9_unit_kormi_boithok_total?? "")}}</p>
                    <p class="fw-bold fs-6 w-50">, উপস্থিতি:  {{bangla($data->songothon9_unit_kormi_boithok_uposthiti?? "")}}</p>
                </div>
                <div class="paribaik_unit mb-2">
                    <h4 class="fs-6">৪. পারিবারিক ইউনিট*</h4>
                    <table class="text-center  mb-1 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="width-20">সংখ্যা</th>
                                <th class="width-15">বৃদ্ধি</th>
                                <th class="width-20">টার্গেট</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td >{{bangla($data->songothon5_paribarik_unit_total?? "")}}</td>
                                <td >{{bangla($data->songothon5_paribarik_unit_increase?? "")}}</td>
                                <td >{{bangla($data->songothon5_paribarik_unit_target?? "")}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>* পরিবারের জনশক্তি পুরুষ ও মহিলা উভয় হলে পারিবারিক ইউনিটের হিসাব একবারই আসবে।</p>
                </div>
                <div class="urdotono mb-1">
                    <p class="fw-bold fs-6 w-50 ">৫. ঊর্ধ্বতন দায়িত্বশীলদের সফর সংখ্যা :  {{bangla($data->songothon7_upper_leader_sofor?? "")}}</p>
                </div>
                <div class="ianot mb-2">
                    <h4 class="fs-6">৬. ইয়ানত দাতা বৃদ্ধি :</h4>
                    <table class="text-center  mb-1">
                        <thead>
                            <tr>
                                <th class="w-25">নতুন ইয়ানত দাতা</th>
                                <th class="width-20">সংখ্যা</th>
                                <th class="width-15">টাকার পরিমাণ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">সহযোগী সদস্য</td>
                                <td >{{bangla($data->songothon8_associate_member_total?? "")}}</td>
                                <td >{{bangla($data->songothon8_associate_member_total_iyanot_amounts?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সুধী</td>
                                <td >{{bangla($data->songothon8_sudhi_total?? "")}}</td>
                                <td >{{bangla($data->songothon8_sudi_total_iyanot_amounts?? "")}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <h1 class="font-18">প্ৰশিক্ষণ :</h1>
            <div class="proshikkhon mb-2">
                <table class="text-center  mb-1">
                    <thead>
                        <tr>
                            <th class="w-50">কর্মসূচির ধরন</th>
                            <th class="">সংখ্যা</th>
                            <th class="">টার্গেট</th>
                            <th class="">উপস্থিতি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">তারবিয়াতী বৈঠক (সহীহ কুরআন অনুশীলন/মাসয়ালা-মাসায়েল/ দারসে কুরআন/ দারসে হাদীস / সামষ্টিক পাঠ/বিষয়ভিত্তিক আলোচনা)</td>
                            <td >
                                {{bangla($data->proshikkhon_sohi_quran_onushilon?? "")}} /
                                {{bangla($data->proshikkhon_masala_masayel?? "")}} /
                                {{bangla($data->proshikkhon_darsul_quran?? "")}} /
                                {{bangla($data->proshikkhon_darsul_hadis?? "")}} /
                                {{bangla($data->proshikkhon_samostik_path?? "")}} /
                                {{bangla($data->proshikkhon_bishoy_vittik_onushilon?? "")}}
                            </td>
                            <td >
                                {{bangla($data->proshikkhon_sohi_quran_onushilon_target?? "")}} /
                                {{bangla($data->proshikkhon_masala_masayel_target?? "")}} /
                                {{bangla($data->proshikkhon_darsul_quran_target?? "")}} /
                                {{bangla($data->proshikkhon_darsul_hadis_target?? "")}} /
                                {{bangla($data->proshikkhon_samostik_path_target?? "")}} /
                                {{bangla($data->proshikkhon_bishoy_vittik_onushilon_target?? "")}}
                            </td>
                            <td >
                                {{bangla($data->proshikkhon_sohi_quran_onushilon_uposthiti?? "")}} /
                                {{bangla($data->proshikkhon_masala_masayel_uposthiti?? "")}} /
                                {{bangla($data->proshikkhon_darsul_quran_uposthiti?? "")}} /
                                {{bangla($data->proshikkhon_darsul_hadis_uposthiti?? "")}} /
                                {{bangla($data->proshikkhon_samostik_path_uposthiti?? "")}} /
                                {{bangla($data->proshikkhon_bishoy_vittik_onushilon_uposthiti?? "")}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="shomajsheba">
                <h1 class="font-18">সমাজ সংস্কার ও সমাজসেবা :</h1>
                <div class="personal_shamajik_kaj mb-2">
                    <h4 class="fs-6">১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h4>
                    <table class="text-center  mb-1">
                        <tr>
                            <td class="text-start px-2 ">মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন</td>
                            <td class="width-20">{{bangla($data->shomajsheba1_how_many_people_did?? "")}}</td>
                            <td class="text-start px-2 w-25">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                            <td class="width-20">{{bangla($data->shomajsheba1_service_received_total?? "")}}</td>
                        </tr>
                    </table>
                </div>
                <div class="unit_shamajik_kaj mb-2">
                    <h4 class="fs-6">২. ইউনিটের উদ্যোগে সামাজিক কাজ :</h4>
                    <table class="text-center  mb-1">
                        <thead>
                            <tr>
                                <th class="">বিবরণ</th>
                                <th class="width-20">সংখ্যা</th>
                                <th class="">বিবরণ</th>
                                <th class="width-15">সংখ্যা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">সামাজিক অনুষ্ঠানে অংশগ্রহন/সহায়তা প্রদান</td>
                                <td >
                                    {{bangla($data->shomajsheba2_shamajik_onusthane_ongshogrohon?? "")}} /
                                    {{bangla($data->shomajsheba2_shamajik_onusthane_shohayota_prodan?? "")}}
                                </td>
                                <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                                <td >
                                    {{bangla($data->shomajsheba2_voluntarily_blood_donation_kotojon?? "")}} /
                                    {{bangla($data->shomajsheba2_voluntarily_blood_donation_kotojonke?? "")}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                                <td >{{bangla($data->shomajsheba2_shamajik_birodh_mimangsha?? "")}}</td>
                                <td class="text-start px-2">মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজন/কতজনকে)</td>
                                <td >
                                    {{bangla($data->shomajsheba2_matrikalin_sheba_prodan_kotojon?? "")}} /
                                    {{bangla($data->shomajsheba2_matrikalin_sheba_prodan_kotojonke?? "")}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মানবিক সহায়তা/কর্জে হাসানা প্রদান (কতজনকে)</td>
                                <td >
                                    {{bangla($data->shomajsheba2_manobik_shohayota_prodan?? "")}} /
                                    {{bangla($data->shomajsheba2_korje_hasana_prodan?? "")}}
                                </td>
                                <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে)</td>
                                <td >{{bangla($data->shomajsheba2_mayeter_gosol?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)</td>
                                <td >
                                    {{bangla($data->shomajsheba2_rogir_poricorja?? "")}} /
                                    {{bangla($data->shomajsheba2_medical_shohayota_prodan?? "")}}
                                </td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td >{{bangla($data->shomajsheba2_others?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নবজাতককে গিফ্ট প্রদান (কতজনকে )</td>
                                <td >{{bangla($data->shomajsheba2_nobojatokke_gift_prodan?? "")}}</td>
                                <td class="text-start px-2"></td>
                                <td ></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="rartrio">
                <h1 class="font-18">রাষ্ট্রীয় সংস্কার ও সংশোধন :</h1>
                <div class="bisistomb-2">
                    <p>বিশিষ্ট ব্যক্তিবর্গের সাথে যোগাযোগ সংখ্যা :   <span>{{bangla($data->rastrio_bishishto_bekti_jogajog?? "")}}</span></p>
                </div>
            </div>
            {{-- {{dd($data->toArray(),$all_income_category_wise,$total_income,$all_expense_category_wise,$total_expense,);}} --}}
            <div class="baytulmal">
                <div class="title">
                    <h1>বাইতুলমাল</h1>
                </div>
                <p class="fs-6">মাসিক ওয়াদার পরিমাণ :</p>
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
                                        @foreach ($all_income_category_wise as $income_category)
                                            <tr>
                                                <td class="text-start px-2 w-50 border_bottom">{{$income_category["category"]}}</td>
                                                <td class="border_left_bottom">{{bangla($income_category["amount"])}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        @foreach ($all_expense_category_wise as $expense_category)
                                            <tr>
                                                <td class="text-start px-2 w-50 border_bottom">{{$expense_category["category"]}}</td>
                                                <td class="border_left_bottom">{{bangla($expense_category["amount"])}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td >{{bangla($total_income?? "")}}</td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td >{{bangla($total_expense?? "")}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="montobbo">
                <h1 class="fs-6 mb-1">ইউনিট সভাপতিদের মন্তব্য :</h1>
                <pre>{{$data->all_montobbo?? ""}}</pre>
            </div>
        </section>

        <a href="javascript:void(0)" class="print_preview" onclick="print_upload_page(event)">
            <i class="fa-solid fa-print"></i>
        </a>

        <script>
            function print_upload_page(event) {
                event.preventDefault();
                window.print();
                // Get the current URL query parameters
                const queryParams = new URLSearchParams(window.location.search);
                console.log(queryParams);


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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
