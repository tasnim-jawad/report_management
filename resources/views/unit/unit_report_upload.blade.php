<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report || unit</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/unit/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/unit/unit_report_upload.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.1/axios.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>

</head>

<body>
    <div id="main_app">
        <section id="heading" class="mt-3">
            <div class="report_heading position-relative mb-1">
                <h3 class="text-center fs-6">বিসমিল্লাহির রাহমানির রাহীম</h3>
                <h1 class="text-center mb-2 fs-4">ইউনিট সংগঠনের মাসিক রিপোর্ট</h1>
                {{-- <div class="org_gender position-absolute">
                    <p>পুরুষ</p>
                </div> --}}
            </div>
            {{-- <div class="unit_info">
                <div class="line d-flex flex-wrap justify-content-between mb-1">
                    <div class="d-flex">
                        <label for="" class="me-2">মাস: </label>
                        <input class="border_dot bg-input" type="month">
                    </div>
                    <div class="d-flex">
                        <label for="" class="me-2">সন: </label>
                        <input class="border_dot bg-input" type="text">
                    </div>
                </div>
                <div class="line d-flex flex-wrap justify-content-between mb-1">
                    <div class="d-flex width-35">
                        <label for="" class="">ইউনিটের নাম: </label>
                        <input class="border_dot bg-input" type="text">
                    </div>
                    <div class="d-flex width-33">
                        <label for="" class="width-40">ওয়ার্ড নং ও নাম: </label>
                        <input class="border_dot width-60 bg-input" type="text">
                    </div>
                    <div class="d-flex width-30">
                        <label for="" class="width-35">উপজেলা/থানা: </label>
                        <input class="border_dot width-65 bg-input" type="text">
                    </div>
                </div>
                <div class="line d-flex flex-wrap justify-content-between mb-1">
                    <div class="d-flex justify-content-start width-60">
                        <label for="" class="">ইউনিট সভানেত্রীর নাম: </label>
                        <input class="border_dot width-70 bg-input" type="text">
                    </div>
                    <div class="d-flex width-40">
                        <label for="" class="width-30">ইউনিটের ধরন: </label>
                        <input class="border_dot width-70 bg-input" type="text">
                    </div>
                </div>
            </div> --}}
            <div class="unit_info">
                <div class="line d-flex flex-wrap mb-1">
                    <p class="w-75">মাস: {{ date('F', strtotime($month)) }}</p>
                    <p class="w-25">সন: {{ date('Y', strtotime($month)) }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between mb-1">
                    <p>ইউনিটের নাম: {{$unit_info['title']?? ""}}</p>
                    <p>ওয়ার্ড নং ও নাম: {{$ward_info['no']?? ""}} ও {{$ward_info['title']?? ""}}</p>
                    <p class="w-25">উপজেলা/থানা: {{$thana_info['title']?? ""}}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>ইউনিট সভাপতির নাম: {{$precedent['full_name']?? ""}}</p>
                    <p class="width-30">ইউনিটের ধরন: {{$org_type['title']?? "" }}</p>
                </div>
            </div>
        </section>

        <section id="report">
            <div class="dawat mt-1">
                <h1 class="font-18">দাওয়াত ও তাবলিগ :</h1>
                {{-- <div class="jonoshadharon d-flex flex-wrap justify-content-between mb-2">
                    <div class="d-flex justify-content-start width-70">
                        <label for="" class="">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদান সংখ্যা* :</label>
                        <input class="border_dot w-50 bg-input" type="text">
                    </div>
                    <div class="d-flex width-30">
                        <label for="" class="ms-1">টার্গেট:</label>
                        <input class="border_dot width-80 bg-input" type="text">
                    </div>
                    <p class="mt-1 ps-3 font-13">* দাওয়াত ও তাবলিগের 'ক' এর অধীনে ক্রমিক ১ - ৪নং পর্যন্ত দাওয়াত প্রদান
                        সংখ্যা যোগ করে এখানে বসাতে হবে ।</p>
                </div> --}}
                <div class="jonoshadharon d-flex flex-wrap justify-content-between mb-2">
                    <p class="fw-bold w-75">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদান সংখ্যা* :
                        <span>
                            {{bangla(
                                ($dawat1->how_many_have_been_invited ?? 0) +
                                ($dawat2->how_many_have_been_invited ?? 0) +
                                ($dawat3->how_many_were_give_dawat?? 0) +
                                ($dawat4->how_many_have_been_invited?? 0) +
                                ($dawat4->jela_mohanogor_declared_gonosonjog_invited?? 0)
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
                                <th class="width-20">কতটি গ্রুপ বের হয়েছে</th>
                                <th class="width-20">অংশগ্রহণকারীর সংখ্যা </th>
                                <th>কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                                <th>কতজন সহযোগী সদস্য হয়েছেন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input name="how_many_groups_are_out" value="{{bangla($dawat1->how_many_groups_are_out?? "")}}" @change="data_upload('dawat1-regular-group-wise')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="number_of_participants" value="{{bangla($dawat1->number_of_participants?? "")}}" @change="data_upload('dawat1-regular-group-wise')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_many_have_been_invited" value="{{bangla($dawat1->how_many_have_been_invited?? "")}}" @change="data_upload('dawat1-regular-group-wise')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_many_associate_members_created" value="{{bangla($dawat1->how_many_associate_members_created?? "")}}" @change="data_upload('dawat1-regular-group-wise')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="personal_dawat mb-2">
                    <h4 class="fs-6">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:</h4>
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
                                <td><input name="total_rokon" value="{{bangla($dawat2->total_rokon?? "")}}" @change="data_upload('dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="total_worker" value="{{bangla($dawat2->total_worker?? "")}}" @change="data_upload('dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center"></td>
                                <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td><input name="how_many_have_been_invited" value="{{bangla($dawat2->how_many_have_been_invited?? "")}}" @change="data_upload('dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                                <td><input name="how_many_were_give_dawat_rokon" value="{{bangla($dawat2->how_many_were_give_dawat_rokon?? "")}}" @change="data_upload('dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_many_were_give_dawat_worker" value="{{bangla($dawat2->how_many_were_give_dawat_worker?? "")}}" @change="data_upload('dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center"></td>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td><input name="how_many_associate_members_created" value="{{bangla($dawat2->how_many_associate_members_created?? "")}}" @change="data_upload('dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="shadharon_shova mb-2">
                    <h4 class="fs-6">৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের মাধ্যমে দাওয়াত :</h4>
                    <table class="text-center  table_layout_fixed">
                        <thead>
                            <tr>
                                <th>মোট কতজনকে দাওয়াত প্রদান করা হয়েছে</th>
                                <th>মোট কতজন সহযোগী সদস্য হয়েছেন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input name="how_many_were_give_dawat" value="{{bangla($dawat3->how_many_were_give_dawat?? "")}}" @change="data_upload('dawat3-general-program-and-others')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_many_associate_members_created" value="{{bangla($dawat3->how_many_associate_members_created?? "")}}" @change="data_upload('dawat3-general-program-and-others')" type="text" class="bg-input w-100 text-center"></td>
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
                                <td><input name="total_gono_songjog_group" value="{{bangla($dawat4->total_gono_songjog_group?? "")}}" @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="total_attended" value="{{bangla($dawat4->total_attended?? "")}}" @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_many_have_been_invited" value="{{bangla($dawat4->how_many_have_been_invited?? "")}}" @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_many_associate_members_created" value="{{bangla($dawat4->how_many_associate_members_created?? "")}}" @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান</td>
                                <td><input name="jela_mohanogor_declared_gonosonjog_group" value="{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_group?? "")}}" @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="jela_mohanogor_declared_gonosonjog_attended" value="{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_attended?? "")}}" @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="jela_mohanogor_declared_gonosonjog_invited" value="{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_invited?? "")}}" @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="jela_mohanogor_declared_gonosonjog_associated_created" value="{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_associated_created?? "")}}" @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                    <p>* গণসংযোগ অভিযান পালনের সময় গ্রুপ সংখ্যা, ব্যক্তিগত ও গ্রুপভিত্তিক সহযোগী সদস্য বৃদ্ধি সংখ্যা
                        শুধুমাত্র এই ছকেই বসাতে হবে।</p>
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
                                <td><input name="teacher_rokon" value="{{bangla($department1->teacher_rokon?? "")}}" @change="data_upload('department1-talimul-quran')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="teacher_worker" value="{{bangla($department1->teacher_worker?? "")}}" @change="data_upload('department1-talimul-quran')" type="text" class="bg-input w-100 text-center"></td>
                                {{-- <td><input type="text" class="bg-input w-100 text-center"></td> --}}
                                <td>{{bangla($department1->teacher_rokon + $department1->teacher_worker ?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                                <td><input name="student_rokon" value="{{bangla($department1->student_rokon?? "")}}" @change="data_upload('department1-talimul-quran')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="student_worker" value="{{bangla($department1->student_worker?? "")}}" @change="data_upload('department1-talimul-quran')" type="text" class="bg-input w-100 text-center"></td>
                                {{-- <td><input type="text" class="bg-input w-100 text-center"></td> --}}
                                <td >{{bangla($department1->student_rokon + $department1->student_worker ?? "")}}</td>
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
                                <td><input name="how_much_learned_quran" value="{{bangla($department1->how_much_learned_quran?? "")}}" @change="data_upload('department1-talimul-quran')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_much_invited" value="{{bangla($department1->how_much_invited?? "")}}" @change="data_upload('department1-talimul-quran')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_much_been_associated" value="{{bangla($department1->how_much_been_associated?? "")}}" @change="data_upload('department1-talimul-quran')" type="text" class="bg-input w-100 text-center"></td>
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
                                <td><input name="political_and_special_invited" value="{{bangla($department4->political_and_special_invited?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="political_and_special_been_associated" value="{{bangla($department4->political_and_special_been_associated?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="political_and_special_target" value="{{bangla($department4->political_and_special_target?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)</td>
                                <td><input name="prantik_jonogosti_invited" value="{{bangla($department4->prantik_jonogosti_invited?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="prantik_jonogosti_been_associated" value="{{bangla($department4->prantik_jonogosti_been_associated?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="prantik_jonogosti_target" value="{{bangla($department4->prantik_jonogosti_target?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ভিন্নধর্মাবলম্বী</td>
                                <td><input name="vinno_dormalombi_invited" value="{{bangla($department4->vinno_dormalombi_invited?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="vinno_dormalombi_been_associated" value="{{bangla($department4->vinno_dormalombi_been_associated?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="vinno_dormalombi_target" value="{{bangla($department4->vinno_dormalombi_target?? "")}}" @change="data_upload('department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center"></td>
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
                                <td><input name="total_attended_family" value="{{bangla($department5->total_attended_family?? "")}}" @change="data_upload('department5-paribarik-dawat')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="how_many_new_family_invited" value="{{bangla($department5->how_many_new_family_invited?? "")}}" @change="data_upload('department5-paribarik-dawat')" type="text" class="bg-input w-100 text-center"></td>
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
                            <td><input name="unit_book_distribution_center" value="{{bangla($dawah_prokashona->unit_book_distribution_center?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>
                            <td><input name="unit_book_distribution_center_increase" value="{{bangla($dawah_prokashona->unit_book_distribution_center_increase?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>

                            <td class="text-start px-2">বইয়ের সফ্ট কপি বিলি<span>(সংগঠন অনুমোদিত)</span></td>
                            <td><input name="soft_copy_book_distribution" value="{{bangla($dawah_prokashona->soft_copy_book_distribution?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>
                            <td><input name="soft_copy_book_distribution_increase" value="{{bangla($dawah_prokashona->soft_copy_book_distribution_increase?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই</td>
                            <td><input name="books_in_pathagar" value="{{bangla($dawah_prokashona->books_in_pathagar?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>
                            <td><input name="books_in_pathagar_increase" value="{{bangla($dawah_prokashona->books_in_pathagar_increase?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>

                            <td class="text-start px-2">দাওয়াতি লিংক বিতরণ<span>(সংগঠন অনুমোদিত)</span></td>
                            <td><input name="dawat_link_distribution" value="{{bangla($dawah_prokashona->dawat_link_distribution?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>
                            <td><input name="dawat_link_distribution_increase" value="{{bangla($dawah_prokashona->dawat_link_distribution_increase?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিলি/বিক্রি</td>
                            <td><input name="unit_book_distribution" value="{{bangla($dawah_prokashona->unit_book_distribution?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>
                            <td><input name="unit_book_distribution_increase" value="{{bangla($dawah_prokashona->unit_book_distribution_increase?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"></td>

                            <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/ পৃথিবী কত কপি চলে</td>
                            <td>
                                <div class="d-flex">
                                    <input name="sonar_bangla" value="{{bangla($dawah_prokashona->sonar_bangla?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="songram" value="{{bangla($dawah_prokashona->songram?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="prithibi" value="{{bangla($dawah_prokashona->prithibi?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sonar_bangla_increase" value="{{bangla($dawah_prokashona->sonar_bangla_increase?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="songram_increase" value="{{bangla($dawah_prokashona->songram_increase?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="prithibi_increase" value="{{bangla($dawah_prokashona->prithibi_increase?? "")}}" @change="data_upload('dawah-and-prokashona')" type="text" class="bg-input w-100 text-center">
                                </div>
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
                            <td>১.</td>
                            <td class="text-start px-2">মাসিক সাধারণ সভা</td>
                            <td><input name="unit_masik_sadaron_sova_total" value="{{bangla($kormosuci->unit_masik_sadaron_sova_total?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center"></td>
                            <td><input name="unit_masik_sadaron_sova_target" value="{{bangla($kormosuci->unit_masik_sadaron_sova_target?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center"></td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td>২.</td>
                            <td class="text-start px-2">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                            <td>
                                <div class="d-flex">
                                    <input name="iftar_mahfil_personal_total" value="{{bangla($kormosuci->iftar_mahfil_personal_total?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="iftar_mahfil_samostic_total" value="{{bangla($kormosuci->iftar_mahfil_samostic_total?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="iftar_mahfil_personal_target" value="{{bangla($kormosuci->iftar_mahfil_personal_target?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="iftar_mahfil_samostic_target" value="{{bangla($kormosuci->iftar_mahfil_samostic_target?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input type="text" class="bg-input w-100 text-center"> /
                                    <input type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>৩.</td>
                            <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                            <td>
                                <div class="d-flex">
                                    <input name="cha_chakra_total" value="{{bangla($kormosuci->cha_chakra_total?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="samostic_khawa_total" value="{{bangla($kormosuci->samostic_khawa_total?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="sikkha_sofor_total" value="{{bangla($kormosuci->sikkha_sofor_total?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="cha_chakra_target" value="{{bangla($kormosuci->cha_chakra_target?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="samostic_khawa_target" value="{{bangla($kormosuci->samostic_khawa_target?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="sikkha_sofor_target" value="{{bangla($kormosuci->sikkha_sofor_target?? "")}}" @change="data_upload('kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input type="text" class="bg-input w-100 text-center"> /
                                    <input type="text" class="bg-input w-100 text-center"> /
                                    <input type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="mt-5">
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
                                <td><input name="rokon_previous" value="{{bangla($songothon1->rokon_previous?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="rokon_present" value="{{bangla($songothon1->rokon_present?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="rokon_briddhi" value="{{bangla($songothon1->rokon_briddhi?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="rokon_gatti" value="{{bangla($songothon1->rokon_gatti?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="rokon_target" value="{{bangla($songothon1->rokon_target?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কর্মী</td>
                                <td><input name="worker_previous" value="{{bangla($songothon1->worker_previous?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="worker_present" value="{{bangla($songothon1->worker_present?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="worker_briddhi" value="{{bangla($songothon1->worker_briddhi?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="worker_gatti" value="{{bangla($songothon1->worker_gatti?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="worker_target" value="{{bangla($songothon1->worker_target?? "")}}" @change="data_upload('songothon1-jonosokti')" type="text" class="bg-input w-100 text-center"></td>
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
                                <td><input name="associate_member_previous" value="{{bangla($songothon2->associate_member_previous?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="associate_member_present" value="{{bangla($songothon2->associate_member_present?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="associate_member_briddhi" value="{{bangla($songothon2->associate_member_briddhi?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="associate_member_target" value="{{bangla($songothon2->associate_member_target?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ভিন্নধর্মাবলম্বী কর্মী/সহযোগী সদস্য</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="vinno_dormalombi_worker_previous" value="{{bangla($songothon2->vinno_dormalombi_worker_previous?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="vinno_dormalombi_associate_member_previous" value="{{bangla($songothon2->vinno_dormalombi_associate_member_previous?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="vinno_dormalombi_worker_present" value="{{bangla($songothon2->vinno_dormalombi_worker_present?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="vinno_dormalombi_associate_member_present" value="{{bangla($songothon2->vinno_dormalombi_associate_member_present?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="vinno_dormalombi_worker_briddhi" value="{{bangla($songothon2->vinno_dormalombi_worker_briddhi?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="vinno_dormalombi_associate_member_briddhi" value="{{bangla($songothon2->vinno_dormalombi_associate_member_briddhi?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="vinno_dormalombi_worker_target" value="{{bangla($songothon2->vinno_dormalombi_worker_target?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="vinno_dormalombi_associate_member_target" value="{{bangla($songothon2->vinno_dormalombi_associate_member_target?? "")}}" @change="data_upload('songothon2-associate-member')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>*দাওয়াত ও তাবলিগের 'ক' এর অধীনে উল্লেখিত সকল সহযোগী সদস্যের সংখ্যা এ ছকে সহযোগী সদস্যের ঘরে
                        বসাতে হবে।</p>
                </div>
                <div class="kormi_boithok d-flex flex-wrap justify-content-between mb-1">
                    <div class="d-flex justify-content-start w-50">
                        <label for="" class="fw-bold fs-6">৩. মাসিক কর্মী বৈঠক সংখ্যা :</label>
                        <input class="border_dot width-60 bg-input ps-2" name="unit_kormi_boithok_total" value="{{bangla($songothon9->unit_kormi_boithok_total?? "")}}" @change="data_upload('songothon9-sangothonik-boithok')" type="text">
                    </div>
                    <div class="d-flex justify-content-start w-50">
                        <label for="" class="fw-bold fs-6">, উপস্থিতি:</label>
                        <input class="border_dot width-80 bg-input ps-2" name="unit_kormi_boithok_uposthiti" value="{{bangla($songothon9->unit_kormi_boithok_uposthiti?? "")}}" @change="data_upload('songothon9-sangothonik-boithok')" type="text">
                    </div>
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
                                <td><input name="paribarik_unit_total" value="{{bangla($songothon5->paribarik_unit_total?? "")}}" @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="paribarik_unit_increase" value="{{bangla($songothon5->paribarik_unit_increase?? "")}}" @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="paribarik_unit_target" value="{{bangla($songothon5->paribarik_unit_target?? "")}}" @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                    <p>* পরিবারের জনশক্তি পুরুষ ও মহিলা উভয় হলে পারিবারিক ইউনিটের হিসাব একবারই আসবে।</p>
                </div>
                <div class="urdotono mb-1">
                    <div class="d-flex justify-content-start ">
                        <label for="" class="fw-bold fs-6">৫. ঊর্ধ্বতন দায়িত্বশীলদের সফর সংখ্যা :</label>
                        <input class="border_dot bg-input w-75" name="upper_leader_sofor" value="{{bangla($songothon7->upper_leader_sofor?? "")}}" @change="data_upload('songothon7-sofor')" type="text">
                    </div>
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
                                <td><input name="associate_member_total" value="{{bangla($songothon8->associate_member_total?? "")}}" @change="data_upload('songothon8-iyanot-data')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="associate_member_total_iyanot_amounts" value="{{bangla($songothon8->associate_member_total_iyanot_amounts?? "")}}" @change="data_upload('songothon8-iyanot-data')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সুধী</td>
                                <td><input name="sudhi_total" value="{{bangla($songothon8->sudhi_total?? "")}}" @change="data_upload('songothon8-iyanot-data')" type="text" class="bg-input w-100 text-center"></td>
                                <td><input name="sudi_total_iyanot_amounts" value="{{bangla($songothon8->sudi_total_iyanot_amounts?? "")}}" @change="data_upload('songothon8-iyanot-data')" type="text" class="bg-input w-100 text-center"></td>
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
                            <td class="text-start px-2">তারবিয়াতী বৈঠক (সহীহ কুরআন অনুশীলন/মাসয়ালা-মাসায়েল/ দারসে
                                কুরআন/ দারসে হাদীস / সামষ্টিক পাঠ/বিষয়ভিত্তিক আলোচনা)</td>
                            <td>
                                <div class="d-flex">
                                    <input name="sohi_quran_onushilon" value="{{bangla($proshikkhon->sohi_quran_onushilon?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel" value="{{bangla($proshikkhon->masala_masayel?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran" value="{{bangla($proshikkhon->darsul_quran?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis" value="{{bangla($proshikkhon->darsul_hadis?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="samostik_path" value="{{bangla($proshikkhon->samostik_path?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon" value="{{bangla($proshikkhon->bishoy_vittik_onushilon?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sohi_quran_onushilon_target" value="{{bangla($proshikkhon->sohi_quran_onushilon_target?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel_target" value="{{bangla($proshikkhon->masala_masayel_target?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran_target" value="{{bangla($proshikkhon->darsul_quran_target?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis_target" value="{{bangla($proshikkhon->darsul_hadis_target?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="samostik_path_target" value="{{bangla($proshikkhon->samostik_path_target?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon_target" value="{{bangla($proshikkhon->bishoy_vittik_onushilon_target?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sohi_quran_onushilon_uposthiti" value="{{bangla($proshikkhon->sohi_quran_onushilon_uposthiti?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel_uposthiti" value="{{bangla($proshikkhon->masala_masayel_uposthiti?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran_uposthiti" value="{{bangla($proshikkhon->darsul_quran_uposthiti?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis_uposthiti" value="{{bangla($proshikkhon->darsul_hadis_uposthiti?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="samostik_path_uposthiti" value="{{bangla($proshikkhon->samostik_path_uposthiti?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon_uposthiti" value="{{bangla($proshikkhon->bishoy_vittik_onushilon_uposthiti?? "")}}" @change="data_upload('proshikkhon1-tarbiat')" type="text" class="bg-input w-100 text-center">
                                </div>
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
                            <td class="width-20"><input name="how_many_people_did" value="{{bangla($shomajsheba1->how_many_people_did?? "")}}" @change="data_upload('shomajsheba1-personal-social-work')" type="text" class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2 w-25">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                            <td class="width-20"><input name="service_received_total" value="{{bangla($shomajsheba1->service_received_total?? "")}}" @change="data_upload('shomajsheba1-personal-social-work')" type="text" class="bg-input w-100 text-center"></td>
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
                                <td>
                                    <div class="d-flex">
                                        <input name="shamajik_onusthane_ongshogrohon" value="{{bangla($shomajsheba2->shamajik_onusthane_ongshogrohon?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="shamajik_onusthane_shohayota_prodan" value="{{bangla($shomajsheba2->shamajik_onusthane_shohayota_prodan?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="voluntarily_blood_donation_kotojon" value="{{bangla($shomajsheba2->voluntarily_blood_donation_kotojon?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="voluntarily_blood_donation_kotojonke" value="{{bangla($shomajsheba2->voluntarily_blood_donation_kotojonke?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                                <td><input name="shamajik_birodh_mimangsha" value="{{bangla($shomajsheba2->shamajik_birodh_mimangsha?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"></td>
                                <td class="text-start px-2">মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজন/কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="matrikalin_sheba_prodan_kotojon" value="{{bangla($shomajsheba2->matrikalin_sheba_prodan_kotojon?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="matrikalin_sheba_prodan_kotojonke" value="{{bangla($shomajsheba2->matrikalin_sheba_prodan_kotojonke?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মানবিক সহায়তা/কর্জে হাসানা প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="manobik_shohayota_prodan" value="{{bangla($shomajsheba2->manobik_shohayota_prodan?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="korje_hasana_prodan" value="{{bangla($shomajsheba2->korje_hasana_prodan?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে)</td>
                                <td><input name="mayeter_gosol" value="{{bangla($shomajsheba2->mayeter_gosol?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="rogir_poricorja" value="{{bangla($shomajsheba2->rogir_poricorja?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"> /
                                        <input name="medical_shohayota_prodan" value="{{bangla($shomajsheba2->medical_shohayota_prodan?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td><input name="others" value="{{bangla($shomajsheba2->others?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নবজাতককে গিফ্ট প্রদান (কতজনকে )</td>
                                <td><input name="nobojatokke_gift_prodan" value="{{bangla($shomajsheba2->nobojatokke_gift_prodan?? "")}}" @change="data_upload('shomajsheba2-unit-social-work')" type="text" class="bg-input w-100 text-center"></td>
                                <td class="text-start px-2"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="rartrio">
                <h1 class="font-18">রাষ্ট্রীয় সংস্কার ও সংশোধন :</h1>
                <div class="bisisto mb-2">
                    <div class="d-flex justify-content-start">
                        <label for="" class="">বিশিষ্ট ব্যক্তিবর্গের সাথে যোগাযোগ সংখ্যা :</label>
                        <input class="border_dot  bg-input" name="bishishto_bekti_jogajog" value="{{bangla($rastrio->bishishto_bekti_jogajog?? "")}}" @change="data_upload('rastrio1-bishishto-bekti')" type="text">
                    </div>
                </div>
            </div>
            {{-- <div class="baytulmal">
                <div class="title">
                    <h1>বাইতুলমাল</h1>
                </div>
                <div class="d-flex justify-content-start mb-1">
                    <label for="" class="fs-6">মাসিক ওয়াদার পরিমাণ :</label>
                    <input class="border_dot  bg-input" type="text">
                </div>
                <table class="text-center  mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="2">আয়ের বিবরণ</th>
                            <th class="text-center" colspan="2">জমার পরিমাণ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">ইয়ানত আদায়</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2">ইয়ানত জমা</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">এককালীন</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2">এককালীন</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">নির্বাচনী ফান্ড</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2">নির্বাচনী ফান্ড</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">শহীদ ফান্ড কল্যাণ তহবিল</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2">শহীদ ফান্ড কল্যাণ তহবিল</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">সমাজসেবা</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2">সমাজসেবা</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিক্রি</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2">অন্যান্য</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">অন্যান্য</td>
                            <td><input type="text" class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>42000</td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>50470</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
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
                                        @foreach ($income_category_wise as $income_category)
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
                                        @foreach ($expense_category_wise as $expense_category)
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
                <h1 class="fs-6">ইউনিট সভাপতির মন্তব্য :</h1>
                <textarea name="montobbo" @change="data_upload('montobbo')" id="" cols="30" class="w-100 bg-input" rows="5">{{$montobbo->montobbo?? ""}}</textarea>
            </div>
        </section>
    </div>

    <script>
        window.axios = axios;
        window.axios.defaults.headers.common["Authorization"] = `Bearer ${window.localStorage?.token}`;
        window.axios.defaults.baseURL = location.origin + '/api/v1';

        new Vue({
            el: "#main_app",
            created: function() {
                console.log('connected');
            },
            data: ()=>({
                month: `{{request()->month}}`
            }),
            methods: {
                data_upload: function(endpoint) {
                    var value = event.target.value;
                    var name = event.target.name;
                    var month = this.month;
                    window.axios.post(`/${endpoint}/store-single`, {
                        value,
                        name,
                        month
                    })
                },
            }
        });
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
