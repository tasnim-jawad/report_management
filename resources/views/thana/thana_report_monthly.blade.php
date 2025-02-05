<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Report || ward</title>

        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/thana/default.css') }}">
        <link rel="stylesheet" href="{{ asset('css/thana/thana_report.css') }}">

    </head>
    <body>
        <section id="heading" class="mt-3">
            <div class="report_heading position-relative mb-1">
                <h3 class="text-center fs-6">বিসমিল্লাহির রাহমানির রাহীম</h3>
                <h1 class="text-center fs-4">উপজেলা/থানা সংগঠনের</h1>
                <h1 class="text-center mb-2 fs-4">মাসিক/ত্রৈমাসিক/ষান্মাসিক/নয় মাসিক/বার্ষিক রিপোর্ট</h1>
            </div>
            <div class="unit_info">
                <div class="line d-flex flex-wrap ">
                    <p class="w-75">মাস: {{ bangla_month(date('F', strtotime($start_month))) }}</p>
                    <p class="w-25">সন: {{ bangla(date('Y', strtotime($end_month))) }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>উপজেলা/থানার নাম : {{ $report_header?->thana_info?->title ?? '' }}</p>
                    <p class="width-40">জেলা/মহানগরী :</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>আমীর/সভাপতির নাম: {{ $report_header->president ?? '' }}</p>
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
                    <p class="fw-bold w-25">মোট জনসংখ্যা:</p>
                    <p class="fw-bold ps-3 w-100">টার্গেট (মাসিক/ত্রৈমাসিক / ষান্মাসিক/ নয় মাসিক/বার্ষিক) :</p>
                    <p class="ps-3 font-13">* দাওয়াত ও তাবলিগের 'ক' এর অধীনে ক্রমিক ১ - ৪নং পর্যন্ত দাওয়াত প্রদান সংখ্যা যোগ করে এখানে বসাতে হবে ।</p>
                </div>
                <div class="group_dawat mb-1">
                    <h4 class="fs-6 fw-bold">১. ইউনিটে নিয়মিত গ্রুপভিত্তিক দাওয়াত:</h4>
                    <table class="text-center  ">
                        <thead>
                            <tr>
                                <th class="width-35">বিবরণ</th>
                                <th >মোট</th>
                                <th >পুরুষ</th>
                                <th >মহিলা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">কতটি গ্রুপ বের হয়েছে</td>
                                <td >34</td>
                                <td >54</td>
                                <td >32</td>
                            </tr>
                            <tr>
                                <td class="text-start">অংশগ্রহণকারীর সংখ্যা</td>
                                <td >34</td>
                                <td >54</td>
                                <td >32</td>
                            </tr>
                            <tr>
                                <td class="text-start">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td >34</td>
                                <td >54</td>
                                <td >32</td>
                            </tr>
                            <tr>
                                <td class="text-start">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td >34</td>
                                <td >54</td>
                                <td >32</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="personal_dawat mb-1">
                    <h4 class="fs-6 fw-bold">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:</h4>
                    <table class="text-center mb-1 ">
                        <thead>
                            <tr>
                                <th rowspan="2" >বিবরণ</th>
                                <th colspan="2">পুরুষ</th>
                                <th colspan="2">মহিলা</th>
                            </tr>
                            <tr>
                                <th class="width-15">সদস্য (রুকন)</th>
                                <th class="width-15">কর্মী</th>
                                <th class="width-15">সদস্য (রুকন)</th>
                                <th class="width-15">কর্মী</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2 width-30">মোট জনশক্তি সংখ্যা</td>
                                <td >54</td>
                                <td >21</td>
                                <td >21</td>
                                <td >32</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                                <td >34</td>
                                <td >45</td>
                                <td >45</td>
                                <td >65</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="text-center  ">
                        <thead>
                            <tr>
                                <th class="width-33">বিবরণ</th>
                                <th class="">মোট</th>
                                <th class="">পুরুষ</th>
                                <th class="">মহিলা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td >54</td>
                                <td >21</td>
                                <td >21</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td >34</td>
                                <td >45</td>
                                <td >45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="shadharon_shova mb-2">
                    <h4 class="fs-6 fw-bold">৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের মাধ্যমে দাওয়াত :</h4>
                    <table class="text-center  ">
                        <thead>
                            <tr>
                                <th class="width-33">বিবরণ</th>
                                <th class="">মোট</th>
                                <th class="">পুরুষ</th>
                                <th class="">মহিলা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td >54</td>
                                <td >21</td>
                                <td >21</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td >34</td>
                                <td >45</td>
                                <td >45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="gonoshongjog mb-2">
                    <h4 class="fs-6 fw-bold">৪. গণসংযোগ ও দাওয়াতি অভিযান পালন*:</h4>
                    <table class="text-center  ">
                        <thead>
                            <tr>
                                <th class="width-30">বিবরণ</th>
                                <th class="width-15">মোট গ্রুপ সংখ্যা</th>
                                <th class="">মোট অংশগ্রহণকারীর সংখ্যা</th>
                                <th class="width-20">মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                                <th class="">মোট কতজন সহযোগী সদস্য হয়েছেন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">গণসংযোগ দশক/পক্ষ (পুরুষ/মহিলা)</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ ও দাও:অভিযান</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নির্বাচনী আসনে গণসংযোগ সপ্তাহ (পু/ম)</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">উলামা/পেশাজীবী গণসংযোগ সপ্তাহ (পু/ম)</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <p>* গণসংযোগ অভিযান পালনের সময় ইউনিট থেকে উপজেলা/থানা পর্যন্ত গ্রুপ সংখ্যা, ব্যক্তিগত ও গ্রুপভিত্তিক সহযোগী সদস্য বৃদ্ধি সংখ্যা শুধুমাত্র এই ছকেই বসাতে হবে।</p>
                </div>
            </div>
            <h1 class="font-18 fw-bold">খ) বিভাগ ভিত্তিক তথ্য :</h1>
            <div class="bivag">
                <div class="talimul_quran mb-5 pb-5">
                    <h4 class="fs-6 fw-bold">১. তালিমুল কুরআনের মাধ্যমে দাওয়াত</h4>
                    <table class="text-center  mb-2">
                        <thead>
                            <tr>
                                <th class="width-40">ব্যক্তিগত উদ্যোগ</th>
                                <th class="">সদস্য (রুকন) (পু/ম)</th>
                                <th class="width-15">কর্মী (পু/ম)</th>
                                <th class="width-20">মোট</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">কতজন কুরআন শিক্ষা প্রদান করেছেন</td>
                                <td >/</td>
                                <td >/</td>
                                <td >45</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                                <td >/</td>
                                <td >/</td>
                                <td >45</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex align-items-start gap-2">
                        <table class="text-center  mb-2">
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
                                    <td >34</td>
                                    <td >76</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মক্তব/ফোরকানিয়া মাদ্রাসা</td>
                                    <td >34</td>
                                    <td >76</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center  mb-2">
                            <tbody>
                                <tr>
                                    <td class="text-start width-70 px-2">মোট কতজন সহীহ তিলাওয়াত শিখেছেন</td>
                                    <td class="width-30">34</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে (পু/ম)</td>
                                    <td >7 / 5</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মোট কতজন সহযোগী সদস্য হয়েছেন (পু/ম)</td>
                                    <td >10 / 20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <table class="text-center ">
                        <thead>
                            <tr>
                                <th class="width-20">সর্বমোট মুয়াল্লিম/মুয়াল্লিমা সংখ্যা</th>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                                <th class="width-20">বৃদ্ধি সংখ্যা</th>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>43</td>
                                <td>5</td>
                                <td>45</td>
                                <td>43</td>
                                <td>45</td>
                                <td>45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="moholla pt-5">
                    <h4 class="fs-6 fw-bold">২. গ্রাম ও মহল্লাভিত্তিক দাওয়াত</h4>
                    <div class="d-flex align-items-start gap-2">
                        <table class="text-center  mb-1">
                            <thead>
                                <tr>
                                    <th class="width-60 text-start">সরকারি হিসাবে গ্রাম/মহল্লা সংখ্যা</th>
                                    <th class="width-20">34 / 43</th>
                                    <th class="width-20 ">বৃদ্ধি</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">গ্রাম/মহল্লা কমিটি সংখ্যা</td>
                                    <td >3 / 4</td>
                                    <td >7 / 6</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">বিশেষ দাওয়াতের অন্তর্ভুক্ত গ্রাম/মহল্লা* সংখ্যা</td>
                                    <td >2 / 3</td>
                                    <td >8 / 6</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center  mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-start width-70 px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                    <td class="width-30">34</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                    <td >75</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="font-12">* সেসব গ্রাম/মহল্লা বুঝাবে যেখানে ইউনিট/দাওয়াতি ইউনিট নেই।</p>
                </div>
                <div class="jubo mb-2">
                    <h4 class="fs-6 fw-bold">৩. যুব সমাজের মাঝে দাওয়াত*:</h4>
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
                                        <td >76</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">কতজন যুবক সহযোগী সদস্য হয়েছেন</td>
                                        <td >23</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="font-11">* যুব বিভাগের কাজের ক্ষেত্রে ছাত্র সংগঠনের সাবেক জনশক্তি ব্যতিত সাধারণ যুবকগণই যুবক হিসাবে গণ্য হবে।</p>
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
                                    <td >12</td>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">নতুন সমিতি/ক্লাব প্রতিষ্ঠা করা হয়েছে</td>
                                    <td >4</td>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো হয়েছে</td>
                                    <td >23</td>
                                    <td >8</td>
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
                                    <th class="">শ্রেণি-পেশার বিবরণ</th>
                                    <th class="">মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে</th>
                                    <th class="">মোট কতজন সহযোগী সদস্য হয়েছেন</th>
                                    <th class="width-10">টার্গেট</th>
                                    <th class="">বাস্তবায়নের হার</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">রাজনৈতিক ও বিশিষ্ট ব্যক্তিবর্গ (পু/ম)</td>
                                    <td >/</td>
                                    <td >/</td>
                                    <td >/</td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">পেশাজীবী (পু/ম)</td>
                                    <td >/</td>
                                    <td >/</td>
                                    <td >/</td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">উলামা মাশায়েখ</td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কর্মজীবী মহিলা</td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">শ্রমজীবী (পু/ম)</td>
                                    <td >/</td>
                                    <td >/</td>
                                    <td >/</td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মিডিয়া কর্মী</td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)</td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">ভিন্নধর্মাবলম্বী</td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="paribarik mb-2">
                    <h4 class="fs-6 fw-bold">৫. পরিবারভিত্তিক দাওয়াত</h4>
                    <table class="text-center  table_layout_fixed">
                        <thead>
                            <th>দাওয়াতি কাজে অংশগ্রহণকারী মোট পরিবার</th>
                            <th>মোট কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td >54</td>
                                <td >67</td>
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
                                <td >54</td>
                                <td >21</td>
                                <td class="text-start px-2">সাধারণ দাওয়াহ্ সেন্টার</td>
                                <td >32</td>
                                <td >32</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">দাওয়াতের আওতাভুক্ত মসজিদ</td>
                                <td >34</td>
                                <td >45</td>
                                <td class="text-start px-2">তথ্যসেবা কেন্দ্র (মসজিদভিত্তিক /সাধারণ)</td>
                                <td >/</td>
                                <td >/</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মসজিদভিত্তিক দাওয়াহ্ সেন্টার</td>
                                <td >34</td>
                                <td >45</td>
                                <td class="text-start px-2">নিয়োজিত প্রশিক্ষিত দাঈ *</td>
                                <td ></td>
                                <td ></td>
                            </tr>
                        </tbody>
                    </table>
                    <p>*প্রশিক্ষিত দাঈ বলতে কেন্দ্রীয় মডিউলের আলোকে দাওয়াহ মাস্টার ট্রেইনার দ্বারা প্রশিক্ষিত দাঈদের বুঝানো হয়েছে।</p>
                </div>
                <div class="tottho_projukti mb-2">
                    <h4 class="fs-6 fw-bold">৭. তথ্যপ্রযুক্তির মাধ্যমে দাওয়াত :</h4>
                    <table class="text-center  table_layout_fixed">
                        <thead>
                            <th>মোট উপযুক্ত জনশক্তি সংখ্যা (পুরুষ/মহিলা)</th>
                            <th>মোট অংশগ্রহণকারী সংখ্যা (পুরুষ/মহিলা)</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td >/</td>
                                <td >/</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="songskriti mb-2">
                    <h4 class="fs-6 fw-bold">৮. সাংস্কৃতিক কাজের মাধ্যমে দাওয়াত:</h4>
                    <table class="text-center  table_layout_fixed">
                        <thead>
                            <th>প্রফেশনাল সাংস্কৃতিক টিম সংখ্যা</th>
                            <th>মোট দাওয়াতি সাংস্কৃতিক প্রোগ্রাম সংখ্যা</th>
                            <th>মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td >34</td>
                                <td >45</td>
                                <td >45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
        <section>
            <h1 class="font-18 fw-bold">গ) দাওয়াহ্ ও প্রকাশনা:</h1>
            <div class="dawah_prokashona margin_bottom_100 pb-5">
                <table class="text-center mb-1">
                    <thead>
                        <tr>
                            <th class="width-">বিবরণ</th>
                            <th class="width-">মোট সংখ্যা</th>
                            <th class="width-">বৃদ্ধি</th>
                            <th class="width-">টার্গেট</th>
                            <th class="width-">বিবরণ</th>
                            <th class="width-">মোট সংখ্যা</th>
                            <th class="width-">বৃদ্ধি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">পাঠাগার/অনলাইন লাইব্রেরি</td>
                            <td >5</td>
                            <td >34</td>
                            <td >34</td>

                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয় কেন্দ্র</td>
                            <td >76</td>
                            <td >12</td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">পাঠাগার/অনলাইন লাইব্রেরিতে বই</td>
                            <td >23</td>
                            <td >65</td>
                            <td >65</td>

                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয়</td>
                            <td >34</td>
                            <td >87</td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিলি</td>
                            <td >14</td>
                            <td >87</td>
                            <td >87</td>

                            <td class="text-start px-2">বইয়ের সফট কপি বিলি*</td>
                            <td >75</td>
                            <td >3</td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলিকেন্দ্র</td>
                            <td >51</td>
                            <td >43</td>
                            <td >43</td>

                            <td class="text-start px-2">দাওয়াতি লিংক বিতরণ*</td>
                            <td >75</td>
                            <td >12</td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলি</td>
                            <td >5</td>
                            <td >6</td>
                            <td >6</td>

                            <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/পৃথিবী কত কপি চলে</td>
                            <td >
                                45 /
                                45 /
                                23
                            </td>
                            <td >
                                3 /
                                9 /
                                12
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>*সংগঠন অনুমোদিত</p>
            </div>
            <h1 class="font-18 fw-bold pt-5">ঘ) কর্মসূচি বাস্তবায়ন</h1>
            <div class="kormoshuchi mb-1">
                <table class="text-center mb-1">
                    <thead>
                        <tr>
                            <th class="width-15px">ক্র</th>
                            <th class="width-35">কর্মসূচির বিবরণ</th>
                            <th class="">মোট সংখ্যা</th>
                            <th class="">টার্গেট</th>
                            <th class="">গড় উপস্থিতি</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >১.</td>
                            <td class="text-start px-2">ইউনিটে মাসিক সাধারণ সভা</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td >২.</td>
                            <td class="text-start px-2">আলোচনা সভা/সুধী সমাবেশ</td>
                            <td>/</td>
                            <td>/</td>
                            <td>/</td>
                        </tr>
                        <tr>
                            <td >৩.</td>
                            <td class="text-start px-2">সীরাতুন্নবী (সাঃ) মাহফিল</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td >৪.</td>
                            <td class="text-start px-2">ঈদ পুনর্মিলনী</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td >৫.</td>
                            <td class="text-start px-২">দারস/তাফসীর/দাওয়াতি জনসভা ও ইসলামী মাহফিল</td>
                            <td> ৫৪ / ৪৫ / ৪৫ </td>
                            <td> ৫৪ / ৪৫ / ৪৫ </td>
                            <td> ৫৪ / ৪৫ / ৪৫ </td>
                        </tr>
                        <tr>
                            <td >৬.</td>
                            <td class="text-start px-২">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                            <td>/</td>
                            <td>/</td>
                            <td>/</td>
                        </tr>
                        <tr>
                            <td >৭.</td>
                            <td class="text-start px-২">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                            <td> ৫৪ / ৪৫ / ৪৫ </td>
                            <td> ৫৪ / ৪৫ / ৪৫ </td>
                            <td> ৫৪ / ৪৫ / ৪৫ </td>
                        </tr>
                        <tr>
                            <td >৮.</td>
                            <td class="text-start px-২">কিরাত/হামদ না'ত প্রতিযোগিতা</td>
                            <td>/</td>
                            <td>/</td>
                            <td>/</td>
                        </tr>
                        <tr>
                            <td >৯.</td>
                            <td class="text-start px-২">অন্যান্য</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
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
                                <th class="width-15">বিগত সময়ের সংখ্যা</th>
                                <th class="">বর্তমান সংখ্যা</th>
                                <th class="" colspan="2">বৃদ্ধি</th>
                                <th class="">ঘাটতি*</th>
                                <th class="">টার্গেট</th>
                                <th class="">বাস্তবায়নের হার</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">সর্বমোট সদস্য (রুকন)</td>
                                <td></td>
                                <td></td>
                                <td class="text-start px-2">মানোন্নয়ন-</td>
                                <td class="text-start px-2">আগত- </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সর্বমোট কর্মী</td>
                                <td></td>
                                <td></td>
                                <td colspan="2"></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                                <th class="width-15">বিগত সময়ের সংখ্যা</th>
                                <th class="width-15">বর্তমান সংখ্যা</th>
                                <th class="width-15">বৃদ্ধি</th>
                                <th class="width-15">টার্গেট</th>
                                <th class="width-15">বাস্তবায়নের হার</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">মোট সহযোগী সদস্য (পুরুষ)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মোট সহযোগী সদস্য (মহিলা)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সর্বমোট সহযোগী সদস্য সংখ্যা**</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-14">*সদস্য (রুকন) ঘাটতির ক্ষেত্রে স্থানান্তর, ইন্তেকাল, বাতিল, ইস্তফা ও বিদেশ গমন সংখ্যার হিসাব আলাদাভাবে সংরক্ষণ করে মোট সংখ্যাটি এ ঘরে বসাতে হবে এবং এতদসংক্রান্ত তালিকা ঊর্ধ্বতন সংগঠনে জমা দিতে হবে।</p>
                    <p class="font-14">** দাওয়াত ও তাবলিগের 'ক' এর অধীনে উল্লেখিত সকল সহযোগী সদস্যের সংখ্যা সংগঠনের জনশক্তির এ ছকে সর্বমোট সহযোগী সদস্যের ঘরে বসাতে হবে।</p>
                </div>
                <div class="bivag_vittik margin_bottom_170">
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
                            <tr>
                                <td rowspan="3" class="text-center px-2">মহিলা</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">শ্রম</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">উলামা</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">পেশাজীবী</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">যুব</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">সাহিত্য ও সংস্কৃতি</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="2" class="text-center px-2">ভিন্নধর্মাবলম্বী</td>
                                <td class="text-start">কর্মী</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="thana_shongothon mb-2">
                    <h4 class="fs-6">৪. সাংগঠনিক কাঠামো*:</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="width-30">সংগঠনের ধরন</th>
                                <th class="width-">বিগত সময়ের সংখ্যা</th>
                                <th class="width-">বর্তমান সংখ্যা</th>
                                <th class="width-">বৃদ্ধি</th>
                                <th class="width-">ঘাটতি</th>
                                <th class="width-">টার্গেট</th>
                                <th class="width-">বাস্তবায়নের হার</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">পৌরসভা</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সংগঠিত পৌরসভা</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">ইউনিয়ন</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সংগঠিত ইউনিয়ন</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাংগঠনিক ইউনিয়ন (পুরুষ)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাংগঠনিক ইউনিয়ন (মহিলা)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কতটি ইউনিয়নে সদস্য (রুকন) নেই</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সিটি কর্পোরেশনের মোট প্রশাসনিক ওয়ার্ড</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সিটি কর্পোরেশনের মোট সংগঠিত ওয়ার্ড</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">মোট সাংগঠনিক ওয়ার্ড (পুরুষ)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">মোট সাংগঠনিক ওয়ার্ড (মহিলা)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">পৌরসভা/ইউনিয়নের মোট প্রশাসনিক ওয়ার্ড</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start">পৌরসভা/ইউনিয়নের মোট সংগঠিত ওয়ার্ড</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start">পৌরসভা/ইউনিয়নের মোট সাংগঠনিক ওয়ার্ড (পুঃ)</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start">পৌরসভা/ইউনিয়নের মোট সাংগঠনিক ওয়ার্ড (ম:)</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="">অন্যান্য সাংগঠনিক ওয়ার্ড</td>
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাংগঠনিক ওয়ার্ড (উলামা)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাংগঠনিক ওয়ার্ড (পেশাজীবী)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাংগঠনিক ওয়ার্ড (যুব)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাংগঠনিক ওয়ার্ড (শ্রম)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাংগঠনিক ওয়ার্ড (মিডিয়া)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাংগঠনিক ওয়ার্ড (সাহিত্য ও সংস্কৃতি)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="text-center mb-1 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="width-30">ইউনিট সংগঠন</th>
                                <th class="">বিগত সময়ের সংখ্যা</th>
                                <th class="">বর্তমান সংখ্যা</th>
                                <th class="">বৃদ্ধি</th>
                                <th class="">ঘাটতি</th>
                                <th class="">টার্গেট</th>
                                <th class="">বাস্তবায়নের হার</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">সাধারণ ইউনিট (পুরুষ)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাধারণ ইউনিট (মহিলা)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">উলামা ইউনিট</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">পেশাজীবী ইউনিট (পুরুষ)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">পেশাজীবী ইউনিট (মহিলা)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মজীবী ইউনিট (মহিলা)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">যুব ইউনিট</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">শ্রম ইউনিট (পুরুষ)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">শ্রম ইউনিট (মহিলা)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">মিডিয়া ইউনিট</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">সাহিত্য ও সংস্কৃতি ইউনিট</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-end">সর্বমোট ইউনিট</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-13">*সংগঠনের কাজের সুবিধার্থে বিভিন্ন স্তরের প্রশাসনিক কাঠামোকে এক বা একাধিক ভাগে বিভক্ত করে কাঠামো পুনর্বিন্যাসকে সাংগঠনিক উপজেলা/থানা, পৌরসভা, ইউনিয়ন ও ওয়ার্ড বুঝাৰে। </p>
                </div>
                <div class="paribarik mb-2">
                    <h4 class="fs-6 fw-bold">৫. দাওয়াতি ও পারিবারিক ইউনিট*:</h4>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">মোট পারিবারিক ইউনিট</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    <p class="font-14">*দাওয়াতি ইউনিট ও পারিবারিক ইউনিটের সংখ্যা মোট সাংগঠনিক ইউনিটে অন্তর্ভুক্ত হবে না।</p>
                </div>
                <div class="emarat_kayem mb-2">
                    <h4 class="fs-6 fw-bold">৬. এমারত কায়েম:</h4>
                    <table class="text-center mb-1 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="width-20">সংগঠন</th>
                                <th class="">বিগত সময়ের সংখ্যা</th>
                                <th class="">বর্তমান সংখ্যা</th>
                                <th class="">বৃদ্ধি</th>
                                <th class="">ঘাটতি</th>
                                <th class="">টার্গেট</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">পৌরসভা/ইউনিয়ন</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start">ওয়ার্ড (সিটি/পৌর/ইউনিয়ন)</td>
                                <td> 23/ 23 / 23 </td>
                                <td> 23/ 23 / 23 </td>
                                <td> 23/ 23 / 23 </td>
                                <td> 23/ 23 / 23 </td>
                                <td> 23/ 23 / 23 </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="bidai_chatro mb-2">
                    <h4 class="fs-6 fw-bold">৭. বিদায়ী ছাত্র-ছাত্রী জনশক্তির সংগঠনে যোগদান:</h4>
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
                                <td class="text-start px-2">মোট যোগদানকৃত ছাত্র-ছাত্রী সংখ্যা</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="parsho_songothon margin_bottom_170">
                    <h4 class="fs-6 fw-bold">৮. সহযোগী ও পার্শ্ব সংগঠন বিভাগ:</h4>
                    <table class="text-center  mb-1 table_layout_fixed">
                        <tbody>
                            <tr>
                                <td class="text-start px-2 width-30">মোট ট্রেড ইউনিয়ন সংখ্যা</td>
                                <td></td>
                                <td class="text-start px-2 width-30">মোট ট্রাস্ট, ফাউন্ডেশন ও সোসাইটি সংখ্যা</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মোট ট্রেড ইউনিয়ন বৃদ্ধি/ ঘাটতি সংখ্যা</td>
                                <td>/</td>
                                <td class="text-start px-2">ট্রাস্ট, ফাউন্ডেশন ও সোসাইটি বৃদ্ধি/ঘাটতি সংখ্যা</td>
                                <td>/</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="sofor mb-2">
                    <h4 class="fs-6 fw-bold">৯. সফর:</h4>
                    <table class="text-center mb-1">
                        <tbody>
                            <tr>
                                <td class="text-start px-2 width-40">জেলা/মহানগরী দায়িত্বশীলদের মোট সফর সংখ্যা</td>
                                <td></td>
                                <td class="text-start px-2 width-40">জেলা/মহানগরী মহিলা বিভাগীয় দায়িত্বশীলদের সফর সংখ্যা</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">উপজেলা/থানা আমীর/সভাপতির মোট সফর সংখ্যা</td>
                                <td></td>
                                <td class="text-start px-2">উপজেলা/থানা মহিলা বিভাগীয় সেক্রেটারির মোট সফর সংখ্যা</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">উপজেলা/থানা কর্মপরিষদ / টিম সদস্যদের মোট সফর সংখ্যা</td>
                                <td></td>
                                <td class="text-start font-13 ps-2">উপজেলা/থানা মহিলা বিভাগীয় কর্মপরিষদ / টিম সদস্যদের মোট সফর সংখ্যা</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="yanot mb-2">
                    <h4 class="fs-6 fw-bold">১০. ইয়ানত দাতা:</h4>
                    <table class="text-center  mb-1 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="">নতুন ইয়ানত দাতা</th>
                                <th class="">মোট সংখ্যা</th>
                                <th class="">অর্থের পরিমাণ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class=" px-2">সহযোগী সদস্য/সুধী</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="boithok ">
                    <h4 class="fs-6 fw-bold">১১.সাংগঠনিক সভা-সম্মেলন</h4>
                    <table class="text-center mb-1 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="width-30px" rowspan="2">ক্র</th>
                                <th class="width-40" rowspan="2">কর্মসূচির ধরন (পুরুষ ও মহিলা)</th>
                                <th class="" colspan="2">মোট সংখ্যা</th>
                                <th class="" >টার্গেট</th>
                                <th class="" colspan="2">গড় উপস্থিতি</th>
                            </tr>
                            <tr>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                                <th></th>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">১.</td>
                                <td class="text-start">মজলিসে শূরা বৈঠক (উপজেলা-থানা/পৌরসভা/ইউনিয়ন)</td>
                                <td>45 / 54 / 54</td>
                                <td>54 / 54 / 65</td>
                                <td>54 / 54 / 65</td>
                                <td>54 / 54 / 65</td>
                                <td>56 / 65 / 43</td>
                            </tr>
                            <tr>
                                <td class="">২.</td>
                                <td class="text-start">কর্মপরিষদ/টিম বৈঠক (উপজেলা-থানা/পৌরসভা/ইউনিয়ন)</td>
                                <td>45 / 54 / 54</td>
                                <td>54 / 54 / 65</td>
                                <td>54 / 54 / 65</td>
                                <td>54 / 54 / 65</td>
                                <td>56 / 65 / 43</td>
                            </tr>
                            <tr>
                                <td class="">৩.</td>
                                <td class="text-start">উপজেলা/থানাভিত্তিক মাসিক সদস্য (রুকন) বৈঠক (প্রযোজ্য ক্ষেত্রে)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">৪.</td>
                                <td class="text-start">উপজেলা/থানা বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">৫.</td>
                                <td class="text-start">বিভাগীয় কমিটিসমূহের বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">৬.</td>
                                <td class="text-start">পৌরসভা/ইউনিয়ন/ওয়ার্ড বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">৭.</td>
                                <td class="text-start">পৌরসভা/ইউনিয়ন মাসিক সদস্য (রুকন) বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">৮.</td>
                                <td class="text-start">ইউনিটে মোট কর্মী বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">৯.</td>
                                <td class="text-start">ত্রৈমাসিক/ষাম্মাসিক/বার্ষিক সদস্য (রুকন) সম্মেলন</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১০.</td>
                                <td class="text-start">উপজেলা/থানা ভিত্তিক ওয়ার্ড সভাপতি সম্মেলন</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১১.</td>
                                <td class="text-start">উপজেলা/থানা পর্যায়ে কর্মী সম্মেলন</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১২.</td>
                                <td class="text-start">ইউনিয়ন/ওয়ার্ড পর্যায়ে কর্মী সম্মেলন</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১৩.</td>
                                <td class="text-start">উপজেলা/থানা ভিত্তিক ইউনিট সভাপতি ও সেক্রেটারি সম্মেলন</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১৪.</td>
                                <td class="text-start">উলামা বৈঠক/সমাবেশ</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="">১৫.</td>
                                <td class="text-start">পেশাজীবীদের নিয়ে বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১৬.</td>
                                <td class="text-start">শ্রমিকদের নিয়ে বৈঠক/সমাবেশ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১৭.</td>
                                <td class="text-start">যুবকদের নিয়ে বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১৮.</td>
                                <td class="text-start">ছাত্র/ছাত্রী দায়িত্বশীলদের সাথে বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১৯.</td>
                                <td class="text-start">সহযোগী সদস্য সমাবেশ/সম্মেলন</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">২০.</td>
                                <td class="text-start">অন্যান্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="proshikkhon mb-2">
                <h1 class="font-18 fw-bold">প্ৰশিক্ষণ :</h1>
                <div class="tarbiat margin_bottom_170">
                    <h4 class="fs-6 fw-bold">ক) তারবিয়াত (নৈতিক শিক্ষা ও সাংগঠনিক প্রশিক্ষণ) :</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="width-5" rowspan="2">ক্রমিক</th>
                                <th class="width-40" rowspan="2">প্রোগ্রামের ধরন (পুরুষ ও মহিলা)</th>
                                <th class="" colspan="2">মোট সংখ্যা</th>
                                <th class="" >টার্গেট</th>
                                <th class="" colspan="2">গড় উপস্থিতি</th>
                            </tr>
                            <tr>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                                <th></th>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">১.</td>
                                <td class="text-start">ইউনিটে মোট তারবিয়াতী বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">২.</td>
                                <td class="text-start">উপজেলা/থানাভিত্তিক সদস্য (রুকন) শিক্ষাশিবির/শিক্ষা বৈঠক</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="">৩.</td>
                                <td class="text-start">উপজেলা/থানাভিত্তিক বাছাইকৃত কর্মীদের শিক্ষাশিবির/শিক্ষা বৈঠক</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="">৪.</td>
                                <td class="text-start">উপজেলা/থানাভিত্তিক কর্মীদের শিক্ষাশিবির/শিক্ষা বৈঠক</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="">৫.</td>
                                <td class="text-start">উপজেলা/থানাভিত্তিক সাবেক ছাত্র/ছাত্রী কর্মীদের প্রশিক্ষণ প্রোগ্রাম</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">৬.</td>
                                <td class="text-start">পৌরসভা ইউনিয়ন/ওয়ার্ড ভিত্তিক কর্মী শিক্ষা বৈঠক</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="">৭.</td>
                                <td class="text-start">গণশিক্ষা বৈঠক</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">৮.</td>
                                <td class="text-start">গণ নৈশ ইবাদত</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="text-center mb-1 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="width-5" rowspan="2">ক্রমিক</th>
                                <th class="width-30" rowspan="2">মোট গ্রুপ সংখ্যা</th>
                                <th class="" colspan="2">মোট সংখ্যা</th>
                                <th class="" colspan="2">মোট অধিবেশন সংখ্যা</th>
                                <th class="" colspan="2">গড় উপস্থিতি</th>
                            </tr>
                            <tr>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                                <th>পুরুষ</th>
                                <th>মহিলা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">৯.</td>
                                <td class="text-start">সদস্য (রুকন) পাঠচক্র</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১০.</td>
                                <td class="text-start">কর্মী পাঠচক্র /আলোচনা চক্র</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="">১১.</td>
                                <td class="text-start">কুরআন স্টাডি সার্কেল</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="">১২.</td>
                                <td class="text-start">দারস/সহীহ কুরআন তিলাওয়াত অনুশীলন</td>
                                <td class="text-start"><span class="font-13">প্রোগ্রাম সংখ্যা:</span></td>
                                <td class="text-start"><span class="font-13">প্রোগ্রাম সংখ্যা:</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="hrd">
                    <h4 class="font-18 fw-bold">খ) মানবসম্পদ উন্নয়ন :</h4>
                    <div class="shangothonik_karjokrom">
                        <h4 class="fs-6 fw-bold">১. সাংগঠনিক কার্যক্রম:</h4>
                        <table class="text-center mb-1 table_layout_fixed">
                            <thead>
                                <tr>
                                    <th class="">উপজেলা/থানা মানবসম্পদ কমিটি সংখ্যা</th>
                                    <th class="">উপজেলা/থানা মানবসম্পদ কমিটির বৈঠক সংখ্যা</th>
                                    <th class="">জনশক্তির ক্যারিয়ার মোটিভেশন প্রোগ্রাম সংখ্যা</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>43</td>
                                    <td>45</td>
                                    <td>56</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="courses">
                        <h4 class="fs-6 fw-bold">২. প্রশিক্ষণ কোর্স:</h4>
                        <table class="text-center mb-1 table_layout_fixed">
                            <thead>
                                <tr>
                                    <th class="">কোর্সের ধরন</th>
                                    <th class="">মোট অংশগ্রহণকারীর সংখ্যা</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">দাওয়াহ / সমাজকর্ম/ মিডিয়া</td>
                                    <td>543  / 454  / 345</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">আইসিটি/ অফিস/ফিন্যান্সিয়াল ম্যানেজমেন্ট/ইংরেজি ভাষা/আরবি ভাষা</td>
                                    <td>543  / 454  / 345  / 454  / 345</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ*</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="font-14">* ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ কোর্সের আওতায় ফার্সিং (পোল্ট্রি, ফিশারিজ, ডেইরি), সেলাই/এমব্রয়ডারী মেশিন অপারেটর, ড্রাইভিং কাম অটোমেকানিক, রন্ধন শিল্প, হর্টিকালচার/নার্সারি, তাঁত শিল্প/বুটিকস, হস্ত শিল্প, ইলেক্ট্রিক্যাল এন্ড ইলেক্ট্রনিক্স সার্ভিসিং, সিভিল কন্সট্রাকশন/প্লাম্বারিং, আমিনশীপ ইত্যাদি কোর্সসমূহের বাস্তবায়ন রিপোর্টের যোগফল এখানে বসাতে হবে।</p>
                </div>
            </div>

            <div class="shomajsheba ">
                <h1 class="font-18 fw-bold">সমাজ সংস্কার ও সমাজসেবা :</h1>
                <div class="proshikkhito_shomajkormi mb-2">
                    <h4 class="fs-6 fw-bold">১. প্রশিক্ষিত সমাজকর্মী তৈরি <span class="font-13">(প্রশিক্ষিত সমাজকর্মী বলতে কেন্দ্রীয় মডিউলের আলোকে সমাজকর্ম মাস্টার ট্রেইনার দ্বারা প্রশিক্ষণপ্রাপ্ত জনশক্তিকেই বুঝানো হয়েছে):</span></h4>
                    <table class="text-center mb-2 ">
                        <thead>
                            <tr>
                                <td>মোট প্রশিক্ষিত সমাজকর্মী সংখ্যা</td>
                                <td>এ বছর কয়টি প্রশিক্ষণ কোর্স হয়েছে</td>
                                <td class="width-15">টার্গেট</td>
                                <td>এ বছর কতজন প্রশিক্ষণ কোর্স সম্পন্ন করেছে</td>
                                <td class="width-15">টার্গেট</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>34</td>
                                <td>54</td>
                                <td>56</td>
                                <td>76</td>
                                <td>21</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="personal_shamajik_kaj mb-2">
                    <h4 class="fs-6 fw-bold">২. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h4>
                    <table class="mb-1">
                        <tbody>
                            <td class="text-center width-40">মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন</td>
                            <td></td>
                            <td class="text-center width-30">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                            <td></td>
                        </tbody>
                    </table>
                </div>
                <div class="samostik_shamajik_kaj pt-2 mb-2">
                    <h4 class="fs-6 fw-bold">৩. সামষ্টিক/সেবা টিমের মাধ্যমে সামাজিক কাজ (প্রযোজ্য ক্ষেত্রে):</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <thead>
                            <tr>
                                <th>সাধারণ সেবা টিম সংখ্যা</th>
                                <th>টেকনিক্যাল সেবা টিম সংখ্যা</th>
                                <th>স্বেচ্ছাসেবক টিম সংখ্যা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>34</td>
                                <td>56</td>
                                <td>76</td>
                            </tr>
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
                                <td></td>
                                <td class="text-start px-2">শিক্ষা সহায়তা প্রদান (মোট কতজনকে )</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2 font-13">সামাজিক অনুষ্ঠানে অশংগ্রহণ/সহায়তা প্রদান (সংখ্যা / কতজনকে)</td>
                                <td>/</td>
                                <td class="text-start px-2">টেকনিক্যাল সেবা প্রদান (মোট কতজন/কতজনকে)</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                                <td></td>
                                <td class="text-start px-2">অনলাইনের মাধ্যমে সেবা প্রদান (মোট কতজনকে )</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মানবিক সহায়তা প্রদান (কতজনকে)</td>
                                <td></td>
                                <td class="text-start px-2">বৃক্ষরোপন (মোট কতটি)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কর্জে হাসানা প্রদান (কতজনকে )</td>
                                <td></td>
                                <td class="text-start px-2">জনসচেতনতামূলক প্রোগ্রাম (মোট কতটি)</td>
                                <td ></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">পরিষ্কার-পরিচ্ছন্নতা/মশক নিধন অভিযান</td>
                                <td>/</td>
                                <td class="text-start px-2">দুর্যোগকালীন সহায়তা প্রদান (মোট কতজনকে)</td>
                                <td ></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (মোট কতজনকে)</td>
                                <td>/</td>
                                <td class="text-start px-2">ত্রাণ বিতরণ (মোট কতজনকে)</td>
                                <td ></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                                <td>/</td>
                                <td class="text-start px-2">ভিন্নধর্মাবলম্বীদের সেবা প্রদান (মোট কতজন / কতজনকে)</td>
                                <td >/</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মাতৃত্বকালীন সময়ে সেবা প্রদান (মোট কতজনকে)</td>
                                <td></td>
                                <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে )</td>
                                <td ></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নবজাতককে গিফ্‌ট প্রদান (কতজনকে)</td>
                                <td></td>
                                <td class="text-start px-2">জানাযায় অংশগ্রহণ (মোট কতটি)</td>
                                <td ></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মেডিক্যাল ক্যাম্প (মোট কতটি)</td>
                                <td></td>
                                <td class="text-start px-2">স্বল্প পুঁজিতে কর্মসংস্থানের সহায়তা (কতজনকে)</td>
                                <td ></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ভ্রাম্যমান স্কুল/মক্তব চালু</td>
                                <td>/</td>
                                <td class="text-start px-2">অন্যান্য......</td>
                                <td ></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pratisthanik_shamajik_kaj mb-2">
                    <h4 class="fs-6 fw-bold">৪. প্রাতিষ্ঠানিক উদ্যোগে সামাজিক কাজ</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <thead>
                            <tr>
                                <th>বিবরণ</th>
                                <th>মোট সংখ্যা</th>
                                <th>কতটি সাংগঠনিক থানায়</th>
                                <th>কতটি সাংগঠনিক ওয়ার্ডে</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">সামাজিক প্রতিষ্ঠান রয়েছে</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">প্রতিষ্ঠানভিত্তিক সামাজিক কাজ হয়েছে</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নতুন সামাজিক প্রতিষ্ঠান চালু করা</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="sastho_poribar margin_bottom_170 pb-5">
                    <h4 class="fs-6 fw-bold">৫. স্বাস্থ্য ও পরিবার কল্যাণমূলক কাজ</h4>
                    <table class="text-center  mb-1">
                        <tbody>
                            <tr>
                                <td class="text-start px-2 width-35">স্বাস্থ্যকর্মী তৈরি সংখ্যা</td>
                                <td></td>
                                <td class="text-start px-2 width-35">স্বাস্থ্য শিক্ষামূলক প্রশিক্ষণ প্রোগ্রাম সংখ্যা</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নার্স তৈরি সংখ্যা</td>
                                <td></td>
                                <td class="text-start px-2">মোট অংশগ্রহণকারীর সংখ্যা</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ধাত্রী তৈরি সংখ্যা</td>
                                <td></td>
                                <td class="text-start px-2">মোট কতজন স্বাস্থ্যসেবা কাজে অংশগ্রহণ করেছেন</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">প্যারেন্টিং প্রশিক্ষণ প্রোগ্রাম সংখ্যা</td>
                                <td></td>
                                <td class="text-start px-2">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="shikkha_gobeshona mb-3">
                <h4 class="fs-6 fw-bold">৬. শিক্ষা ও গবেষণামূলক কার্যক্রম বিবরণ</h4>
                <table class="text-center mb-2 table_layout_fixed">
                    <thead>
                        <tr>
                            <th>বিবরণ</th>
                            <th>সংখ্যা</th>
                            <th>টার্গেট</th>
                            <th>বিবরণ</th>
                            <th>সংখ্যা</th>
                            <th>টার্গেট</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start px-2">আদর্শ শিক্ষক তৈরি</td>
                            <td></td>
                            <td></td>
                            <td class="text-start px-2">আলোচনা সভা</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">শিক্ষা সেমিনার</td>
                            <td></td>
                            <td></td>
                            <td class="text-start px-2">অন্যান্য</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="shamajik_income_expense mb-3 d-flex align-items-center">
                <h4 class="fs-6 fw-bold">৭. সামাজিক কাজের জন্য মোট আয়ের কত শতাংশ ব্যয় হয়েছে :</h4>
                <div class="box">
                    <span class="">54  %</span>
                </div>
            </div>


            <div class="rartrio">
                <h1 class="font-18 fw-bold">রাষ্ট্রীয় সংস্কার ও সংশোধন :</h1>
                <div class="rajnoitik_jogajog mb-2">
                    <h4 class="fs-6 fw-bold">১. রাজনৈতিক ও প্রশাসনিক যোগাযোগ</h4>
                    <table class="text-center mb-2">
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
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">প্রশাসনিক ব্যক্তিবর্গ</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="kormoshuchi_bastobayon mb-2">
                    <h4 class="fs-6 fw-bold">২. কর্মসূচি বাস্তবায়ন</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <thead>
                            <tr>
                                <th>কর্মসূচির বিবরণ</th>
                                <th>মোট সংখ্যা</th>
                                <th>গড় উপস্থিতি</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2 ">কেন্দ্র ঘোষিত রাজনৈতিক কর্মসূচি পালন</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">স্থানীয়ভাবে ঘোষিত কর্মসূচি : জনসভা/সমাবেশ/মিছিল</td>
                                <td>43 / 45 / 76 </td>
                                <td>43 / 45 / 76 </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">পোস্টার/লিফলেট/বুকলেট/স্মারকলিপি বিতরণ</td>
                                <td>43 / 45 / 76 / 43</td>
                                <td class="text-start px-2">অন্যান্য:-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="dibosh mb-2">
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
                                <td></td>
                                <td></td>
                                <td class="text-start">আন্তর্জাতিক মাতৃভাষা দিবস</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">বিজয় দিবস</td>
                                <td></td>
                                <td></td>
                                <td class="text-start">আন্তর্জাতিক নারী দিবস</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">অন্যান্য</td>
                                <td></td>
                                <td></td>
                                <td class="text-start">মে দিবস</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="nirbachon">
                    <h4 class="fs-6 fw-bold">৪. জাতীয় ও স্থানীয় নির্বাচনভিত্তিক কার্যক্রম:</h4>
                    <table class="text-center  mb-1">
                        <thead>
                            <tr>
                                <th rowspan="2">নির্বাচনের ধরন</th>
                                <th rowspan="2">মোট সংখ্যা</th>
                                <th rowspan="2">মোট প্রার্থী সংখ্যা</th>
                                <th rowspan="2">অংশগ্রহণ সংখ্যা</th>
                                <th colspan="3">নির্বাচিত সংখ্যা</th>
                                <th rowspan="2">দ্বিতীয় অবস্থান (পু/ম)</th>
                            </tr>
                            <tr>
                                <th>মেয়র/চেয়ারম্যান</th>
                                <th>ভাইস-চেয়ারম্যান (পু/ম)</th>
                                <th>কাউন্সিলর/মেম্বার (পু/ম)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">সিটি কর্পো:/পৌরসভা</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">উপজেলা পরিষদ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>/</td>
                                <td></td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ইউনিয়ন পরিষদ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="text-center mb-2 table_layout_fixed">
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
                                <td>/</td>
                                <td>/</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">ভোট কেন্দ্র কমিটি</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">কেন্দ্র/ বুথভিত্তিক ইউনিট</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="text-center mb-2 table_layout_fixed">
                        <tbody>
                            <tr>
                                <td class="font-14 text-start">উপজেলা/থানা/পৌরসভা/ইউনিয়ন/ওয়ার্ডভিত্তিক নির্বাচন পরিচালনা কমিটির বৈঠক সংখ্যা</td>
                                <td> 32 / 23 / 32 / 433 / 45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="media">
                    <h4 class="fs-6 fw-bold">৫. প্রচার ও মিডিয়া:</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <thead>
                            <tr>
                                <th>প্রেস বিজ্ঞপ্তি / বিবৃতি/ প্রতিবাদ লিপি প্রদান সংখ্যা</th>
                                <th>সামাজিক যোগাযোগ মাধ্যমে পোস্ট/ লাইভ প্রোগ্রাম সংখ্যা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>34 / 54 / 54</td>
                                <td>45 / 43</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="manobadhikar margin_bottom_170 padding_bottom_100">
                    <h4 class="fs-6 fw-bold">৬. মানবাধিকার</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <tbody>
                            <tr>
                                <td class="text-start w-25">মানবাধিকার সংগঠন প্রতিষ্ঠার সংখ্যা</td>
                                <td></td>
                                <td class="text-start " colspan="3">জাতীয় ও আন্তর্জাতিক মানবাধিকার সংস্থার স্থানীয় শাখা চালুকরণ সংখ্যা</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">মানবাধিকার কর্মী তৈরি</td>
                                <td class="text-start">সংখ্যা-</td>
                                <td class="text-start" colspan="2">বৃদ্ধি-</td>
                                <td class="text-start" colspan="2">টার্গেট-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="shilpo_banijjo mb-2 pt-5">
                    <h4 class="fs-6 fw-bold">৭. শিল্প ও বাণিজ্য:</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <thead>
                            <tr>
                                <th>নির্বাচনের ধরন</th>
                                <th>নির্বাচন সংখ্যা</th>
                                <th>মোট পদ সংখ্যা</th>
                                <th>অংশগ্রহণকৃত পদ সংখ্যা </th>
                                <th>নির্বাচিত পদ সংখ্যা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">ব্যবসায়ী সমিতি/বাজার কমিটি</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr>
                                <td class="text-start">অন্যান্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="uddogta mb-2">
                    <h4 class="fs-6 fw-bold">৮. উদ্যোক্তা তৈরি:</h4>
                    <table class="text-center mb-2 table_layout_fixed">
                        <thead>
                            <tr>
                                <th>বিবরণ</th>
                                <th>সংখ্যা</th>
                                <th>বৃদ্ধি</th>
                                <th>টার্গেট</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">কৃষি উদ্যোক্তা তৈরি</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">উদ্যোক্তা তৈরি (সেবা, শিল্প, ব্যবসা-বাণিজ্য ও অন্যান্য)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start">অন্যান্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="baytulmal mt-5">
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
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">প্রাপ্ত নিছাব</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">সরাসরি ইয়ানত</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">এককালীন</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">নির্বাচনী ফান্ড</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">শহীদ ফান্ড</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">কল্যাণ তহবিল</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">সমাজকল্যাণ ও সমাজসেবা</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">প্রকাশনা</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">বই বিক্রি</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">নিছাব পরিশোধ</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">এককালীন</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">স্থানীয় খরচ</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">নির্বাচনী ফান্ড</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">শহীদ ফান্ড</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">কল্যাণ তহবিল</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">সমাজকল্যাণ ও সমাজসেবা</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">দাওয়াত</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start px-2 w-50 border_bottom">অন্যান্য</td>
                                            <td class="border_left_bottom"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">মোট</td>
                            <td ></td>
                            <td class="text-end px-2">মোট</td>
                            <td ></td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">গত মাসের উদ্বৃত্ত</td>
                            <td ></td>
                            <td class="text-end px-2">এ মাসের উদ্বৃত্ত</td>
                            <td ></td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td ></td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td ></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="montobbo">
                <h1 class="fs-5 fw-bold">উপজেলা/থানা আমীর/সভাপতির মন্তব্য :</h1>
                <p>1. সব দুঃখের মূল এই দুনিয়ার প্রতি অত্যাধিক আকর্ষণ।- হযরত আলী (রাঃ)

                    2. একজন আহত ব্যক্তি তার যন্ত্রনা যত সহজে ভুলে যায়, একজন অপমানিত ব্যক্তি তত সহজে অপমান ভোলে না।- জর্জ লিললো

                    3. অসহায়কে অবজ্ঞা করা উচিত নয়, কারণ মানুষ মাত্রেই জীবনের কোন না কোন সময় অসহায়তার শিকার হবে।- গোল্ড স্মিথ

                    4. ভবিষ্যতে যার কাছ থেকে তুমি সবচেয়ে বড় কষ্টটি পাবে, আজ সে তোমার সবচেয়ে কাছের কোন একজন। - রেদোয়ান মাসুদ</p>
            </div>
        </section>


        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
