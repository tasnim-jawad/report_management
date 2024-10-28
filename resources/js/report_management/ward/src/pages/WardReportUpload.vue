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
                            <!-- <td >{{bangla($dawah_prokashona->unit_book_distribution_center?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->unit_book_distribution_center_increase?? "")}}</td> -->
                            <td >
                                <input name="unit_book_distribution_center" :value="formatBangla(dawah_prokashona.unit_book_distribution_center)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="unit_book_distribution_center_increase" :value="formatBangla(dawah_prokashona.unit_book_distribution_center_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">দাওয়াতি লিংক বিতরণ*</td>
                            <!-- <td >{{bangla($dawah_prokashona->dawat_link_distribution?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->dawat_link_distribution_increase?? "")}}</td> -->
                            <td >
                                <input name="dawat_link_distribution" :value="formatBangla(dawah_prokashona.dawat_link_distribution)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="dawat_link_distribution_increase" :value="formatBangla(dawah_prokashona.dawat_link_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলি</td>
                            <!-- <td >{{bangla($dawah_prokashona->unit_book_distribution?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->unit_book_distribution_increase?? "")}}</td> -->
                            <td >
                                <input name="unit_book_distribution" :value="formatBangla(dawah_prokashona.unit_book_distribution)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>
                            <td >
                                <input name="unit_book_distribution_increase" :value="formatBangla(dawah_prokashona.unit_book_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/পৃথিবী কত কপি চলে</td>
                            <td >


                                <!-- {{bangla($dawah_prokashona->sonar_bangla?? "")}} /
                                {{bangla($dawah_prokashona->songram?? "")}} /
                                {{bangla($dawah_prokashona->prithibi?? "")}} -->
                                <div class="d-flex">
                                    <input name="sonar_bangla" :value="formatBangla(dawah_prokashona.sonar_bangla)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />/
                                    <input name="songram" :value="formatBangla(dawah_prokashona.songram)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />/
                                    <input name="prithibi" :value="formatBangla(dawah_prokashona.prithibi)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                                </div>
                            </td>
                            <td >
                                <!-- {{bangla($dawah_prokashona->sonar_bangla_increase?? "")}} /
                                {{bangla($dawah_prokashona->songram_increase?? "")}} /
                                {{bangla($dawah_prokashona->prithibi_increase?? "")}} -->
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
            <!-- <div class="job_holder mb-1">
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
                                <td >{{bangla($kormosuci->unit_masik_sadaron_sova_total?? "")}}</td>
                                <td >{{bangla($kormosuci->unit_masik_sadaron_sova_target?? "")}}</td>
                                <td>{{bangla(calculate_average($kormosuci->unit_masik_sadaron_sova_total,$kormosuci->unit_masik_sadaron_sova_uposthiti))}}</td>
                            </tr>
                            <tr>
                                <td >২.</td>
                                <td class="text-start font-13 px-2">দাওয়াতি সভা/আলোচনা সভা/সুধী সমাবেশ</td>
                                <td class="font-13">
                                    {{bangla($kormosuci->dawati_sova_total?? "")}}/
                                    {{bangla($kormosuci->alochona_sova_total?? "")}}/
                                    {{bangla($kormosuci->sudhi_somabesh_total?? "")}}
                                </td>
                                <td class="font-13">
                                    {{bangla($kormosuci->dawati_sova_target?? "")}}/
                                    {{bangla($kormosuci->alochona_sova_target?? "")}}/
                                    {{bangla($kormosuci->sudhi_somabesh_target?? "")}}
                                </td>
                                <td class="font-13">
                                    {{bangla(calculate_average($kormosuci->dawati_sova_total,$kormosuci->dawati_sova_uposthiti))}}/
                                    {{bangla(calculate_average($kormosuci->alochona_sova_total,$kormosuci->alochona_sova_uposthiti))}}/
                                    {{bangla(calculate_average($kormosuci->sudhi_somabesh_total,$kormosuci->sudhi_somabesh_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >৩.</td>
                                <td class="text-start px-2">সীরাতুন্নবী (সাঃ) মাহফিল</td>
                                <td>{{bangla($kormosuci->siratunnabi_mahfil_total?? "")}}</td>
                                <td>{{bangla($kormosuci->siratunnabi_mahfil_target?? "")}}</td>
                                <td>{{bangla(calculate_average($kormosuci->siratunnabi_mahfil_total,$kormosuci->siratunnabi_mahfil_uposthiti))}}</td>
                            </tr>
                            <tr>
                                <td >৪.</td>
                                <td class="text-start px-2">ঈদ পুনর্মিলনী</td>
                                <td >{{bangla($kormosuci->eid_reunion_total?? "")}}</td>
                                <td >{{bangla($kormosuci->eid_reunion_target?? "")}}</td>
                                <td>{{bangla(calculate_average($kormosuci->eid_reunion_total,$kormosuci->eid_reunion_uposthiti))}}</td>
                            </tr>
                            <tr>
                                <td >৫.</td>
                                <td class="text-start font-13 letter_spacing px-1">দারস/তাফসীর/দাওয়াতি জনসভা ও ইসলামী মাহফিল</td>
                                <td class="font-13">
                                    {{bangla($kormosuci->dars_total?? "")}}/
                                    {{bangla($kormosuci->tafsir_total?? "")}}/
                                    {{bangla($kormosuci->dawati_jonosova_total?? "")}}
                                </td>
                                <td class="font-13">
                                    {{bangla($kormosuci->dars_target?? "")}}/
                                    {{bangla($kormosuci->tafsir_target?? "")}}/
                                    {{bangla($kormosuci->dawati_jonosova_target?? "")}}
                                </td>
                                <td class="font-13">
                                    {{bangla(calculate_average($kormosuci->dars_total,$kormosuci->dars_uposthiti))}}/
                                    {{bangla(calculate_average($kormosuci->tafsir_total,$kormosuci->tafsir_uposthiti))}}/
                                    {{bangla(calculate_average($kormosuci->dawati_jonosova_total,$kormosuci->dawati_jonosova_uposthiti))}}
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
                                <td >
                                    {{bangla($kormosuci->iftar_mahfil_personal_total?? "")}}/
                                    {{bangla($kormosuci->iftar_mahfil_samostic_total?? "")}}
                                </td>
                                <td >
                                    {{bangla($kormosuci->iftar_mahfil_personal_target?? "")}}/
                                    {{bangla($kormosuci->iftar_mahfil_samostic_target?? "")}}
                                </td>
                                <td>
                                    {{bangla(calculate_average($kormosuci->iftar_mahfil_personal_total,$kormosuci->iftar_mahfil_personal_uposthiti))}}/
                                    {{bangla(calculate_average($kormosuci->iftar_mahfil_samostic_total,$kormosuci->iftar_mahfil_samostic_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >৭.</td>
                                <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                                <td class="font-13">
                                    {{bangla($kormosuci->cha_chakra_total?? "")}}/
                                    {{bangla($kormosuci->samostic_khawa_total?? "")}}/
                                    {{bangla($kormosuci->sikkha_sofor_total?? "")}}
                                </td>
                                <td class="font-13">
                                    {{bangla($kormosuci->cha_chakra_target?? "")}}/
                                    {{bangla($kormosuci->samostic_khawa_target?? "")}}/
                                    {{bangla($kormosuci->sikkha_sofor_target?? "")}}
                                </td>
                                <td class="font-13">
                                    {{bangla(calculate_average($kormosuci->cha_chakra_total,$kormosuci->cha_chakra_uposthiti))}}/
                                    {{bangla(calculate_average($kormosuci->samostic_khawa_total,$kormosuci->samostic_khawa_uposthiti))}}/
                                    {{bangla(calculate_average($kormosuci->sikkha_sofor_total,$kormosuci->sikkha_sofor_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >৮.</td>
                                <td class="text-start px-2">কিরাত/হামদ না'ত প্ৰতিযোগিতা</td>
                                <td class="font-13">
                                    {{bangla($kormosuci->kirat_protijogita_total?? "")}}/
                                    {{bangla($kormosuci->hamd_nat_protijogita_total?? "")}}
                                </td>
                                <td class="font-13">
                                    {{bangla($kormosuci->kirat_protijogita_target?? "")}}/
                                    {{bangla($kormosuci->hamd_nat_protijogita_target?? "")}}
                                </td>
                                <td class="font-13">
                                    {{bangla(calculate_average($kormosuci->kirat_protijogita_total,$kormosuci->kirat_protijogita_uposthiti))}}/
                                    {{bangla(calculate_average($kormosuci->hamd_nat_protijogita_total,$kormosuci->hamd_nat_protijogita_uposthiti))}}
                                </td>
                            </tr>
                            <tr>
                                <td >৯.</td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td >{{bangla($kormosuci->others_total?? "")}}</td>
                                <td >{{bangla($kormosuci->others_target?? "")}}</td>
                                <td>
                                    {{bangla(calculate_average($kormosuci->others_total,$kormosuci->others_uposthiti))}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                    iftar_mahfil_personal: null,
                    iftar_mahfil_samostic: null,
                    cha_chakra: null,
                    samostic_khawa: null,
                    sikkha_sofor: null,
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
                this.average_kormosuci.unit_masik_sadaron_sova =
                            (this.kormosuci.unit_masik_sadaron_sova_uposthiti ?? 0) / (this.kormosuci.unit_masik_sadaron_sova_total ?? 1);
                this.average_kormosuci.iftar_mahfil_personal =
                            (this.kormosuci.iftar_mahfil_personal_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_personal_total ?? 1);
                this.average_kormosuci.iftar_mahfil_personal =
                            (this.kormosuci.iftar_mahfil_personal_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_personal_total ?? 1);
                this.average_kormosuci.iftar_mahfil_samostic =
                            (this.kormosuci.iftar_mahfil_samostic_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_samostic_total ?? 1);
                this.average_kormosuci.cha_chakra =
                            (this.kormosuci.cha_chakra_uposthiti ?? 0) / (this.kormosuci.cha_chakra_total ?? 1);
                this.average_kormosuci.samostic_khawa =
                            (this.kormosuci.samostic_khawa_uposthiti ?? 0) / (this.kormosuci.samostic_khawa_total ?? 1);
                this.average_kormosuci.sikkha_sofor =
                            (this.kormosuci.sikkha_sofor_uposthiti ?? 0) / (this.kormosuci.sikkha_sofor_total ?? 1);
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
                        if (['unit_masik_sadaron_sova_total', 'iftar_mahfil_personal_total',
                            'iftar_mahfil_samostic_total', 'cha_chakra_total',
                            'samostic_khawa_total', 'sikkha_sofor_total'].includes(name)) {
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
