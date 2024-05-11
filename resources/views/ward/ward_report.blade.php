<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Report || ward</title>

        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/ward/default.css') }}">
        <link rel="stylesheet" href="{{ asset('css/ward/ward_report.css') }}">

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
                    <p class="w-75">মাস:</p>
                    <p class="w-25">সন:</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>ওয়ার্ড নং ও নাম : </p>
                    <p>পৌরসভা/ইউনিয়ন: </p>
                    <p class="w-25">উপজেলা/থানা:</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>আমীর/সভাপতির নাম :</p>
                </div>
            </div>
        </section>

        <section id="report">
            <div class="dawat mt-1">
                <h1 class="font-18">দাওয়াত ও তাবলিগ :</h1>
                <div class="jonoshadharon d-flex flex-wrap justify-content-between ">
                    <p class="fw-bold w-75">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদান সংখ্যা* :
                        <span>
                        </span>
                    </p>
                    <p class="fw-bold w-25">মোট জনসংখ্যা:</p>
                    <p class="fw-bold ps-3 w-100">টার্গেট (মাসিক/ত্রৈমাসিক / ষান্মাসিক/ নয় মাসিক/বার্ষিক) :</p>
                    <p class="ps-3 font-13">* দাওয়াত ও তাবলিগের 'ক' এর অধীনে ক্রমিক ১ - ৪নং পর্যন্ত দাওয়াত প্রদান সংখ্যা যোগ করে এখানে বসাতে হবে ।</p>
                </div>
                <div class="group_dawat mb-1">
                    <h4 class="fs-6 fw-bold">১. নিয়মিত গ্রুপভিত্তিক দাওয়াত :</h4>
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
                                <td >32</td>
                                <td >34</td>
                                <td >54</td>
                                <td >32</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="personal_dawat mb-1">
                    <h4 class="fs-6 fw-bold">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:</h4>
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
                                <td >54</td>
                                <td >21</td>
                                <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td >32</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                                <td >34</td>
                                <td >45</td>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td >65</td>
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
                                <td >{{bangla($dawat3->how_many_were_give_dawat?? "")}}</td>
                                <td class="width-35">মোট কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td >{{bangla($dawat3->how_many_associate_members_created?? "")}}</td>
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
                                <td >{{bangla($dawat4->total_gono_songjog_group?? "")}}</td>
                                <td >{{bangla($dawat4->total_attended?? "")}}</td>
                                <td >{{bangla($dawat4->how_many_have_been_invited?? "")}}</td>
                                <td >{{bangla($dawat4->how_many_associate_members_created?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_group?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_attended?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_invited?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_associated_created?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নির্বাচনী আসনে গণসংযোগ সপ্তাহ</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_group?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_attended?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_invited?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_associated_created?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_group?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_attended?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_invited?? "")}}</td>
                                <td >{{bangla($dawat4->jela_mohanogor_declared_gonosonjog_associated_created?? "")}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>* গণসংযোগ অভিযান পালনের সময় গ্রুপ সংখ্যা, ব্যক্তিগত ও গ্রুপভিত্তিক সহযোগী সদস্য বৃদ্ধি সংখ্যা শুধুমাত্র এই ছকেই বসাতে হবে।</p>
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
                                <td >34</td>
                                <td >76</td>
                                <td >45</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                                <td >7</td>
                                <td >56</td>
                                <td >45</td>
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
                        <table class="text-center  mb-1">
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
                    <table class="text-center table_layout_fixed">
                        <tbody>
                            <tr>
                                <td class="width-35 text-start">তা'লিমুল কুরআন : মুয়াল্লিম সংখ্যা (পু./ম.)</td>
                                <td >13 / 65</td>
                                <td class="width-35 text-start">বৃদ্ধি সংখ্যা (পু./ম.) :</td>
                                <td >43 / 76</td>
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
                                    <td >76</td>
                                    <td >76</td>
                                    <td >76</td>
                                    <td >76</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">পেশাজীবী</td>
                                    <td >76</td>
                                    <td >76</td>
                                    <td >76</td>
                                    <td >76</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">উলামা মাশায়েখ</td>
                                    <td >76</td>
                                    <td >76</td>
                                    <td >76</td>
                                    <td >76</td>
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
                                    <td >12</td>
                                    <td >7</td>
                                    <td >12</td>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-1 letter_spacing font-13">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)</td>
                                    <td >4</td>
                                    <td >7</td>
                                    <td >4</td>
                                    <td >7</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-1">ভিন্নধর্মাবলম্বী</td>
                                    <td >23</td>
                                    <td >8</td>
                                    <td >23</td>
                                    <td >8</td>
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
                                <td >54</td>
                                <td class="width-35">মোট কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে</td>
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
                                <td >65</td>
                                <td >65</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মসজিদভিত্তিক দাওয়াহ্ সেন্টার</td>
                                <td >34</td>
                                <td >45</td>
                                <td class="text-start px-2"></td>
                                <td ></td>
                                <td ></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tottho_projukti d-flex flex-wrap justify-content-between mb-1">
                    <p class="fw-bold fs-6 width-60 ">৭. তথ্যপ্রযুক্তির মাধ্যমে দাওয়াতি কাজের জন্য উপযুক্ত জনশক্তি সংখ্যা:  </p>
                    <p class="fw-bold fs-6 width-40">,অংশগ্রহণকারীর সংখ্যা:  </p>
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
                            <td >5</td>
                            <td >34</td>

                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয় কেন্দ্র</td>
                            <td >76</td>
                            <td >12</td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই</td>
                            <td >23</td>
                            <td >65</td>

                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয়</td>
                            <td >34</td>
                            <td >87</td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিলি</td>
                            <td >14</td>
                            <td >87</td>

                            <td class="text-start px-2">বইয়ের সফট কপি বিলি*</td>
                            <td >75</td>
                            <td >3</td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলিকেন্দ্র</td>
                            <td >51</td>
                            <td >43</td>

                            <td class="text-start px-2">দাওয়াতি লিংক বিতরণ*</td>
                            <td >75</td>
                            <td >12</td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলি</td>
                            <td >5</td>
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
            </div>
            <h1 class="font-18 fw-bold">ঘ) কর্মসূচি বাস্তবায়ন</h1>
            <div class="job_holder mb-2">
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
                                <td >১.</td>
                                <td class="text-start px-2">ইউনিটে মাসিক সাধারণ সভা</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td >২.</td>
                                <td class="text-start font-13 px-2">দাওয়াতি সভা/আলোচনা সভা/সুখী সমাবেশ</td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                                <td class="text-start font-13 letter_spacing px-1">দারস/তাফসীর/দাওয়াতি জনসভা ও ইসলামী মাহফিল</td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                                <td >৬.</td>
                                <td class="text-start px-2">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td >৭.</td>
                                <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td >৮.</td>
                                <td class="text-start px-2">কিরাত/হামদ না'ত প্ৰতিযোগিতা</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td >৯.</td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>


        <section class="mt-5">
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সর্বমোট কর্মী</td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                {{-- <div class="kormi_boithok d-flex flex-wrap justify-content-between mb-1">
                    <p class="fw-bold fs-6 w-50 ">৩. মাসিক কর্মী বৈঠক সংখ্যা :  {{bangla($songothon9->unit_kormi_boithok_total?? "")}}</p>
                    <p class="fw-bold fs-6 w-50">, উপস্থিতি:  {{bangla($songothon9->unit_kormi_boithok_uposthiti?? "")}}</p>
                </div> --}}
                <div class="paribaik_unit mb-2">
                    <h4 class="fs-6">৪. পারিবারিক ইউনিট*</h4>
                    {{-- <table class="text-center  mb-1 table_layout_fixed">
                        <thead>
                            <tr>
                                <th class="width-20">সংখ্যা</th>
                                <th class="width-15">বৃদ্ধি</th>
                                <th class="width-20">টার্গেট</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td >{{bangla($songothon5->paribarik_unit_total?? "")}}</td>
                                <td >{{bangla($songothon5->paribarik_unit_uposthiti?? "")}}</td>
                                <td >{{bangla($songothon5->paribarik_unit_target?? "")}}</td>
                            </tr>
                        </tbody>
                    </table> --}}
                    <p>* পরিবারের জনশক্তি পুরুষ ও মহিলা উভয় হলে পারিবারিক ইউনিটের হিসাব একবারই আসবে।</p>
                </div>
                {{-- <div class="urdotono mb-1">
                    <p class="fw-bold fs-6 w-50 ">৫. ঊর্ধ্বতন দায়িত্বশীলদের সফর সংখ্যা :  {{bangla($songothon7->upper_leader_sofor?? "")}}</p>
                </div> --}}
                <div class="ianot mb-2">
                    <h4 class="fs-6">৬. ইয়ানত দাতা বৃদ্ধি :</h4>
                    {{-- <table class="text-center  mb-1">
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
                                <td >{{bangla($songothon8->associate_member_total?? "")}}</td>
                                <td >{{bangla($songothon8->associate_member_total_iyanot_amounts?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সুধী</td>
                                <td >{{bangla($songothon8->sudhi_total?? "")}}</td>
                                <td >{{bangla($songothon8->sudi_total_iyanot_amounts?? "")}}</td>
                            </tr>
                        </tbody>
                    </table> --}}
                </div>

            </div>
            <h1 class="font-18">প্ৰশিক্ষণ :</h1>
            <div class="proshikkhon mb-2">
                {{-- <table class="text-center  mb-1">
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
                                {{bangla($proshikkhon->sohi_quran_onushilon?? "")}} /
                                {{bangla($proshikkhon->masala_masayel?? "")}} /
                                {{bangla($proshikkhon->darsul_quran?? "")}} /
                                {{bangla($proshikkhon->darsul_hadis?? "")}} /
                                {{bangla($proshikkhon->samostik_path?? "")}} /
                                {{bangla($proshikkhon->bishoy_vittik_onushilon?? "")}}
                            </td>
                            <td >
                                {{bangla($proshikkhon->sohi_quran_onushilon_target?? "")}} /
                                {{bangla($proshikkhon->masala_masayel_target?? "")}} /
                                {{bangla($proshikkhon->darsul_quran_target?? "")}} /
                                {{bangla($proshikkhon->darsul_hadis_target?? "")}} /
                                {{bangla($proshikkhon->samostik_path_target?? "")}} /
                                {{bangla($proshikkhon->bishoy_vittik_onushilon_target?? "")}}
                            </td>
                            <td >
                                {{bangla($proshikkhon->sohi_quran_onushilon_uposthiti?? "")}} /
                                {{bangla($proshikkhon->masala_masayel_uposthiti?? "")}} /
                                {{bangla($proshikkhon->darsul_quran_uposthiti?? "")}} /
                                {{bangla($proshikkhon->darsul_hadis_uposthiti?? "")}} /
                                {{bangla($proshikkhon->samostik_path_uposthiti?? "")}} /
                                {{bangla($proshikkhon->bishoy_vittik_onushilon_uposthiti?? "")}}
                            </td>
                        </tr>
                    </tbody>
                </table> --}}
            </div>
            <div class="shomajsheba">
                <h1 class="font-18">সমাজ সংস্কার ও সমাজসেবা :</h1>
                <div class="personal_shamajik_kaj mb-2">
                    <h4 class="fs-6">১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h4>
                    {{-- <table class="text-center  mb-1">
                        <tr>
                            <td class="text-start px-2 ">মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন</td>
                            <td class="width-20">{{bangla($shomajsheba1->how_many_people_did?? "")}}</td>
                            <td class="text-start px-2 w-25">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                            <td class="width-20">{{bangla($shomajsheba1->service_received_total?? "")}}</td>
                        </tr>
                    </table> --}}
                </div>
                <div class="unit_shamajik_kaj mb-2">
                    <h4 class="fs-6">২. ইউনিটের উদ্যোগে সামাজিক কাজ :</h4>
                    {{-- <table class="text-center  mb-1">
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
                                    {{bangla($shomajsheba2->shamajik_onusthane_ongshogrohon?? "")}} /
                                    {{bangla($shomajsheba2->shamajik_onusthane_shohayota_prodan?? "")}}
                                </td>
                                <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                                <td >
                                    {{bangla($shomajsheba2->voluntarily_blood_donation_kotojon?? "")}} /
                                    {{bangla($shomajsheba2->voluntarily_blood_donation_kotojonke?? "")}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                                <td >{{bangla($shomajsheba2->shamajik_birodh_mimangsha?? "")}}</td>
                                <td class="text-start px-2">মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজন/কতজনকে)</td>
                                <td >
                                    {{bangla($shomajsheba2->matrikalin_sheba_prodan_kotojon?? "")}} /
                                    {{bangla($shomajsheba2->matrikalin_sheba_prodan_kotojonke?? "")}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মানবিক সহায়তা/কর্জে হাসানা প্রদান (কতজনকে)</td>
                                <td >
                                    {{bangla($shomajsheba2->manobik_shohayota_prodan?? "")}} /
                                    {{bangla($shomajsheba2->korje_hasana_prodan?? "")}}
                                </td>
                                <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে)</td>
                                <td >{{bangla($shomajsheba2->mayeter_gosol?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)</td>
                                <td >
                                    {{bangla($shomajsheba2->rogir_poricorja?? "")}} /
                                    {{bangla($shomajsheba2->medical_shohayota_prodan?? "")}}
                                </td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td >{{bangla($shomajsheba2->others?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নবজাতককে গিফ্ট প্রদান (কতজনকে )</td>
                                <td >{{bangla($shomajsheba2->nobojatokke_gift_prodan?? "")}}</td>
                                <td class="text-start px-2"></td>
                                <td ></td>
                            </tr>
                        </tbody>
                    </table> --}}
                </div>
            </div>
            <div class="rartrio">
                <h1 class="font-18">রাষ্ট্রীয় সংস্কার ও সংশোধন :</h1>
                <div class="bisistomb-2">
                    <p>বিশিষ্ট ব্যক্তিবর্গের সাথে যোগাযোগ সংখ্যা :   <span>{{bangla($rastrio->bishishto_bekti_jogajog?? "")}}</span></p>
                </div>
            </div>
            {{-- <div class="baytulmal">
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
            </div> --}}
            {{-- <div class="montobbo">
                <h1 class="fs-6 mb-1">ইউনিট সভানেত্রীর মন্তব্য :</h1>
                <p>{{$montobbo->montobbo?? ""}}</p>
            </div> --}}
        </section>


        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
