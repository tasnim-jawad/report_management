<template>
    <div id="report_uplode_body">
        <!-- <section id="heading" class="mt-3">
            <div class="report_heading position-relative mb-1">
                <h3 class="text-center fs-6">বিসমিল্লাহির রাহমানির রাহীম</h3>
                <h1 class="text-center mb-2 fs-4">ইউনিট সংগঠনের মাসিক রিপোর্ট</h1>
            </div>
            <div class="unit_info">
                <div class="line d-flex flex-wrap mb-1">
                    <p class="w-75">মাস: {{ formatMonth(month) }}</p>
                    <p class="w-25">সন: {{ formatYear(month) }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between mb-1">
                    <p>ইউনিটের নাম: {{ unit_info.title || '' }}</p>
                    <p>ওয়ার্ড নং ও নাম: {{ ward_info.no || '' }} ও {{ ward_info.title || '' }}</p>
                    <p class="w-25">উপজেলা/থানা: {{ thana_info.title || '' }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between">
                    <p>ইউনিট সভাপতির নাম: {{ precedent.full_name || '' }}</p>
                    <p class="width-30">ইউনিটের ধরন: {{ org_type.title || '' }}</p>
                </div>
            </div>
        </section> -->
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
                    <p class="w-75">মাস: {{ formatMonth(month) }}</p>
                    <p class="w-25">সন: {{ formatYear(month) }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>ওয়ার্ড নং ও নাম : {{ ward_info.no ?? "" }} ও {{ward_info.title ?? "" }}</p>
                    <p>পৌরসভা/ইউনিয়ন: </p>
                    <p class="w-25">উপজেলা/থানা: {{ thana_info.title ?? ""}}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>আমীর/সভাপতির নাম : {{ precedent.full_name ?? ""}}</p>
                </div>
            </div>
        </section>

        <section id="report">
            <div class="dawat mt-1">
                <h1 class="font-18">দাওয়াত ও তাবলিগ :</h1>
                <div class="jonoshadharon d-flex flex-wrap justify-content-between ">
                    <p class="fw-bold w-75">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদান সংখ্যা* :
                        <span>{{ total_dawat }}</span>
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
                                <td>
                                    <input name="how_many_groups_are_out" :value="formatBangla(dawat1.how_many_groups_are_out)" @change="data_upload('ward-dawat1-regular-group-wise')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="number_of_participants" :value="formatBangla(dawat1.number_of_participants)" @change="data_upload('ward-dawat1-regular-group-wise')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_have_been_invited" :value="formatBangla(dawat1.how_many_have_been_invited)" @change="data_upload('ward-dawat1-regular-group-wise')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_associate_members_created" :value="formatBangla(dawat1.how_many_associate_members_created)" @change="data_upload('ward-dawat1-regular-group-wise')" type="text" class="bg-input w-100 text-center" />
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
                                <td>
                                    <input name="total_rokon" :value="formatBangla(dawat2.total_rokon)" @change="data_upload('ward-dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="total_worker" :value="formatBangla(dawat2.total_worker)" @change="data_upload('ward-dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td>
                                    <input name="how_many_have_been_invited" :value="formatBangla(dawat2.how_many_have_been_invited)" @change="data_upload('ward-dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                                <td>
                                    <input name="how_many_were_give_dawat_rokon" :value="formatBangla(dawat2.how_many_were_give_dawat_rokon)" @change="data_upload('ward-dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_were_give_dawat_worker" :value="formatBangla(dawat2.how_many_were_give_dawat_worker)" @change="data_upload('ward-dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td>
                                    <input name="how_many_associate_members_created" :value="formatBangla(dawat2.how_many_associate_members_created)" @change="data_upload('ward-dawat2-personal-and-target')" type="text" class="bg-input w-100 text-center" />
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
                                <td>
                                    <input name="how_many_were_give_dawat" :value="formatBangla(dawat3.how_many_were_give_dawat)" @change="data_upload('ward-dawat3-general-program-and-others')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="width-35">মোট কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td>
                                    <input name="how_many_associate_members_created" :value="formatBangla(dawat3.how_many_associate_members_created)" @change="data_upload('ward-dawat3-general-program-and-others')" type="text" class="bg-input w-100 text-center" />
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

                                <td>
                                    <input name="total_gono_songjog_group" :value="formatBangla(dawat4.total_gono_songjog_group)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="total_attended" :value="formatBangla(dawat4.total_attended)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_have_been_invited" :value="formatBangla(dawat4.how_many_have_been_invited)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_associate_members_created" :value="formatBangla(dawat4.how_many_associate_members_created)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান</td>
                                <td>
                                    <input name="jela_mohanogor_declared_gonosonjog_group" :value="formatBangla(dawat4.jela_mohanogor_declared_gonosonjog_group)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jela_mohanogor_declared_gonosonjog_attended" :value="formatBangla(dawat4.jela_mohanogor_declared_gonosonjog_attended)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jela_mohanogor_declared_gonosonjog_invited" :value="formatBangla(dawat4.jela_mohanogor_declared_gonosonjog_invited)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jela_mohanogor_declared_gonosonjog_associated_created" :value="formatBangla(dawat4.jela_mohanogor_declared_gonosonjog_associated_created)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নির্বাচনী আসনে গণসংযোগ সপ্তাহ</td>
                                <td>
                                    <input name="election_gono_songjog_group" :value="formatBangla(dawat4.election_gono_songjog_group)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="election_attended" :value="formatBangla(dawat4.election_attended)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="election_how_many_have_been_invited" :value="formatBangla(dawat4.election_how_many_have_been_invited)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="election_how_many_associate_members_created" :value="formatBangla(dawat4.election_how_many_associate_members_created)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td>
                                    <input name="other_gono_songjog_group" :value="formatBangla(dawat4.other_gono_songjog_group)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="other_attended" :value="formatBangla(dawat4.other_attended)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="other_how_many_have_been_invited" :value="formatBangla(dawat4.other_how_many_have_been_invited)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="other_how_many_associate_members_created" :value="formatBangla(dawat4.other_how_many_associate_members_created)" @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text" class="bg-input w-100 text-center" />
                                </td>
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
                                <!-- <td >{{bangla($department1->teacher_rokon?? "")}}</td>
                                <td >{{bangla($department1->teacher_worker?? "")}}</td> -->
                                <td>
                                    <input name="teacher_rokon" :value="formatBangla(department1.teacher_rokon)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="teacher_worker" :value="formatBangla(department1.teacher_worker)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                </td>

                                <td>
                                    {{ (department1.teacher_rokon ?? null) !== null || (department1.teacher_worker ?? null) !== null
                                        ? formatBangla((department1.teacher_rokon ?? 0) + (department1.teacher_worker ?? 0))
                                        : ""
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                                <td>
                                    <input name="student_rokon" :value="formatBangla(department1.student_rokon)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="student_worker" :value="formatBangla(department1.student_worker)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{ (department1.student_rokon ?? null) !== null || (department1.student_worker ?? null) !== null
                                        ? formatBangla((department1.student_rokon ?? 0) + (department1.student_worker ?? 0))
                                        : ""
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex align-items-start gap-2">
                        <table class="text-center  mb-1">
                            <thead>
                                <tr>
                                    <th class="width-40">সামষ্টিক উদ্যোগ</th>
                                    <th class="width-30">মোট সংখ্যা</th>
                                    <th class="width-30 px-0">মোট শিক্ষার্থী সংখ্যা</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">কুরআন শিক্ষার গ্রুপ</td>
                                    <td>
                                        <input name="quran_learning_total_group" :value="formatBangla(department1.quran_learning_total_group)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        <input name="quran_learning_total_students" :value="formatBangla(department1.quran_learning_total_students)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-start px-2">মক্তব/ফোরকানিয়া মাদ্রাসা</td>
                                    <td>
                                        <div class="d-flex">
                                            <input name="total_moktob" :value="formatBangla(department1.total_moktob)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="total_forkania_madrasah" :value="formatBangla(department1.total_forkania_madrasah)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <input name="total_moktob_students" :value="formatBangla(department1.total_moktob_students)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="total_forkania_madrasah_students" :value="formatBangla(department1.total_forkania_madrasah_students)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center  mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-start width-70 px-2">মোট কতজন সহীহ তিলাওয়াত শিখেছেন</td>
                                    <td class="width-30">
                                        <input name="how_much_learned_sohih_tilawat" :value="formatBangla(department1.how_much_learned_sohih_tilawat)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে (পু/ম)</td>
                                    <td >
                                        <div class="d-flex">
                                            <input name="how_much_invited_man" :value="formatBangla(department1.how_much_invited_man)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="how_much_invited_woman" :value="formatBangla(department1.how_much_invited_woman)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মোট কতজন সহযোগী সদস্য হয়েছেন (পু/ম)</td>
                                    <td >
                                        <div class="d-flex">
                                            <input name="how_much_been_associated_man" :value="formatBangla(department1.how_much_been_associated_man)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="how_much_been_associated_woman" :value="formatBangla(department1.how_much_been_associated_woman)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <table class="text-center table_layout_fixed">
                        <tbody>
                            <tr>
                                <td class="width-35 text-start">তা'লিমুল কুরআন : মুয়াল্লিম সংখ্যা (পু./ম.)</td>
                                <td >
                                    <div class="d-flex">
                                        <input name="total_muallim_man" :value="formatBangla(department1.total_muallim_man)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="total_muallim_woman" :value="formatBangla(department1.total_muallim_woman)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="width-35 text-start">বৃদ্ধি সংখ্যা (পু./ম.) :</td>
                                <td >
                                    <div class="d-flex">
                                        <input name="total_muallim_increased_man" :value="formatBangla(department1.total_muallim_increased_man)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="total_muallim_increased_woman" :value="formatBangla(department1.total_muallim_increased_woman)" @change="data_upload('ward-department1-talimul-quran')" type="text" class="bg-input w-100 text-center" />
                                    </div>
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
                                        <div class="d-flex">
                                            <input name="govment_calculated_village_amount" :value="formatBangla(department2.govment_calculated_village_amount)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="govment_calculated_moholla_amount" :value="formatBangla(department2.govment_calculated_moholla_amount)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </th>
                                    <th class="width-20 ">বৃদ্ধি</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">গ্রাম/মহল্লা কমিটি সংখ্যা</td>
                                    <td >
                                        <div class="d-flex">
                                            <input name="total_village_committee" :value="formatBangla(department2.total_village_committee)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="total_moholla_committee" :value="formatBangla(department2.total_moholla_committee)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                    <td >
                                        <div class="d-flex">
                                            <input name="total_village_committee_increased" :value="formatBangla(department2.total_village_committee_increased)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="total_moholla_committee_increased" :value="formatBangla(department2.total_moholla_committee_increased)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">বিশেষ দাওয়াতের অন্তর্ভুক্ত গ্রাম/মহল্লা* সংখ্যা</td>
                                    <td >
                                        <div class="d-flex">
                                            <input name="special_dawat_included_village" :value="formatBangla(department2.special_dawat_included_village)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="special_dawat_included_moholla" :value="formatBangla(department2.special_dawat_included_moholla)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                    <td >
                                        <div class="d-flex">
                                            <input name="special_dawat_included_village_increased" :value="formatBangla(department2.special_dawat_included_village_increased)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />/
                                            <input name="special_dawat_included_moholla_increased" :value="formatBangla(department2.special_dawat_included_moholla_increased)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center  mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-start width-70 px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                    <td class="width-30">
                                        <input name="how_many_been_invited" :value="formatBangla(department2.how_many_been_invited)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                    <td class="width-30">
                                        <input name="how_many_associated_created" :value="formatBangla(department2.how_many_associated_created)" @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text" class="bg-input w-100 text-center" />
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
                                        <td >
                                            <input name="how_many_young_been_invited" :value="formatBangla(department3.how_many_young_been_invited)" @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text" class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">কতজন যুবক সহযোগী সদস্য হয়েছেন</td>
                                        <td >
                                            <input name="how_many_young_been_associated" :value="formatBangla(department3.how_many_young_been_associated)" @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text" class="bg-input w-100 text-center" />
                                        </td>
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
                                    <td >
                                        <input name="total_young_committee" :value="formatBangla(department3.total_young_committee)" @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="total_young_committee_increased" :value="formatBangla(department3.total_young_committee_increased)" @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">নতুন সমিতি/ক্লাব প্রতিষ্ঠা করা হয়েছে</td>
                                    <td >
                                        <input name="total_new_club" :value="formatBangla(department3.total_new_club)" @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="total_new_club_increased" :value="formatBangla(department3.total_new_club_increased)" @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো হয়েছে</td>
                                    <td >
                                        <input name="stablished_club_total_invited" :value="formatBangla(department3.stablished_club_total_invited)" @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="stablished_club_total_increased" :value="formatBangla(department3.stablished_club_total_increased)" @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text" class="bg-input w-100 text-center" />
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
                                    <th class="width-30 letter_spacing">শ্রেণি-পেশার বিবরণ</th>
                                    <th class="w-25 px-0 font-13">কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে</th>
                                    <th class="width-20 px-0 font-13">কতজন সহযোগী সদস্য হয়েছেন</th>
                                    <th class="width-10">টার্গেট</th>
                                    <th class="font-13 width-15">বাস্তবায়নের হার</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start letter_spacing ">রাজ: ও বিশিষ্ট ব্যক্তিবর্গ</td>
                                    <td >
                                        <input name="political_and_special_invited" :value="formatBangla(department4.political_and_special_invited)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="political_and_special_been_associated" :value="formatBangla(department4.political_and_special_been_associated)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="political_and_special_target" :value="formatBangla(department4.political_and_special_target)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >{{formatBangla(implementation_rate(department4.political_and_special_target,department4.political_and_special_been_associated))}}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">পেশাজীবী</td>
                                    <td >
                                        <input name="pesha_jibi_invited" :value="formatBangla(department4.pesha_jibi_invited)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="pesha_jibi_been_associated" :value="formatBangla(department4.pesha_jibi_been_associated)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="pesha_jibi_target" :value="formatBangla(department4.pesha_jibi_target)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >{{formatBangla(implementation_rate(department4.pesha_jibi_target,department4.pesha_jibi_been_associated))}}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">উলামা মাশায়েখ</td>
                                    <td >
                                        <input name="olama_masayekh_invited" :value="formatBangla(department4.olama_masayekh_invited)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="olama_masayekh_been_associated" :value="formatBangla(department4.olama_masayekh_been_associated)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="olama_masayekh_target" :value="formatBangla(department4.olama_masayekh_target)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >{{formatBangla(implementation_rate(department4.olama_masayekh_target, department4.olama_masayekh_been_associated))}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center mb-1">
                            <thead>
                                <tr>
                                    <th class="width-30 letter_spacing">শ্রেণি-পেশার বিবরণ</th>
                                    <th class="w-25 px-0 font-13">কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে</th>
                                    <th class="width-20 px-0 font-13">কতজন সহযোগী সদস্য হয়েছেন</th>
                                    <th class="width-10">টার্গেট</th>
                                    <th class="font-13 width-15">বাস্তবায়নের হার</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-1">শ্রমজীবী</td>
                                    <td >
                                        <input name="sromo_jibi_invited" :value="formatBangla(department4.sromo_jibi_invited)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="sromo_jibi_been_associated" :value="formatBangla(department4.sromo_jibi_been_associated)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="sromo_jibi_target" :value="formatBangla(department4.sromo_jibi_target)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >{{formatBangla(implementation_rate(department4.sromo_jibi_target, department4.sromo_jibi_been_associated))}}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-1 letter_spacing font-13">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)</td>
                                    <td >
                                        <input name="prantik_jonogosti_invited" :value="formatBangla(department4.prantik_jonogosti_invited)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="prantik_jonogosti_been_associated" :value="formatBangla(department4.prantik_jonogosti_been_associated)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="prantik_jonogosti_target" :value="formatBangla(department4.prantik_jonogosti_target)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >{{formatBangla(implementation_rate(department4.prantik_jonogosti_target, department4.prantik_jonogosti_been_associated))}}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-1">ভিন্নধর্মাবলম্বী</td>
                                    <td >
                                        <input name="vinno_dormalombi_invited" :value="formatBangla(department4.vinno_dormalombi_invited)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="vinno_dormalombi_been_associated" :value="formatBangla(department4.vinno_dormalombi_been_associated)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >
                                        <input name="vinno_dormalombi_target" :value="formatBangla(department4.vinno_dormalombi_target)" @change="data_upload('ward-department4-different-job-holders-dawat')" type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td >{{formatBangla(implementation_rate(department4.vinno_dormalombi_target, department4.vinno_dormalombi_been_associated))}}</td>
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
                                <td >
                                    <input name="total_attended_family" :value="formatBangla(department5.total_attended_family)" @change="data_upload('ward-department5-paribarik-dawat')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="width-35">মোট কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে</td>
                                <td >
                                    <input name="how_many_new_family_invited" :value="formatBangla(department5.how_many_new_family_invited)" @change="data_upload('ward-department5-paribarik-dawat')" type="text" class="bg-input w-100 text-center" />
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
                                <td >
                                    <input name="total_mosjid" :value="formatBangla(department6.total_mosjid)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td >
                                    <input name="total_mosjid_increase" :value="formatBangla(department6.total_mosjid_increase)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">সাধারণ দাওয়াহ্ সেন্টার</td>
                                <td >
                                    <input name="general_dawah_center" :value="formatBangla(department6.general_dawah_center)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td >
                                    <input name="general_dawah_center_increase" :value="formatBangla(department6.general_dawah_center_increase)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">দাওয়াতের আওতাভুক্ত মসজিদ</td>
                                <td >
                                    <input name="dawat_included_mosjid" :value="formatBangla(department6.dawat_included_mosjid)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td >
                                    <input name="dawat_included_mosjid_increase" :value="formatBangla(department6.dawat_included_mosjid_increase)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">তথ্যসেবা কেন্দ্র (মসজিদভিত্তিক /সাধারণ)</td>
                                <td >
                                    <div class="d-flex">
                                        <input name="mosjid_wise_information_center" :value="formatBangla(department6.mosjid_wise_information_center)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="general_information_center" :value="formatBangla(department6.general_information_center)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td >
                                    <div class="d-flex">
                                        <input name="mosjid_wise_information_center_increase" :value="formatBangla(department6.mosjid_wise_information_center_increase)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="general_information_center_increase" :value="formatBangla(department6.general_information_center_increase)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মসজিদভিত্তিক দাওয়াহ্ সেন্টার</td>
                                <td >
                                    <input name="mosjid_wise_dawah_center" :value="formatBangla(department6.mosjid_wise_dawah_center)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td >
                                    <input name="mosjid_wise_dawah_center_increase" :value="formatBangla(department6.mosjid_wise_dawah_center_increase)" @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2"></td>
                                <td ></td>
                                <td ></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tottho_projukti d-flex flex-wrap justify-content-between mb-1">
                    <p class="fw-bold fs-6 width-60 ">৭. তথ্যপ্রযুক্তির মাধ্যমে দাওয়াতি কাজের জন্য উপযুক্ত জনশক্তি সংখ্যা:
                        <span>
                            <input name="total_well_known" :value="formatBangla(department7.total_well_known)" @change="data_upload('ward-department7-dawat-in-technology')" type="text" class="bg-input w-100 text-center" />
                        </span>
                    </p>
                    <p class="fw-bold fs-6 width-40">,অংশগ্রহণকারীর সংখ্যা:
                        <span>
                            <input name="total_attended" :value="formatBangla(department7.total_attended)" @change="data_upload('ward-department7-dawat-in-technology')" type="text" class="bg-input w-100 text-center" />
                        </span>
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
                            <td >
                                <input name="total_pathagar" :value="formatBangla(dawah_prokashona.total_pathagar)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="total_pathagar_increase" :value="formatBangla(dawah_prokashona.total_pathagar_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয় কেন্দ্র</td>
                            <!-- <td >{{bangla($dawah_prokashona->ward_book_sales_center?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->ward_book_sales_center_increase?? "")}}</td> -->
                            <td >
                                <input name="ward_book_sales_center" :value="formatBangla(dawah_prokashona.ward_book_sales_center)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="ward_book_sales_center_increase" :value="formatBangla(dawah_prokashona.ward_book_sales_center_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই</td>
                            <!-- <td >{{bangla($dawah_prokashona->books_in_pathagar?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->books_in_pathagar_increase?? "")}}</td> -->
                            <td >
                                <input name="books_in_pathagar" :value="formatBangla(dawah_prokashona.books_in_pathagar)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="books_in_pathagar_increase" :value="formatBangla(dawah_prokashona.books_in_pathagar_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয়</td>
                            <!-- <td >{{bangla($dawah_prokashona->ward_book_sales?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->ward_book_sales_increase?? "")}}</td> -->
                            <td >
                                <input name="ward_book_sales" :value="formatBangla(dawah_prokashona.ward_book_sales)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="ward_book_sales_increase" :value="formatBangla(dawah_prokashona.ward_book_sales_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিলি</td>
                            <!-- <td >{{bangla($dawah_prokashona->book_distribution?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->book_distribution_increase?? "")}}</td> -->
                            <td >
                                <input name="book_distribution" :value="formatBangla(dawah_prokashona.book_distribution)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="book_distribution_increase" :value="formatBangla(dawah_prokashona.book_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">বইয়ের সফট কপি বিলি*</td>
                            <!-- <td >{{bangla($dawah_prokashona->soft_copy_book_distribution?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->soft_copy_book_distribution_increase?? "")}}</td> -->
                            <td >
                                <input name="soft_copy_book_distribution" :value="formatBangla(dawah_prokashona.soft_copy_book_distribution)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="soft_copy_book_distribution_increase" :value="formatBangla(dawah_prokashona.soft_copy_book_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলিকেন্দ্র</td>
                            <td >
                                <input name="unit_book_distribution_center" :value="formatBangla(dawah_prokashona.unit_book_distribution_center)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="unit_book_distribution_center_increase" :value="formatBangla(dawah_prokashona.unit_book_distribution_center_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">দাওয়াতি লিংক বিতরণ*</td>
                            <td >
                                <input name="dawat_link_distribution" :value="formatBangla(dawah_prokashona.dawat_link_distribution)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="dawat_link_distribution_increase" :value="formatBangla(dawah_prokashona.dawat_link_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলি</td>
                            <td >
                                <input name="unit_book_distribution" :value="formatBangla(dawah_prokashona.unit_book_distribution)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="unit_book_distribution_increase" :value="formatBangla(dawah_prokashona.unit_book_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/পৃথিবী কত কপি চলে</td>
                            <td >
                                <div class="d-flex">
                                    <input name="sonar_bangla" :value="formatBangla(dawah_prokashona.sonar_bangla)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />/
                                    <input name="songram" :value="formatBangla(dawah_prokashona.songram)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />/
                                    <input name="prithibi" :value="formatBangla(dawah_prokashona.prithibi)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                                </div>
                            </td>
                            <td >
                                <div class="d-flex">
                                    <input name="sonar_bangla_increase" :value="formatBangla(dawah_prokashona.sonar_bangla_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />/
                                    <input name="songram_increase" :value="formatBangla(dawah_prokashona.songram_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />/
                                    <input name="prithibi_increase" :value="formatBangla(dawah_prokashona.prithibi_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                                </div>
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
                                <th class="w-50">কর্মসূচির বিবরণ</th>
                                <th class="">মোট সংখ্যা</th>
                                <th class="">টার্গেট</th>
                                <th class="">গড় উপস্থিতি</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td >১.</td>
                                <td class="text-start px-2">ইউনিটে মাসিক সাধারণ সভা</td>
                                <td >
                                    <input name="unit_masik_sadaron_sova_total" :value="formatBangla(kormosuci.unit_masik_sadaron_sova_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td >
                                    <input name="unit_masik_sadaron_sova_target" :value="formatBangla(kormosuci.unit_masik_sadaron_sova_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="unit_masik_sadaron_sova_uposthiti" :value="formatBangla(average_kormosuci.unit_masik_sadaron_sova)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.unit_masik_sadaron_sova_total)" type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td >২.</td>
                                <td class="text-start font-13 px-2">দাওয়াতি সভা/আলোচনা সভা/সুধী সমাবেশ</td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dawati_sova_total" :value="formatBangla(kormosuci.dawati_sova_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="alochona_sova_total" :value="formatBangla(kormosuci.alochona_sova_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="sudhi_somabesh_total" :value="formatBangla(kormosuci.sudhi_somabesh_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dawati_sova_target" :value="formatBangla(kormosuci.dawati_sova_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="alochona_sova_target" :value="formatBangla(kormosuci.alochona_sova_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="sudhi_somabesh_target" :value="formatBangla(kormosuci.sudhi_somabesh_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dawati_sova_uposthiti" :value="formatBangla(average_kormosuci.dawati_sova)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.dawati_sova_total)" type="text" class="bg-input w-100 text-center" />/
                                        <input name="alochona_sova_uposthiti" :value="formatBangla(average_kormosuci.alochona_sova)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.alochona_sova_total)" type="text" class="bg-input w-100 text-center" />/
                                        <input name="sudhi_somabesh_uposthiti" :value="formatBangla(average_kormosuci.sudhi_somabesh)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.sudhi_somabesh_total)" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >৩.</td>
                                <td class="text-start px-2">সীরাতুন্নবী (সাঃ) মাহফিল</td>
                                <td >
                                    <input name="siratunnabi_mahfil_total" :value="formatBangla(kormosuci.siratunnabi_mahfil_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td >
                                    <input name="siratunnabi_mahfil_target" :value="formatBangla(kormosuci.siratunnabi_mahfil_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="siratunnabi_mahfil_uposthiti" :value="formatBangla(average_kormosuci.siratunnabi_mahfil)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.siratunnabi_mahfil_total)" type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td >৪.</td>
                                <td class="text-start px-2">ঈদ পুনর্মিলনী</td>
                                <td >
                                    <input name="eid_reunion_total" :value="formatBangla(kormosuci.eid_reunion_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td >
                                    <input name="eid_reunion_target" :value="formatBangla(kormosuci.eid_reunion_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="eid_reunion_uposthiti" :value="formatBangla(average_kormosuci.eid_reunion)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.eid_reunion_total)" type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td >৫.</td>
                                <td class="text-start font-13 letter_spacing px-1">দারস/তাফসীর/দাওয়াতি জনসভা ও ইসলামী মাহফিল</td>

                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dars_total" :value="formatBangla(kormosuci.dars_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="tafsir_total" :value="formatBangla(kormosuci.tafsir_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="dawati_jonosova_total" :value="formatBangla(kormosuci.dawati_jonosova_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dars_target" :value="formatBangla(kormosuci.dars_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="tafsir_target" :value="formatBangla(kormosuci.tafsir_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="dawati_jonosova_target" :value="formatBangla(kormosuci.dawati_jonosova_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dars_uposthiti" :value="formatBangla(average_kormosuci.dars)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.dars_total)" type="text" class="bg-input w-100 text-center" />/
                                        <input name="tafsir_uposthiti" :value="formatBangla(average_kormosuci.tafsir)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.tafsir_total)" type="text" class="bg-input w-100 text-center" />/
                                        <input name="dawati_jonosova_uposthiti" :value="formatBangla(average_kormosuci.dawati_jonosova)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.dawati_jonosova_total)" type="text" class="bg-input w-100 text-center" />
                                    </div>
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
                                <td >৬.</td>
                                <td class="text-start px-2">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="iftar_mahfil_personal_total" :value="formatBangla(kormosuci.iftar_mahfil_personal_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="iftar_mahfil_samostic_total" :value="formatBangla(kormosuci.iftar_mahfil_samostic_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="iftar_mahfil_personal_target" :value="formatBangla(kormosuci.iftar_mahfil_personal_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="iftar_mahfil_samostic_target" :value="formatBangla(kormosuci.iftar_mahfil_samostic_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="iftar_mahfil_personal_uposthiti" :value="formatBangla(average_kormosuci.iftar_mahfil_personal)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.iftar_mahfil_personal_total)" type="text" class="bg-input w-100 text-center" />/
                                        <input name="iftar_mahfil_samostic_uposthiti" :value="formatBangla(average_kormosuci.iftar_mahfil_samostic)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.iftar_mahfil_samostic_total)" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >৭.</td>
                                <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="cha_chakra_total" :value="formatBangla(kormosuci.cha_chakra_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="samostic_khawa_total" :value="formatBangla(kormosuci.samostic_khawa_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="sikkha_sofor_total" :value="formatBangla(kormosuci.sikkha_sofor_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="cha_chakra_target" :value="formatBangla(kormosuci.cha_chakra_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="samostic_khawa_target" :value="formatBangla(kormosuci.samostic_khawa_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="sikkha_sofor_target" :value="formatBangla(kormosuci.sikkha_sofor_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="cha_chakra_uposthiti" :value="formatBangla(average_kormosuci.cha_chakra)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.cha_chakra_total)" type="text" class="bg-input w-100 text-center" />/
                                        <input name="samostic_khawa_uposthiti" :value="formatBangla(average_kormosuci.samostic_khawa)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.samostic_khawa_total)" type="text" class="bg-input w-100 text-center" />/
                                        <input name="sikkha_sofor_uposthiti" :value="formatBangla(average_kormosuci.sikkha_sofor)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.sikkha_sofor_total)" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >৮.</td>
                                <td class="text-start px-2">কিরাত/হামদ না'ত প্ৰতিযোগিতা</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="kirat_protijogita_total" :value="formatBangla(kormosuci.kirat_protijogita_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="hamd_nat_protijogita_total" :value="formatBangla(kormosuci.hamd_nat_protijogita_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="kirat_protijogita_target" :value="formatBangla(kormosuci.kirat_protijogita_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />/
                                        <input name="hamd_nat_protijogita_target" :value="formatBangla(kormosuci.hamd_nat_protijogita_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="kirat_protijogita_uposthiti" :value="formatBangla(average_kormosuci.kirat_protijogita)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.kirat_protijogita_total)" type="text" class="bg-input w-100 text-center" />/
                                        <input name="hamd_nat_protijogita_uposthiti" :value="formatBangla(average_kormosuci.hamd_nat_protijogita)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.hamd_nat_protijogita_total)" type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >৯.</td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td >
                                    <input name="others_total" :value="formatBangla(kormosuci.others_total)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td >
                                    <input name="others_target" :value="formatBangla(kormosuci.others_target)" @change="data_upload('ward-kormosuci-bastobayon')" type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="others_uposthiti" :value="formatBangla(average_kormosuci.others)" @change="average_data_upload($event,'ward-kormosuci-bastobayon',kormosuci.others_total)" type="text" class="bg-input w-100 text-center" />
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
                    <!-- <table class="text-center  mb-1 table_layout_fixed">
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
                                <td>{{bangla($songothon1->rokon_previous?? "")}}</td>
                                <td>{{bangla($songothon1->rokon_present?? "")}}</td>
                                <td>{{bangla($songothon1->rokon_briddhi?? "")}}</td>
                                <td>{{bangla($songothon1->rokon_gatti?? "")}}</td>
                                <td>{{bangla($songothon1->rokon_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon1->rokon_target, $songothon1->rokon_briddhi))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সর্বমোট কর্মী</td>
                                <td>{{bangla($songothon1->worker_previous?? "")}}</td>
                                <td>{{bangla($songothon1->worker_present?? "")}}</td>
                                <td>{{bangla($songothon1->worker_briddhi?? "")}}</td>
                                <td>{{bangla($songothon1->worker_gatti?? "")}}</td>
                                <td>{{bangla($songothon1->worker_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon1->worker_target, $songothon1->worker_briddhi))}}
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>

                <!-- <div class="shohojogi mb-2">
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
                                <td>{{bangla($songothon2->associate_member_man_previous?? "")}}</td>
                                <td>{{bangla($songothon2->associate_member_man_present?? "")}}</td>
                                <td>{{bangla($songothon2->associate_member_man_briddhi?? "")}}</td>
                                <td>{{bangla($songothon2->associate_member_man_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon2->associate_member_man_target, $songothon2->associate_member_man_briddhi))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মোট সহযোগী সদস্য (মহিলা)</td>
                                <td>{{bangla($songothon2->associate_member_woman_previous?? "")}}</td>
                                <td>{{bangla($songothon2->associate_member_woman_present?? "")}}</td>
                                <td>{{bangla($songothon2->associate_member_woman_briddhi?? "")}}</td>
                                <td>{{bangla($songothon2->associate_member_woman_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon2->associate_member_woman_target, $songothon2->associate_member_woman_briddhi))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সর্বমোট সহযোগী সদস্য সংখ্যা**</td>
                                <td>
                                    {{ bangla(($songothon2->associate_member_man_previous ?? 0) + ($songothon2->associate_member_woman_previous ?? 0) ?: '') }}
                                </td>
                                <td>
                                    {{ bangla(($songothon2->associate_member_man_present ?? 0) + ($songothon2->associate_member_woman_present ?? 0) ?: '') }}
                                </td>
                                <td>
                                    {{ bangla(($songothon2->associate_member_man_briddhi ?? 0) + ($songothon2->associate_member_woman_briddhi ?? 0) ?: '') }}
                                </td>
                                <td>
                                    {{ bangla(($songothon2->associate_member_man_target ?? 0) + ($songothon2->associate_member_woman_target ?? 0) ?: '') }}
                                </td>
                                <td>
                                    {{-- {{ bangla(($songothon2->associate_member_man_previous ?? 0) + ($songothon2->associate_member_woman_previous ?? 0) ?: '') }} --}}
                                    {{
                                        bangla(
                                            implementation_rate(
                                                (($songothon2->associate_member_man_briddhi ?? 0) + ($songothon2->associate_member_woman_briddhi ?? 0) ?: ''),
                                                (($songothon2->associate_member_man_briddhi ?? 0) + ($songothon2->associate_member_woman_briddhi ?? 0) ?: '')
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-14">*সদস্য (রুকন) ঘাটতির ক্ষেত্রে স্থানান্তর, ইন্তেকাল, বাতিল, ইস্তফা ও বিদেশ গমন সংখ্যার হিসাব আলাদাভাবে সংরক্ষণ করে মোট সংখ্যাটি এ ঘরে বসাতে হবে এবং এতদসংক্রান্ত তালিকা ঊর্ধ্বতন সংগঠনে জমা দিতে হবে।</p>
                    <p class="font-14">** দাওয়াত ও তাবলিগের 'ক' এর অধীনে উল্লেখিত সকল সহযোগী সদস্যের সংখ্যা সংগঠনের জনশক্তির এ ছকে সর্বমোট সহযোগী সদস্যের ঘরে বসাতে হবে।</p>
                </div> -->
                <!-- <div class="bivag_vittik mb-5">
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
                                <td>{{bangla($songothon3->women_rokon_previous?? "")}}</td>
                                <td>{{bangla($songothon3->women_rokon_present?? "")}}</td>
                                <td>{{bangla($songothon3->women_rokon_increase?? "")}}</td>
                                <td>{{bangla($songothon3->women_rokon_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->women_rokon_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>{{bangla($songothon3->women_kormi_previous?? "")}}</td>
                                <td>{{bangla($songothon3->women_kormi_present?? "")}}</td>
                                <td>{{bangla($songothon3->women_kormi_increase?? "")}}</td>
                                <td>{{bangla($songothon3->women_kormi_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->women_kormi_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>{{bangla($songothon3->women_associate_member_previous?? "")}}</td>
                                <td>{{bangla($songothon3->women_associate_member_present?? "")}}</td>
                                <td>{{bangla($songothon3->women_associate_member_increase?? "")}}</td>
                                <td>{{bangla($songothon3->women_associate_member_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->women_associate_member_target?? "")}}</td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">শ্রম*</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>{{bangla($songothon3->sromojibi_rokon_previous?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_rokon_present?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_rokon_increase?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_rokon_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_rokon_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>{{bangla($songothon3->sromojibi_kormi_previous?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_kormi_present?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_kormi_increase?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_kormi_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_kormi_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>{{bangla($songothon3->sromojibi_associate_member_previous?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_associate_member_present?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_associate_member_increase?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_associate_member_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->sromojibi_associate_member_target?? "")}}</td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">উলামা</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>{{bangla($songothon3->ulama_rokon_previous?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_rokon_present?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_rokon_increase?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_rokon_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_rokon_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>{{bangla($songothon3->ulama_kormi_previous?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_kormi_present?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_kormi_increase?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_kormi_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_kormi_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>{{bangla($songothon3->ulama_associate_member_previous?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_associate_member_present?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_associate_member_increase?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_associate_member_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->ulama_associate_member_target?? "")}}</td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">পেশাজীবী</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>{{bangla($songothon3->pesha_jibi_rokon_previous?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_rokon_present?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_rokon_increase?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_rokon_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_rokon_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>{{bangla($songothon3->pesha_jibi_kormi_previous?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_kormi_present?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_kormi_increase?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_kormi_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_kormi_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>{{bangla($songothon3->pesha_jibi_associate_member_previous?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_associate_member_present?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_associate_member_increase?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_associate_member_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->pesha_jibi_associate_member_target?? "")}}</td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">যুব</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>{{bangla($songothon3->jubo_rokon_previous?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_rokon_present?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_rokon_increase?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_rokon_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_rokon_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>{{bangla($songothon3->jubo_kormi_previous?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_kormi_present?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_kormi_increase?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_kormi_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_kormi_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>{{bangla($songothon3->jubo_associate_member_previous?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_associate_member_present?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_associate_member_increase?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_associate_member_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->jubo_associate_member_target?? "")}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2" class="text-center px-2">ভিন্নধর্মাবলম্বী</td>
                                <td class="text-start">কর্মী</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_kormi_previous?? "")}}</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_kormi_present?? "")}}</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_kormi_increase?? "")}}</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_kormi_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_kormi_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_associate_member_previous?? "")}}</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_associate_member_present?? "")}}</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_associate_member_increase?? "")}}</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_associate_member_gatti?? "")}}</td>
                                <td>{{bangla($songothon3->vinno_dormalombi_associate_member_target?? "")}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-12">*শ্রমিক কল্যাণের রিপোর্ট অনুযায়ী হবে।</p>
                </div> -->


                <!-- <div class="unit_shongothon mb-3 pt-3">
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
                                <td>{{bangla($songothon4->general_unit_men_previous?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_men_present?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_men_increase?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_men_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_men_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->general_unit_men_target, $songothon4->general_unit_men_increase))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সাধারণ ইউনিট (মহিলা)</td>
                                <td>{{bangla($songothon4->general_unit_women_previous?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_women_present?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_women_increase?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_women_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_women_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->general_unit_women_target, $songothon4->general_unit_women_increase))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">উলামা ইউনিট</td>
                                <td>{{bangla($songothon4->ulama_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->ulama_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->ulama_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->ulama_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->ulama_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->ulama_unit_target, $songothon4->ulama_unit_increase))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">পেশাজীবী ইউনিট</td>
                                <td>{{bangla($songothon4->peshajibi_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->peshajibi_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->peshajibi_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->peshajibi_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->peshajibi_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->peshajibi_unit_target, $songothon4->peshajibi_unit_increase))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">শ্রমিক কল্যাণ ইউনিট</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->sromik_kollyan_unit_target, $songothon4->sromik_kollyan_unit_increase))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">যুব ইউনিট</td>
                                <td>{{bangla($songothon4->jubo_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->jubo_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->jubo_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->jubo_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->jubo_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->jubo_unit_target, $songothon4->jubo_unit_increase))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">মিডিয়া ইউনিট</td>
                                <td>{{bangla($songothon4->media_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->media_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->media_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->media_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->media_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->media_unit_target, $songothon4->media_unit_increase))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">সর্বমোট ইউনিট সংখ্যা</td>
                                <td>
                                    {{
                                        bangla(
                                            ($songothon4->general_unit_men_previous ?? 0) +
                                            ($songothon4->general_unit_women_previous ?? 0) +
                                            ($songothon4->ulama_unit_previous ?? 0) +
                                            ($songothon4->peshajibi_unit_previous ?? 0) +
                                            ($songothon4->sromik_kollyan_unit_previous ?? 0) +
                                            ($songothon4->jubo_unit_previous ?? 0) +
                                            ($songothon4->media_unit_previous ?? 0)
                                            ?: ''
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        bangla(
                                            ($songothon4->general_unit_men_present ?? 0) +
                                            ($songothon4->general_unit_women_present ?? 0) +
                                            ($songothon4->ulama_unit_present ?? 0) +
                                            ($songothon4->peshajibi_unit_present ?? 0) +
                                            ($songothon4->sromik_kollyan_unit_present ?? 0) +
                                            ($songothon4->jubo_unit_present ?? 0) +
                                            ($songothon4->media_unit_present ?? 0)
                                            ?: ''
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        bangla(
                                            ($songothon4->general_unit_men_increase ?? 0) +
                                            ($songothon4->general_unit_women_increase ?? 0) +
                                            ($songothon4->ulama_unit_increase ?? 0) +
                                            ($songothon4->peshajibi_unit_increase ?? 0) +
                                            ($songothon4->sromik_kollyan_unit_increase ?? 0) +
                                            ($songothon4->jubo_unit_increase ?? 0) +
                                            ($songothon4->media_unit_increase ?? 0)
                                            ?: ''
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        bangla(
                                            ($songothon4->general_unit_men_gatti ?? 0) +
                                            ($songothon4->general_unit_women_gatti ?? 0) +
                                            ($songothon4->ulama_unit_gatti ?? 0) +
                                            ($songothon4->peshajibi_unit_gatti ?? 0) +
                                            ($songothon4->sromik_kollyan_unit_gatti ?? 0) +
                                            ($songothon4->jubo_unit_gatti ?? 0) +
                                            ($songothon4->media_unit_gatti ?? 0)
                                            ?: ''
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        bangla(
                                            ($songothon4->general_unit_men_target ?? 0) +
                                            ($songothon4->general_unit_women_target ?? 0) +
                                            ($songothon4->ulama_unit_target ?? 0) +
                                            ($songothon4->peshajibi_unit_target ?? 0) +
                                            ($songothon4->sromik_kollyan_unit_target ?? 0) +
                                            ($songothon4->jubo_unit_target ?? 0) +
                                            ($songothon4->media_unit_target ?? 0)
                                            ?: ''
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        bangla(
                                            implementation_rate(
                                                (
                                                    ($songothon4->general_unit_men_target ?? 0) +
                                                    ($songothon4->general_unit_women_target ?? 0) +
                                                    ($songothon4->ulama_unit_target ?? 0) +
                                                    ($songothon4->peshajibi_unit_target ?? 0) +
                                                    ($songothon4->sromik_kollyan_unit_target ?? 0) +
                                                    ($songothon4->jubo_unit_target ?? 0) +
                                                    ($songothon4->media_unit_target ?? 0)
                                                    ?: ''
                                                ),
                                                (
                                                    ($songothon4->general_unit_men_increase ?? 0) +
                                                    ($songothon4->general_unit_women_increase ?? 0) +
                                                    ($songothon4->ulama_unit_increase ?? 0) +
                                                    ($songothon4->peshajibi_unit_increase ?? 0) +
                                                    ($songothon4->sromik_kollyan_unit_increase ?? 0) +
                                                    ($songothon4->jubo_unit_increase ?? 0) +
                                                    ($songothon4->media_unit_increase ?? 0)
                                                    ?: ''
                                                )

                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <!-- <div class="paribarik mb-2">
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
                                <td>{{bangla($songothon5->dawati_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon5->dawati_unit_present?? "")}}</td>
                                <td>{{bangla($songothon5->dawati_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon5->dawati_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon5->dawati_unit_target?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">মোট পারিবারিক ইউনিট</td>
                                <td>{{bangla($songothon5->paribarik_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon5->paribarik_unit_present?? "")}}</td>
                                <td>{{bangla($songothon5->paribarik_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon5->paribarik_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon5->paribarik_unit_target?? "")}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-13">*দাওয়াতি ইউনিট ও পারিবারিক ইউনিটের সংখ্যা মোট সাংগঠনিক ইউনিটে অন্তর্ভুক্ত হবে না।</p>
                </div> -->
                <!-- <div class="bidai_chatro mb-3">
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
                                    {{bangla($songothon6->Joined_student_man_member?? "")}} /
                                    {{bangla($songothon6->Joined_student_women_member?? "")}}
                                </td>
                                <td>
                                    {{bangla($songothon6->Joined_student_man_associate?? "")}} /
                                    {{bangla($songothon6->Joined_student_women_associate?? "")}}
                                </td>
                                <td>
                                    {{bangla($songothon6->Joined_student_man_worker?? "")}} /
                                    {{bangla($songothon6->Joined_student_women_worker?? "")}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <!-- <div class="sofor mb-2">
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
                                        <td>{{bangla($songothon7->upper_leader_sofor?? "")}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">ওয়ার্ড আমীর/সভাপতির সফর</td>
                                        <td>{{bangla($songothon7->ward_sovapotir_sofor?? "")}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">ওয়ার্ড শূরা/কর্মপরিষদ/টিম সদস্যদের সফর</td>
                                        <td>{{bangla($songothon7->word_sura_sodosso_sofor?? "")}}</td>
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
                                        <td>{{bangla($songothon8->associate_member_total?? "")}}</td>
                                        <td>{{bangla($songothon8->associate_member_total_iyanot_amounts?? "")}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">সুধী</td>
                                        <td>{{bangla($songothon8->sudhi_total?? "")}}</td>
                                        <td>{{bangla($songothon8->sudi_total_iyanot_amounts?? "")}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="boithok mb-4 pb-3">
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
                                    {{bangla($songothon9->word_sura_boithok_total?? "")}} /
                                    {{bangla($songothon9->kormoporishod_boithok_total?? "")}} /
                                    {{bangla($songothon9->team_boithok_total?? "")}}
                                </td>
                                <td>
                                    {{bangla($songothon9->word_sura_boithok_target?? "")}} /
                                    {{bangla($songothon9->kormoporishod_boithok_target?? "")}} /
                                    {{bangla($songothon9->team_boithok_target?? "")}}
                                </td>
                                <td>
                                    {{bangla(calculate_average($songothon9->word_sura_boithok_total, $songothon9->word_sura_boithok_uposthiti))}}/
                                    {{bangla(calculate_average($songothon9->kormoporishod_boithok_total, $songothon9->kormoporishod_boithok_uposthiti))}}/
                                    {{bangla(calculate_average($songothon9->team_boithok_total, $songothon9->team_boithok_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">২.</td>
                                <td class="text-start">ওয়ার্ড বৈঠক</td>
                                <td>{{bangla($songothon9->word_boithok_total?? "")}}</td>
                                <td>{{bangla($songothon9->word_boithok_target?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($songothon9->word_boithok_total, $songothon9->word_boithok_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">৩.</td>
                                <td class="text-start">মাসিক সদস্য (রুকন) বৈঠক</td>
                                <td>{{bangla($songothon9->masik_sodosso_boithok_total?? "")}}</td>
                                <td>{{bangla($songothon9->masik_sodosso_boithok_target?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($songothon9->masik_sodosso_boithok_total, $songothon9->masik_sodosso_boithok_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">৪.</td>
                                <td class="text-start">ইউনিটে মোট কর্মী বৈঠক</td>
                                <td>{{bangla($songothon9->unit_kormi_boithok_total?? "")}}</td>
                                <td>{{bangla($songothon9->unit_kormi_boithok_target?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($songothon9->unit_kormi_boithok_total, $songothon9->unit_kormi_boithok_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">৫.</td>
                                <td class="text-start">উলামা/ যুবক/শ্রমিকদের বৈঠক/সমাবেশ</td>
                                <td>
                                    {{bangla($songothon9->ulama_somabesh_total?? "")}} /
                                    {{bangla($songothon9->jubok_somabesh_total?? "")}} /
                                    {{bangla($songothon9->sromik_somabesh_total?? "")}}
                                </td>
                                <td>
                                    {{bangla($songothon9->ulama_somabesh_target?? "")}} /
                                    {{bangla($songothon9->jubok_somabesh_target?? "")}} /
                                    {{bangla($songothon9->sromik_somabesh_target?? "")}}
                                </td>
                                <td>
                                    {{bangla(calculate_average($songothon9->ulama_somabesh_total, $songothon9->ulama_somabesh_uposthiti))}}/
                                    {{bangla(calculate_average($songothon9->jubok_somabesh_total, $songothon9->jubok_somabesh_uposthiti))}}/
                                    {{bangla(calculate_average($songothon9->sromik_somabesh_total, $songothon9->sromik_somabesh_uposthiti))}}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div> -->
            </div>


            <!-- <div class="proshikkhon mb-2">
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
                                <td >১.</td>
                                <td class="text-start">ইউনিটে তারবিয়াতী বৈঠক</td>
                                <td>{{bangla($proshikkhon1->unit_tarbiati_boithok?? "")}}</td>
                                <td>{{bangla($proshikkhon1->unit_tarbiati_boithok_target?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($proshikkhon1->unit_tarbiati_boithok, $proshikkhon1->unit_tarbiati_boithok_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >২.</td>
                                <td class="text-start">ওয়ার্ডভিত্তিক কর্মী শিক্ষা বৈঠক</td>
                                <td>{{bangla($proshikkhon1->ward_kormi_sikkha_boithok?? "")}}</td>
                                <td>{{bangla($proshikkhon1->ward_kormi_sikkha_boithok_target?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($proshikkhon1->ward_kormi_sikkha_boithok, $proshikkhon1->ward_kormi_sikkha_boithok_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >৩.</td>
                                <td class="text-start">ঊর্ধ্বতন সংগঠনের শিক্ষাশিবির/শিক্ষা বৈঠকে অংশগ্রহণকারী</td>
                                <td>
                                    {{bangla($proshikkhon1->urdhotono_sikkha_shibir?? "")}} /
                                    {{bangla($proshikkhon1->urdhotono_sikkha_boithok?? "")}}
                                </td>
                                <td>
                                    {{bangla($proshikkhon1->urdhotono_sikkha_shibir_target?? "")}} /
                                    {{bangla($proshikkhon1->urdhotono_sikkha_boithok_target?? "")}}
                                </td>
                                <td>
                                    {{bangla(calculate_average($proshikkhon1->urdhotono_sikkha_shibir, $proshikkhon1->urdhotono_sikkha_shibir_uposthiti))}}/
                                    {{bangla(calculate_average($proshikkhon1->urdhotono_sikkha_boithok, $proshikkhon1->urdhotono_sikkha_boithok_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >৪.</td>
                                <td class="text-start">গণশিক্ষা বৈঠক/ গণ নৈশ ইবাদত</td>
                                <td>
                                    {{bangla($proshikkhon1->gono_sikkha_boithok?? "")}} /
                                    {{bangla($proshikkhon1->gono_noisho_ibadot?? "")}}
                                </td>
                                <td>
                                    {{bangla($proshikkhon1->gono_sikkha_boithok_target?? "")}} /
                                    {{bangla($proshikkhon1->gono_noisho_ibadot_target?? "")}}
                                </td>
                                <td>
                                    {{bangla(calculate_average($proshikkhon1->gono_sikkha_boithok, $proshikkhon1->gono_sikkha_boithok_uposthiti))}}/
                                    {{bangla(calculate_average($proshikkhon1->gono_noisho_ibadot, $proshikkhon1->gono_noisho_ibadot_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >৫.</td>
                                <td class="text-start">আলোচনা চক্র</td>
                                <td class="text-start">
                                    গ্রুপ সংখ্যা: <span>{{bangla($proshikkhon1->alochona_chokro_group?? "")}}</span>
                                </td>
                                <td class="text-start">
                                    অধিবেশন সংখ্যা: <span>{{bangla($proshikkhon1->alochona_chokro_program?? "")}}</span>
                                </td>
                                <td>
                                    {{bangla(calculate_average($proshikkhon1->alochona_chokro_program, $proshikkhon1->alochona_chokro_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >৬.</td>
                                <td class="text-start">দারস্/সহীহ কুরআন তিলাওয়াত অনুশীলন</td>
                                <td class="text-start">
                                    প্রোগ্রাম সংখ্যা :
                                    <span>
                                        {{bangla($proshikkhon1->darsul_quran_program?? "")}} /
                                        {{bangla($proshikkhon1->sohih_tilawat_program?? "")}}
                                    </span>
                                </td>
                                <td></td>
                                <td>
                                    {{bangla(calculate_average($proshikkhon1->darsul_quran_program, $proshikkhon1->darsul_quran_uposthiti))}}/
                                    {{bangla(calculate_average($proshikkhon1->sohih_tilawat_program, $proshikkhon1->sohih_tilawat_uposthiti))}}
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
                                    {{bangla($proshikkhon2->dawah_uposthiti?? "")}} /
                                    {{bangla($proshikkhon2->shomajkormo_uposthiti?? "")}} /
                                    {{bangla($proshikkhon2->media_uposthiti?? "")}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">আইসিটি/ অফিস/ ফিন্যান্সিয়াল ম্যানেজমেন্ট/ ইংরেজি ভাষা/ আরবি ভাষা</td>
                                <td>
                                    {{bangla($proshikkhon2->ict_uposthiti?? "")}} /
                                    {{bangla($proshikkhon2->office_uposthiti?? "")}} /
                                    {{bangla($proshikkhon2->financial_management_uposthiti?? "")}} /
                                    {{bangla($proshikkhon2->english_language_uposthiti?? "")}} /
                                    {{bangla($proshikkhon2->arabic_language_uposthiti?? "")}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ*</td>
                                <td>{{bangla($proshikkhon2->trade_oriented_technical_training_uposthiti?? "")}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-14">* ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ কোর্সের আওতায় ফার্সিং (পোল্ট্রি, ফিশারিজ, ডেইরি), সেলাই/এমব্রয়ডারী মেশিন অপারেটর, ড্রাইভিং কাম অটোমেকানিক, রন্ধন শিল্প, হর্টিকালচার/নার্সারি, তাঁত শিল্প/বুটিকস, হস্ত শিল্প, ইলেক্ট্রিক্যাল এন্ড ইলেক্ট্রনিক্স সার্ভিসিং, সিভিল কন্সট্রাকশন/প্লাম্বারিং, আমিনশীপ ইত্যাদি কোর্সসমূহের বাস্তবায়ন রিপোর্টের যোগফল এখানে বসাতে হবে।</p>
                </div>
            </div> -->

            <!-- <div class="shomajsheba mt-5">
                <h1 class="font-18 fw-bold">সমাজ সংস্কার ও সমাজসেবা :</h1>
                <div class="personal_shamajik_kaj mb-2">
                    <h4 class="fs-6 fw-bold">১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h4>
                    <table class="text-center  mb-1">
                        <tr>
                            <td class="text-start px-2 ">মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন</td>
                            <td class="width-20">{{bangla($shomajsheba1->how_many_people_did?? "")}}</td>
                            <td class="text-start px-2 w-25">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                            <td class="width-20">{{bangla($shomajsheba1->service_received_total?? "")}}</td>
                        </tr>
                    </table>
                </div>
                <div class="samostik_shamajik_kaj pt-3 mb-2">
                    <h4 class="fs-6 fw-bold">২. সামষ্টিক/সেবা টিমের মাধ্যমে সামাজিক কাজ (প্রযোজ্য ক্ষেত্রে):</h4>
                    <table class="mb-1">
                        <tbody>
                            <td class="w-25 text-center">সাধারণ সেবা টিম সংখ্যা</td>
                            <td class="text-center">{{bangla($shomajsheba2->number_of_general_service_teams?? "")}}</td>
                            <td class="w-25 text-center">টেকনিক্যাল সেবা টিম সংখ্যা</td>
                            <td class="text-center">{{bangla($shomajsheba2->number_of_technical_service_teams?? "")}}</td>
                            <td class="w-25 text-center">স্বেচ্ছাসেবক টিম সংখ্যা</td>
                            <td class="text-center">{{bangla($shomajsheba2->number_of_volunteer_teams?? "")}}</td>
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
                                <td>{{bangla($shomajsheba2->minor_unnoyonmulok_kaj?? "")}}</td>
                                <td class="text-start px-2">টেকনিক্যাল সেবা প্রদান (কতজন / কতজনকে)</td>
                                <td>
                                    {{bangla($shomajsheba2->technical_services_prodan_kotojonke?? "")}} /
                                    {{bangla($shomajsheba2->online_services_prodan_kotojonke?? "")}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2 font-13">সামাজিক অনুষ্ঠানে অশংগ্রহণ/সহায়তা প্রদান (সংখ্যা / কতজনকে)</td>
                                <td>
                                    {{bangla($shomajsheba2->shamajik_onusthane_ongshogrohon?? "")}} /
                                    {{bangla($shomajsheba2->shamajik_onusthane_shohayota_prodan?? "")}}
                                </td>
                                <td class="text-start px-2">অনলাইনের মাধ্যমে সেবা প্রদান (কতজনকে)</td>
                                <td>{{bangla($shomajsheba2->online_services_prodan_kotojonke?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                                <td>{{bangla($shomajsheba2->shamajik_birodh_mimangsha?? "")}}</td>
                                <td class="text-start px-2">বৃক্ষরোপন (কতটি)</td>
                                <td>{{bangla($shomajsheba2->brikkho_ropon?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মানবিক সহায়তা প্রদান (কতজনকে)</td>
                                <td>{{bangla($shomajsheba2->manobik_shohayota_prodan?? "")}}</td>
                                <td class="text-start px-2">জনসচেতনতামূলক প্রোগ্রাম (কতটি)</td>
                                <td>{{bangla($shomajsheba2->public_awareness_programs?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কর্জে হাসানা প্রদান (কতজনকে )</td>
                                <td>{{bangla($shomajsheba2->korje_hasana_prodan?? "")}}</td>
                                <td class="text-start px-2">ত্রাণ বিতরণ (কতজনকে)</td>
                                <td >{{bangla($shomajsheba2->tran_bitoron?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">পরিষ্কার-পরিচ্ছন্নতা/মশক নিধন অভিযান</td>
                                <td>
                                    {{bangla($shomajsheba2->porishkar_poricchonnota_ovijan?? "")}} /
                                    {{bangla($shomajsheba2->moshok_nidhon_ovijan?? "")}}
                                </td>
                                <td class="text-start px-2">ভিন্নধর্মাবলম্বীদের সেবা প্রদান (কতজন/কতজনকে)</td>
                                <td>
                                    {{bangla($shomajsheba2->vinnodhormabolombider_service_prodan_kotojon?? "")}} /
                                    {{bangla($shomajsheba2->vinnodhormabolombider_service_prodan_kotojonke?? "")}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)</td>
                                <td>
                                    {{bangla($shomajsheba2->rogir_poricorja?? "")}} /
                                    {{bangla($shomajsheba2->medical_shohayota_prodan?? "")}}
                                </td>
                                <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে )</td>
                                <td>{{bangla($shomajsheba2->mayeter_gosol_kotojonke?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                                <td>
                                    {{bangla($shomajsheba2->voluntarily_blood_donation_kotojon?? "")}} /
                                    {{bangla($shomajsheba2->voluntarily_blood_donation_kotojonke?? "")}}
                                </td>
                                <td class="text-start px-2">জানাযায় অংশগ্রহণ</td>
                                <td >{{bangla($shomajsheba2->janajay_ongshogrohon?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নবজাতককে গিফ্‌ট প্রদান (কতজনকে)</td>
                                <td>{{bangla($shomajsheba2->nobojatokke_gift_prodan?? "")}}</td>
                                <td class="text-start px-2">স্বল্প পুঁজিতে কর্মসংস্থানের সহায়তা (কতজনকে)</td>
                                <td >{{bangla($shomajsheba2->low_capital_employment_kotojonke?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ভ্রাম্যমান স্কুল/মক্তব চালু</td>
                                <td>
                                    {{bangla($shomajsheba2->vrammoman_school_calu?? "")}} /
                                    {{bangla($shomajsheba2->vrammoman_moktob_calu?? "")}}
                                </td>
                                <td class="text-start px-2">অন্যান্য......</td>
                                <td >{{bangla($shomajsheba2->others?? "")}}</td>
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
                                        <td class="text-start px-2 width-70">স্বাস্থ্যকর্মী প্রশিক্ষণ প্রোগ্রামে মোট অংশগ্রহণকারীর সংখ্যা</td>
                                        <td>{{bangla($shomajsheba3->health_worker_training_programs_attendance?? "")}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">কতজন স্বাস্থ্যসেবা কাজে অংশগ্রহণ করেছেন</td>
                                        <td>{{bangla($shomajsheba3->participated_in_health_care_work?? "")}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">সেবাপ্রাপ্ত সংখ্যা</td>
                                        <td>{{bangla($shomajsheba3->served_people?? "")}}</td>
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
                                        <td>{{bangla($shomajsheba4->shamajik_protishthan_kototi?? "")}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">কতটি প্রতিষ্ঠানে সামাজিক কাজ হয়েছে</td>
                                        <td>{{bangla($shomajsheba4->shamajik_protishthan_kototite_kaj_hoyeche?? "")}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2 font-13">কতটি নতুন সামাজিক প্রতিষ্ঠান চালু করা হয়েছে (প্রযোজ্য ক্ষেত্রে)</td>
                                        <td>{{bangla($shomajsheba4->new_shamajik_protishthan?? "")}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="rartrio">
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
                                <td>{{bangla($rastrio1->rajnoitik_bekti_jogajog_koreche_kotojon?? "")}}</td>
                                <td>{{bangla($rastrio1->rajnoitik_bekti_jogajog_koreche_kotojonke?? "")}}</td>
                            </tr>
                            <tr>
                                <td class="text-start">প্রশাসনিক ব্যক্তিবর্গ</td>
                                <td>{{bangla($rastrio1->proshoshonik_bekti_jogajog_koreche_kotojon?? "")}}</td>
                                <td>{{bangla($rastrio1->proshoshonik_bekti_jogajog_koreche_kotojonke?? "")}}</td>
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
                                        <td>{{bangla($rastrio2->centrally_announced_political_program?? "")}}</td>
                                        <td>
                                            {{bangla(calculate_average($rastrio2->centrally_announced_political_program, $rastrio2->centrally_announced_political_program_attend))}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2 font-13">স্থানীয়ভাবে ঘোষিত কর্মসূচি : জনসভা/সমাবেশ/মিছিল</td>
                                        <td class="font-13">
                                            {{bangla($rastrio2->locally_announced_jonoshova?? "")}}/
                                            {{bangla($rastrio2->locally_announced_shomabesh?? "")}}/
                                            {{bangla($rastrio2->locally_announced_michil?? "")}}
                                        </td>
                                        <td class="font-13">
                                            {{bangla(calculate_average($rastrio2->locally_announced_jonoshova, $rastrio2->locally_announced_jonoshova_attend))}}/
                                            {{bangla(calculate_average($rastrio2->locally_announced_shomabesh, $rastrio2->locally_announced_shomabesh_attend))}}/
                                            {{bangla(calculate_average($rastrio2->locally_announced_michil, $rastrio2->locally_announced_michil_attend))}}
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
                                            {{bangla($rastrio2->poster_bitoron?? "")}}/
                                            {{bangla($rastrio2->leaflet_bitoron?? "")}}/
                                            {{bangla($rastrio2->booklet_bitoron?? "")}}/
                                            {{bangla($rastrio2->sharoklipi_bitoron?? "")}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">অন্যান্য</td>
                                        <td>{{bangla($rastrio2->others?? "")}}</td>
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
                                <td>{{bangla($rastrio3->shadhinota_o_jatio_dibosh_total_programs?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($rastrio3->shadhinota_o_jatio_dibosh_total_programs, $rastrio3->shadhinota_o_jatio_dibosh_attend))}}
                                </td>
                                <td class="text-start">আন্তর্জাতিক মাতৃভাষা দিবস</td>
                                <td>{{bangla($rastrio3->mattrivasha_dibosh_total_programs?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($rastrio3->mattrivasha_dibosh_total_programs, $rastrio3->mattrivasha_dibosh_attend))}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">বিজয় দিবস</td>
                                <td>{{bangla($rastrio3->bijoy_dibosh_total_programs?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($rastrio3->bijoy_dibosh_total_programs, $rastrio3->bijoy_dibosh_attend))}}
                                </td>
                                <td class="text-start">অন্যান্য</td>
                                <td>{{bangla($rastrio3->others_total_programs?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($rastrio3->others_total_programs, $rastrio3->others_attend))}}
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
                                    {{bangla($rastrio4->councilor_candidate?? "")}} /
                                    {{bangla($rastrio4->member_candidate?? "")}}
                                </td>
                                <td>
                                    {{bangla($rastrio4->councilor_candidate_elected?? "")}} /
                                    {{bangla($rastrio4->member_candidate_elected?? "")}}
                                </td>
                                <td>
                                    {{bangla($rastrio4->councilor_candidate_second_position?? "")}} /
                                    {{bangla($rastrio4->member_candidate_second_position?? "")}}
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
                                        {{bangla($rastrio4->national_vote_kendro?? "")}} /
                                        {{bangla($rastrio4->local_vote_kendro?? "")}}
                                    </td>
                                    <td>
                                        {{bangla($rastrio4->national_vote_kendro_increase?? "")}} /
                                        {{bangla($rastrio4->local_vote_kendro_increase?? "")}}
                                    </td>
                                    <td>
                                        {{bangla($rastrio4->national_vote_kendro_target?? "")}} /
                                        {{bangla($rastrio4->local_vote_kendro_target?? "")}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">ভোট কেন্দ্র কমিটি/কেন্দ্র/ বুথভিত্তিক ইউনিট</td>
                                    <td>
                                        {{bangla($rastrio4->vote_kendro_committee?? "")}} /
                                        {{bangla($rastrio4->vote_kendro_vittik_unit?? "")}}
                                    </td>
                                    <td>
                                        {{bangla($rastrio4->vote_kendro_committee_increase?? "")}} /
                                        {{bangla($rastrio4->vote_kendro_vittik_unit_increase?? "")}}
                                    </td>
                                    <td>
                                        {{bangla($rastrio4->vote_kendro_committee_target?? "")}} /
                                        {{bangla($rastrio4->vote_kendro_vittik_unit_target?? "")}}
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
                                    <td>{{bangla($rastrio4->election_management_committee_meeting?? "")}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
            <!-- <div class="baytulmal">
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
                            <td class="text-end px-2">মোট</td>
                            <td >{{bangla($total_income)}}</td>
                            <td class="text-end px-2">মোট</td>
                            <td >{{bangla($total_expense)}}</td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">গত মাসের উদ্বৃত্ত</td>
                            <td >{{bangla($total_previous)}}</td>
                            <td class="text-end px-2">এ মাসের উদ্বৃত্ত</td>
                            <td >{{bangla($total_current_income)}}</td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td >{{bangla($total_current_income)}}</td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td >{{bangla($in_total)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
            <!-- <div class="montobbo">
                <h1 class="fs-6 fw-bold">ওয়ার্ড আমীর/সভাপতির মন্তব্য :</h1>
                <p>{{$montobbo->montobbo}}</p>
            </div> -->
        </section>


        <section class="margine_top_page_change">

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
                                        <tr v-for="(bm_cat,index) in bm_income_categories" :key="index">
                                            <td class="text-start px-2 w-50 border_bottom">{{ bm_cat.title }}</td>
                                            <td class="border_left_bottom">
                                                <input name="bm_entry" :value="formatBangla(bm_categoty_amount(bm_cat.id))" @change="income_store(bm_cat.id,$event.target.value)" type="text" class="bg-input w-100 text-center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        <tr v-for="(expense_cat,index) in bm_expense_categories" :key="index">
                                            <td class="text-start px-2 w-50 border_bottom">{{ expense_cat.title }}</td>
                                            <td class="border_left_bottom">
                                                <input name="bm_entry" :value="formatBangla(expense_categoty_amount(expense_cat.id))" @change="expense_store(expense_cat.id,$event.target.value)" type="text" class="bg-input w-100 text-center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td >{{formatBangla(parseInt(total_income)?? "")}}</td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td >{{formatBangla(parseInt(total_expense)?? "")}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="montobbo">
                <h1 class="fs-6">ইউনিট সভাপতির মন্তব্য :</h1>
                <textarea name="montobbo" @change="data_upload('montobbo')" id="" cols="30" class="w-100 bg-input" rows="5" v-model="montobbo.montobbo"></textarea>
            </div>
        </section>
        <a href="" class="print_preview" @click.prevent="print_report()"><i class="fa-solid fa-print"></i></a>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                month: '',
                org_type: {},
                ward_info: {},
                thana_info: {},
                precedent: {},

                dawat1: {},
                dawat2: {},
                dawat3: {},
                dawat4: {},
                department1: {},
                department4: {},
                department5: {},
                dawah_prokashona: {},
                kormosuci: {},
                songothon1: {},
                songothon2: {},
                songothon9: {},
                songothon5: {},
                songothon7: {},
                songothon8: {},
                proshikkhon: {},
                shomajsheba1: {},
                shomajsheba2: {},
                rastrio: {},
                montobbo: {},

                income_category_wise: {},
                total_income: null,

                expense_category_wise: {},
                total_expense: null,

                bm_expense_categories: null,
                bm_income_categories: null,

                bm_cat_wise: null,
                expense_cat_wise: null,

                average_kormosuci: {
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


            };
        },

        created() {
            this.uploaded_data()
            this.income_category()
            this.expense_category()
            this.bm_category_wise()
            this.bm_expense_category_wise()

        },
        watch:{
            kormosuci:function(){
                this.average_data();
            },
            total_income:function(){
                console.log(typeof this.total_income);

            },

        },
        methods: {
            uploaded_data:async function(){
                const month = this.$route.params.month;
                const user_id = this.$route.params.user_id;

                let res = await axios.get('/ward/uploaded-data',{
                    params: {
                        month: month,
                        user_id: user_id
                    }
                })
                console.log(res.data);

                if(res.data.status == 'success'){

                    this.month = res.data.month,
                    this.org_type = res.data.org_type,
                    this.ward_info = res.data.ward_info,
                    this.thana_info = res.data.thana_info,
                    this.precedent = res.data.precedent,

                    this.dawat1 = res.data.dawat1,
                    this.dawat2 = res.data.dawat2,
                    this.dawat3 = res.data.dawat3,
                    this.dawat4 = res.data.dawat4,
                    this.department1 = res.data.department1,
                    this.department2 = res.data.department2,
                    this.department3 = res.data.department3,
                    this.department4 = res.data.department4,
                    this.department5 = res.data.department5,
                    this.department6 = res.data.department6,
                    this.department7 = res.data.department7,
                    this.dawah_prokashona = res.data.dawah_prokashona,
                    this.kormosuci = res.data.kormosuci,
                    this.songothon1 = res.data.songothon1,
                    this.songothon2 = res.data.songothon2,
                    this.songothon3 = res.data.songothon3,
                    this.songothon4 = res.data.songothon4,
                    this.songothon5 = res.data.songothon5,
                    this.songothon6 = res.data.songothon6,
                    this.songothon7 = res.data.songothon7,
                    this.songothon8 = res.data.songothon8,
                    this.songothon9 = res.data.songothon9,
                    this.proshikkhon1 = res.data.proshikkhon1,
                    this.proshikkhon2 = res.data.proshikkhon2,
                    this.shomajsheba1 = res.data.shomajsheba1,
                    this.shomajsheba2 = res.data.shomajsheba2,
                    this.shomajsheba3 = res.data.shomajsheba3,
                    this.shomajsheba4 = res.data.shomajsheba4,
                    this.rastrio1 = res.data.rastrio1,
                    this.rastrio2 = res.data.rastrio2,
                    this.rastrio3 = res.data.rastrio3,
                    this.rastrio4 = res.data.rastrio4,
                    this.montobbo = res.data.montobbo,

                    this.income_category_wise = res.data.income_category_wise,
                    this.total_income = res.data.total_income,

                    this.expense_category_wise = res.data.expense_category_wise,
                    this.total_expense = res.data.total_expense

                    console.log("this.department2",this.department2);


                }
            },
            average_data:async function(){
                // -------------- kormosuci --------------
                this.average_kormosuci.unit_masik_sadaron_sova =
                    Math.round((this.kormosuci.unit_masik_sadaron_sova_uposthiti ?? 0) / (this.kormosuci.unit_masik_sadaron_sova_total ?? 1));
                this.average_kormosuci.dawati_sova =
                    Math.round((this.kormosuci.dawati_sova_uposthiti ?? 0) / (this.kormosuci.dawati_sova_total ?? 1));
                this.average_kormosuci.alochona_sova =
                    Math.round((this.kormosuci.alochona_sova_uposthiti ?? 0) / (this.kormosuci.alochona_sova_total ?? 1));
                this.average_kormosuci.sudhi_somabesh =
                    Math.round((this.kormosuci.sudhi_somabesh_uposthiti ?? 0) / (this.kormosuci.sudhi_somabesh_total ?? 1));
                this.average_kormosuci.siratunnabi_mahfil =
                    Math.round((this.kormosuci.siratunnabi_mahfil_uposthiti ?? 0) / (this.kormosuci.siratunnabi_mahfil_total ?? 1));
                this.average_kormosuci.eid_reunion =
                    Math.round((this.kormosuci.eid_reunion_uposthiti ?? 0) / (this.kormosuci.eid_reunion_total ?? 1));
                this.average_kormosuci.dars =
                    Math.round((this.kormosuci.dars_uposthiti ?? 0) / (this.kormosuci.dars_total ?? 1));
                this.average_kormosuci.tafsir =
                    Math.round((this.kormosuci.tafsir_uposthiti ?? 0) / (this.kormosuci.tafsir_total ?? 1));
                this.average_kormosuci.dawati_jonosova =
                    Math.round((this.kormosuci.dawati_jonosova_uposthiti ?? 0) / (this.kormosuci.dawati_jonosova_total ?? 1));
                this.average_kormosuci.iftar_mahfil_personal =
                    Math.round((this.kormosuci.iftar_mahfil_personal_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_personal_total ?? 1));
                this.average_kormosuci.iftar_mahfil_samostic =
                    Math.round((this.kormosuci.iftar_mahfil_samostic_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_samostic_total ?? 1));
                this.average_kormosuci.cha_chakra =
                    Math.round((this.kormosuci.cha_chakra_uposthiti ?? 0) / (this.kormosuci.cha_chakra_total ?? 1));
                this.average_kormosuci.samostic_khawa =
                    Math.round((this.kormosuci.samostic_khawa_uposthiti ?? 0) / (this.kormosuci.samostic_khawa_total ?? 1));
                this.average_kormosuci.sikkha_sofor =
                    Math.round((this.kormosuci.sikkha_sofor_uposthiti ?? 0) / (this.kormosuci.sikkha_sofor_total ?? 1));
                this.average_kormosuci.kirat_protijogita =
                    Math.round((this.kormosuci.kirat_protijogita_uposthiti ?? 0) / (this.kormosuci.kirat_protijogita_total ?? 1));
                this.average_kormosuci.hamd_nat_protijogita =
                    Math.round((this.kormosuci.hamd_nat_protijogita_uposthiti ?? 0) / (this.kormosuci.hamd_nat_protijogita_total ?? 1));
                this.average_kormosuci.others =
                    Math.round((this.kormosuci.others_uposthiti ?? 0) / (this.kormosuci.others_total ?? 1));
                // -------------- kormosuci --------------


            },

            formatBangla(number) {
                return number ? number.toLocaleString("bn-BD") : "";
            },
            formatMonth(date) {
                return new Date(date).toLocaleString("bn-BD", { month: "long" });
            },
            formatYear(date) {
                const year = new Date(date).getFullYear();
                // Convert year to Bangla digits without commas
                return year.toString().replace(/\d/g, (digit) => "০১২৩৪৫৬৭৮৯"[digit]);
            },
            data_upload(endpoint) {
                const { value, name } = event.target;
                axios.post(`/${endpoint}/store-single`, {
                        value,
                        name,
                        month: this.month,
                    })
                    .then((response) => {
                        // window.toaster("Data uploaded successfully");
                        console.log("Data uploaded successfully");
                        if (
                            [
                                'unit_masik_sadaron_sova',
                                'dawati_sova',
                                'alochona_sova',
                                'sudhi_somabesh',
                                'siratunnabi_mahfil',
                                'eid_reunion',
                                'dars',
                                'tafsir',
                                'dawati_jonosova',
                                'iftar_mahfil_personal',
                                'iftar_mahfil_samostic',
                                'cha_chakra',
                                'samostic_khawa',
                                'sikkha_sofor',
                                'kirat_protijogita',
                                'hamd_nat_protijogita',
                                'others',


                            ].includes(name)) {
                                this.uploaded_data();  // Call uploaded_data if name matches
                            }

                    })
                    .catch((error) => {
                        console.error("Error uploading data", error);
                    });
            },
            average_data_upload($event,endpoint, multiplier) {
                const { value, name } = $event.target;
                const total = value * multiplier;
                console.log('average_value',$event.target,total, value , multiplier);

                axios.post(`/${endpoint}/store-single`, {
                        value: total,
                        name,
                        month: this.month,
                    })
                    .then((response) => {
                        window.toaster("Data uploaded successfully");
                    })
                    .catch((error) => {
                        console.error("Error uploading data", error);
                    });
            },
            expense_category:async function(){
                let res = await axios.get('/ward-bm-expense-category/all')
                if(res.data.status == 'success'){
                        this.bm_expense_categories = res?.data?.data?.data
                    }

            },
            income_category:async function(){
                let res = await axios.get('/ward-bm-income-category/all')
                if(res){
                    this.bm_income_categories = res.data?.data
                }

            },
            income_store:function(bm_category_id,amount){
                const month = this.$route.params.month;
                const formData = {
                    bm_category_id: bm_category_id,
                    amount: amount,
                    month: month,
                };
                axios.post('/bm-paid/store',formData)
                    .then(function (response) {
                        window.toaster('New BM entry Created successfuly', 'success');
                    })
                    .catch(function (error) {
                        console.log(error.response);
                    });
            },

            bm_category_wise:async function(){
                const month = this.$route.params.month;

                let res = await axios.get('/ward/income-category-wise',{
                    params: {
                        month: month
                    }
                })
                if(res){
                    this.bm_cat_wise = res.data?.data
                }
            },
            bm_categoty_amount:function(bm_cat_id){
                if(this.bm_cat_wise != null){
                    const element = this.bm_cat_wise.find(element => element.bm_category.id == bm_cat_id);
                    if (element) {
                        return element.amount;
                    }
                }else{
                    return "";
                }
            },

            bm_expense_category_wise:async function(){
                const month = this.$route.params.month;

                let res = await axios.get('/ward/expense-category-wise',{
                    params: {
                        month: month
                    }
                })
                if(res){
                    this.expense_cat_wise = res.data?.data
                }
            },

            expense_categoty_amount:function(expense_cat_id){
                if(this.expense_cat_wise != null){
                    const element = this.expense_cat_wise.find(element => element.bm_expense_category.id == expense_cat_id);
                    if (element) {
                        return element.amount;
                    }
                }else{
                    return "";
                }
            },

            expense_store:function(bm_expense_category_id,amount){
                const month = this.$route.params.month;
                const formData = {
                    bm_expense_category_id: bm_expense_category_id,
                    amount: amount,
                    month: month,
                };
                axios.post('/bm-expense/store',formData)
                    .then(function (response) {
                        window.toaster('New Expense entry Created successfuly', 'success');
                    })
                    .catch(function (error) {
                        console.log(error.response);
                    });
            },
            print_report:function(){
                const month = this.$route.params.month;
                const user_id = this.$route.params.user_id;
                const url = `/unit/report?user_id=${user_id}&month=${month}&print=true`;
                window.location.href = url;

                setTimeout(() => {
                    window.print(); // Trigger the print dialog
                }, 200);
            },

            implementation_rate:function(target, achieved){
                if (target && achieved && target !== 0) {
                    return this.formatBangla(Math.round((achieved / target) * 100)) + '%';
                }
                return ' ';
            }


        },
        computed: {
            total_dawat:function() {
                const total =
                    (this.dawat1.how_many_have_been_invited ?? 0) +
                    (this.dawat2.how_many_have_been_invited ?? 0) +
                    (this.dawat3.how_many_were_give_dawat ?? 0) +
                    (this.dawat4.how_many_have_been_invited ?? 0) +
                    (this.dawat4.jela_mohanogor_declared_gonosonjog_invited ?? 0);
                return this.formatBangla(total);
            },
        },
    };
</script>

<style>
    /* @import url("../../../../../../public/css/unit/unit_report_upload.css"); */
    @import url("../../../../../../public/css/ward/ward_report_upload.css");
</style>
