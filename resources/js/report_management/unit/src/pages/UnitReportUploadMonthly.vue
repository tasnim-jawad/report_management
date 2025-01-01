<template>
    <div id="report_uplode_body">
        <section id="heading" class="mt-3">
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
                    <p>ইউনিটের নাম: {{ report_header?.unit_info?.title || '' }}</p>
                    <p>ওয়ার্ড নং ও নাম: {{ report_header?.ward_info?.no || '' }} ও {{ report_header?.ward_info?.title
                        || ''
                        }}</p>
                    <p class="w-25">উপজেলা/থানা: {{ report_header?.thana_info?.title || '' }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between">
                    <p>ইউনিট সভাপতির নাম: {{ report_header?.president || '' }}</p>
                    <p class="width-30">ইউনিটের ধরন: {{ report_header?.org_type || '' }}</p>
                </div>
            </div>
        </section>

        <section id="report">
            <div class="dawat mt-1">
                <h1 class="font-18">দাওয়াত ও তাবলিগ :</h1>
                <div class="jonoshadharon d-flex flex-wrap justify-content-between mb-2">
                    <p class="fw-bold w-75">
                        ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদান সংখ্যা* :
                        <span>{{ total_dawat }}</span>
                    </p>
                    <div class="d-flex justify-content-start w-25">
                        <label for="" class="fw-bold fs-6">টার্গেট :</label>
                        <div class="parent_popup width-60">
                            <input class="border_dot bg-input ps-2 w-100" name="jonoshadharon_dawat_target"
                                :value="formatBangla(report_sum_data?.dawat5_jonoshadharons?.jonoshadharon_dawat_target ?? '')"
                                @change="data_upload('dawat5-jonoshadharon')" type="text">
                            <comment :table_name="'dawat5_jonoshadharons'"
                                :column_name="'jonoshadharon_dawat_target'" />
                        </div>
                    </div>
                    <!-- <p class="fw-bold w-25">টার্গেট:</p> -->
                    <p class="mt-1 ps-3 font-13">* দাওয়াত ও তাবলিগের 'ক' এর অধীনে ক্রমিক ১ - ৪নং পর্যন্ত দাওয়াত প্রদান
                        সংখ্যা যোগ করে এখানে বসাতে হবে ।</p>
                </div>

                <div class="group_dawat mb-2">
                    <h4 class="fs-6">১. নিয়মিত গ্রুপভিত্তিক দাওয়াত :</h4>
                    <table class="text-center">
                        <thead>
                            <tr>
                                <th class="width-20">কতটি গ্রুপ বের হয়েছে</th>
                                <th class="width-20">অংশগ্রহণকারীর সংখ্যা</th>
                                <th>কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                                <th>কতজন সহযোগী সদস্য হয়েছেন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_groups_are_out"
                                            :value="formatBangla(report_sum_data?.dawat1_regular_group_wises?.how_many_groups_are_out)"
                                            @change="data_upload('dawat1-regular-group-wise')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat1_regular_group_wises'"
                                            :column_name="'how_many_groups_are_out'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="number_of_participants"
                                            :value="formatBangla(report_sum_data?.dawat1_regular_group_wises?.number_of_participants)"
                                            @change="data_upload('dawat1-regular-group-wise')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat1_regular_group_wises'"
                                            :column_name="'number_of_participants'" />

                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_have_been_invited"
                                            :value="formatBangla(report_sum_data?.dawat1_regular_group_wises?.how_many_have_been_invited)"
                                            @change="data_upload('dawat1-regular-group-wise')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat1_regular_group_wises'"
                                            :column_name="'how_many_have_been_invited'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_associate_members_created"
                                            :value="formatBangla(report_sum_data?.dawat1_regular_group_wises?.how_many_associate_members_created)"
                                            @change="data_upload('dawat1-regular-group-wise')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat1_regular_group_wises'"
                                            :column_name="'how_many_associate_members_created'" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="personal_dawat mb-2">
                    <h4 class="fs-6">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:</h4>
                    <table class="text-center">
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
                                <td>
                                    <div class="parent_popup">
                                        <input name="total_rokon"
                                            :value="formatBangla(report_sum_data?.dawat2_personal_and_targets?.total_rokon)"
                                            @change="data_upload('dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat2_personal_and_targets'"
                                            :column_name="'total_rokon'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="total_worker"
                                            :value="formatBangla(report_sum_data?.dawat2_personal_and_targets?.total_worker)"
                                            @change="data_upload('dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat2_personal_and_targets'"
                                            :column_name="'total_worker'" />

                                    </div>
                                </td>
                                <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_have_been_invited"
                                            :value="formatBangla(report_sum_data?.dawat2_personal_and_targets?.how_many_have_been_invited)"
                                            @change="data_upload('dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat2_personal_and_targets'"
                                            :column_name="'how_many_have_been_invited'" />

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_were_give_dawat_rokon"
                                            :value="formatBangla(report_sum_data?.dawat2_personal_and_targets?.how_many_were_give_dawat_rokon)"
                                            @change="data_upload('dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat2_personal_and_targets'"
                                            :column_name="'how_many_were_give_dawat_rokon'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_were_give_dawat_worker"
                                            :value="formatBangla(report_sum_data?.dawat2_personal_and_targets?.how_many_were_give_dawat_worker)"
                                            @change="data_upload('dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat2_personal_and_targets'"
                                            :column_name="'how_many_were_give_dawat_worker'" />
                                    </div>
                                </td>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_associate_members_created"
                                            :value="formatBangla(report_sum_data?.dawat2_personal_and_targets?.how_many_associate_members_created)"
                                            @change="data_upload('dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat2_personal_and_targets'"
                                            :column_name="'how_many_associate_members_created'" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="shadharon_shova mb-2">
                    <h4 class="fs-6">৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের মাধ্যমে দাওয়াত :</h4>
                    <table class="text-center table_layout_fixed">
                        <thead>
                            <tr>
                                <th>মোট কতজনকে দাওয়াত প্রদান করা হয়েছে</th>
                                <th>মোট কতজন সহযোগী সদস্য হয়েছেন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_were_give_dawat"
                                            :value="formatBangla(report_sum_data?.dawat3_general_program_and_others?.how_many_were_give_dawat)"
                                            @change="data_upload('dawat3-general-program-and-others')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat3_general_program_and_others'"
                                            :column_name="'how_many_were_give_dawat'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_associate_members_created"
                                            :value="formatBangla(report_sum_data?.dawat3_general_program_and_others?.how_many_associate_members_created)"
                                            @change="data_upload('dawat3-general-program-and-others')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat3_general_program_and_others'"
                                            :column_name="'how_many_associate_members_created'" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="gonoshongjog mb-2">
                    <h4 class="fs-6">৪. গণসংযোগ ও দাওয়াতি অভিযান পালন*:</h4>
                    <table class="text-center">
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
                                <td>
                                    <div class="parent_popup">
                                        <input name="total_gono_songjog_group"
                                            :value="formatBangla(report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.total_gono_songjog_group ?? '')"
                                            @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'total_gono_songjog_group'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="total_attended"
                                            :value="formatBangla(report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.total_attended ?? '')"
                                            @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'total_attended'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_have_been_invited"
                                            :value="formatBangla(report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.how_many_have_been_invited ?? '')"
                                            @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'how_many_have_been_invited'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_associate_members_created"
                                            :value="formatBangla(report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.how_many_associate_members_created ?? '')"
                                            @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'how_many_associate_members_created'" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="jela_mohanogor_declared_gonosonjog_group"
                                            :value="formatBangla(report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_group ?? '')"
                                            @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'jela_mohanogor_declared_gonosonjog_group'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="jela_mohanogor_declared_gonosonjog_attended"
                                            :value="formatBangla(report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_attended ?? '')"
                                            @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'jela_mohanogor_declared_gonosonjog_attended'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="jela_mohanogor_declared_gonosonjog_invited"
                                            :value="formatBangla(report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_invited ?? '')"
                                            @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'jela_mohanogor_declared_gonosonjog_invited'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="jela_mohanogor_declared_gonosonjog_associated_created"
                                            :value="formatBangla(report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_associated_created ?? '')"
                                            @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'jela_mohanogor_declared_gonosonjog_associated_created'" />
                                    </div>
                                </td>
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
                    <table class="text-center mb-1">
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
                                <td>
                                    <div class="parent_popup">
                                        <input name="teacher_rokon"
                                            :value="formatBangla(report_sum_data?.department1_talimul_qurans?.teacher_rokon ?? '')"
                                            @change="data_upload('department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'department1_talimul_qurans'"
                                            :column_name="'teacher_rokon'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="teacher_worker"
                                            :value="formatBangla(report_sum_data?.department1_talimul_qurans?.teacher_worker ?? '')"
                                            @change="data_upload('department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'department1_talimul_qurans'"
                                            :column_name="'teacher_worker'" />
                                    </div>
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            (Number(report_sum_data?.department1_talimul_qurans?.teacher_rokon) ?? 0) +
                                            (Number(report_sum_data?.department1_talimul_qurans?.teacher_worker) ?? 0)
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="student_rokon"
                                            :value="formatBangla(report_sum_data?.department1_talimul_qurans?.student_rokon ?? '')"
                                            @change="data_upload('department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'department1_talimul_qurans'"
                                            :column_name="'student_rokon'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="student_worker"
                                            :value="formatBangla(report_sum_data?.department1_talimul_qurans?.student_worker ?? '')"
                                            @change="data_upload('department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'department1_talimul_qurans'"
                                            :column_name="'student_worker'" />
                                    </div>
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            (Number(report_sum_data?.department1_talimul_qurans?.student_rokon) ?? 0) +
                                            (Number(report_sum_data?.department1_talimul_qurans?.student_worker) ?? 0)
                                        )
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
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_much_learned_quran"
                                            :value="formatBangla(report_sum_data?.department1_talimul_qurans?.how_much_learned_quran ?? '')"
                                            @change="data_upload('department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'department1_talimul_qurans'"
                                            :column_name="'how_much_learned_quran'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_much_invited"
                                            :value="formatBangla(report_sum_data?.department1_talimul_qurans?.how_much_invited ?? '')"
                                            @change="data_upload('department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'department1_talimul_qurans'"
                                            :column_name="'how_much_invited'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_much_been_associated"
                                            :value="formatBangla(report_sum_data?.department1_talimul_qurans?.how_much_been_associated ?? '')"
                                            @change="data_upload('department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'department1_talimul_qurans'"
                                            :column_name="'how_much_been_associated'" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="job_holder">
                <h4 class="fs-6">২. বিভিন্ন শ্রেণি-পেশার মানুষের মাঝে দাওয়াত</h4>
                <table class="text-center mb-1">
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
                            <td>
                                <div class="parent_popup">
                                    <input name="political_and_special_invited"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.political_and_special_invited ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'political_and_special_invited'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="political_and_special_been_associated"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.political_and_special_been_associated ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'political_and_special_been_associated'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="political_and_special_target"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.political_and_special_target ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'political_and_special_target'" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)</td>
                            <td>
                                <div class="parent_popup">
                                    <input name="prantik_jonogosti_invited"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.prantik_jonogosti_invited ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'prantik_jonogosti_invited'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="prantik_jonogosti_been_associated"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.prantik_jonogosti_been_associated ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'prantik_jonogosti_been_associated'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="prantik_jonogosti_target"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.prantik_jonogosti_target ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'prantik_jonogosti_target'" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ভিন্নধর্মাবলম্বী</td>
                            <td>
                                <div class="parent_popup">
                                    <input name="vinno_dormalombi_invited"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.vinno_dormalombi_invited ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'vinno_dormalombi_invited'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="vinno_dormalombi_been_associated"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.vinno_dormalombi_been_associated ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'vinno_dormalombi_been_associated'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="vinno_dormalombi_target"
                                        :value="formatBangla(report_sum_data?.department4_different_job_holders_dawats?.vinno_dormalombi_target ?? '')"
                                        @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department4_different_job_holders_dawats'"
                                        :column_name="'vinno_dormalombi_target'" />
                                </div>
                            </td>
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
                            <td>
                                <div class="parent_popup">
                                    <input name="total_attended_family"
                                        :value="formatBangla(report_sum_data?.department5_paribarik_dawats?.total_attended_family ?? '')"
                                        @change="data_upload('department5-paribarik-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department5_paribarik_dawats'"
                                        :column_name="'total_attended_family'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="how_many_new_family_invited"
                                        :value="formatBangla(report_sum_data?.department5_paribarik_dawats?.how_many_new_family_invited ?? '')"
                                        @change="data_upload('department5-paribarik-dawat')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'department5_paribarik_dawats'"
                                        :column_name="'how_many_new_family_invited'" />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                            <td>
                                {{ formatBangla(previous_present?.unit_book_distribution_center_present ?? '') }}
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="unit_book_distribution_center_increase"
                                        :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.unit_book_distribution_center_increase ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'dawah_and_prokashonas'"
                                        :column_name="'unit_book_distribution_center_increase'" />
                                </div>
                            </td>
                            <td class="text-start px-2">বইয়ের সফ্ট কপি বিলি<span>(সংগঠন অনুমোদিত)</span></td>
                            <td>
                                <div class="parent_popup">
                                    <input name="soft_copy_book_distribution"
                                        :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.soft_copy_book_distribution ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'dawah_and_prokashonas'"
                                        :column_name="'soft_copy_book_distribution'" />
                                </div>
                            </td>
                            <td>
                                <!-- <input name="soft_copy_book_distribution_increase"
                                    :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.soft_copy_book_distribution_increase ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই</td>
                            <!-- <td>
                                <input name="books_in_pathagar"
                                    :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.books_in_pathagar ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td> -->
                            <td>
                                {{ formatBangla(previous_present?.books_in_pathagar_present ?? '') }}
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="books_in_pathagar_increase"
                                        :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.books_in_pathagar_increase ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'dawah_and_prokashonas'"
                                        :column_name="'books_in_pathagar_increase'" />
                                </div>
                            </td>
                            <td class="text-start px-2">দাওয়াতি লিংক বিতরণ<span>(সংগঠন অনুমোদিত)</span></td>
                            <td>
                                <div class="parent_popup">
                                    <input name="dawat_link_distribution"
                                        :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.dawat_link_distribution ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'dawah_and_prokashonas'"
                                        :column_name="'dawat_link_distribution'" />
                                </div>
                            </td>
                            <td>
                                <!-- <input name="dawat_link_distribution_increase"
                                    :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.dawat_link_distribution_increase ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিলি/বিক্রি</td>
                            <td>
                                <div class="parent_popup">
                                    <input name="unit_book_distribution"
                                        :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.unit_book_distribution ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'dawah_and_prokashonas'"
                                        :column_name="'unit_book_distribution'" />
                                </div>
                            </td>
                            <td>
                                <!-- <input name="unit_book_distribution_increase"
                                    :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.unit_book_distribution_increase ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/ পৃথিবী কত কপি চলে</td>
                            <td>
                                {{ formatBangla(previous_present?.sonar_bangla_present ?? '') }}/
                                {{ formatBangla(previous_present?.songram_present ?? '') }}/
                                {{ formatBangla(previous_present?.prithibi_present ?? '') }}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="parent_popup">
                                        <input name="sonar_bangla_increase"
                                            :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.sonar_bangla_increase ?? '')"
                                            @change="data_upload('dawah-and-prokashona')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawah_and_prokashonas'"
                                            :column_name="'sonar_bangla_increase'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="songram_increase"
                                            :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.songram_increase ?? '')"
                                            @change="data_upload('dawah-and-prokashona')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawah_and_prokashonas'"
                                            :column_name="'songram_increase'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="prithibi_increase"
                                            :value="formatBangla(report_sum_data?.dawah_and_prokashonas?.prithibi_increase ?? '')"
                                            @change="data_upload('dawah-and-prokashona')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'dawah_and_prokashonas'"
                                            :column_name="'prithibi_increase'" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

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
                            <td>
                                <div class="parent_popup">
                                    <input name="unit_masik_sadaron_sova_total"
                                        :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.unit_masik_sadaron_sova_total ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'kormosuci_bastobayons'"
                                        :column_name="'unit_masik_sadaron_sova_total'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="unit_masik_sadaron_sova_target"
                                        :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.unit_masik_sadaron_sova_target ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <comment :table_name="'kormosuci_bastobayons'"
                                        :column_name="'unit_masik_sadaron_sova_target'" />
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="unit_masik_sadaron_sova_uposthiti"
                                        :value="formatBangla(average_kormosuci.unit_masik_sadaron_sova)"
                                        @change="average_data_upload($event, 'kormosuci-bastobayon', report_sum_data?.kormosuci_bastobayons?.unit_masik_sadaron_sova_total)"
                                        type="text" class="bg-input w-100 text-center" />
                                    <comment :table_name="'kormosuci_bastobayons'"
                                        :column_name="'unit_masik_sadaron_sova_uposthiti'" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>২.</td>
                            <td class="text-start px-2">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                            <td>
                                <div class="d-flex">
                                    <div class="parent_popup">
                                        <input name="iftar_mahfil_personal_total"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.iftar_mahfil_personal_total ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'iftar_mahfil_personal_total'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="iftar_mahfil_samostic_total"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.iftar_mahfil_samostic_total ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'iftar_mahfil_samostic_total'" />
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="parent_popup">
                                        <input name="iftar_mahfil_personal_target"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.iftar_mahfil_personal_target ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'iftar_mahfil_personal_target'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="iftar_mahfil_samostic_target"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.iftar_mahfil_samostic_target ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'iftar_mahfil_samostic_target'" />
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="parent_popup">
                                        <input name="iftar_mahfil_personal_uposthiti"
                                            :value="formatBangla(average_kormosuci.iftar_mahfil_personal)"
                                            @change="average_data_upload($event, 'kormosuci-bastobayon', report_sum_data?.kormosuci_bastobayons?.iftar_mahfil_personal_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'iftar_mahfil_personal_uposthiti'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="iftar_mahfil_samostic_uposthiti"
                                            :value="formatBangla(average_kormosuci.iftar_mahfil_samostic)"
                                            @change="average_data_upload($event, 'kormosuci-bastobayon', report_sum_data?.kormosuci_bastobayons?.iftar_mahfil_samostic_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'iftar_mahfil_samostic_uposthiti'" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>৩.</td>
                            <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                            <td>
                                <div class="d-flex">
                                    <div class="parent_popup">
                                        <input name="cha_chakra_total"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.cha_chakra_total ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'cha_chakra_total'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="samostic_khawa_total"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.samostic_khawa_total ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'samostic_khawa_total'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="sikkha_sofor_total"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.sikkha_sofor_total ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'sikkha_sofor_total'" />
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="parent_popup">
                                        <input name="cha_chakra_target"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.cha_chakra_target ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'cha_chakra_target'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="samostic_khawa_target"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.samostic_khawa_target ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'samostic_khawa_target'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="sikkha_sofor_target"
                                            :value="formatBangla(report_sum_data?.kormosuci_bastobayons?.sikkha_sofor_target ?? '')"
                                            @change="data_upload('kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'sikkha_sofor_target'" />
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="parent_popup">
                                        <input name="cha_chakra_uposthiti"
                                            :value="formatBangla(average_kormosuci.cha_chakra)"
                                            @change="average_data_upload($event, 'kormosuci-bastobayon', report_sum_data?.kormosuci_bastobayons?.cha_chakra_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'cha_chakra_uposthiti'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="samostic_khawa_uposthiti"
                                            :value="formatBangla(average_kormosuci.samostic_khawa)"
                                            @change="average_data_upload($event, 'kormosuci-bastobayon', report_sum_data?.kormosuci_bastobayons?.samostic_khawa_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'samostic_khawa_uposthiti'" />
                                    </div>/
                                    <div class="parent_popup">
                                        <input name="sikkha_sofor_uposthiti"
                                            :value="formatBangla(average_kormosuci.sikkha_sofor)"
                                            @change="average_data_upload($event, 'kormosuci-bastobayon', report_sum_data?.kormosuci_bastobayons?.sikkha_sofor_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                        <comment :table_name="'kormosuci_bastobayons'"
                                            :column_name="'sikkha_sofor_uposthiti'" />
                                    </div>
                                </div>
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
                                <td>{{ formatBangla(previous_present?.rokon_previous ?? '') }}</td>
                                <td>{{ formatBangla(previous_present?.rokon_present ?? '') }}</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="rokon_briddhi"
                                            :value="formatBangla(report_sum_data?.songothon1_jonosoktis?.rokon_briddhi ?? '')"
                                            @change="data_upload('songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon1_jonosoktis'" :column_name="'rokon_briddhi'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="rokon_gatti"
                                            :value="formatBangla(report_sum_data?.songothon1_jonosoktis?.rokon_gatti ?? '')"
                                            @change="data_upload('songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon1_jonosoktis'" :column_name="'rokon_gatti'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="rokon_target"
                                            :value="formatBangla(report_sum_data?.songothon1_jonosoktis?.rokon_target ?? '')"
                                            @change="data_upload('songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon1_jonosoktis'" :column_name="'rokon_target'" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কর্মী</td>
                                <td>{{ formatBangla(previous_present?.worker_previous ?? '') }}</td>
                                <td>{{ formatBangla(previous_present?.worker_present ?? '') }}</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="worker_briddhi"
                                            :value="formatBangla(report_sum_data?.songothon1_jonosoktis?.worker_briddhi ?? '')"
                                            @change="data_upload('songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon1_jonosoktis'"
                                            :column_name="'worker_briddhi'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="worker_gatti"
                                            :value="formatBangla(report_sum_data?.songothon1_jonosoktis?.worker_gatti ?? '')"
                                            @change="data_upload('songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon1_jonosoktis'" :column_name="'worker_gatti'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="worker_target"
                                            :value="formatBangla(report_sum_data?.songothon1_jonosoktis?.worker_target ?? '')"
                                            @change="data_upload('songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon1_jonosoktis'" :column_name="'worker_target'" />
                                    </div>
                                </td>
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
                                <td>{{ formatBangla(previous_present?.associate_member_previous ?? '') }}</td>
                                <td>{{ formatBangla(previous_present?.associate_member_present ?? '') }}</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="associate_member_briddhi"
                                            :value="formatBangla(report_sum_data?.songothon2_associate_members?.associate_member_briddhi ?? '')"
                                            @change="data_upload('songothon2-associate-member')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon2_associate_members'"
                                            :column_name="'associate_member_briddhi'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="associate_member_target"
                                            :value="formatBangla(report_sum_data?.songothon2_associate_members?.associate_member_target ?? '')"
                                            @change="data_upload('songothon2-associate-member')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon2_associate_members'"
                                            :column_name="'associate_member_target'" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ভিন্নধর্মাবলম্বী কর্মী/সহযোগী সদস্য</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        {{ formatBangla(previous_present?.vinno_dormalombi_worker_previous ?? '') }}/
                                        {{ formatBangla(previous_present?.vinno_dormalombi_associate_member_previous ??
                                            '') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        {{ formatBangla(previous_present?.vinno_dormalombi_worker_present ?? '') }}/
                                        {{ formatBangla(previous_present?.vinno_dormalombi_associate_member_present ??
                                            '') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="vinno_dormalombi_worker_briddhi"
                                                :value="formatBangla(report_sum_data?.songothon2_associate_members?.vinno_dormalombi_worker_briddhi ?? '')"
                                                @change="data_upload('songothon2-associate-member')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'songothon2_associate_members'"
                                                :column_name="'vinno_dormalombi_worker_briddhi'" />
                                        </div>/
                                        <div class="parent_popup">
                                            <input name="vinno_dormalombi_associate_member_briddhi"
                                                :value="formatBangla(report_sum_data?.songothon2_associate_members?.vinno_dormalombi_associate_member_briddhi ?? '')"
                                                @change="data_upload('songothon2-associate-member')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'songothon2_associate_members'"
                                                :column_name="'vinno_dormalombi_associate_member_briddhi'" />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="vinno_dormalombi_worker_target"
                                                :value="formatBangla(report_sum_data?.songothon2_associate_members?.vinno_dormalombi_worker_target ?? '')"
                                                @change="data_upload('songothon2-associate-member')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'songothon2_associate_members'"
                                                :column_name="'vinno_dormalombi_worker_target'" />
                                        </div>/
                                        <div class="parent_popup">
                                            <input name="vinno_dormalombi_associate_member_target"
                                                :value="formatBangla(report_sum_data?.songothon2_associate_members?.vinno_dormalombi_associate_member_target ?? '')"
                                                @change="data_upload('songothon2-associate-member')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'songothon2_associate_members'"
                                                :column_name="'vinno_dormalombi_associate_member_target'" />
                                        </div>
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
                        <div class="parent_popup width-60">
                            <input class="border_dot bg-input ps-2 w-100" name="unit_kormi_boithok_total"
                                :value="formatBangla(report_sum_data?.songothon9_sangothonik_boithoks?.unit_kormi_boithok_total ?? '')"
                                @change="data_upload('songothon9-sangothonik-boithok')" type="text">
                            <comment :table_name="'songothon9_sangothonik_boithoks'"
                                :column_name="'unit_kormi_boithok_total'" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-start w-50">
                        <label for="" class="fw-bold fs-6">, উপস্থিতি:</label>
                        <div class="parent_popup width-80">
                            <input class="border_dot bg-input ps-2 w-100" name="unit_kormi_boithok_uposthiti"
                                :value="formatBangla(report_sum_data?.songothon9_sangothonik_boithoks?.unit_kormi_boithok_uposthiti ?? '')"
                                @change="data_upload('songothon9-sangothonik-boithok')" type="text">
                            <comment :table_name="'songothon9_sangothonik_boithoks'"
                                :column_name="'unit_kormi_boithok_uposthiti'" />
                        </div>
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
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="paribarik_unit_total"
                                            :value="formatBangla(report_sum_data?.songothon5_dawat_and_paribarik_units?.paribarik_unit_total ?? '')"
                                            @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text"
                                            class="bg-input w-100 text-center"> -->
                                        {{ formatBangla(previous_present?.paribarik_unit_total_present ?? '') }}
                                        <comment :table_name="'songothon5_dawat_and_paribarik_units'"
                                            :column_name="'paribarik_unit_total'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="paribarik_unit_increase"
                                            :value="formatBangla(report_sum_data?.songothon5_dawat_and_paribarik_units?.paribarik_unit_increase ?? '')"
                                            @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon5_dawat_and_paribarik_units'"
                                            :column_name="'paribarik_unit_increase'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="paribarik_unit_target"
                                            :value="formatBangla(report_sum_data?.songothon5_dawat_and_paribarik_units?.paribarik_unit_target ?? '')"
                                            @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon5_dawat_and_paribarik_units'"
                                            :column_name="'paribarik_unit_target'" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>* পরিবারের জনশক্তি পুরুষ ও মহিলা উভয় হলে পারিবারিক ইউনিটের হিসাব একবারই আসবে।</p>
                </div>
                <div class="urdotono mb-1">
                    <div class="d-flex justify-content-start ">
                        <label for="" class="fw-bold fs-6">৫. ঊর্ধ্বতন দায়িত্বশীলদের সফর সংখ্যা :</label>
                        <div class="parent_popup w-75">
                            <input class="border_dot bg-input w-100" name="upper_leader_sofor"
                                :value="formatBangla(report_sum_data?.songothon7_sofors?.upper_leader_sofor ?? '')"
                                @change="data_upload('songothon7-sofor')" type="text">
                            <comment :table_name="'songothon7_sofors'" :column_name="'upper_leader_sofor'" />
                        </div>
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
                                <td>
                                    <div class="parent_popup">
                                        <input name="associate_member_total"
                                            :value="formatBangla(report_sum_data?.songothon8_iyanot_data?.associate_member_total ?? '')"
                                            @change="data_upload('songothon8-iyanot-data')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon8_iyanot_data'"
                                            :column_name="'associate_member_total'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="associate_member_total_iyanot_amounts"
                                            :value="formatBangla(report_sum_data?.songothon8_iyanot_data?.associate_member_total_iyanot_amounts ?? '')"
                                            @change="data_upload('songothon8-iyanot-data')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon8_iyanot_data'"
                                            :column_name="'associate_member_total_iyanot_amounts'" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সুধী</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="sudhi_total"
                                            :value="formatBangla(report_sum_data?.songothon8_iyanot_data?.sudhi_total ?? '')"
                                            @change="data_upload('songothon8-iyanot-data')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon8_iyanot_data'" :column_name="'sudhi_total'" />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="sudi_total_iyanot_amounts"
                                            :value="formatBangla(report_sum_data?.songothon8_iyanot_data?.sudi_total_iyanot_amounts ?? '')"
                                            @change="data_upload('songothon8-iyanot-data')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'songothon8_iyanot_data'"
                                            :column_name="'sudi_total_iyanot_amounts'" />
                                    </div>
                                </td>
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
                                    <input name="sohi_quran_onushilon"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.sohi_quran_onushilon ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.masala_masayel ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.darsul_quran ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.darsul_hadis ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="samostik_path"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.samostik_path ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.bishoy_vittik_onushilon ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sohi_quran_onushilon_target"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.sohi_quran_onushilon_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel_target"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.masala_masayel_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran_target"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.darsul_quran_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis_target"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.darsul_hadis_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="samostik_path_target"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.samostik_path_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon_target"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.bishoy_vittik_onushilon_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sohi_quran_onushilon_uposthiti"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.sohi_quran_onushilon_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel_uposthiti"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.masala_masayel_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran_uposthiti"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.darsul_quran_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis_uposthiti"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.darsul_hadis_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="samostik_path_uposthiti"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.samostik_path_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon_uposthiti"
                                        :value="formatBangla(report_sum_data?.proshikkhon1_tarbiats?.bishoy_vittik_onushilon_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center">
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
                            <td class="width-20">
                                <div class="parent_popup">
                                    <input name="how_many_people_did"
                                        :value="formatBangla(report_sum_data?.shomajsheba1_personal_social_works?.how_many_people_did ?? '')"
                                        @change="data_upload('shomajsheba1-personal-social-work')" type="text"
                                        class="bg-input w-100 text-center">
                                    <comment :table_name="'shomajsheba1_personal_social_works'"
                                        :column_name="'how_many_people_did'" />
                                </div>
                            </td>
                            <td class="text-start px-2 w-25">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                            <td class="width-20">
                                <div class="parent_popup">
                                    <input name="service_received_total"
                                        :value="formatBangla(report_sum_data?.shomajsheba1_personal_social_works?.service_received_total ?? '')"
                                        @change="data_upload('shomajsheba1-personal-social-work')" type="text"
                                        class="bg-input w-100 text-center">
                                    <comment :table_name="'shomajsheba1_personal_social_works'"
                                        :column_name="'service_received_total'" />
                                </div>
                            </td>
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
                                        <div class="parent_popup">
                                            <input name="shamajik_onusthane_ongshogrohon"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.shamajik_onusthane_ongshogrohon ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'shamajik_onusthane_ongshogrohon'" />
                                        </div>/
                                        <div class="parent_popup">
                                            <input name="shamajik_onusthane_shohayota_prodan"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.shamajik_onusthane_shohayota_prodan ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'shamajik_onusthane_shohayota_prodan'" />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="voluntarily_blood_donation_kotojon"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.voluntarily_blood_donation_kotojon ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'voluntarily_blood_donation_kotojon'" />
                                        </div>/
                                        <div class="parent_popup">
                                            <input name="voluntarily_blood_donation_kotojonke"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.voluntarily_blood_donation_kotojonke ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'voluntarily_blood_donation_kotojonke'" />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="shamajik_birodh_mimangsha"
                                            :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.shamajik_birodh_mimangsha ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'shomajsheba2_unit_social_works'"
                                            :column_name="'shamajik_birodh_mimangsha'" />
                                    </div>
                                </td>
                                <td class="text-start px-2">মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজন/কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="matrikalin_sheba_prodan_kotojon"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.matrikalin_sheba_prodan_kotojon ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'matrikalin_sheba_prodan_kotojon'" />
                                        </div>/
                                        <div class="parent_popup">
                                            <input name="matrikalin_sheba_prodan_kotojonke"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.matrikalin_sheba_prodan_kotojonke ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'matrikalin_sheba_prodan_kotojonke'" />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মানবিক সহায়তা/কর্জে হাসানা প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="manobik_shohayota_prodan"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.manobik_shohayota_prodan ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'manobik_shohayota_prodan'" />
                                        </div>/
                                        <div class="parent_popup">
                                            <input name="korje_hasana_prodan"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.korje_hasana_prodan ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'korje_hasana_prodan'" />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে)</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="mayeter_gosol"
                                            :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.mayeter_gosol ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'shomajsheba2_unit_social_works'"
                                            :column_name="'mayeter_gosol'" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="rogir_poricorja"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.rogir_poricorja ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'rogir_poricorja'" />
                                        </div>/
                                        <div class="parent_popup">
                                            <input name="medical_shohayota_prodan"
                                                :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.medical_shohayota_prodan ?? '')"
                                                @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                                class="bg-input w-100 text-center">
                                            <comment :table_name="'shomajsheba2_unit_social_works'"
                                                :column_name="'medical_shohayota_prodan'" />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="others"
                                            :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.others ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'shomajsheba2_unit_social_works'"
                                            :column_name="'others'" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নবজাতককে গিফ্ট প্রদান (কতজনকে )</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="nobojatokke_gift_prodan"
                                            :value="formatBangla(report_sum_data?.shomajsheba2_unit_social_works?.nobojatokke_gift_prodan ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                        <comment :table_name="'shomajsheba2_unit_social_works'"
                                            :column_name="'nobojatokke_gift_prodan'" />
                                    </div>
                                </td>
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
                        <div class="parent_popup w-auto">
                            <input class="border_dot  bg-input" name="bishishto_bekti_jogajog"
                                :value="formatBangla(report_sum_data?.rastrio1_bishishto_bektis?.bishishto_bekti_jogajog ?? '')"
                                @change="data_upload('rastrio1-bishishto-bekti')" type="text">
                            <comment :table_name="'rastrio1_bishishto_bektis'"
                                :column_name="'bishishto_bekti_jogajog'" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="baytulmal">
                <div class="title">
                    <h1>বাইতুলমাল</h1>
                </div>
                <p class="fs-6">মাসিক ওয়াদার পরিমাণ : <span>{{ formatBangla(nisab_dharjo?.amount ?? '') }}</span> /=</p>
                <table class="text-center  mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="2">
                                <div class="parent_popup">
                                    আয়ের বিবরণ
                                    <comment :table_name="'income_table'"
                                        :column_name="'income'" />
                                </div>
                            </th>
                            <th class="text-center" colspan="2">
                                <div class="parent_popup">
                                    জমার পরিমাণ
                                    <comment :table_name="'expense_table'"
                                    :column_name="'expense'" />
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        <tr v-for="(bm_cat, index) in income_report?.category_wise_data" :key="index">
                                            <td class="text-start px-2 w-50 border_bottom">{{ bm_cat.category_name }}
                                            </td>
                                            <td class="border_left_bottom">
                                                <input name="bm_entry" :value="formatBangla(bm_cat.amount)"
                                                    @change="income_store(bm_cat.category_id, $event.target.value)"
                                                    type="text" class="bg-input w-100 text-center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        <tr v-for="(expense_cat, index) in expense_report?.category_wise_data"
                                            :key="index">
                                            <td class="text-start px-2 w-50 border_bottom">{{ expense_cat.category_name
                                                }}</td>
                                            <td class="border_left_bottom">
                                                <input name="bm_entry" :value="formatBangla(expense_cat.amount)"
                                                    @change="expense_store(expense_cat.category_id, $event.target.value)"
                                                    type="text" class="bg-input w-100 text-center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>{{ formatBangla(Number(income_report?.total_amount)) }}</td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>{{ formatBangla(Number(expense_report?.total_amount)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="montobbo">
                <h1 class="fs-6">ইউনিট সভাপতির মন্তব্য :</h1>
                <div class="parent_popup">
                    <textarea name="montobbo" @change="data_upload('montobbo')" id="" cols="30" class="w-100 bg-input"
                        rows="5">{{ report_sum_data?.montobbos?.montobbo }}</textarea>
                    <!-- <comment :table_name="'montobbos'"
                        :column_name="'montobbo'" /> -->
                    <comment :table_name="'dawat1_regular_group_wises'" :column_name="'number_of_participants'" />
                </div>
            </div>
        </section>
        <div class="joma_din text-center mt-3 pb-5">
            <p class="text-danger mb-1">বিঃদ্রঃ রিপোর্ট জমা দেওয়ার পর আর রিপোর্ট পরিবর্তন করা যাবে না ।</p>
            <!-- <a href="" class="btn btn-success" @click.prevent="report_joma">রিপোর্ট জমা দিন</a> -->
            <a href="" class="btn btn-success" v-if="joma_status == 'unsubmitted'" @click.prevent="report_joma">রিপোর্ট
                জমা দিন</a>
            <a href="" class="btn btn-success" v-else-if="joma_status == 'rejected'"
                @click.prevent="report_joma">রিপোর্ট পুনরায় জমা দিন</a>
        </div>
        <a href="" class="print_preview" @click.prevent="print_report()"><i class="fa-solid fa-print"></i></a>
        <router-link :to="{ name: 'Dashboard' }">
            <a href="" class="go_back_to_dashboard"><i class="fa-solid fa-door-open"></i></a>
        </router-link>

        <!-- Modal -->
        <div class="modal fade" id="comment_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="comment_form_container">
                            <form class="mb-2">
                                <div class="mb-2">
                                    <label for="comment" class="form-label">Add Comment</label>
                                    <textarea name="comment" id="comment" class="form-control"
                                        v-model="comment_text_store"></textarea>
                                </div>
                                <a href="#" class="btn btn-success" @click.prevent="comment_set">Add
                                    comment</a>
                            </form>
                        </div> -->
                        <!-- <pre>{{ all_comment_store ? "" : 'No data available' }}</pre> Debug output -->
                        <div class="all_comment" v-for="(comment, index) in all_comment_store" :key="index">
                            <div class="comment-card">
                                <div class="comment-header">
                                    <strong class="comment-author">{{ comment?.user?.full_name }}</strong>
                                    <span class="comment-index">#{{ index + 1 }}</span>
                                </div>
                                <p class="comment-text">{{ comment?.comment }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Comment from "../components/Comment.vue";
import { store as comment_store } from "../stores/CommentStore";
import { mapActions, mapWritableState } from "pinia";
export default {
    components: { Comment },
    data() {
        return {
            month: '',
            joma_status: null,

            report_header: {},
            report_sum_data: {},
            previous_present: {},

            nisab_dharjo: {},
            income_report: {},
            expense_report: {},

            income_category_wise: {},
            total_income: null,

            expense_category_wise: {},
            total_expense: null,

            bm_expense_categories: null,
            bm_categories: null,

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

    created: async function () {
        try {
            await this.uploaded_data()
            await this.report_status()

            // Set the values after uploaded_data() is done
            this.org_type_store = 'unit';
            this.org_type_id_store = this.report_header?.unit_info?.id || null;
            this.month_year_store = this.month || '';
            this.is_data_are_set = true
            if (this.is_data_are_set) {
                console.log("this.is_data_are_set" ,this.is_data_are_set);

                this.comment_count();
            }
        } catch (error) {
            console.error('Error during uploaded_data:', error);
        }

    },
    watch: {
        'report_sum_data.kormosuci_bastobayons': function () {
            this.average_data();
        },
    },
    methods: {
        ...mapActions(comment_store, {
            comment_count: 'comment_count'
        }),
        uploaded_data: async function () {
            const month = this.$route.params.month;
            const user_id = this.$route.params.user_id;

            let res = await axios.get('/unit/uploaded-data-monthly', {
                params: {
                    month: month,
                    user_id: user_id
                }
            })

            if (res.data.status == 'success') {
                console.log("res", res.data.data.end_month);
                this.month = res.data.data.end_month,
                    this.report_header = res.data.data.report_header,
                    this.report_sum_data = res.data.data.report_sum_data,
                    this.previous_present = res.data.data.previous_present,

                    this.nisab_dharjo = res.data.nisab_dharjo,
                    this.income_report = res.data.data.income_report,
                    this.expense_report = res.data.data.expense_report

            }
        },
        average_data: async function () {
            if (this.report_sum_data.kormosuci_bastobayons) {
                const fields = [
                    "unit_masik_sadaron_sova",
                    "iftar_mahfil_personal",
                    "iftar_mahfil_samostic",
                    "cha_chakra",
                    "samostic_khawa",
                    "sikkha_sofor"
                ];
                fields.forEach(field => {
                    const uposthitiKey = `${field}_uposthiti`;
                    const totalKey = `${field}_total`;
                    this.average_kormosuci[field] =
                        Math.round(
                            (this.report_sum_data.kormosuci_bastobayons[uposthitiKey] ?? 0) /
                            (this.report_sum_data.kormosuci_bastobayons[totalKey] ?? 1)
                        )
                });

            }
        },
        formatBangla(number) {
            return number !== null && number !== undefined ? number.toLocaleString("bn-BD") : "";
        },
        formatMonth(date) {
            return new Date(date).toLocaleString("bn-BD", { month: "long" });
        },
        formatYear(date) {
            const year = new Date(date).getFullYear();
            // Convert year to Bangla digits without commas
            return year.toString().replace(/\d/g, (digit) => "০১২৩৪৫৬৭৮৯"[digit]);
        },
        async data_upload(endpoint) {
            const { value, name } = event.target;
            console.log(value, name);

            try {
                const response = await axios.post(`/${endpoint}/store-single`, {
                    value,
                    name,
                    month: this.month,
                });

                console.log("Data uploaded successfully", response);

                // Check if `name` matches any of the specified conditions
                const namesToCheck = [
                    'unit_masik_sadaron_sova_total',
                    'iftar_mahfil_personal_total',
                    'iftar_mahfil_samostic_total',
                    'cha_chakra_total',
                    'samostic_khawa_total',
                    'sikkha_sofor_total'
                ];

                if (namesToCheck.includes(name)) {
                    this.uploaded_data(); // Call `uploaded_data` if `name` matches
                }
            } catch (error) {
                console.error("Error uploading data", error);
            }
        },

        average_data_upload($event, endpoint, multiplier) {
            const { value, name } = $event.target;
            const total = value * multiplier;
            console.log('average_value', $event.target, total, value, multiplier);

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

        income_store: function (bm_category_id, amount) {
            const month = this.$route.params.month;
            const formData = {
                bm_category_id: bm_category_id,
                amount: amount,
                month: month,
            };
            axios.post('/bm-paid/store', formData)
                .then(function (response) {
                    window.toaster('New BM entry Created successfuly', 'success');
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },

        expense_store: function (bm_expense_category_id, amount) {
            const month = this.$route.params.month;
            const formData = {
                bm_expense_category_id: bm_expense_category_id,
                amount: amount,
                month: month,
            };
            axios.post('/bm-expense/store', formData)
                .then(function (response) {
                    window.toaster('New Expense entry Created successfuly', 'success');
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },
        print_report: function () {
            const month = this.$route.params.month;
            const user_id = this.$route.params.user_id;
            // const url = `/unit/report?user_id=${user_id}&month=${month}&print=true`;
            const url = `/unit/unit-report-monthly?user_id=${user_id}&month=${month}&print=true`;
            window.location.href = url;

            setTimeout(() => {
                window.print(); // Trigger the print dialog
            }, 200);
        },

        report_status: async function () {
            const month = this.$route.params.month;
            let response = await axios.get('/unit/report-status', {
                params: {
                    month: month
                }
            })
            if (response.data.status == 'success') {
                this.joma_status = response.data.report_status
                console.log("report_status", response)

            }
        },
        report_joma: async function () {
            const month = this.$route.params.month;
            if(confirm('আপনিকি নিশ্চিত? আপনি রিপোর্ট জমা দিতে চান?')){ 
                let response = await axios.get('/unit/report-joma', {
                    params: {
                        month: month
                    }
                })
                if (response.data.status == 'success') {
                    // this.$router.push({ name: "Montobbo" });
                    this.report_status()
                    window.toaster(response.data.message, 'success');
    
                    this.joma_status = response.data.report_status
                    console.log("report_status", response)
                }
            }
        }

    },
    computed: {
        ...mapWritableState(comment_store, {
            org_type_store: 'org_type',
            org_type_id_store: 'org_type_id',
            month_year_store: 'month_year',
            comment_text_store: 'comment_text',
            all_comment_store: 'all_comment',
            is_data_are_set: 'is_data_are_set',
        }),
        total_dawat() {
            const total =
                (Number(this.report_sum_data?.dawat1_regular_group_wises?.how_many_have_been_invited) || 0) +
                (Number(this.report_sum_data?.dawat2_personal_and_targets?.how_many_have_been_invited) || 0) +
                (Number(this.report_sum_data?.dawat3_general_program_and_others?.how_many_were_give_dawat) || 0) +
                (Number(this.report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.how_many_have_been_invited) || 0) +
                (Number(this.report_sum_data?.dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_invited) || 0);

            return this.formatBangla ? this.formatBangla(total) : total;
        },
    },

};
</script>

<style>
@import url("../../../../../../public/css/unit/unit_report_upload.css");
</style>
