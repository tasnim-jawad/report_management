<template>
    <div id="report_uplode_body">
        <section id="heading" class="mt-3">
            <div class="report_heading position-relative mb-1">
                <h3 class="text-center fs-6">বিসমিল্লাহির রাহমানির রাহীম</h3>
                <h1 class="text-center fs-4">ওয়ার্ড সংগঠনের</h1>
                <h1 class="text-center mb-2 fs-4">
                    মাসিক/ত্রৈমাসিক/ষান্মাসিক/নয় মাসিক/বার্ষিক রিপোর্ট
                </h1>
                <div class="org_gender position-absolute">
                    <p>পুরুষ</p>
                </div>
            </div>
            <div class="unit_info">
                <div class="line d-flex flex-wrap">
                    <p class="w-75">মাস: {{ formatMonth(month) }}</p>
                    <p class="w-25">সন: {{ formatYear(month) }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between">
                    <p>
                        ওয়ার্ড নং ও নাম :
                        {{ report_header?.ward_info?.no || "" }} ও
                        {{ report_header?.ward_info?.title || "" }}
                    </p>
                    <p>পৌরসভা/ইউনিয়ন:</p>
                    <p class="w-25">
                        উপজেলা/থানা:
                        {{ report_header?.thana_info?.title || "" }}
                    </p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between">
                    <p>
                        আমীর/সভাপতির নাম : {{ report_header?.president || "" }}
                    </p>
                </div>
            </div>
        </section>

        <section id="report">
            <div class="dawat mt-1">
                <h1 class="font-18">দাওয়াত ও তাবলিগ :</h1>
                <div
                    class="jonoshadharon d-flex flex-wrap justify-content-between"
                >
                    <p class="fw-bold w-75">
                        ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদান সংখ্যা* :
                        <span>{{ total_dawat }}</span>
                    </p>
                    <!-- <p class="fw-bold w-25">মোট জনসংখ্যা:</p> -->
                    <div class="d-flex justify-content-start w-25">
                        <label for="" class="fw-bold fs-6">মোট জনসংখ্যা:</label>
                        <div class="parent_popup width-60">
                            {{ formatBangla(report_sum_data?.ward_dawat5_jonoshadharons?.total_population ?? '') }}
                            <comment
                                :table_name="'ward_dawat5_jonoshadharons'"
                                :column_name="'total_population'"
                            />
                        </div>
                    </div>
                    <p class="fw-bold ps-3 w-100">
                        টার্গেট (মাসিক/ত্রৈমাসিক / ষান্মাসিক/ নয় মাসিক/বার্ষিক)
                        :
                    </p>
                    <p class="ps-3 font-13">
                        * দাওয়াত ও তাবলিগের 'ক' এর অধীনে ক্রমিক ১ - ৪নং পর্যন্ত
                        দাওয়াত প্রদান সংখ্যা যোগ করে এখানে বসাতে হবে ।
                    </p>
                </div>
                <div class="group_dawat mb-1">
                    <h4 class="fs-6 fw-bold">
                        ১. নিয়মিত গ্রুপভিত্তিক দাওয়াত :
                    </h4>
                    <table class="text-center">
                        <thead>
                            <tr>
                                <th>কতটি গ্রুপ বের হয়েছে</th>
                                <th>অংশগ্রহণকারীর সংখ্যা</th>
                                <th>কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</th>
                                <th>কতজন সহযোগী সদস্য হয়েছেন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat1_regular_group_wises?.how_many_groups_are_out) }}
                                        <comment
                                            :table_name="'ward_dawat1_regular_group_wises'"
                                            :column_name="'how_many_groups_are_out'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat1_regular_group_wises?.number_of_participants) }}
                                        <comment
                                            :table_name="'ward_dawat1_regular_group_wises'"
                                            :column_name="'number_of_participants'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat1_regular_group_wises?.how_many_have_been_invited) }}
                                        <comment
                                            :table_name="'ward_dawat1_regular_group_wises'"
                                            :column_name="'how_many_have_been_invited'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat1_regular_group_wises?.how_many_associate_members_created) }}
                                        <comment
                                            :table_name="'ward_dawat1_regular_group_wises'"
                                            :column_name="'how_many_associate_members_created'"
                                        />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="personal_dawat mb-1">
                    <h4 class="fs-6 fw-bold">
                        ২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:
                    </h4>
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
                                <td class="text-start px-2">
                                    মোট জনশক্তি সংখ্যা
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.total_rokon) }}
                                        <comment
                                            :table_name="'ward_dawat2_personal_and_targets'"
                                            :column_name="'total_rokon'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.total_worker) }}
                                        <comment
                                            :table_name="'ward_dawat2_personal_and_targets'"
                                            :column_name="'total_worker'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.how_many_have_been_invited) }}
                                        <comment
                                            :table_name="'ward_dawat2_personal_and_targets'"
                                            :column_name="'how_many_have_been_invited'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start px-2">
                                    কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.how_many_were_give_dawat_rokon) }}
                                        <comment
                                            :table_name="'ward_dawat2_personal_and_targets'"
                                            :column_name="'how_many_were_give_dawat_rokon'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.how_many_were_give_dawat_worker) }}
                                        <comment
                                            :table_name="'ward_dawat2_personal_and_targets'"
                                            :column_name="'how_many_were_give_dawat_worker'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    কতজন সহযোগী সদস্য হয়েছেন
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.how_many_associate_members_created) }}
                                        <comment
                                            :table_name="'ward_dawat2_personal_and_targets'"
                                            :column_name="'how_many_associate_members_created'"
                                        />
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="shadharon_shova mb-2">
                    <h4 class="fs-6 fw-bold">
                        ৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের
                        মাধ্যমে দাওয়াত :
                    </h4>
                    <table class="text-center table_layout_fixed">
                        <tbody>
                            <tr>
                                <td class="width-35">
                                    মোট কতজনকে দাওয়াত প্রদান করা হয়েছে
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat3_general_program_and_others?.how_many_were_give_dawat) }}
                                        <comment
                                            :table_name="'ward_dawat3_general_program_and_others'"
                                            :column_name="'how_many_were_give_dawat'"
                                        />
                                    </div>
                                </td>
                                <td class="width-35">
                                    মোট কতজন সহযোগী সদস্য হয়েছেন
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat3_general_program_and_others?.how_many_associate_members_created) }}
                                        <comment
                                            :table_name="'ward_dawat3_general_program_and_others'"
                                            :column_name="'how_many_associate_members_created'"
                                        />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="gonoshongjog mb-2">
                    <h4 class="fs-6 fw-bold">
                        ৪. গণসংযোগ ও দাওয়াতি অভিযান পালন*:
                    </h4>
                    <table class="text-center">
                        <thead>
                            <tr>
                                <th class="">বিবরণ</th>
                                <th class="width-10 px-0">মোট গ্রুপ সংখ্যা</th>
                                <th class="width-15">অংশগ্রহণকারীর সংখ্যা</th>
                                <th class="w-25 px-0">
                                    কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে
                                </th>
                                <th class="width-19 px-0">
                                    কতজন সহযোগী সদস্য হয়েছেন
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">
                                    গণসংযোগ দশক / পক্ষ
                                </td>

                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.total_gono_songjog_group) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'total_gono_songjog_group'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.total_attended) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'total_attended'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.how_many_have_been_invited) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'how_many_have_been_invited'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.how_many_associate_members_created) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'how_many_associate_members_created'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান
                                </td>

                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_group) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'jela_mohanogor_declared_gonosonjog_group'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_attended) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'jela_mohanogor_declared_gonosonjog_attended'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_invited) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'jela_mohanogor_declared_gonosonjog_invited'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_associated_created) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'jela_mohanogor_declared_gonosonjog_associated_created'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    নির্বাচনী আসনে গণসংযোগ সপ্তাহ
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_gono_songjog_group) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'election_gono_songjog_group'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_attended) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'election_attended'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_how_many_have_been_invited) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'election_how_many_have_been_invited'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_how_many_associate_members_created) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'election_how_many_associate_members_created'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_gono_songjog_group) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'other_gono_songjog_group'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_attended) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'other_attended'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_how_many_have_been_invited) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'other_how_many_have_been_invited'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_how_many_associate_members_created) }}
                                        <comment
                                            :table_name="'ward_dawat4_gono_songjog_and_dawat_ovijans'"
                                            :column_name="'other_how_many_associate_members_created'"
                                        />
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <p>
                        * গণসংযোগ অভিযান পালনের সময় গ্রুপ সংখ্যা, ব্যক্তিগত ও
                        গ্রুপভিত্তিক সহযোগী সদস্য বৃদ্ধি সংখ্যা শুধুমাত্র এই
                        ছকেই বসাতে হবে।
                    </p>
                </div>
            </div>
            <h1 class="font-18 fw-bold">খ) বিভাগ ভিত্তিক তথ্য :</h1>
            <div class="bivag">
                <div class="talimul_quran mb-2">
                    <h4 class="fs-6 fw-bold">
                        ১. তালিমুল কুরআনের মাধ্যমে দাওয়াত
                    </h4>
                    <table class="text-center mb-2">
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
                                <td class="text-start px-2">
                                    কতজন কুরআন শিক্ষা প্রদান করেছেন
                                </td>
                                <!-- <td >{{bangla($department1->teacher_rokon?? "")}}</td>
                                <td >{{bangla($department1->teacher_worker?? "")}}</td> -->
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.teacher_rokon) }}
                                        <comment
                                            :table_name="'ward_department1_talimul_qurans'"
                                            :column_name="'teacher_rokon'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.teacher_worker) }}
                                        <comment
                                            :table_name="'ward_department1_talimul_qurans'"
                                            :column_name="'teacher_worker'"
                                        />
                                    </div>
                                </td>


                                <td>
                                    <!-- {{ (report_sum_data?.ward_department1_talimul_qurans?.teacher_rokon ?? null) !== null || (report_sum_data?.ward_department1_talimul_qurans?.teacher_worker ??
                                        null) !== null
                                        ? formatBangla((report_sum_data?.ward_department1_talimul_qurans?.teacher_rokon ?? 0) + (report_sum_data?.ward_department1_talimul_qurans?.teacher_worker ??
                                            0))
                                    : ""
                                    }} -->

                                    {{
                                        formatBangla(
                                            (Number(
                                                report_sum_data
                                                    ?.ward_department1_talimul_qurans
                                                    ?.teacher_rokon
                                            ) ?? 0) +
                                                (Number(
                                                    report_sum_data
                                                        ?.ward_department1_talimul_qurans
                                                        ?.teacher_worker
                                                ) ?? 0)
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">
                                    কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.student_rokon) }}
                                        <comment
                                            :table_name="'ward_department1_talimul_qurans'"
                                            :column_name="'student_rokon'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.student_worker) }}
                                        <comment
                                            :table_name="'ward_department1_talimul_qurans'"
                                            :column_name="'student_worker'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    <!-- {{ (report_sum_data?.ward_department1_talimul_qurans?.student_rokon ?? null) !==
                                        null || (report_sum_data?.ward_department1_talimul_qurans?.student_worker ??
                                            null) !== null
                                        ? formatBangla((report_sum_data?.ward_department1_talimul_qurans?.student_rokon ??
                                            0) + (report_sum_data?.ward_department1_talimul_qurans?.student_worker ??
                                                0))
                                    : ""
                                    }} -->

                                    {{
                                        formatBangla(
                                            (Number(
                                                report_sum_data
                                                    ?.ward_department1_talimul_qurans
                                                    ?.student_rokon
                                            ) ?? 0) +
                                                (Number(
                                                    report_sum_data
                                                        ?.ward_department1_talimul_qurans
                                                        ?.student_worker
                                                ) ?? 0)
                                        )
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex align-items-start gap-2">
                        <table class="text-center mb-1">
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
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.quran_learning_total_group) }}
                                            <comment
                                                :table_name="'ward_department1_talimul_qurans'"
                                                :column_name="'quran_learning_total_group'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.quran_learning_total_students) }}
                                            <comment
                                                :table_name="'ward_department1_talimul_qurans'"
                                                :column_name="'quran_learning_total_students'"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মক্তব/ফোরকানিয়া মাদ্রাসা</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_moktob) }}
                                                <comment
                                                    :table_name="'ward_department1_talimul_qurans'"
                                                    :column_name="'total_moktob'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_forkania_madrasah) }}
                                                <comment
                                                    :table_name="'ward_department1_talimul_qurans'"
                                                    :column_name="'total_forkania_madrasah'"
                                                />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_moktob_students) }}
                                                <comment
                                                    :table_name="'ward_department1_talimul_qurans'"
                                                    :column_name="'total_moktob_students'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_forkania_madrasah_students) }}
                                                <comment
                                                    :table_name="'ward_department1_talimul_qurans'"
                                                    :column_name="'total_forkania_madrasah_students'"
                                                />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="text-center mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-start width-70 px-2">
                                        মোট কতজন সহীহ তিলাওয়াত শিখেছেন
                                    </td>
                                    <td class="width-30">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_learned_sohih_tilawat) }}
                                            <comment
                                                :table_name="'ward_department1_talimul_qurans'"
                                                :column_name="'how_much_learned_sohih_tilawat'"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">
                                        মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে
                                        (পু/ম)
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_invited_man) }}
                                                <comment
                                                    :table_name="'ward_department1_talimul_qurans'"
                                                    :column_name="'how_much_invited_man'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_invited_woman) }}
                                                <comment
                                                    :table_name="'ward_department1_talimul_qurans'"
                                                    :column_name="'how_much_invited_woman'"
                                                />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">
                                        মোট কতজন সহযোগী সদস্য হয়েছেন (পু/ম)
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_been_associated_man) }}
                                                <comment
                                                    :table_name="'ward_department1_talimul_qurans'"
                                                    :column_name="'how_much_been_associated_man'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_been_associated_woman) }}
                                                <comment
                                                    :table_name="'ward_department1_talimul_qurans'"
                                                    :column_name="'how_much_been_associated_woman'"
                                                />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <table class="text-center table_layout_fixed">
                        <tbody>
                            <tr>
                                <td class="width-35 text-start">
                                    তা'লিমুল কুরআন : মুয়াল্লিম সংখ্যা (পু./ম.)
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_muallim_man) }}
                                            <comment
                                                :table_name="'ward_department1_talimul_qurans'"
                                                :column_name="'total_muallim_man'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_muallim_woman) }}
                                            <comment
                                                :table_name="'ward_department1_talimul_qurans'"
                                                :column_name="'total_muallim_woman'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td class="width-35 text-start">
                                    বৃদ্ধি সংখ্যা (পু./ম.) :
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_muallim_increased_man) }}
                                            <comment
                                                :table_name="'ward_department1_talimul_qurans'"
                                                :column_name="'total_muallim_increased_man'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_muallim_increased_woman) }}
                                            <comment
                                                :table_name="'ward_department1_talimul_qurans'"
                                                :column_name="'total_muallim_increased_woman'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="moholla">
                    <h4 class="fs-6 fw-bold">
                        ২. গ্রাম ও মহল্লাভিত্তিক দাওয়াত
                    </h4>
                    <div class="d-flex align-items-start gap-2">
                        <table class="text-center mb-1">
                            <thead>
                                <tr>
                                    <th class="width-60 text-start">
                                        সরকারি হিসাবে গ্রাম/মহল্লা সংখ্যা
                                    </th>
                                    <th class="width-20">
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.govment_calculated_village_amount) }}
                                                <comment
                                                    :table_name="'ward_department2_moholla_vittik_dawats'"
                                                    :column_name="'govment_calculated_village_amount'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.govment_calculated_moholla_amount) }}
                                                <comment
                                                    :table_name="'ward_department2_moholla_vittik_dawats'"
                                                    :column_name="'govment_calculated_moholla_amount'"
                                                />
                                            </div>
                                        </div>
                                    </th>
                                    <th class="width-20">বৃদ্ধি</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">
                                        গ্রাম/মহল্লা কমিটি সংখ্যা
                                    </td>
                                    <td>
                                        <div>
                                            <span>{{
                                                formatBangla(
                                                    previous_present?.total_village_committee_present
                                                )
                                            }}</span
                                            >/
                                            <span>{{
                                                formatBangla(
                                                    previous_present?.total_moholla_committee_present
                                                )
                                            }}</span>
                                            <!-- <input name="total_village_committee"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.total_village_committee)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" />/
                                            <input name="total_moholla_committee"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.total_moholla_committee)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" /> -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.total_village_committee_increased) }}
                                                <comment
                                                    :table_name="'ward_department2_moholla_vittik_dawats'"
                                                    :column_name="'total_village_committee_increased'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.total_moholla_committee_increased) }}
                                                <comment
                                                    :table_name="'ward_department2_moholla_vittik_dawats'"
                                                    :column_name="'total_moholla_committee_increased'"
                                                />
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-start px-2">
                                        বিশেষ দাওয়াতের অন্তর্ভুক্ত
                                        গ্রাম/মহল্লা* সংখ্যা
                                    </td>
                                    <td>
                                        <div>
                                            <span>{{
                                                formatBangla(
                                                    previous_present?.special_dawat_included_village_present
                                                )
                                            }}</span
                                            >/
                                            <span>{{
                                                formatBangla(
                                                    previous_present?.special_dawat_included_moholla_present
                                                )
                                            }}</span>

                                            <!-- <input name="special_dawat_included_village"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.special_dawat_included_village)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" />/
                                            <input name="special_dawat_included_moholla"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.special_dawat_included_moholla)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" /> -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.special_dawat_included_village_increased) }}
                                                <comment
                                                    :table_name="'ward_department2_moholla_vittik_dawats'"
                                                    :column_name="'special_dawat_included_village_increased'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.special_dawat_included_moholla_increased) }}
                                                <comment
                                                    :table_name="'ward_department2_moholla_vittik_dawats'"
                                                    :column_name="'special_dawat_included_moholla_increased'"
                                                />
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-start width-70 px-2">
                                        কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে
                                    </td>
                                    <td class="width-30">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.how_many_been_invited) }}
                                            <comment
                                                :table_name="'ward_department2_moholla_vittik_dawats'"
                                                :column_name="'how_many_been_invited'"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">
                                        কতজন সহযোগী সদস্য হয়েছেন
                                    </td>
                                    <td class="width-30">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.how_many_associated_created) }}
                                            <comment
                                                :table_name="'ward_department2_moholla_vittik_dawats'"
                                                :column_name="'how_many_associated_created'"
                                            />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <p class="font-12">
                        * সেসব গ্রাম/মহল্লা বুঝাবে যেখানে ইউনিট/দাওয়াতি ইউনিট
                        নেই।
                    </p>
                </div>
                <div class="jubo mb-2">
                    <h4 class="fs-6 fw-bold">
                        ৩. যুব বিভাগের মাধ্যমে দাওয়াত*:
                    </h4>
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
                                        <td class="text-start px-2">
                                            কতজন যুবকের মাঝে দাওয়াত পৌঁছানো হয়েছে
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.how_many_young_been_invited) }}
                                                <comment
                                                    :table_name="'ward_department3_jubo_somaj_dawats'"
                                                    :column_name="'how_many_young_been_invited'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">
                                            কতজন যুবক সহযোগী সদস্য হয়েছেন
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.how_many_young_been_associated) }}
                                                <comment
                                                    :table_name="'ward_department3_jubo_somaj_dawats'"
                                                    :column_name="'how_many_young_been_associated'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <p class="font-11">
                                * যুব বিভাগের কাজের ক্ষেত্রে ছাত্র সংগঠনের সাবেক
                                জনশক্তি ব্যতিত সাধারণ যুবকগণই যুবক হিসাবে গণ্য
                                হবে।
                            </p>
                        </div>
                        <table class="text-center mb-1">
                            <thead>
                                <tr>
                                    <th class="width-60">বিবরণ</th>
                                    <th class="width-20">মোট সংখ্যা</th>
                                    <th class="width-20">বৃদ্ধি</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">যুব কমিটি</td>
                                    <td>
                                        {{
                                            formatBangla(
                                                previous_present?.total_young_committee_present
                                            )
                                        }}
                                        <!-- <input name="total_young_committee"
                                            :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.total_young_committee)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" /> -->
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.total_young_committee_increased) }}
                                            <comment
                                                :table_name="'ward_department3_jubo_somaj_dawats'"
                                                :column_name="'total_young_committee_increased'"
                                            />
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-start px-2">
                                        নতুন সমিতি/ক্লাব প্রতিষ্ঠা করা হয়েছে
                                    </td>
                                    <td>
                                        {{
                                            formatBangla(
                                                previous_present?.total_new_club_present
                                            )
                                        }}
                                        <!-- <input name="total_new_club" :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.total_new_club)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" /> -->
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.total_new_club_increased) }}
                                            <comment
                                                :table_name="'ward_department3_jubo_somaj_dawats'"
                                                :column_name="'total_new_club_increased'"
                                            />
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-start px-2">
                                        প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো
                                        হয়েছে
                                    </td>
                                    <td>
                                        {{
                                            formatBangla(
                                                previous_present?.stablished_club_total_invited_present
                                            )
                                        }}
                                        <!-- <input name="stablished_club_total_invited"
                                            :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.stablished_club_total_invited)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" /> -->
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.stablished_club_total_increased) }}
                                            <comment
                                                :table_name="'ward_department3_jubo_somaj_dawats'"
                                                :column_name="'stablished_club_total_increased'"
                                            />
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="job_holder mb-2">
                    <h4 class="fs-6 fw-bold">
                        ৪. বিভিন্ন শ্রেণি-পেশার মানুষের মাঝে দাওয়াত
                    </h4>
                    <div class="d-flex align-items-start gap-2">
                        <table class="text-center mb-1">
                            <thead>
                                <tr>
                                    <th class="width-30 letter_spacing">
                                        শ্রেণি-পেশার বিবরণ
                                    </th>
                                    <th class="w-25 px-0 font-13">
                                        কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে
                                    </th>
                                    <th class="width-20 px-0 font-13">
                                        কতজন সহযোগী সদস্য হয়েছেন
                                    </th>
                                    <th class="width-10">টার্গেট</th>
                                    <th class="font-13 width-15">
                                        বাস্তবায়নের হার
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start letter_spacing">
                                        রাজ: ও বিশিষ্ট ব্যক্তিবর্গ
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.political_and_special_invited) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'political_and_special_invited'"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.political_and_special_been_associated) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'political_and_special_been_associated'"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.political_and_special_target) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'political_and_special_target'"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        {{
                                            formatBangla(
                                                implementation_rate(
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_department4_different_job_holders_dawats
                                                            ?.political_and_special_target
                                                    ),
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_department4_different_job_holders_dawats
                                                            ?.political_and_special_been_associated
                                                    )
                                                )
                                            )
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">পেশাজীবী</td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.pesha_jibi_invited) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'pesha_jibi_invited'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.pesha_jibi_been_associated) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'pesha_jibi_been_associated'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.pesha_jibi_target) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'pesha_jibi_target'"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        {{
                                            formatBangla(
                                                implementation_rate(
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_department4_different_job_holders_dawats
                                                            ?.pesha_jibi_target
                                                    ),
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_department4_different_job_holders_dawats
                                                            ?.pesha_jibi_been_associated
                                                    )
                                                )
                                            )
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">
                                        উলামা মাশায়েখ
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.olama_masayekh_invited) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'olama_masayekh_invited'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.olama_masayekh_been_associated) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'olama_masayekh_been_associated'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.olama_masayekh_target) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'olama_masayekh_target'"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        {{
                                            formatBangla(
                                                implementation_rate(
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_department4_different_job_holders_dawats
                                                            ?.olama_masayekh_target
                                                    ),
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_department4_different_job_holders_dawats
                                                            ?.olama_masayekh_been_associated
                                                    )
                                                )
                                            )
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center mb-1">
                            <thead>
                                <tr>
                                    <th class="width-30 letter_spacing">
                                        শ্রেণি-পেশার বিবরণ
                                    </th>
                                    <th class="w-25 px-0 font-13">
                                        কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে
                                    </th>
                                    <th class="width-20 px-0 font-13">
                                        কতজন সহযোগী সদস্য হয়েছেন
                                    </th>
                                    <th class="width-10">টার্গেট</th>
                                    <th class="font-13 width-15">
                                        বাস্তবায়নের হার
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-1">শ্রমজীবী</td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.sromo_jibi_invited) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'sromo_jibi_invited'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.sromo_jibi_been_associated) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'sromo_jibi_been_associated'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.sromo_jibi_target) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'sromo_jibi_target'"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        {{
                                            formatBangla(
                                                implementation_rate(
                                                    report_sum_data
                                                        ?.ward_department4_different_job_holders_dawats
                                                        ?.sromo_jibi_target,
                                                    report_sum_data
                                                        ?.ward_department4_different_job_holders_dawats
                                                        ?.sromo_jibi_been_associated
                                                )
                                            )
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="text-start px-1 letter_spacing font-13"
                                    >
                                        প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.prantik_jonogosti_invited) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'prantik_jonogosti_invited'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.prantik_jonogosti_been_associated) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'prantik_jonogosti_been_associated'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.prantik_jonogosti_target) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'prantik_jonogosti_target'"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        {{
                                            formatBangla(
                                                implementation_rate(
                                                    report_sum_data
                                                        ?.ward_department4_different_job_holders_dawats
                                                        ?.prantik_jonogosti_target,
                                                    report_sum_data
                                                        ?.ward_department4_different_job_holders_dawats
                                                        ?.prantik_jonogosti_been_associated
                                                )
                                            )
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-1">
                                        ভিন্নধর্মাবলম্বী
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.vinno_dormalombi_invited) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'vinno_dormalombi_invited'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.vinno_dormalombi_been_associated) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'vinno_dormalombi_been_associated'"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.vinno_dormalombi_target) }}
                                            <comment
                                                :table_name="'ward_department4_different_job_holders_dawats'"
                                                :column_name="'vinno_dormalombi_target'"
                                            />
                                        </div>
                                    </td>

                                    <td>
                                        {{
                                            formatBangla(
                                                implementation_rate(
                                                    report_sum_data
                                                        ?.ward_department4_different_job_holders_dawats
                                                        ?.vinno_dormalombi_target,
                                                    report_sum_data
                                                        ?.ward_department4_different_job_holders_dawats
                                                        ?.vinno_dormalombi_been_associated
                                                )
                                            )
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="paribarik mb-2">
                    <h4 class="fs-6 fw-bold">৫. পরিবারভিত্তিক দাওয়াত</h4>
                    <table class="text-center table_layout_fixed">
                        <tbody>
                            <tr>
                                <td class="width-35">
                                    দাওয়াতি কাজে অংশগ্রহণকারী মোট পরিবার সংখ্যা
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department5_paribarik_dawats?.total_attended_family) }}
                                        <comment
                                            :table_name="'ward_department5_paribarik_dawats'"
                                            :column_name="'total_attended_family'"
                                        />
                                    </div>
                                </td>
                                <td class="width-35">
                                    মোট কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department5_paribarik_dawats?.how_many_new_family_invited) }}
                                        <comment
                                            :table_name="'ward_department5_paribarik_dawats'"
                                            :column_name="'how_many_new_family_invited'"
                                        />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="mosjid_dawah_center mb-1">
                    <h4 class="fs-6 fw-bold">
                        ৬. মসজিদ/দাওয়াহ্ সেন্টার/তথ্যসেবা কেন্দ্রভিত্তিক
                        দাওয়াত
                    </h4>
                    <table class="text-center">
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
                                <td>
                                    {{
                                        formatBangla(
                                            previous_present?.total_mosjid_present
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.total_mosjid_increase) }}
                                        <comment
                                            :table_name="'ward_department6_mosjid_dawah_infomation_centers'"
                                            :column_name="'total_mosjid_increase'"
                                        />
                                    </div>
                                </td>

                                <td class="text-start px-2">
                                    সাধারণ দাওয়াহ্ সেন্টার
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            previous_present?.general_dawah_center_present
                                        )
                                    }}
                                    <!-- <input name="general_dawah_center"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.general_dawah_center)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" /> -->
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.general_dawah_center_increase) }}
                                        <comment
                                            :table_name="'ward_department6_mosjid_dawah_infomation_centers'"
                                            :column_name="'general_dawah_center_increase'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start px-2">
                                    দাওয়াতের আওতাভুক্ত মসজিদ
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            previous_present?.dawat_included_mosjid_present
                                        )
                                    }}
                                    <!-- <input name="dawat_included_mosjid"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.dawat_included_mosjid)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" /> -->
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.dawat_included_mosjid_increase) }}
                                        <comment
                                            :table_name="'ward_department6_mosjid_dawah_infomation_centers'"
                                            :column_name="'dawat_included_mosjid_increase'"
                                        />
                                    </div>
                                </td>

                                <td class="text-start px-2">
                                    তথ্যসেবা কেন্দ্র (মসজিদভিত্তিক /সাধারণ)
                                </td>
                                <td>
                                    <div>
                                        <span>{{
                                            formatBangla(
                                                previous_present?.mosjid_wise_information_center_present
                                            )
                                        }}</span
                                        >/
                                        <span>{{
                                            formatBangla(
                                                previous_present?.general_information_center_present
                                            )
                                        }}</span>

                                        <!-- <input name="mosjid_wise_information_center"
                                            :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.mosjid_wise_information_center)"
                                            @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="general_information_center"
                                            :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.general_information_center)"
                                            @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                            type="text" class="bg-input w-100 text-center" /> -->
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.mosjid_wise_information_center_increase) }}
                                            <comment
                                                :table_name="'ward_department6_mosjid_dawah_infomation_centers'"
                                                :column_name="'mosjid_wise_information_center_increase'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.general_information_center_increase) }}
                                            <comment
                                                :table_name="'ward_department6_mosjid_dawah_infomation_centers'"
                                                :column_name="'general_information_center_increase'"
                                            />
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start px-2">
                                    মসজিদভিত্তিক দাওয়াহ্ সেন্টার
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            previous_present?.mosjid_wise_dawah_center_present
                                        )
                                    }}
                                    <!-- <input name="mosjid_wise_dawah_center"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.mosjid_wise_dawah_center)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" /> -->
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.mosjid_wise_dawah_center_increase) }}
                                        <comment
                                            :table_name="'ward_department6_mosjid_dawah_infomation_centers'"
                                            :column_name="'mosjid_wise_dawah_center_increase'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start px-2"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div
                    class="tottho_projukti d-flex flex-wrap justify-content-between mb-1"
                >
                    <p class="fw-bold fs-6 width-60 d-flex">
                        ৭. তথ্যপ্রযুক্তির মাধ্যমে দাওয়াতি কাজের জন্য উপযুক্ত
                        জনশক্তি সংখ্যা:
                        <span class="d-block width-130px text-center">
                            <div class="parent_popup">
                                {{ formatBangla(report_sum_data?.ward_department7_dawat_in_technologies?.total_well_known) }}
                                <comment
                                    :table_name="'ward_department7_dawat_in_technologies'"
                                    :column_name="'total_well_known'"
                                />
                            </div>
                        </span>

                    </p>
                    <p class="fw-bold fs-6 width-40 d-flex">
                        ,অংশগ্রহণকারীর সংখ্যা:
                        <span class="d-block width-130px text-center">
                            <div class="parent_popup">
                                {{ formatBangla(report_sum_data?.ward_department7_dawat_in_technologies?.total_attended) }}
                                <comment
                                    :table_name="'ward_department7_dawat_in_technologies'"
                                    :column_name="'total_attended'"
                                />
                            </div>
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
                            <td>
                                {{
                                    formatBangla(
                                        previous_present?.total_pathagar_present
                                    )
                                }}
                                <!-- <input name="total_pathagar" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.total_pathagar)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.total_pathagar_increase) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'total_pathagar_increase'"
                                    />
                                </div>
                            </td>


                            <td class="text-start px-2">
                                ওয়ার্ডে বই বিক্রয় কেন্দ্র
                            </td>
                            <!-- <td >{{bangla($dawah_prokashona->ward_book_sales_center?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->ward_book_sales_center_increase?? "")}}</td> -->
                            <td>
                                {{
                                    formatBangla(
                                        previous_present?.ward_book_sales_center_present
                                    )
                                }}
                                <!-- <input name="ward_book_sales_center"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.ward_book_sales_center)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.ward_book_sales_center_increase) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'ward_book_sales_center_increase'"
                                    />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই</td>
                            <!-- <td >{{bangla($dawah_prokashona->books_in_pathagar?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->books_in_pathagar_increase?? "")}}</td> -->
                            <td>
                                {{
                                    formatBangla(
                                        previous_present?.books_in_pathagar_present
                                    )
                                }}
                                <!-- <input name="books_in_pathagar"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.books_in_pathagar)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.books_in_pathagar_increase) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'books_in_pathagar_increase'"
                                    />
                                </div>
                            </td>


                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয়</td>
                            <!-- <td >{{bangla($dawah_prokashona->ward_book_sales?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->ward_book_sales_increase?? "")}}</td> -->
                            <td>
                                {{
                                    formatBangla(
                                        previous_present?.ward_book_sales_present
                                    )
                                }}
                                <!-- <input name="ward_book_sales" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.ward_book_sales)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.ward_book_sales_increase) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'ward_book_sales_increase'"
                                    />
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিলি</td>
                            <!-- <td >{{bangla($dawah_prokashona->book_distribution?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->book_distribution_increase?? "")}}</td> -->
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.book_distribution) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'book_distribution'"
                                    />
                                </div>
                            </td>

                            <td>
                                <!-- <input name="book_distribution_increase" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.book_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" /> -->
                            </td>

                            <td class="text-start px-2">
                                বইয়ের সফট কপি বিলি*
                            </td>
                            <!-- <td >{{bangla($dawah_prokashona->soft_copy_book_distribution?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->soft_copy_book_distribution_increase?? "")}}</td> -->
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.soft_copy_book_distribution) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'soft_copy_book_distribution'"
                                    />
                                </div>
                            </td>

                            <td>
                                <!-- <div class="parent_popup">
                                    <input name="soft_copy_book_distribution_increase" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.soft_copy_book_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" />
                                    <popup
                                        :ward_id="report_header?.ward_info?.id"
                                        :table_name="'dawah_and_prokashonas'"
                                        :field_title="'soft_copy_book_distribution_increase'"
                                        :month="month"
                                    >
                                    </popup>
                                </div> -->
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">
                                ইউনিটে বই বিলিকেন্দ্র
                            </td>
                            <td>
                                <div class="parent_popup">
                                    {{
                                        formatBangla(
                                            previous_present?.unit_book_distribution_center_present
                                        )
                                    }}
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.unit_book_distribution_center_increase) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'unit_book_distribution_center_increase'"
                                    />
                                </div>
                            </td>


                            <td class="text-start px-2">
                                দাওয়াতি লিংক বিতরণ*
                            </td>
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.dawat_link_distribution) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'dawat_link_distribution'"
                                    />
                                </div>
                            </td>

                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলি</td>
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.unit_book_distribution) }}
                                    <comment
                                        :table_name="'ward_dawah_and_prokashonas'"
                                        :column_name="'unit_book_distribution'"
                                    />
                                </div>
                            </td>

                            <td>
                            </td>

                            <td class="text-start px-2">
                                সোনার বাংলা/সংগ্রাম/পৃথিবী কত কপি চলে
                            </td>
                            <td>
                                <div>
                                    <span>{{
                                        formatBangla(
                                            previous_present?.sonar_bangla_present
                                        )
                                    }}</span
                                    >/
                                    <span>{{
                                        formatBangla(
                                            previous_present?.songram_present
                                        )
                                    }}</span
                                    >/
                                    <span>{{
                                        formatBangla(
                                            previous_present?.prithibi_present
                                        )
                                    }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.sonar_bangla_increase) }}
                                        <comment
                                            :table_name="'ward_dawah_and_prokashonas'"
                                            :column_name="'sonar_bangla_increase'"
                                        />
                                    </div>
                                    /
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.songram_increase) }}
                                        <comment
                                            :table_name="'ward_dawah_and_prokashonas'"
                                            :column_name="'songram_increase'"
                                        />
                                    </div>
                                    /
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.prithibi_increase) }}
                                        <comment
                                            :table_name="'ward_dawah_and_prokashonas'"
                                            :column_name="'prithibi_increase'"
                                        />
                                    </div>
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
                                <td>১.</td>
                                <td class="text-start px-2">ইউনিটে মাসিক সাধারণ সভা</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.unit_masik_sadaron_sova_total) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.unit_masik_sadaron_sova_target) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.unit_masik_sadaron_sova) }}
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>২.</td>
                                <td class="text-start font-13 px-2">
                                    দাওয়াতি সভা/আলোচনা সভা/সুধী সমাবেশ
                                </td>
                                <td class="font-13">
                                    <div class="d-flex gap-2">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dawati_sova_total) }}
                                        </div>
                                        <span>/</span>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.alochona_sova_total) }}
                                        </div>
                                        <span>/</span>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.sudhi_somabesh_total) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex gap-2">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dawati_sova_target) }}
                                        </div>
                                        <span>/</span>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.alochona_sova_target) }}
                                        </div>
                                        <span>/</span>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.sudhi_somabesh_target) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex gap-2">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.dawati_sova) }}
                                        </div>
                                        <span>/</span>
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.alochona_sova) }}
                                        </div>
                                        <span>/</span>
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.sudhi_somabesh) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>৩.</td>
                                <td class="text-start px-2">সীরাতুন্নবী (সাঃ) মাহফিল</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.siratunnabi_mahfil_total) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.siratunnabi_mahfil_target) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.siratunnabi_mahfil) }}
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>৪.</td>
                                <td class="text-start px-2">ঈদ পুনর্মিলনী</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.eid_reunion_total) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.eid_reunion_target) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.eid_reunion) }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>৫.</td>
                                <td class="text-start font-13 letter_spacing px-1">
                                    দারস/তাফসীর/দাওয়াতি জনসভা ও ইসলামী মাহফিল
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dars_total) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.tafsir_total) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dawati_jonosova_total) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dars_target) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.tafsir_target) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dawati_jonosova_target) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.dars) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.tafsir) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.dawati_jonosova) }}
                                        </div>
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
                                <td>৬.</td>
                                <td class="text-start">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.iftar_mahfil_personal_total) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.iftar_mahfil_samostic_total) }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.iftar_mahfil_personal_target) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.iftar_mahfil_samostic_target) }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.iftar_mahfil_personal) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.iftar_mahfil_samostic) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>৭.</td>
                                <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.cha_chakra_total) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.samostic_khawa_total) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.sikkha_sofor_total) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.cha_chakra_target) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.samostic_khawa_target) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.sikkha_sofor_target) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.cha_chakra) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.samostic_khawa) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.sikkha_sofor) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>৮.</td>
                                <td class="text-start px-2">কিরাত/হামদ না'ত প্ৰতিযোগিতা</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.kirat_protijogita_total) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.hamd_nat_protijogita_total) }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.kirat_protijogita_target) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.hamd_nat_protijogita_target) }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.kirat_protijogita) }}
                                        </div> /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.hamd_nat_protijogita) }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>৯.</td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.others_total) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.others_target) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.others) }}
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="do_not_print d-flex flex-wrap gap-2 mb-2">
                <comment-note
                    :label="'ইউনিটে মাসিক সাধারণ সভা মোট সংখ্যা'"
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'unit_masik_sadaron_sova_total'"
                />
                <comment-note
                    :label="'ইউনিটে মাসিক সাধারণ সভা বৃদ্ধি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'unit_masik_sadaron_sova_target'"
                    
                />
                <comment-note
                    :label="'ইউনিটে মাসিক সাধারণ সভা মোট উপস্থিতি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'unit_masik_sadaron_sova_uposthiti'"
                    
                />
                <comment-note
                    :label="'ইফতার মাহফিল (ব্যক্তিগত) মোট সংখ্যা'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'iftar_mahfil_personal_total'"
                    
                />
                <comment-note
                    :label="'ইফতার মাহফিল (ব্যক্তিগত) বৃদ্ধি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'iftar_mahfil_personal_target'"
                    
                />
                <comment-note
                    :label="'ইফতার মাহফিল (ব্যক্তিগত) মোট উপস্থিতি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'iftar_mahfil_personal_uposthiti'"
                    
                />
                <comment-note
                    :label="'ইফতার মাহফিল (সাংগঠনিক) মোট সংখ্যা'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'iftar_mahfil_samostic_total'"
                    
                />
                <comment-note
                    :label="'ইফতার মাহফিল (সাংগঠনিক) বৃদ্ধি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'iftar_mahfil_samostic_target'"
                    
                />
                <comment-note
                    :label="'ইফতার মাহফিল (সাংগঠনিক) মোট উপস্থিতি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'iftar_mahfil_samostic_uposthiti'"
                    
                />
                <comment-note
                    :label="'চা চক্র মোট সংখ্যা'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'cha_chakra_total'"
                    
                />
                <comment-note
                    :label="'চা চক্র বৃদ্ধি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'cha_chakra_target'"
                    
                />
                <comment-note
                    :label="'চা চক্র মোট উপস্থিতি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'cha_chakra_uposthiti'"
                    
                />
                <comment-note
                    :label="'সামষ্টিক খাওয়া মোট সংখ্যা'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'samostic_khawa_total'"
                    
                />
                <comment-note
                    :label="'সামষ্টিক খাওয়া বৃদ্ধি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'samostic_khawa_target'"
                    
                />
                <comment-note
                    :label="'সামষ্টিক খাওয়া মোট উপস্থিতি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'samostic_khawa_uposthiti'"
                    
                />
                <comment-note
                    :label="'শিক্ষা সফর মোট সংখ্যা'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'sikkha_sofor_total'"
                    
                />
                <comment-note
                    :label="'শিক্ষা সফর বৃদ্ধি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'sikkha_sofor_target'"
                    
                />
                <comment-note
                    :label="'শিক্ষা সফর মোট উপস্থিতি'"
                    
                    :table_name="'ward_kormosuci_bastobayons'"
                    :field_title="'sikkha_sofor_uposthiti'"
                    
                />
            </div>
        </section>

        <section class="">
            <div class="songothon">
                <h1 class="font-18 fw-bold">সংগঠন :</h1>
                <div class="jonoshokti mb-2">
                    <h4 class="fs-6 fw-bold">১. জনশক্তি</h4>
                    <table class="text-center mb-1 table_layout_fixed">
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
                                <td class="text-start px-2">
                                    সর্বমোট সদস্য (রুকন)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_previous)" @change="data_upload('ward-songothon1-jonosokti')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.rokon_previous ??
                                                    ""
                                            )
                                        }}
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="rokon_present" :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_present)" @change="data_upload('ward-songothon1-jonosokti')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.rokon_present ??
                                                    ""
                                            )
                                        }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_briddhi) }}
                                        <comment
                                            :table_name="'ward_songothon1_jonosoktis'"
                                            :column_name="'rokon_briddhi'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon1_jonosoktis'"
                                            :column_name="'rokon_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_target) }}
                                        <comment
                                            :table_name="'ward_songothon1_jonosoktis'"
                                            :column_name="'rokon_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon1_jonosoktis
                                                    ?.rokon_target,
                                                report_sum_data
                                                    ?.ward_songothon1_jonosoktis
                                                    ?.rokon_briddhi
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সর্বমোট কর্মী</td>

                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="worker_previous" :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_previous)" @change="data_upload('ward-songothon1-jonosokti')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.worker_previous ??
                                                    ""
                                            )
                                        }}
                                       
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="worker_present" :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_present)" @change="data_upload('ward-songothon1-jonosokti')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.worker_present ??
                                                    ""
                                            )
                                        }}
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_briddhi) }}
                                        <comment
                                            :table_name="'ward_songothon1_jonosoktis'"
                                            :column_name="'worker_briddhi'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon1_jonosoktis'"
                                            :column_name="'worker_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_target) }}
                                        <comment
                                            :table_name="'ward_songothon1_jonosoktis'"
                                            :column_name="'worker_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon1_jonosoktis
                                                    ?.worker_target,
                                                report_sum_data
                                                    ?.ward_songothon1_jonosoktis
                                                    ?.worker_briddhi
                                            )
                                        )
                                    }}
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
                                <td class="text-start px-2">
                                    মোট সহযোগী সদস্য (পুরুষ)
                                </td>
                                <td>
                                    <!-- <input name="associate_member_man_previous" :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_previous)" @change="data_upload('ward-songothon2-associate-member')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.associate_member_man_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="associate_member_man_present" :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_present)" @change="data_upload('ward-songothon2-associate-member')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.associate_member_man_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_briddhi) }}
                                        <comment
                                            :table_name="'ward_songothon2_associate_members'"
                                            :column_name="'associate_member_man_briddhi'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_target) }}
                                        <comment
                                            :table_name="'ward_songothon2_associate_members'"
                                            :column_name="'associate_member_man_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon2_associate_members
                                                    ?.associate_member_man_target,
                                                report_sum_data
                                                    ?.ward_songothon2_associate_members
                                                    ?.associate_member_man_briddhi
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">
                                    মোট সহযোগী সদস্য (মহিলা)
                                </td>
                                <td>
                                    <!-- <input name="associate_member_woman_previous" :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_previous)" @change="data_upload('ward-songothon2-associate-member')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.associate_member_woman_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="associate_member_woman_present" :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_present)" @change="data_upload('ward-songothon2-associate-member')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.associate_member_woman_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_briddhi) }}
                                        <comment
                                            :table_name="'ward_songothon2_associate_members'"
                                            :column_name="'associate_member_woman_briddhi'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_target) }}
                                        <comment
                                            :table_name="'ward_songothon2_associate_members'"
                                            :column_name="'associate_member_woman_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon2_associate_members
                                                    ?.associate_member_woman_target,
                                                report_sum_data
                                                    ?.ward_songothon2_associate_members
                                                    ?.associate_member_woman_briddhi
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">
                                    সর্বমোট সহযোগী সদস্য সংখ্যা**
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- {{ formatBangla((previous_present?.associate_member_man_previous ??
                                            0) + (previous_present?.associate_member_woman_previous ?? 0) || '')
                                        }} -->
                                        {{
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
                                        }}
                                       
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{
                                            formatBangla(
                                                Number(
                                                    previous_present?.associate_member_man_present ??
                                                        0
                                                ) +
                                                    Number(
                                                        previous_present?.associate_member_woman_present ??
                                                            0
                                                    )
                                            )
                                        }}
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{
                                            formatBangla(
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon2_associate_members
                                                        ?.associate_member_man_briddhi ??
                                                        0
                                                ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon2_associate_members
                                                            ?.associate_member_woman_briddhi ??
                                                            0
                                                    )
                                            )
                                        }}
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{
                                            formatBangla(
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon2_associate_members
                                                        ?.associate_member_man_target ??
                                                        0
                                                ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon2_associate_members
                                                            ?.associate_member_woman_target ??
                                                            0
                                                    )
                                            )
                                        }}
                                    </div>
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon2_associate_members
                                                        ?.associate_member_man_target ??
                                                        0
                                                ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon2_associate_members
                                                            ?.associate_member_woman_target ??
                                                            0
                                                    ),
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon2_associate_members
                                                        ?.associate_member_man_briddhi ??
                                                        0
                                                ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon2_associate_members
                                                            ?.associate_member_woman_briddhi ??
                                                            0
                                                    )
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-14">
                        *সদস্য (রুকন) ঘাটতির ক্ষেত্রে স্থানান্তর, ইন্তেকাল,
                        বাতিল, ইস্তফা ও বিদেশ গমন সংখ্যার হিসাব আলাদাভাবে
                        সংরক্ষণ করে মোট সংখ্যাটি এ ঘরে বসাতে হবে এবং
                        এতদসংক্রান্ত তালিকা ঊর্ধ্বতন সংগঠনে জমা দিতে হবে।
                    </p>
                    <p class="font-14">
                        ** দাওয়াত ও তাবলিগের 'ক' এর অধীনে উল্লেখিত সকল সহযোগী
                        সদস্যের সংখ্যা সংগঠনের জনশক্তির এ ছকে সর্বমোট সহযোগী
                        সদস্যের ঘরে বসাতে হবে।
                    </p>
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
                            <tr>
                                <td rowspan="3" class="text-center px-2">
                                    মহিলা
                                </td>
                                <td class="text-start">সদস্য (রুকন)</td>

                                <td>
                                    <!-- <input name="women_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.women_rokon_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="women_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.women_rokon_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_rokon_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_rokon_gatti'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_rokon_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="women_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.women_kormi_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="women_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.women_kormi_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_kormi_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_kormi_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_kormi_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="women_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.women_associate_member_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="women_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.women_associate_member_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_associate_member_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_associate_member_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'women_associate_member_target'"
                                        />
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">
                                    শ্রম*
                                </td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>
                                    <!-- <input name="sromojibi_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.sromojibi_rokon_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="sromojibi_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.sromojibi_rokon_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_rokon_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_rokon_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_rokon_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="sromojibi_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.sromojibi_kormi_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="sromojibi_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.sromojibi_kormi_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_kormi_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_kormi_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_kormi_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="sromojibi_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.sromojibi_associate_member_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="sromojibi_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.sromojibi_associate_member_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_associate_member_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_associate_member_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'sromojibi_associate_member_target'"
                                        />
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">
                                    উলামা
                                </td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>
                                    <!-- <input name="ulama_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.ulama_rokon_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="ulama_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.ulama_rokon_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_rokon_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_rokon_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_rokon_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="ulama_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.ulama_kormi_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="ulama_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.ulama_kormi_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_kormi_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_kormi_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_kormi_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="ulama_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.ulama_associate_member_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="ulama_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.ulama_associate_member_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_associate_member_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_associate_member_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'ulama_associate_member_target'"
                                        />
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">
                                    পেশাজীবী
                                </td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>
                                    <!-- <input name="pesha_jibi_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.pesha_jibi_rokon_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="pesha_jibi_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.pesha_jibi_rokon_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_rokon_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_rokon_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_rokon_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="pesha_jibi_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.pesha_jibi_kormi_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="pesha_jibi_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.pesha_jibi_kormi_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_kormi_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_kormi_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_kormi_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="pesha_jibi_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.pesha_jibi_associate_member_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="pesha_jibi_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.pesha_jibi_associate_member_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_associate_member_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_associate_member_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'pesha_jibi_associate_member_target'"
                                        />
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">
                                    যুব
                                </td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>
                                    <!-- <input name="jubo_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.jubo_rokon_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="jubo_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.jubo_rokon_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_rokon_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_rokon_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_rokon_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="jubo_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.jubo_kormi_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="jubo_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.jubo_kormi_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_kormi_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_kormi_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_kormi_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="jubo_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.jubo_associate_member_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="jubo_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.jubo_associate_member_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_associate_member_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_associate_member_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'jubo_associate_member_target'"
                                        />
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td rowspan="2" class="text-center px-2">
                                    ভিন্নধর্মাবলম্বী
                                </td>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="vinno_dormalombi_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.vinno_dormalombi_kormi_previous ??
                                                    ""
                                            )
                                        }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="vinno_dormalombi_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.vinno_dormalombi_kormi_present ??
                                                    ""
                                            )
                                        }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'vinno_dormalombi_kormi_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'vinno_dormalombi_kormi_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'vinno_dormalombi_kormi_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="vinno_dormalombi_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.vinno_dormalombi_associate_member_previous ??
                                                    ""
                                            )
                                        }}
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="vinno_dormalombi_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.vinno_dormalombi_associate_member_present ??
                                                    ""
                                            )
                                        }}
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_increase) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'vinno_dormalombi_associate_member_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'vinno_dormalombi_associate_member_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_target) }}
                                        <comment
                                            :table_name="'ward_songothon3_departmental_information'"
                                            :column_name="'vinno_dormalombi_associate_member_target'"
                                        />
                                    </div>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                    <p class="font-12">
                        *শ্রমিক কল্যাণের রিপোর্ট অনুযায়ী হবে।
                    </p>
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
                                
                                <td>
                                    <!-- <input name="general_unit_men_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.general_unit_men_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="general_unit_men_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.general_unit_men_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_increase) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'general_unit_men_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'general_unit_men_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_target) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'general_unit_men_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.general_unit_men_target,
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.general_unit_men_increase
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সাধারণ ইউনিট (মহিলা)</td>
                                
                                <td>
                                    <!-- <input name="general_unit_women_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.general_unit_women_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="general_unit_women_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.general_unit_women_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_increase) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'general_unit_women_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'general_unit_women_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_target) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'general_unit_women_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.general_unit_women_target,
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.general_unit_women_increase
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">উলামা ইউনিট</td>
                                
                                <td>
                                    <!-- <input name="ulama_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.ulama_unit_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="ulama_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.ulama_unit_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_increase) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'ulama_unit_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'ulama_unit_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_target) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'ulama_unit_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.ulama_unit_target,
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.ulama_unit_increase
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">পেশাজীবী ইউনিট</td>
                                <td>
                                    <!-- <input name="peshajibi_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.peshajibi_unit_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="peshajibi_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.peshajibi_unit_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_increase) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'peshajibi_unit_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'peshajibi_unit_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_target) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'peshajibi_unit_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.peshajibi_unit_target,
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.peshajibi_unit_increase
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">শ্রমিক কল্যাণ ইউনিট</td>
                                
                                <td>
                                    <!-- <input name="sromik_kollyan_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.sromik_kollyan_unit_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="sromik_kollyan_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.sromik_kollyan_unit_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_increase) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'sromik_kollyan_unit_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'sromik_kollyan_unit_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_target) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'sromik_kollyan_unit_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.sromik_kollyan_unit_target,
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.sromik_kollyan_unit_increase
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">যুব ইউনিট</td>
                                <td>
                                    <!-- <input name="jubo_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.jubo_unit_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="jubo_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.jubo_unit_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_increase) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'jubo_unit_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'jubo_unit_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_target) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'jubo_unit_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.jubo_unit_target,
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.jubo_unit_increase
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">মিডিয়া ইউনিট</td>
                                
                                <td>
                                    <!-- <input name="media_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.media_unit_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="media_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.media_unit_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_increase) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'media_unit_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'media_unit_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_target) }}
                                        <comment
                                            :table_name="'ward_songothon4_unit_songothons'"
                                            :column_name="'media_unit_target'"
                                        />
                                    </div>
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.media_unit_target,
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.media_unit_increase
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">সর্বমোট ইউনিট সংখ্যা</td>
                                <td>
                                    {{
                                        formatBangla(
                                            Number(
                                                previous_present?.general_unit_men_previous ??
                                                    0
                                            ) +
                                                Number(
                                                    previous_present?.general_unit_women_previous ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.ulama_unit_previous ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.peshajibi_unit_previous ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.sromik_kollyan_unit_previous ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.jubo_unit_previous ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.media_unit_previous ??
                                                        0
                                                ) || ""
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            Number(
                                                previous_present?.general_unit_men_present ??
                                                    0
                                            ) +
                                                Number(
                                                    previous_present?.general_unit_women_present ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.ulama_unit_present ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.peshajibi_unit_present ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.sromik_kollyan_unit_present ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.jubo_unit_present ??
                                                        0
                                                ) +
                                                Number(
                                                    previous_present?.media_unit_present ??
                                                        0
                                                ) || ""
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            Number(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.general_unit_men_increase ??
                                                    0
                                            ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.general_unit_women_increase ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.ulama_unit_increase ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.peshajibi_unit_increase ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.sromik_kollyan_unit_increase ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.jubo_unit_increase ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.media_unit_increase ??
                                                        0
                                                ) || ""
                                        )
                                    }}
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            Number(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.general_unit_men_gatti ??
                                                    0
                                            ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.general_unit_women_gatti ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.ulama_unit_gatti ?? 0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.peshajibi_unit_gatti ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.sromik_kollyan_unit_gatti ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.jubo_unit_gatti ?? 0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.media_unit_gatti ?? 0
                                                ) || ""
                                        )
                                    }}
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            Number(
                                                report_sum_data
                                                    ?.ward_songothon4_unit_songothons
                                                    ?.general_unit_men_target ??
                                                    0
                                            ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.general_unit_women_target ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.ulama_unit_target ?? 0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.peshajibi_unit_target ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.sromik_kollyan_unit_target ??
                                                        0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.jubo_unit_target ?? 0
                                                ) +
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.media_unit_target ?? 0
                                                ) || ""
                                        )
                                    }}
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                // First argument: Target values summed
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.general_unit_men_target ??
                                                        0
                                                ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.general_unit_women_target ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.ulama_unit_target ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.peshajibi_unit_target ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.sromik_kollyan_unit_target ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.jubo_unit_target ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.media_unit_target ??
                                                            0
                                                    ),
                                                // Second argument: Increase values summed
                                                Number(
                                                    report_sum_data
                                                        ?.ward_songothon4_unit_songothons
                                                        ?.general_unit_men_increase ??
                                                        0
                                                ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.general_unit_women_increase ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.ulama_unit_increase ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.peshajibi_unit_increase ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.sromik_kollyan_unit_increase ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.jubo_unit_increase ??
                                                            0
                                                    ) +
                                                    Number(
                                                        report_sum_data
                                                            ?.ward_songothon4_unit_songothons
                                                            ?.media_unit_increase ??
                                                            0
                                                    )
                                            )
                                        )
                                    }}
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
                                <td>
                                    <!-- <input name="dawati_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_previous)" @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.dawati_unit_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="dawati_unit_present" :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_present)" @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.dawati_unit_present ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_increase) }}
                                        <comment
                                            :table_name="'ward_songothon5_dawat_and_paribarik_units'"
                                            :column_name="'dawati_unit_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon5_dawat_and_paribarik_units'"
                                            :column_name="'dawati_unit_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_target) }}
                                        <comment
                                            :table_name="'ward_songothon5_dawat_and_paribarik_units'"
                                            :column_name="'dawati_unit_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-start">মোট পারিবারিক ইউনিট</td>
                                <td>
                                    <!-- <input name="paribarik_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_previous)" @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(
                                            previous_present?.paribarik_unit_previous ??
                                                ""
                                        )
                                    }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="paribarik_unit_present" :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_present)" @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(
                                                previous_present?.paribarik_unit_present ??
                                                    ""
                                            )
                                        }}
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_increase) }}
                                        <comment
                                            :table_name="'ward_songothon5_dawat_and_paribarik_units'"
                                            :column_name="'paribarik_unit_increase'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_gatti) }}
                                        <comment
                                            :table_name="'ward_songothon5_dawat_and_paribarik_units'"
                                            :column_name="'paribarik_unit_gatti'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_target) }}
                                        <comment
                                            :table_name="'ward_songothon5_dawat_and_paribarik_units'"
                                            :column_name="'paribarik_unit_target'"
                                        />
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <p class="font-13">
                        *দাওয়াতি ইউনিট ও পারিবারিক ইউনিটের সংখ্যা মোট সাংগঠনিক
                        ইউনিটে অন্তর্ভুক্ত হবে না।
                    </p>
                </div>
                <div class="bidai_chatro mb-3">
                    <h4 class="fs-6">
                        ৬. বিদায়ী ছাত্র-ছাত্রী জনশক্তির সংগঠনে যোগদান
                    </h4>
                    <table class="text-center mb-1 table_layout_fixed">
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
                                <td class="text-start px-2">
                                    যোগদানকৃত ছাত্র-ছাত্রীর সংখ্যা
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_man_member) }}
                                            <comment
                                                :table_name="'ward_songothon6_bidayi_students_connects'"
                                                :column_name="'Joined_student_man_member'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_women_member) }}
                                            <comment
                                                :table_name="'ward_songothon6_bidayi_students_connects'"
                                                :column_name="'Joined_student_women_member'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_man_associate) }}
                                            <comment
                                                :table_name="'ward_songothon6_bidayi_students_connects'"
                                                :column_name="'Joined_student_man_associate'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_women_associate) }}
                                            <comment
                                                :table_name="'ward_songothon6_bidayi_students_connects'"
                                                :column_name="'Joined_student_women_associate'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_man_worker) }}
                                            <comment
                                                :table_name="'ward_songothon6_bidayi_students_connects'"
                                                :column_name="'Joined_student_man_worker'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_women_worker) }}
                                            <comment
                                                :table_name="'ward_songothon6_bidayi_students_connects'"
                                                :column_name="'Joined_student_women_worker'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="sofor mb-2">
                    <div class="d-flex align-items-start gap-2">
                        <div class="left w-50">
                            <h4 class="fs-6 fw-bold">৭. সফর:</h4>
                            <table class="text-center mb-1">
                                <thead>
                                    <tr>
                                        <th class="">সফরের ধরন</th>
                                        <th class="width-40">মোট সংখ্যা</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-start px-2">
                                            ঊর্ধ্বতন দায়িত্বশীলদের সফর
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_songothon7_sofors?.upper_leader_sofor) }}
                                                <comment
                                                    :table_name="'ward_songothon7_sofors'"
                                                    :column_name="'upper_leader_sofor'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">
                                            ওয়ার্ড আমীর/সভাপতির সফর
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_songothon7_sofors?.ward_sovapotir_sofor) }}
                                                <comment
                                                    :table_name="'ward_songothon7_sofors'"
                                                    :column_name="'ward_sovapotir_sofor'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">
                                            ওয়ার্ড শূরা/কর্মপরিষদ/টিম সদস্যদের সফর
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_songothon7_sofors?.word_sura_sodosso_sofor) }}
                                                <comment
                                                    :table_name="'ward_songothon7_sofors'"
                                                    :column_name="'word_sura_sodosso_sofor'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                        <div class="right w-50">
                            <h4 class="fs-6 fw-bold">৮. ইয়ানত দাতা:</h4>
                            <table class="text-center mb-1">
                                <thead>
                                    <tr>
                                        <th class="">নতুন ইয়ানত দাতা</th>
                                        <th class="width-35">মোট সংখ্যা</th>
                                        <th class="width-35">অর্থের পরিমাণ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-start px-2">
                                            সহযোগী সদস্য
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_songothon8_iyanot_data?.associate_member_total) }}
                                                <comment
                                                    :table_name="'ward_songothon8_iyanot_data'"
                                                    :column_name="'associate_member_total'"
                                                />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_songothon8_iyanot_data?.associate_member_total_iyanot_amounts) }}
                                                <comment
                                                    :table_name="'ward_songothon8_iyanot_data'"
                                                    :column_name="'associate_member_total_iyanot_amounts'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">সুধী</td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_songothon8_iyanot_data?.sudhi_total) }}
                                                <comment
                                                    :table_name="'ward_songothon8_iyanot_data'"
                                                    :column_name="'sudhi_total'"
                                                />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_songothon8_iyanot_data?.sudi_total_iyanot_amounts) }}
                                                <comment
                                                    :table_name="'ward_songothon8_iyanot_data'"
                                                    :column_name="'sudi_total_iyanot_amounts'"
                                                />
                                            </div>
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
                                <td class="text-start">
                                    ওয়ার্ড শূরা/কর্মপরিষদ / টিম বৈঠক
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.word_sura_boithok_total) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'word_sura_boithok_total'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.kormoporishod_boithok_total) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'kormoporishod_boithok_total'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.team_boithok_total) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'team_boithok_total'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.word_sura_boithok_target) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'word_sura_boithok_target'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.kormoporishod_boithok_target) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'kormoporishod_boithok_target'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.team_boithok_target) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'team_boithok_target'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.word_sura_boithok) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'word_sura_boithok_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.kormoporishod_boithok) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'kormoporishod_boithok_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.team_boithok) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'team_boithok_uposthiti'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start">২.</td>
                                <td class="text-start">ওয়ার্ড বৈঠক</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.word_boithok_total) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'word_boithok_total'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.word_boithok_target) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'word_boithok_target'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.word_boithok) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'word_boithok_uposthiti'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start">৩.</td>
                                <td class="text-start">মাসিক সদস্য (রুকন) বৈঠক</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.masik_sodosso_boithok_total) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'masik_sodosso_boithok_total'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.masik_sodosso_boithok_target) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'masik_sodosso_boithok_target'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.masik_sodosso_boithok) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'masik_sodosso_boithok_uposthiti'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start">৪.</td>
                                <td class="text-start">ইউনিটে মোট কর্মী বৈঠক</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.unit_kormi_boithok_total) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'unit_kormi_boithok_total'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.unit_kormi_boithok_target) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'unit_kormi_boithok_target'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.unit_kormi_boithok) }}
                                        <comment
                                            :table_name="'ward_songothon9_sangothonik_boithoks'"
                                            :column_name="'unit_kormi_boithok_uposthiti'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start">৫.</td>
                                <td class="text-start">উলামা/ যুবক/শ্রমিকদের বৈঠক/সমাবেশ</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.ulama_somabesh_total) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'ulama_somabesh_total'"
                                            />
                                        </div>/
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.jubok_somabesh_total) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'jubok_somabesh_total'"
                                            />
                                        </div>/
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.sromik_somabesh_total) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'sromik_somabesh_total'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.ulama_somabesh_target) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'ulama_somabesh_target'"
                                            />
                                        </div>/
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.jubok_somabesh_target) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'jubok_somabesh_target'"
                                            />
                                        </div>/
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.sromik_somabesh_target) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'sromik_somabesh_target'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.ulama_somabesh) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'ulama_somabesh_uposthiti'"
                                            />
                                        </div>/
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.jubok_somabesh) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'jubok_somabesh_uposthiti'"
                                            />
                                        </div>/
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.sromik_somabesh) }}
                                            <comment
                                                :table_name="'ward_songothon9_sangothonik_boithoks'"
                                                :column_name="'sromik_somabesh_uposthiti'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="proshikkhon mb-2">
                <h1 class="font-18 fw-bold">প্ৰশিক্ষণ :</h1>
                <div class="tarbiat mb-3">
                    <h4 class="fs-6 fw-bold">
                        ক) তারবিয়াত (নৈতিক শিক্ষা ও সাংগঠনিক প্রশিক্ষণ):
                    </h4>
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
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.unit_tarbiati_boithok) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'unit_tarbiati_boithok'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.unit_tarbiati_boithok_target) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'unit_tarbiati_boithok_target'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.unit_tarbiati_boithok_uposthiti) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'unit_tarbiati_boithok_uposthiti'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>২.</td>
                                <td class="text-start">ওয়ার্ডভিত্তিক কর্মী শিক্ষা বৈঠক</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.ward_kormi_sikkha_boithok) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'ward_kormi_sikkha_boithok'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.ward_kormi_sikkha_boithok_target) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'ward_kormi_sikkha_boithok_target'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.ward_kormi_sikkha_boithok_uposthiti) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'ward_kormi_sikkha_boithok_uposthiti'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>৩.</td>
                                <td class="text-start">
                                    ঊর্ধ্বতন সংগঠনের শিক্ষাশিবির/শিক্ষা বৈঠকে
                                    অংশগ্রহণকারী
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_shibir) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'urdhotono_sikkha_shibir'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_boithok) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'urdhotono_sikkha_boithok'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_shibir_target) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'urdhotono_sikkha_shibir_target'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_boithok_target) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'urdhotono_sikkha_boithok_target'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_shibir_uposthiti) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'urdhotono_sikkha_shibir_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_boithok_uposthiti) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'urdhotono_sikkha_boithok_uposthiti'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>৪.</td>
                                <td class="text-start">
                                    গণশিক্ষা বৈঠক/ গণ নৈশ ইবাদত
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.gono_sikkha_boithok) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'gono_sikkha_boithok'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.gono_noisho_ibadot) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'gono_noisho_ibadot'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.gono_sikkha_boithok_target) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'gono_sikkha_boithok_target'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.gono_noisho_ibadot_target) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'gono_noisho_ibadot_target'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.gono_sikkha_boithok_uposthiti) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'gono_sikkha_boithok_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.gono_noisho_ibadot_uposthiti) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'gono_noisho_ibadot_uposthiti'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>৫.</td>
                                <td class="text-start">আলোচনা চক্র</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="me-2 text-nowrap"
                                            >গ্রুপ সংখ্যা:</span
                                        >
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.alochona_chokro_group) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'alochona_chokro_group'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="me-2 text-nowrap"
                                            >অধিবেশন সংখ্যা:</span
                                        >
                                        <div class="parent_popup flex-grow-1 text-center">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.alochona_chokro_program) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'alochona_chokro_program'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup text-center">
                                        {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.alochona_chokro) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'alochona_chokro_uposthiti'"
                                        />
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>৬.</td>
                                <td class="text-start">
                                    দারস্/সহীহ কুরআন তিলাওয়াত অনুশীলন
                                </td>
                                <td class="text-start">
                                <div class="d-flex">
                                    <span class="me-2 text-nowrap">প্রোগ্রাম সংখ্যা :</span>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.darsul_quran_program) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'darsul_quran_program'"
                                        />
                                    </div>
                                    /
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.sohih_tilawat_program) }}
                                        <comment
                                            :table_name="'ward_proshikkhon1_tarbiats'"
                                            :column_name="'sohih_tilawat_program'"
                                        />
                                    </div>
                                </div>
                            </td>

                                <td></td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.darsul_quran) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'darsul_quran_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.sohih_tilawat) }}
                                            <comment
                                                :table_name="'ward_proshikkhon1_tarbiats'"
                                                :column_name="'sohih_tilawat_uposthiti'"
                                            />
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="hrd">
                    <h4 class="fs-6 fw-bold">
                        খ) মানব সম্পদ উন্নয়ন কোর্সসমূহ :
                    </h4>
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
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.dawah_uposthiti) }}
                                            <comment 
                                                :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                                :column_name="'dawah_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.shomajkormo_uposthiti) }}
                                            <comment 
                                                :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                                :column_name="'shomajkormo_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.media_uposthiti) }}
                                            <comment 
                                                :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                                :column_name="'media_uposthiti'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    আইসিটি/ অফিস/ ফিন্যান্সিয়াল ম্যানেজমেন্ট/ ইংরেজি ভাষা/ আরবি ভাষা
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.ict_uposthiti) }}
                                            <comment 
                                                :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                                :column_name="'ict_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.office_uposthiti) }}
                                            <comment 
                                                :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                                :column_name="'office_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.financial_management_uposthiti) }}
                                            <comment 
                                                :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                                :column_name="'financial_management_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.english_language_uposthiti) }}
                                            <comment 
                                                :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                                :column_name="'english_language_uposthiti'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.arabic_language_uposthiti) }}
                                            <comment 
                                                :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                                :column_name="'arabic_language_uposthiti'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ*
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.trade_oriented_technical_training_uposthiti) }}
                                        <comment 
                                            :table_name="'ward_proshikkhon2_manob_shompod_unnoyons'" 
                                            :column_name="'trade_oriented_technical_training_uposthiti'"
                                        />
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <p class="font-14">
                        * ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ কোর্সের আওতায় ফার্সিং
                        (পোল্ট্রি, ফিশারিজ, ডেইরি), সেলাই/এমব্রয়ডারী মেশিন
                        অপারেটর, ড্রাইভিং কাম অটোমেকানিক, রন্ধন শিল্প,
                        হর্টিকালচার/নার্সারি, তাঁত শিল্প/বুটিকস, হস্ত শিল্প,
                        ইলেক্ট্রিক্যাল এন্ড ইলেক্ট্রনিক্স সার্ভিসিং, সিভিল
                        কন্সট্রাকশন/প্লাম্বারিং, আমিনশীপ ইত্যাদি কোর্সসমূহের
                        বাস্তবায়ন রিপোর্টের যোগফল এখানে বসাতে হবে।
                    </p>
                </div>
            </div>

            <div class="shomajsheba mt-5">
                <h1 class="font-18 fw-bold">সমাজ সংস্কার ও সমাজসেবা :</h1>
                <div class="personal_shamajik_kaj mb-2">
                    <h4 class="fs-6 fw-bold">
                        ১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:
                    </h4>
                    <table class="mb-1">
                        <tr>
                            <td class="text-start px-2">
                                মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন
                            </td>
                            <td class="width-20">
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_shomajsheba1_personal_social_works?.how_many_people_did) }}
                                    <comment 
                                        :table_name="'ward_shomajsheba1_personal_social_works'" 
                                        :column_name="'how_many_people_did'"
                                    />
                                </div>
                            </td>
                            <td class="text-start px-2 w-25">
                                মোট সেবাপ্রাপ্ত সংখ্যা
                            </td>
                            <td class="width-20">
                                <div class="parent_popup">
                                    {{ formatBangla(report_sum_data?.ward_shomajsheba1_personal_social_works?.service_received_total) }}
                                    <comment 
                                        :table_name="'ward_shomajsheba1_personal_social_works'" 
                                        :column_name="'service_received_total'"
                                    />
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="samostik_shamajik_kaj pt-3 mb-2">
                    <h4 class="fs-6 fw-bold">
                        ২. সামষ্টিক/সেবা টিমের মাধ্যমে সামাজিক কাজ (প্রযোজ্য
                        ক্ষেত্রে):
                    </h4>
                    <table class="mb-1">
                        <tbody>
                            <tr>
                                <td class="w-25 text-start px-2">সাধারণ সেবা টিম সংখ্যা</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.number_of_general_service_teams) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'number_of_general_service_teams'"
                                        />
                                    </div>
                                </td>
                                <td class="w-25 text-start px-2">টেকনিক্যাল সেবা টিম সংখ্যা</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.number_of_technical_service_teams) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'number_of_technical_service_teams'"
                                        />
                                    </div>
                                </td>
                                <td class="w-25 text-start px-2">স্বেচ্ছাসেবক টিম সংখ্যা</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.number_of_volunteer_teams) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'number_of_volunteer_teams'"
                                        />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="text-center mb-1">
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
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.minor_unnoyonmulok_kaj) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'minor_unnoyonmulok_kaj'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start px-2">টেকনিক্যাল সেবা প্রদান (কতজন / কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.technical_services_prodan_kotojonke) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'technical_services_prodan_kotojonke'"
                                            />
                                        </div>/
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.online_services_prodan_kotojonke) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'online_services_prodan_kotojonke'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2 font-13">
                                    সামাজিক অনুষ্ঠানে অংশগ্রহণ/সহায়তা প্রদান (সংখ্যা / কতজনকে)
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.shamajik_onusthane_ongshogrohon) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'shamajik_onusthane_ongshogrohon'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.shamajik_onusthane_shohayota_prodan) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'shamajik_onusthane_shohayota_prodan'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    অনলাইনের মাধ্যমে সেবা প্রদান (কতজনকে)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.online_services_prodan_kotojonke) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'online_services_prodan_kotojonke'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    সামাজিক বিরোধ মীমাংসা
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.shamajik_birodh_mimangsha) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'shamajik_birodh_mimangsha'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    বৃক্ষরোপণ (কতটি)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.brikkho_ropon) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'brikkho_ropon'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    মানবিক সহায়তা প্রদান (কতজনকে)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.manobik_shohayota_prodan) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'manobik_shohayota_prodan'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    জনসচেতনতামূলক প্রোগ্রাম (কতটি)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.public_awareness_programs) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'public_awareness_programs'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    কর্জে হাসানা প্রদান (কতজনকে )
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.korje_hasana_prodan) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'korje_hasana_prodan'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    ত্রাণ বিতরণ (কতজনকে)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.tran_bitoron) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'tran_bitoron'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    পরিষ্কার-পরিচ্ছন্নতা/মশক নিধন অভিযান
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.porishkar_poricchonnota_ovijan) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'porishkar_poricchonnota_ovijan'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.moshok_nidhon_ovijan) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'moshok_nidhon_ovijan'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    ভিন্নধর্মাবলম্বীদের সেবা প্রদান (কতজন/কতজনকে)
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.vinnodhormabolombider_service_prodan_kotojon) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'vinnodhormabolombider_service_prodan_kotojon'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.vinnodhormabolombider_service_prodan_kotojonke) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'vinnodhormabolombider_service_prodan_kotojonke'"
                                            />
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.rogir_poricorja) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'rogir_poricorja'"
                                            />

                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.medical_shohayota_prodan) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'medical_shohayota_prodan'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    মাইয়্যেতের গোসল (কতজনকে)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.mayeter_gosol_kotojonke) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'mayeter_gosol_kotojonke'"
                                        />

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.voluntarily_blood_donation_kotojon) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'voluntarily_blood_donation_kotojon'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.voluntarily_blood_donation_kotojonke) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'voluntarily_blood_donation_kotojonke'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    জানাযায় অংশগ্রহণ
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.janajay_ongshogrohon) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'janajay_ongshogrohon'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    নবজাতককে গিফ্‌ট প্রদান (কতজনকে)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.nobojatokke_gift_prodan) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'nobojatokke_gift_prodan'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start px-2">
                                    স্বল্প পুঁজিতে কর্মসংস্থানের সহায়তা (কতজনকে)
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.low_capital_employment_kotojonke) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'low_capital_employment_kotojonke'"
                                        />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-start px-2">
                                    ভ্রাম্যমান স্কুল/মক্তব চালু
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.vrammoman_school_calu) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'vrammoman_school_calu'"
                                            />
                                        </div>/
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.vrammoman_moktob_calu) }}
                                            <comment 
                                                :table_name="'ward_shomajsheba2_group_social_works'" 
                                                :column_name="'vrammoman_moktob_calu'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">অন্যান্য......</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.others) }}
                                        <comment 
                                            :table_name="'ward_shomajsheba2_group_social_works'" 
                                            :column_name="'others'"
                                        />
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="shastho_poribar_kollan mb-2">
                    <div class="d-flex align-items-start gap-2">
                        <div class="left w-50">
                            <h4 class="fs-6 fw-bold">
                                ৩. স্বাস্থ্য ও পরিবার কল্যাণমূলক কাজ
                            </h4>
                            <table class="text-center mb-1">
                                <tbody>
                                    <tr>
                                        <td class="text-start px-2 width-70">
                                            স্বাস্থ্যকর্মী প্রশিক্ষণ প্রোগ্রামে
                                            মোট অংশগ্রহণকারীর সংখ্যা
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_shomajsheba3_health_and_family_kollans?.health_worker_training_programs_attendance) }}
                                                <comment 
                                                    :table_name="'ward_shomajsheba3_health_and_family_kollans'" 
                                                    :column_name="'health_worker_training_programs_attendance'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">
                                            কতজন স্বাস্থ্যসেবা কাজে অংশগ্রহণ
                                            করেছেন
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_shomajsheba3_health_and_family_kollans?.participated_in_health_care_work) }}
                                                <comment 
                                                    :table_name="'ward_shomajsheba3_health_and_family_kollans'" 
                                                    :column_name="'participated_in_health_care_work'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">
                                            সেবাপ্রাপ্ত সংখ্যা
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_shomajsheba3_health_and_family_kollans?.served_people) }}
                                                <comment 
                                                    :table_name="'ward_shomajsheba3_health_and_family_kollans'" 
                                                    :column_name="'served_people'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                        <div class="right w-50">
                            <h4 class="fs-6 fw-bold">
                                ৪. প্রাতিষ্ঠানিক উদ্যোগে সামাজিক কাজ:
                            </h4>
                            <table class="text-center mb-1">
                                <tbody>
                                    <tr>
                                        <td class="text-start px-2 width-70">
                                            কতটি সামাজিক প্রতিষ্ঠান রয়েছে
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_shomajsheba4_institutional_social_works?.shamajik_protishthan_kototi) }}
                                                <comment 
                                                    :table_name="'ward_shomajsheba4_institutional_social_works'" 
                                                    :column_name="'shamajik_protishthan_kototi'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">
                                            কতটি প্রতিষ্ঠানে সামাজিক কাজ হয়েছে
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_shomajsheba4_institutional_social_works?.shamajik_protishthan_kototite_kaj_hoyeche) }}
                                                <comment 
                                                    :table_name="'ward_shomajsheba4_institutional_social_works'" 
                                                    :column_name="'shamajik_protishthan_kototite_kaj_hoyeche'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2 font-13">
                                            কতটি নতুন সামাজিক প্রতিষ্ঠান চালু
                                            করা হয়েছে (প্রযোজ্য ক্ষেত্রে)
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_shomajsheba4_institutional_social_works?.new_shamajik_protishthan) }}
                                                <comment 
                                                    :table_name="'ward_shomajsheba4_institutional_social_works'" 
                                                    :column_name="'new_shamajik_protishthan'"
                                                />
                                            </div>
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
                    <h4 class="fs-6 fw-bold">
                        ১. রাজনৈতিক ও প্রশাসনিক যোগাযোগ
                    </h4>
                    <table class="text-center mb-1">
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
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_rastrio1_political_communications?.rajnoitik_bekti_jogajog_koreche_kotojon) }}
                                        <comment 
                                            :table_name="'ward_rastrio1_political_communications'" 
                                            :column_name="'rajnoitik_bekti_jogajog_koreche_kotojon'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_rastrio1_political_communications?.rajnoitik_bekti_jogajog_koreche_kotojonke) }}
                                        <comment 
                                            :table_name="'ward_rastrio1_political_communications'" 
                                            :column_name="'rajnoitik_bekti_jogajog_koreche_kotojonke'"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">
                                    প্রশাসনিক ব্যক্তিবর্গ
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_rastrio1_political_communications?.proshoshonik_bekti_jogajog_koreche_kotojon) }}
                                        <comment 
                                            :table_name="'ward_rastrio1_political_communications'" 
                                            :column_name="'proshoshonik_bekti_jogajog_koreche_kotojon'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_rastrio1_political_communications?.proshoshonik_bekti_jogajog_koreche_kotojonke) }}
                                        <comment 
                                            :table_name="'ward_rastrio1_political_communications'" 
                                            :column_name="'proshoshonik_bekti_jogajog_koreche_kotojonke'"
                                        />
                                    </div>
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
                                        <th class="width-55">
                                            কর্মসূচির বিবরণ
                                        </th>
                                        <th>মোট সংখ্যা</th>
                                        <th>গড় উপস্থিতি</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-start px-2">
                                            কেন্দ্র ঘোষিত রাজনৈতিক কর্মসূচি পালন
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.centrally_announced_political_program) }}
                                                <comment 
                                                    :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                    :column_name="'centrally_announced_political_program'"
                                                />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.centrally_announced_political_program) }}
                                                <comment 
                                                    :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                    :column_name="'centrally_announced_political_program_attend'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2 font-13">
                                            স্থানীয়ভাবে ঘোষিত কর্মসূচি : জনসভা/সমাবেশ/মিছিল
                                        </td>
                                        <td class="font-13">
                                            <div class="d-flex">
                                                <div class="parent_popup">
                                                    {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_jonoshova) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'locally_announced_jonoshova'"
                                                    />
                                                </div>/
                                                <div class="parent_popup">
                                                    {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_shomabesh) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'locally_announced_shomabesh'"
                                                    />
                                                </div>/
                                                <div class="parent_popup">
                                                    {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_michil) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'locally_announced_michil'"
                                                    />
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="parent_popup">
                                                    {{ formatBangla(average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_jonoshova) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'locally_announced_jonoshova_attend'"
                                                    />
                                                </div>/
                                                <div class="parent_popup">
                                                    {{ formatBangla(average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_shomabesh) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'locally_announced_shomabesh_attend'"
                                                    />
                                                </div>/
                                                <div class="parent_popup">
                                                    {{ formatBangla(average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_michil) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'locally_announced_michil_attend'"
                                                    />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                        <div class="right width-45">
                            <table class="text-center mb-1">
                                <thead>
                                    <tr>
                                        <th class="width-65">
                                            কর্মসূচির বিবরণ
                                        </th>
                                        <th>মোট সংখ্যা</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-start px-2 font-14">
                                            পোস্টার/লিফলেট/বুকলেট/স্মারকলিপি বিতরণ
                                        </td>
                                        <td class="font-13">
                                            <div class="d-flex">
                                                <div class="parent_popup">
                                                    {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.poster_bitoron) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'poster_bitoron'"
                                                    />
                                                </div> /
                                                <div class="parent_popup">
                                                    {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.leaflet_bitoron) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'leaflet_bitoron'"
                                                    />
                                                </div> /
                                                <div class="parent_popup">
                                                    {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.booklet_bitoron) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'booklet_bitoron'"
                                                    />
                                                </div> /
                                                <div class="parent_popup">
                                                    {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.sharoklipi_bitoron) }}
                                                    <comment 
                                                        :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                        :column_name="'sharoklipi_bitoron'"
                                                    />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">
                                            অন্যান্য
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.others) }}
                                                <comment 
                                                    :table_name="'ward_rastrio2_kormoshuchi_bastobayons'" 
                                                    :column_name="'others'"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="dibosh">
                    <h4 class="fs-6 fw-bold">
                        ৩. জাতীয় ও আন্তর্জাতিক দিবস পালন:
                    </h4>
                    <table class="text-center mb-1">
                        <thead>
                            <tr>
                                <th class="width-20">দিবসসমূহ</th>
                                <th>মোট প্রোগ্রাম সংখ্যা</th>
                                <th>গড় উপস্থিতি</th>
                                <th class="width-20">দিবসসমূহ</th>
                                <th>মোট প্রোগ্রাম সংখ্যা</th>
                                <th>গড় উপস্থিতি</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">স্বাধীনতা ও জাতীয় দিবস</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_rastrio3_dibosh_palons?.shadhinota_o_jatio_dibosh_total_programs) }}
                                        <comment 
                                            :table_name="'ward_rastrio3_dibosh_palons'" 
                                            :column_name="'shadhinota_o_jatio_dibosh_total_programs'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_rastrio3_dibosh_palons?.shadhinota_o_jatio_dibosh) }}
                                        <comment 
                                            :table_name="'ward_rastrio3_dibosh_palons'" 
                                            :column_name="'shadhinota_o_jatio_dibosh_attend'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start">আন্তর্জাতিক মাতৃভাষা দিবস</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_rastrio3_dibosh_palons?.mattrivasha_dibosh_total_programs) }}
                                        <comment 
                                            :table_name="'ward_rastrio3_dibosh_palons'" 
                                            :column_name="'mattrivasha_dibosh_total_programs'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_rastrio3_dibosh_palons?.mattrivasha_dibosh) }}
                                        <comment 
                                            :table_name="'ward_rastrio3_dibosh_palons'" 
                                            :column_name="'mattrivasha_dibosh_attend'"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">বিজয় দিবস</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_rastrio3_dibosh_palons?.bijoy_dibosh_total_programs) }}
                                        <comment 
                                            :table_name="'ward_rastrio3_dibosh_palons'" 
                                            :column_name="'bijoy_dibosh_total_programs'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_rastrio3_dibosh_palons?.bijoy_dibosh) }}
                                        <comment 
                                            :table_name="'ward_rastrio3_dibosh_palons'" 
                                            :column_name="'bijoy_dibosh_attend'"
                                        />
                                    </div>
                                </td>
                                <td class="text-start">অন্যান্য</td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(report_sum_data?.ward_rastrio3_dibosh_palons?.others_total_programs) }}
                                        <comment 
                                            :table_name="'ward_rastrio3_dibosh_palons'" 
                                            :column_name="'others_total_programs'"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(average_uposthiti?.ward_rastrio3_dibosh_palons?.others) }}
                                        <comment 
                                            :table_name="'ward_rastrio3_dibosh_palons'" 
                                            :column_name="'others_attend'"
                                        />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="nirbachon">
                    <h4 class="fs-6 fw-bold">
                        ৪. জাতীয় ও স্থানীয় নির্বাচনভিত্তিক কার্যক্রম:
                    </h4>
                    <table class="text-center mb-1">
                        <thead>
                            <tr>
                                <th class="w-25">নির্বাচনের ধরন</th>
                                <th>মোট প্রার্থী সংখ্যা</th>
                                <th>নির্বাচিত সংখ্যা</th>
                                <th>দ্বিতীয় অবস্থান</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">
                                    কাউন্সিলর/মেম্বার
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.councilor_candidate) }}
                                            <comment 
                                                :table_name="'ward_rastrio4_election_activities'" 
                                                :column_name="'councilor_candidate'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.member_candidate) }}
                                            <comment 
                                                :table_name="'ward_rastrio4_election_activities'" 
                                                :column_name="'member_candidate'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.councilor_candidate_elected) }}
                                            <comment 
                                                :table_name="'ward_rastrio4_election_activities'" 
                                                :column_name="'councilor_candidate_elected'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.member_candidate_elected) }}
                                            <comment 
                                                :table_name="'ward_rastrio4_election_activities'" 
                                                :column_name="'member_candidate_elected'"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.councilor_candidate_second_position) }}
                                            <comment 
                                                :table_name="'ward_rastrio4_election_activities'" 
                                                :column_name="'councilor_candidate_second_position'"
                                            />
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.member_candidate_second_position) }}
                                            <comment 
                                                :table_name="'ward_rastrio4_election_activities'" 
                                                :column_name="'member_candidate_second_position'"
                                            />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="d-flex align-items-start gap-2">
                        <table class="text-center mb-2 width-60">
                            <thead>
                                <tr>
                                    <th class="width-45">
                                        প্রস্তুতিমূলক কার্যক্রমের ধরন
                                    </th>
                                    <th>সংখ্যা</th>
                                    <th>বৃদ্ধি</th>
                                    <th>টার্গেট</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start">
                                        মোট ভোট কেন্দ্র (জাতীয়/স্থানীয়)
                                    </td>
                                    <td>
                                        <div>
                                            <span>{{
                                                formatBangla(
                                                    previous_present.national_vote_kendro_present
                                                )
                                            }}</span
                                            >/
                                            <span>{{
                                                formatBangla(
                                                    previous_present.local_vote_kendro_present
                                                )
                                            }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.national_vote_kendro_increase) }}
                                                <comment 
                                                    :table_name="'ward_rastrio4_election_activities'" 
                                                    :column_name="'national_vote_kendro_increase'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.local_vote_kendro_increase) }}
                                                <comment 
                                                    :table_name="'ward_rastrio4_election_activities'" 
                                                    :column_name="'local_vote_kendro_increase'"
                                                />
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.national_vote_kendro_target) }}
                                                <comment 
                                                    :table_name="'ward_rastrio4_election_activities'" 
                                                    :column_name="'national_vote_kendro_target'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.local_vote_kendro_target) }}
                                                <comment 
                                                    :table_name="'ward_rastrio4_election_activities'" 
                                                    :column_name="'local_vote_kendro_target'"
                                                />
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-start">
                                        ভোট কেন্দ্র কমিটি/কেন্দ্র/ বুথভিত্তিক
                                        ইউনিট
                                    </td>
                                    <td>
                                        <div>
                                            <span>{{
                                                formatBangla(
                                                    previous_present.vote_kendro_committee_present
                                                )
                                            }}</span
                                            >/
                                            <span>{{
                                                formatBangla(
                                                    previous_present.vote_kendro_vittik_unit_present
                                                )
                                            }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_committee_increase) }}
                                                <comment 
                                                    :table_name="'ward_rastrio4_election_activities'" 
                                                    :column_name="'vote_kendro_committee_increase'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_vittik_unit_increase) }}
                                                <comment 
                                                    :table_name="'ward_rastrio4_election_activities'" 
                                                    :column_name="'vote_kendro_vittik_unit_increase'"
                                                />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_committee_target) }}
                                                <comment 
                                                    :table_name="'ward_rastrio4_election_activities'" 
                                                    :column_name="'vote_kendro_committee_target'"
                                                />
                                            </div>
                                            /
                                            <div class="parent_popup">
                                                {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_vittik_unit_target) }}
                                                <comment 
                                                    :table_name="'ward_rastrio4_election_activities'" 
                                                    :column_name="'vote_kendro_vittik_unit_target'"
                                                />
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <table class="text-center w-25">
                            <thead>
                                <tr>
                                    <th>
                                        নির্বাচন পরিচালনা কমিটির বৈঠক সংখ্যা
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <td>{{bangla($rastrio4->election_management_committee_meeting?? "")}}</td> -->
                                    <td>
                                        <div class="parent_popup">
                                            {{ formatBangla(report_sum_data?.ward_rastrio4_election_activities?.election_management_committee_meeting) }}
                                            <comment 
                                                :table_name="'ward_rastrio4_election_activities'" 
                                                :column_name="'election_management_committee_meeting'"
                                            />
                                        </div>
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
                <table class="text-center mb-1 table_layout_fixed">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="2">
                                <div class="parent_popup">
                                    আয়ের বিবরণ
                                    <comment
                                        :table_name="'income_table'"
                                        :column_name="'income'"
                                    />
                                </div>
                            </th>
                            <th class="text-center" colspan="2">
                                <div class="parent_popup">
                                    জমার পরিমাণ
                                    <comment
                                        :table_name="'expense_table'"
                                        :column_name="'expense'"
                                    />
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        <tr
                                            v-for="(
                                                income_category, index
                                            ) in income_report?.category_wise_data"
                                            :key="index"
                                        >
                                            <td
                                                class="text-start px-2 w-50 border_bottom"
                                            >
                                                {{
                                                    income_category.category_name
                                                }}
                                            </td>
                                            <td class="border_left_bottom">
                                                <input
                                                    name="bm_entry"
                                                    :value="
                                                        formatBangla(
                                                            income_category.amount
                                                        )
                                                    "
                                                    @change="
                                                        income_store(
                                                            income_category.category_id,
                                                            $event.target.value
                                                        )
                                                    "
                                                    type="text"
                                                    class="bg-input w-100 text-center"
                                                />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        <tr
                                            v-for="(
                                                expense_category, index
                                            ) in expense_report?.category_wise_data"
                                            :key="index"
                                        >
                                            <td
                                                class="text-start px-2 w-50 border_bottom"
                                            >
                                                {{
                                                    expense_category.category_name
                                                }}
                                            </td>
                                            <td class="border_left_bottom">
                                                <input
                                                    name="bm_entry"
                                                    :value="
                                                        formatBangla(
                                                            expense_category.amount
                                                        )
                                                    "
                                                    @change="
                                                        expense_store(
                                                            expense_category.category_id,
                                                            $event.target.value
                                                        )
                                                    "
                                                    type="text"
                                                    class="bg-input w-100 text-center"
                                                />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">মোট</td>
                            <td>
                                {{
                                    formatBangla(
                                        parseInt(income_report?.total_amount) ??
                                            ""
                                    )
                                }}
                            </td>
                            <td class="text-end px-2">মোট</td>
                            <td>
                                {{
                                    formatBangla(
                                        parseInt(
                                            expense_report?.total_amount
                                        ) ?? ""
                                    )
                                }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">গত মাসের উদ্বৃত্ত</td>
                            <td>
                                {{
                                    formatBangla(parseInt(total_previous) ?? "")
                                }}
                            </td>
                            <td class="text-end px-2">এ মাসের উদ্বৃত্ত</td>
                            <td>
                                {{
                                    formatBangla(
                                        parseInt(total_current_income) ?? ""
                                    )
                                }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>
                                {{
                                    formatBangla(
                                        parseInt(total_current_income) ?? ""
                                    )
                                }}
                            </td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>
                                {{ formatBangla(parseInt(in_total) ?? "") }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="montobbo">
                <h1 class="fs-6 fw-bold">ওয়ার্ড আমীর/সভাপতির মন্তব্য :</h1>
                <div class="parent_popup">
                    <p>
                        {{
                            report_sum_data?.ward_montobbos?.montobbo ??
                            "মন্তব্য নাই"
                        }}
                    </p>
                    <comment
                        :table_name="'ward_montobbos'"
                        :column_name="'montobbo'"
                    />
                </div>
            </div>
        </section>

        <div class="joma_din text-center mt-3 pb-5">
            <!-- <a href="" class="btn btn-success" @click.prevent="report_joma">রিপোর্ট জমা দিন</a> -->
            <a
                href=""
                class="btn btn-success"
                v-if="joma_status == 'unsubmitted'"
                @click.prevent="report_joma"
                >রিপোর্ট জমা দিন</a
            >
            <a
                href=""
                class="btn btn-success"
                v-else-if="joma_status == 'rejected'"
                @click.prevent="report_joma"
                >রিপোর্ট পুনরায় জমা দিন</a
            >
        </div>
        <a href="" class="print_preview" @click.prevent="print_report()"
            ><i class="fa-solid fa-print"></i
        ></a>
        <router-link :to="{ name: 'Dashboard' }">
            <a href="" class="go_back_to_dashboard"
                ><i class="fa-solid fa-door-open"></i
            ></a>
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
                        <div class="comment_form_container">
                            <form class="mb-2">
                                <div class="mb-2">
                                    <label for="comment" class="form-label">Add Comment</label>
                                    <textarea name="comment" id="comment" class="form-control"
                                        v-model="comment_text_store"></textarea>
                                </div>
                                <a href="#" class="btn btn-success" @click.prevent="comment_set">Add
                                    comment</a>
                            </form>
                        </div>
                        <pre>{{ all_comment_store ? "" : 'No data available' }}</pre> <!-- Debug output -->
                        <div class="all_comment" v-for="(comment, index) in all_comment_store" :key="index">
                            <p> <strong>{{ comment?.user?.full_name }} :- </strong> {{ comment?.comment }}</p>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Popup from "../components/Popup.vue";
import PopupNote from "../components/PopupNote.vue";
import { store as comment_store } from "../stores/CommentStore";
import { store as report_store } from "../stores/ReportStore";
import { mapActions, mapWritableState } from "pinia";
import Comment from "../components/Comment.vue";
import CommentNote from "../components/CommentNote.vue";

export default {
    components: { Popup, PopupNote, Comment ,CommentNote},
    data() {
        return {
            month: "",
            // org_type: {},
            // ward_info: {},
            // thana_info: {},
            // president: {},
            joma_status: null,

            report_header: {},
            report_sum_data: {},
            previous_present: {},
            income_report: {},
            expense_report: {},

            income_category_wise: {},
            total_income: null,

            expense_category_wise: {},
            total_expense: null,

            bm_expense_categories: null,
            bm_income_categories: null,

            bm_cat_wise: null,
            expense_cat_wise: null,

            total_previous: null,
            total_current_income: null,
            in_total: null,

            average_uposthiti: {
                ward_kormosuci_bastobayons: {
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
                ward_songothon9_sangothonik_boithoks: {
                    word_sura_boithok: null,
                    kormoporishod_boithok: null,
                    team_boithok: null,
                    word_boithok: null,
                    masik_sodosso_boithok: null,
                    unit_kormi_boithok: null,
                    ulama_somabesh: null,
                    jubok_somabesh: null,
                    sromik_somabesh: null,
                },
                ward_proshikkhon1_tarbiats: {
                    unit_tarbiati_boithok: null,
                    ward_kormi_sikkha_boithok: null,
                    urdhotono_sikkha_shibir: null,
                    urdhotono_sikkha_boithok: null,
                    gono_sikkha_boithok: null,
                    gono_noisho_ibadot: null,
                    alochona_chokro: null,
                    darsul_quran: null,
                    sohih_tilawat: null,
                },
                ward_rastrio2_kormoshuchi_bastobayons: {
                    centrally_announced_political_program: null,
                    locally_announced_jonoshova: null,
                    locally_announced_shomabesh: null,
                    locally_announced_michil: null,
                },
                ward_rastrio3_dibosh_palons: {
                    shadhinota_o_jatio_dibosh: null,
                    bijoy_dibosh: null,
                    mattrivasha_dibosh: null,
                    others: null,
                },
            },
        };
    },

    created: async function () {

        try {
            await this.uploaded_data()
            this.org_type_store = 'ward';
            this.org_type_id_store = this.report_header?.ward_info?.id || null;
            this.month_year_store = this.month || '';
        } catch (error) {
            console.error('Error during uploaded_data:', error);
        }
    },
    watch: {
        "report_sum_data.ward_kormosuci_bastobayons": function () {
            this.average_data("ward_kormosuci_bastobayons");
        },
        "report_sum_data.ward_songothon9_sangothonik_boithoks": function () {
            this.average_data("ward_songothon9_sangothonik_boithoks");
        },
        "report_sum_data.ward_proshikkhon1_tarbiats": function () {
            this.average_data("ward_proshikkhon1_tarbiats");
        },
        "report_sum_data.ward_rastrio2_kormoshuchi_bastobayons": function () {
            this.average_data("ward_rastrio2_kormoshuchi_bastobayons");
        },
        "report_sum_data.ward_rastrio3_dibosh_palons": function () {
            this.average_data("ward_rastrio3_dibosh_palons");
        },

        total_income: function () {
            console.log(typeof this.total_income);
        },

        report_header: {
            handler() {
                this.update_store();
            },
            deep: true,
        },
        month(newMonth) {
            this.update_store();
        },
        column_name_store: function (new_value) {
            console.log(new_value)
        },
    },
    methods: {
        ...mapActions(comment_store, {
            comment_set: 'comment_set'
        }),
        ...mapActions(report_store, {
            set_ward_report_status: 'set_ward_report_status',
            check_ward_report_status: 'check_ward_report_status',
        }),
        update_store() {
            this.org_type_store = 'ward';
            this.org_type_id_store = this.report_header?.ward_info?.id || null;
            this.month_year_store = this.month || '';
        },

        uploaded_data: async function () {
            console.log("uploaded data from report check");

            const month = this.$route.params.month;
            const ward_id = this.$route.params.ward_id;
            console.log("month from uploaded_data load", month,ward_id);
            let res = await axios.get("/ward/report-check", {
                params: {
                    month: month,
                    ward_id: ward_id,
                },
            });
            console.log("res from ward", res);


            if (res.data.status == "success") {
                console.log("res", res.data.data.end_month);
                (this.month = res.data.data.end_month),
                    (this.report_header = res.data.data.report_header),
                    (this.report_sum_data = res.data.data.report_sum_data),
                    (this.previous_present = res.data.data.previous_present),
                    (this.income_report = res.data.data.income_report),
                    (this.expense_report = res.data.data.expense_report);

                (this.total_previous = res.data.total_previous),
                    (this.total_current_income = res.data.total_current_income),
                    (this.in_total = res.data.in_total);
                console.log("this.previous_present", this.month);
            }

            console.log("wardUpload", this.month);
        },
        average_data: async function ($table_name) {
            const field_mappings = {
                ward_kormosuci_bastobayons: [
                    "unit_masik_sadaron_sova",
                    "dawati_sova",
                    "alochona_sova",
                    "sudhi_somabesh",
                    "siratunnabi_mahfil",
                    "eid_reunion",
                    "dars",
                    "tafsir",
                    "dawati_jonosova",
                    "iftar_mahfil_personal",
                    "iftar_mahfil_samostic",
                    "cha_chakra",
                    "samostic_khawa",
                    "sikkha_sofor",
                    "kirat_protijogita",
                    "hamd_nat_protijogita",
                    "others",
                ],
                ward_songothon9_sangothonik_boithoks: [
                    "word_sura_boithok",
                    "kormoporishod_boithok",
                    "team_boithok",
                    "word_boithok",
                    "masik_sodosso_boithok",
                    "unit_kormi_boithok",
                    "ulama_somabesh",
                    "jubok_somabesh",
                    "sromik_somabesh",
                ],
                ward_proshikkhon1_tarbiats: [
                    "unit_tarbiati_boithok",
                    "ward_kormi_sikkha_boithok",
                    "urdhotono_sikkha_shibir",
                    "urdhotono_sikkha_boithok",
                    "gono_sikkha_boithok",
                    "gono_noisho_ibadot",
                    "alochona_chokro",
                    "darsul_quran",
                    "sohih_tilawat",
                ],
                ward_rastrio2_kormoshuchi_bastobayons: [
                    "centrally_announced_political_program",
                    "locally_announced_jonoshova",
                    "locally_announced_shomabesh",
                    "locally_announced_michil",
                ],
                ward_rastrio3_dibosh_palons: [
                    "shadhinota_o_jatio_dibosh",
                    "bijoy_dibosh",
                    "mattrivasha_dibosh",
                    "others",
                ],
            };

            const attendance_key_suffix = {
                ward_kormosuci_bastobayons: "_uposthiti",
                ward_songothon9_sangothonik_boithoks: "_uposthiti",
                ward_proshikkhon1_tarbiats: "_uposthiti",
                ward_rastrio2_kormoshuchi_bastobayons: "_attend",
                ward_rastrio3_dibosh_palons: "_attend",
            };

            const total_key_suffix = {
                ward_kormosuci_bastobayons: "_total",
                ward_songothon9_sangothonik_boithoks: "_total",
                ward_proshikkhon1_tarbiats: "_total",
                ward_rastrio2_kormoshuchi_bastobayons: "",
                ward_rastrio3_dibosh_palons: "",
            };

            if (
                field_mappings[$table_name] &&
                this.report_sum_data[$table_name]
            ) {
                const fields = field_mappings[$table_name];
                const attendance_suffix = attendance_key_suffix[$table_name];
                const total_suffix = total_key_suffix[$table_name];

                fields.forEach((field) => {
                    const uposthiti_key = `${field}${attendance_suffix}`;
                    const total_key = `${field}${total_suffix}`;
                    this.average_uposthiti[$table_name][field] = Math.round(
                        (this.report_sum_data[$table_name][uposthiti_key] ??
                            0) /
                            (this.report_sum_data[$table_name][total_key] ?? 1)
                    );
                });
            }
        },


        formatBangla(number) {
            // Convert string to number if it is a string
            const num = typeof number === 'string' ? parseFloat(number) : number;

            if (
                number == 0 ||
                number === null ||
                number === undefined ||
                isNaN(number)
            ) {
                return "";
            }
            return number.toLocaleString("bn-BD");
        },
        formatMonth(date) {
            return new Date(date).toLocaleString("bn-BD", { month: "long" });
        },
        formatYear(date) {
            const year = new Date(date).getFullYear();
            // Convert year to Bangla digits without commas
            return year
                .toString()
                .replace(/\d/g, (digit) => "০১২৩৪৫৬৭৮৯"[digit]);
        },
        data_upload(endpoint) {
            console.log("data_upload", this.month);

            const { value, name } = event.target;
            axios
                .post(`/${endpoint}/store-single`, {
                    value,
                    name,
                    month: this.month,
                })
                .then((response) => {
                    // window.toaster("Data uploaded successfully");
                    console.log("Data uploaded successfully");
                    if (
                        [
                            "unit_masik_sadaron_sova",
                            "dawati_sova",
                            "alochona_sova",
                            "sudhi_somabesh",
                            "siratunnabi_mahfil",
                            "eid_reunion",
                            "dars",
                            "tafsir",
                            "dawati_jonosova",
                            "iftar_mahfil_personal",
                            "iftar_mahfil_samostic",
                            "cha_chakra",
                            "samostic_khawa",
                            "sikkha_sofor",
                            "kirat_protijogita",
                            "hamd_nat_protijogita",
                            "others",
                            // average_songothon9
                            "word_sura_boithok_total",
                            "kormoporishod_boithok_total",
                            "team_boithok_total",
                            "word_boithok_total",
                            "masik_sodosso_boithok_total",
                            "unit_kormi_boithok_total",
                            "ulama_somabesh_total",
                            "jubok_somabesh_total",
                            "sromik_somabesh_total",
                            // average_proshikkhon1
                            "unit_tarbiati_boithok",
                            "ward_kormi_sikkha_boithok",
                            "urdhotono_sikkha_shibir",
                            "urdhotono_sikkha_boithok",
                            "gono_sikkha_boithok",
                            "gono_noisho_ibadot",
                            "alochona_chokro",
                            "darsul_quran",
                            "sohih_tilawat",
                            // average_rastrio2
                            "centrally_announced_political_program",
                            "locally_announced_jonoshova",
                            "locally_announced_shomabesh",
                            "locally_announced_michil",
                            // average_rastrio3
                            "shadhinota_o_jatio_dibosh_total_programs",
                            "bijoy_dibosh_total_programs",
                            "mattrivasha_dibosh_total_programs",
                            "others_total_programs",
                        ].includes(name)
                    ) {
                        this.uploaded_data(); // Call uploaded_data if name matches
                    }
                })
                .catch((error) => {
                    console.error("Error uploading data", error);
                });
        },
        average_data_upload($event, endpoint, multiplier) {
            const { value, name } = $event.target;
            const total = value * multiplier;
            console.log(
                "average_value",
                $event.target,
                total,
                value,
                multiplier
            );

            axios
                .post(`/${endpoint}/store-single`, {
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
        implementation_rate(target, achieved) {
            if (target && achieved && target !== 0) {
                return Math.round((achieved / target) * 100) + "%";
            }

            return " ";
        },
        // expense_category: async function () {
        //     let res = await axios.get('/ward-bm-expense-category/all')
        //     if (res.data.status == 'success') {
        //         this.bm_expense_categories = res?.data?.data?.data
        //     }

        // },
        // income_category: async function () {
        //     let res = await axios.get('/ward-bm-income-category/all')
        //     if (res) {
        //         this.bm_income_categories = res.data?.data
        //     }

        // },
        income_store: function (ward_bm_income_category_id, amount) {
            const month = this.$route.params.month;
            const formData = {
                ward_bm_income_category_id: ward_bm_income_category_id,
                amount: amount,
                month: month,
            };
            axios
                .post("/ward-bm-income/store", formData)
                .then(function (response) {
                    window.toaster(
                        "New BM entry Created successfuly",
                        "success"
                    );
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },

        // bm_category_wise: async function () {
        //     const month = this.$route.params.month;

        //     let res = await axios.get('/ward/income-category-wise', {
        //         params: {
        //             month: month
        //         }
        //     })
        //     if (res) {
        //         this.bm_cat_wise = res.data?.data
        //     }
        // },
        // bm_categoty_amount: function (bm_cat_id) {
        //     // console.log(bm_cat_id,this.bm_cat_wise);
        //     if (this.bm_cat_wise != null) {
        //         // console.log("inside",bm_cat_id,this.bm_cat_wise )
        //         const element = this.bm_cat_wise.find(el => {
        //             if (el.ward_bm_income_category && el.ward_bm_income_category.id == bm_cat_id) {
        //                 return el
        //             }
        //         });
        //         // console.log("inside element",element)
        //         if (element) {
        //             return element.amount;
        //         } else {
        //             // console.log("element not found")
        //         }
        //     } else {
        //         return "";
        //     }
        // },

        // bm_expense_category_wise: async function () {
        //     const month = this.$route.params.month;

        //     let res = await axios.get('/ward/expense-category-wise', {
        //         params: {
        //             month: month
        //         }
        //     })
        //     if (res) {
        //         this.expense_cat_wise = res.data?.data
        //     }
        // },

        // expense_categoty_amount: function (expense_cat_id) {
        //     // console.log("expense_categoty_amount",expense_cat_id);
        //     // console.log("this.expense_cat_wise",this.expense_cat_wise);

        //     if (this.expense_cat_wise != null) {
        //         // console.log("expanxe inside",this.expense_cat_wise);
        //         const element = this.expense_cat_wise.find(element => {
        //             if (element.ward_bm_expense_category && element.ward_bm_expense_category.id == expense_cat_id) {
        //                 return element
        //             }
        //         });
        //         if (element) {
        //             return element.amount;
        //         } else {
        //             // console.log("element not found")
        //         }
        //     } else {
        //         return "";
        //     }
        // },

        expense_store: function (ward_bm_expense_category_id, amount) {
            const month = this.$route.params.month;
            const formData = {
                ward_bm_expense_category_id: ward_bm_expense_category_id,
                amount: amount,
                month: month,
            };
            axios
                .post("/ward-bm-expense/store", formData)
                .then(function (response) {
                    window.toaster(
                        "New Expense entry Created successfuly",
                        "success"
                    );
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },
        print_report: function () {
            const month = this.$route.params.month;
            const user_id = this.$route.params.user_id;
            const url = `/ward/ward-report-monthly?user_id=${user_id}&month=${month}&print=true`;
            window.location.href = url;

            setTimeout(() => {
                window.print(); // Trigger the print dialog
            }, 200);
        },

        implementation_rate: function (target, achieved) {
            if (target && achieved && target !== 0) {
                return (
                    this.formatBangla(Math.round((achieved / target) * 100)) +
                    "%"
                );
            }
            return " ";
        },

        report_status: async function () {
            const month = this.$route.params.month;
            const ward_id = this.$route.params.ward_id;
            let response = await axios.get("/ward/report-status", {
                params: {
                    month: month,
                    ward_id: ward_id,
                },
            });
            if (response.data.status == "success") {
                this.joma_status = response.data.report_status;
                console.log("report_status", response);
            }
        },
        report_joma: async function () {
            if (window.confirm("আপনি কি জমা দানের বিষয়ে নিশ্চিত?")) {
                const month = this.$route.params.month;
                let response = await axios.get("/ward/report-joma", {
                    params: {
                        month: month,
                    },
                });
                if (response.data.status == "success") {
                    // this.$router.push({ name: "Montobbo" });
                    this.report_status();
                    window.toaster(response.data.message, "success");

                    this.joma_status = response.data.report_status;
                    console.log("report_status", response);
                }
            } else {
                window.toaster(
                    "রিপোর্ট জমা বন্ধ করা হয়েছে । অনুগ্রহ করে সমস্ত প্রয়োজনীয় তথ্য পূরণ করুন ",
                    "info"
                );
            }
        },
        toggle_popup(event) {
            const parent = event.currentTarget.closest(".unit_info_icon");
            const popup = parent.querySelector(".unit_data_popup");
            if (popup) {
                popup.style.display =
                    popup.style.display === "block" ? "none" : "block";
            }
        },
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
        total_dawat: function () {
            const total =
                Number(
                    this.report_sum_data?.ward_dawat1_regular_group_wises
                        ?.how_many_have_been_invited || 0
                ) +
                Number(
                    this.report_sum_data?.ward_dawat2_personal_and_targets
                        ?.how_many_have_been_invited || 0
                ) +
                Number(
                    this.report_sum_data?.ward_dawat3_general_program_and_others
                        ?.how_many_were_give_dawat || 0
                ) +
                Number(
                    this.report_sum_data
                        ?.ward_dawat4_gono_songjog_and_dawat_ovijans
                        ?.how_many_have_been_invited || 0
                ) +
                Number(
                    this.report_sum_data
                        ?.ward_dawat4_gono_songjog_and_dawat_ovijans
                        ?.jela_mohanogor_declared_gonosonjog_invited || 0
                ) +
                Number(
                    this.report_sum_data
                        ?.ward_dawat4_gono_songjog_and_dawat_ovijans
                        ?.election_how_many_have_been_invited || 0
                ) +
                Number(
                    this.report_sum_data
                        ?.ward_dawat4_gono_songjog_and_dawat_ovijans
                        ?.other_how_many_have_been_invited || 0
                );
            return this.formatBangla(total);
        },
    },
};
</script>

<style>
/* @import url("../../../../../../public/css/unit/unit_report_upload.css"); */
@import url("../../../../../../../public/css/ward/ward_report_upload.css");
</style>
