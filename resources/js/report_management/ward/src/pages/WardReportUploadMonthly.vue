<template>
    <div id="report_uplode_body">
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
                    <p>ওয়ার্ড নং ও নাম : {{ report_header?.ward_info?.no || '' }} ও {{ report_header?.ward_info?.title
                        || '' }}</p>
                    <p>পৌরসভা/ইউনিয়ন: </p>
                    <p class="w-25">উপজেলা/থানা: {{ report_header?.thana_info?.title || '' }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between ">
                    <p>আমীর/সভাপতির নাম : {{ report_header?.president || '' }}</p>
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
                    <!-- <p class="fw-bold w-25">মোট জনসংখ্যা:</p> -->
                    <div class="d-flex justify-content-start w-25">
                        <label for="" class="fw-bold fs-6">মোট জনসংখ্যা:</label>
                        <div class="parent_popup width-60">
                            <input class="border_dot bg-input ps-2 w-100" name="total_population"
                                :value="formatBangla(report_sum_data?.ward_dawat5_jonoshadharons?.total_population ?? '')"
                                @change="data_upload('ward-dawat5-jonoshadharon')" type="text">
                            <!-- <comment :table_name="'ward_dawat5_jonoshadharons'"
                                :column_name="'total_population'" /> -->
                        </div>
                    </div>
                    <p class="fw-bold ps-3 w-100">টার্গেট (মাসিক/ত্রৈমাসিক / ষান্মাসিক/ নয় মাসিক/বার্ষিক) :</p>
                    <p class="ps-3 font-13">* দাওয়াত ও তাবলিগের 'ক' এর অধীনে ক্রমিক ১ - ৪নং পর্যন্ত দাওয়াত প্রদান
                        সংখ্যা যোগ করে এখানে বসাতে হবে ।</p>
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
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_groups_are_out"
                                            :value="formatBangla(report_sum_data?.ward_dawat1_regular_group_wises?.how_many_groups_are_out)"
                                            @change="data_upload('ward-dawat1-regular-group-wise')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat1_regular_group_wises'"
                                            :field_title="'how_many_groups_are_out'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="number_of_participants"
                                            :value="formatBangla(report_sum_data?.ward_dawat1_regular_group_wises?.number_of_participants)"
                                            @change="data_upload('ward-dawat1-regular-group-wise')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat1_regular_group_wises'"
                                            :field_title="'number_of_participants'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_have_been_invited"
                                            :value="formatBangla(report_sum_data?.ward_dawat1_regular_group_wises?.how_many_have_been_invited)"
                                            @change="data_upload('ward-dawat1-regular-group-wise')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat1_regular_group_wises'"
                                            :field_title="'how_many_have_been_invited'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_associate_members_created"
                                            :value="formatBangla(report_sum_data?.ward_dawat1_regular_group_wises?.how_many_associate_members_created)"
                                            @change="data_upload('ward-dawat1-regular-group-wise')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat1_regular_group_wises'"
                                            :field_title="'how_many_associate_members_created'" :month="month">
                                        </popup>
                                    </div>
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
                                <td>
                                    <div class="parent_popup">
                                        <input name="total_rokon"
                                            :value="formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.total_rokon)"
                                            @change="data_upload('ward-dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat2_personal_and_targets'" :field_title="'total_rokon'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="total_worker"
                                            :value="formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.total_worker)"
                                            @change="data_upload('ward-dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat2_personal_and_targets'" :field_title="'total_worker'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_have_been_invited"
                                            :value="formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.how_many_have_been_invited)"
                                            @change="data_upload('ward-dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat2_personal_and_targets'"
                                            :field_title="'how_many_have_been_invited'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_were_give_dawat_rokon"
                                            :value="formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.how_many_were_give_dawat_rokon)"
                                            @change="data_upload('ward-dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat2_personal_and_targets'"
                                            :field_title="'how_many_were_give_dawat_rokon'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_were_give_dawat_worker"
                                            :value="formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.how_many_were_give_dawat_worker)"
                                            @change="data_upload('ward-dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat2_personal_and_targets'"
                                            :field_title="'how_many_were_give_dawat_worker'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_associate_members_created"
                                            :value="formatBangla(report_sum_data?.ward_dawat2_personal_and_targets?.how_many_associate_members_created)"
                                            @change="data_upload('ward-dawat2-personal-and-target')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat2_personal_and_targets'"
                                            :field_title="'how_many_associate_members_created'" :month="month">
                                        </popup>
                                    </div>
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
                                    <div class="parent_popup">
                                        <input name="how_many_were_give_dawat"
                                            :value="formatBangla(report_sum_data?.ward_dawat3_general_program_and_others?.how_many_were_give_dawat)"
                                            @change="data_upload('ward-dawat3-general-program-and-others')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat3_general_program_and_others'"
                                            :field_title="'how_many_were_give_dawat'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td class="width-35">মোট কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_associate_members_created"
                                            :value="formatBangla(report_sum_data?.ward_dawat3_general_program_and_others?.how_many_associate_members_created)"
                                            @change="data_upload('ward-dawat3-general-program-and-others')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat3_general_program_and_others'"
                                            :field_title="'how_many_associate_members_created'" :month="month">
                                        </popup>
                                    </div>
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
                                    <div class="parent_popup">
                                        <input name="total_gono_songjog_group"
                                            :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.total_gono_songjog_group)"
                                            @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :field_title="'total_gono_songjog_group'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="total_attended"
                                            :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.total_attended)"
                                            @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :field_title="'total_attended'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_have_been_invited"
                                            :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.how_many_have_been_invited)"
                                            @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :field_title="'how_many_have_been_invited'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_associate_members_created"
                                            :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.how_many_associate_members_created)"
                                            @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :field_title="'how_many_associate_members_created'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="jela_mohanogor_declared_gonosonjog_group"
                                            :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_group)"
                                            @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :field_title="'jela_mohanogor_declared_gonosonjog_group'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="jela_mohanogor_declared_gonosonjog_attended"
                                            :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_attended)"
                                            @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :field_title="'jela_mohanogor_declared_gonosonjog_attended'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="jela_mohanogor_declared_gonosonjog_invited"
                                            :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_invited)"
                                            @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :field_title="'jela_mohanogor_declared_gonosonjog_invited'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="jela_mohanogor_declared_gonosonjog_associated_created"
                                            :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_associated_created)"
                                            @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'dawat4_gono_songjog_and_dawat_ovijans'"
                                            :field_title="'jela_mohanogor_declared_gonosonjog_associated_created'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নির্বাচনী আসনে গণসংযোগ সপ্তাহ</td>
                                <td>
                                    <input name="election_gono_songjog_group"
                                        :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_gono_songjog_group)"
                                        @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="election_attended"
                                        :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_attended)"
                                        @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="election_how_many_have_been_invited"
                                        :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_how_many_have_been_invited)"
                                        @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="election_how_many_associate_members_created"
                                        :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_how_many_associate_members_created)"
                                        @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td>
                                    <input name="other_gono_songjog_group"
                                        :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_gono_songjog_group)"
                                        @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="other_attended"
                                        :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_attended)"
                                        @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="other_how_many_have_been_invited"
                                        :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_how_many_have_been_invited)"
                                        @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="other_how_many_associate_members_created"
                                        :value="formatBangla(report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_how_many_associate_members_created)"
                                        @change="data_upload('ward-dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
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
                                <!-- <td >{{bangla($department1->teacher_rokon?? "")}}</td>
                                <td >{{bangla($department1->teacher_worker?? "")}}</td> -->
                                <td>
                                    <div class="parent_popup">
                                        <input name="teacher_rokon"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.teacher_rokon)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'department1_talimul_qurans'" :field_title="'teacher_rokon'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="teacher_worker"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.teacher_worker)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'department1_talimul_qurans'" :field_title="'teacher_worker'"
                                            :month="month">
                                        </popup>
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
                                            (Number(report_sum_data?.ward_department1_talimul_qurans?.teacher_rokon) ?? 0) +
                                            (Number(report_sum_data?.ward_department1_talimul_qurans?.teacher_worker) ?? 0)
                                        )
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="student_rokon"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.student_rokon)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'department1_talimul_qurans'" :field_title="'student_rokon'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="student_worker"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.student_worker)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'department1_talimul_qurans'" :field_title="'student_worker'"
                                            :month="month">
                                        </popup>
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
                                            (Number(report_sum_data?.ward_department1_talimul_qurans?.student_rokon) ?? 0) +
                                            (Number(report_sum_data?.ward_department1_talimul_qurans?.student_worker) ?? 0)
                                        )
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
                                        <input name="quran_learning_total_group"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.quran_learning_total_group)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        <input name="quran_learning_total_students"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.quran_learning_total_students)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-start px-2">মক্তব/ফোরকানিয়া মাদ্রাসা</td>
                                    <td>
                                        <div class="d-flex">
                                            <input name="total_moktob"
                                                :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_moktob)"
                                                @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                class="bg-input w-100 text-center" />/
                                            <input name="total_forkania_madrasah"
                                                :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_forkania_madrasah)"
                                                @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <input name="total_moktob_students"
                                                :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_moktob_students)"
                                                @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                class="bg-input w-100 text-center" />/
                                            <input name="total_forkania_madrasah_students"
                                                :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_forkania_madrasah_students)"
                                                @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                class="bg-input w-100 text-center" />
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
                                        <div class="parent_popup">
                                            <input name="how_much_learned_sohih_tilawat"
                                                :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_learned_sohih_tilawat)"
                                                @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department1_talimul_qurans'"
                                                :field_title="'how_much_learned_sohih_tilawat'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে (পু/ম)</td>
                                    <td>
                                        <div class="parent_popup">
                                            <div class="d-flex">
                                                <input name="how_much_invited_man"
                                                    :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_invited_man)"
                                                    @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                    class="bg-input w-100 text-center" />/
                                                <input name="how_much_invited_woman"
                                                    :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_invited_woman)"
                                                    @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                    class="bg-input w-100 text-center" />
                                            </div>
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department1_talimul_qurans'"
                                                :field_title="'how_much_invited'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">মোট কতজন সহযোগী সদস্য হয়েছেন (পু/ম)</td>
                                    <td>
                                        <div class="parent_popup">
                                            <div class="d-flex">
                                                <input name="how_much_been_associated_man"
                                                    :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_been_associated_man)"
                                                    @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                    class="bg-input w-100 text-center" />/
                                                <input name="how_much_been_associated_woman"
                                                    :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.how_much_been_associated_woman)"
                                                    @change="data_upload('ward-department1-talimul-quran')" type="text"
                                                    class="bg-input w-100 text-center" />
                                            </div>
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department1_talimul_qurans'"
                                                :field_title="'how_much_been_associated'" :month="month">
                                            </popup>
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
                                <td>
                                    <div class="d-flex">
                                        <input name="total_muallim_man"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_muallim_man)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="total_muallim_woman"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_muallim_woman)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="width-35 text-start">বৃদ্ধি সংখ্যা (পু./ম.) :</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="total_muallim_increased_man"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_muallim_increased_man)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="total_muallim_increased_woman"
                                            :value="formatBangla(report_sum_data?.ward_department1_talimul_qurans?.total_muallim_increased_woman)"
                                            @change="data_upload('ward-department1-talimul-quran')" type="text"
                                            class="bg-input w-100 text-center" />
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
                                            <input name="govment_calculated_village_amount"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.govment_calculated_village_amount)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" />/
                                            <input name="govment_calculated_moholla_amount"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.govment_calculated_moholla_amount)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </th>
                                    <th class="width-20 ">বৃদ্ধি</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start px-2">গ্রাম/মহল্লা কমিটি সংখ্যা</td>
                                    <td>
                                        <div>
                                            <span>{{ formatBangla(previous_present?.total_village_committee_present)
                                                }}</span>/
                                            <span>{{
                                                formatBangla(previous_present?.total_moholla_committee_present)
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
                                            <input name="total_village_committee_increased"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.total_village_committee_increased)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" />/
                                            <input name="total_moholla_committee_increased"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.total_moholla_committee_increased)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">বিশেষ দাওয়াতের অন্তর্ভুক্ত গ্রাম/মহল্লা* সংখ্যা</td>
                                    <td>
                                        <div>
                                            <span>{{
                                                formatBangla(previous_present?.special_dawat_included_village_present)
                                                }}</span>/
                                            <span>{{
                                                formatBangla(previous_present?.special_dawat_included_moholla_present)
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
                                            <input name="special_dawat_included_village_increased"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.special_dawat_included_village_increased)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" />/
                                            <input name="special_dawat_included_moholla_increased"
                                                :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.special_dawat_included_moholla_increased)"
                                                @change="data_upload('ward-department2-moholla-vittik-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
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
                                        <input name="how_many_been_invited"
                                            :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.how_many_been_invited)"
                                            @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                    <td class="width-30">
                                        <input name="how_many_associated_created"
                                            :value="formatBangla(report_sum_data?.ward_department2_moholla_vittik_dawats?.how_many_associated_created)"
                                            @change="data_upload('ward-department2-moholla-vittik-dawat')" type="text"
                                            class="bg-input w-100 text-center" />
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
                                        <td>
                                            <input name="how_many_young_been_invited"
                                                :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.how_many_young_been_invited)"
                                                @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                                class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">কতজন যুবক সহযোগী সদস্য হয়েছেন</td>
                                        <td>
                                            <input name="how_many_young_been_associated"
                                                :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.how_many_young_been_associated)"
                                                @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                                class="bg-input w-100 text-center" />
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
                                    <td>
                                        {{ formatBangla(previous_present?.total_young_committee_present) }}
                                        <!-- <input name="total_young_committee"
                                            :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.total_young_committee)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" /> -->
                                    </td>
                                    <td>
                                        <input name="total_young_committee_increased"
                                            :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.total_young_committee_increased)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">নতুন সমিতি/ক্লাব প্রতিষ্ঠা করা হয়েছে</td>
                                    <td>
                                        {{ formatBangla(previous_present?.total_new_club_present) }}
                                        <!-- <input name="total_new_club" :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.total_new_club)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" /> -->
                                    </td>
                                    <td>
                                        <input name="total_new_club_increased"
                                            :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.total_new_club_increased)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো হয়েছে</td>
                                    <td>
                                        {{ formatBangla(previous_present?.stablished_club_total_invited_present) }}
                                        <!-- <input name="stablished_club_total_invited"
                                            :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.stablished_club_total_invited)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" /> -->
                                    </td>
                                    <td>
                                        <input name="stablished_club_total_increased"
                                            :value="formatBangla(report_sum_data?.ward_department3_jubo_somaj_dawats?.stablished_club_total_increased)"
                                            @change="data_upload('ward-department3-jubo-somaj-dawat')" type="text"
                                            class="bg-input w-100 text-center" />
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
                                    <td>
                                        <div class="parent_popup">
                                            <input name="political_and_special_invited"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.political_and_special_invited)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'political_and_special_invited'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            <input name="political_and_special_been_associated"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.political_and_special_been_associated)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'political_and_special_been_associated'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            <input name="political_and_special_target"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.political_and_special_target)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'political_and_special_target'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>
                                        {{
                                            formatBangla(
                                                implementation_rate(
                                                    Number(report_sum_data?.ward_department4_different_job_holders_dawats?.political_and_special_target),
                                                    Number(report_sum_data?.ward_department4_different_job_holders_dawats?.political_and_special_been_associated)
                                                )
                                            )
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">পেশাজীবী</td>
                                    <td>
                                        <input name="pesha_jibi_invited"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.pesha_jibi_invited)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        <input name="pesha_jibi_been_associated"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.pesha_jibi_been_associated)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        <input name="pesha_jibi_target"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.pesha_jibi_target)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>{{
                                        formatBangla(
                                            implementation_rate(
                                                Number(report_sum_data?.ward_department4_different_job_holders_dawats?.pesha_jibi_target),
                                                Number(report_sum_data?.ward_department4_different_job_holders_dawats?.pesha_jibi_been_associated)
                                            ))
                                    }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start px-2">উলামা মাশায়েখ</td>
                                    <td>
                                        <input name="olama_masayekh_invited"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.olama_masayekh_invited)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        <input name="olama_masayekh_been_associated"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.olama_masayekh_been_associated)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        <input name="olama_masayekh_target"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.olama_masayekh_target)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        {{
                                            formatBangla(
                                                implementation_rate(
                                                    Number(report_sum_data?.ward_department4_different_job_holders_dawats?.olama_masayekh_target),
                                                    Number(report_sum_data?.ward_department4_different_job_holders_dawats?.olama_masayekh_been_associated)
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
                                    <td>
                                        <input name="sromo_jibi_invited"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.sromo_jibi_invited)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        <input name="sromo_jibi_been_associated"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.sromo_jibi_been_associated)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>
                                        <input name="sromo_jibi_target"
                                            :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.sromo_jibi_target)"
                                            @change="data_upload('ward-department4-different-job-holders-dawat')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </td>
                                    <td>{{
                                        formatBangla(implementation_rate(report_sum_data?.ward_department4_different_job_holders_dawats?.sromo_jibi_target,
                                            report_sum_data?.ward_department4_different_job_holders_dawats?.sromo_jibi_been_associated))
                                    }}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-1 letter_spacing font-13">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            <input name="prantik_jonogosti_invited"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.prantik_jonogosti_invited)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'prantik_jonogosti_invited'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            <input name="prantik_jonogosti_been_associated"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.prantik_jonogosti_been_associated)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'prantik_jonogosti_been_associated'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            <input name="prantik_jonogosti_target"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.prantik_jonogosti_target)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'prantik_jonogosti_target'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>{{
                                        formatBangla(implementation_rate(report_sum_data?.ward_department4_different_job_holders_dawats?.prantik_jonogosti_target,
                                            report_sum_data?.ward_department4_different_job_holders_dawats?.prantik_jonogosti_been_associated))
                                    }}</td>
                                </tr>
                                <tr>
                                    <td class="text-start px-1">ভিন্নধর্মাবলম্বী</td>
                                    <td>
                                        <div class="parent_popup">
                                            <input name="vinno_dormalombi_invited"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.vinno_dormalombi_invited)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'vinno_dormalombi_invited'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            <input name="vinno_dormalombi_been_associated"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.vinno_dormalombi_been_associated)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'vinno_dormalombi_been_associated'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="parent_popup">
                                            <input name="vinno_dormalombi_target"
                                                :value="formatBangla(report_sum_data?.ward_department4_different_job_holders_dawats?.vinno_dormalombi_target)"
                                                @change="data_upload('ward-department4-different-job-holders-dawat')"
                                                type="text" class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'department4_different_job_holders_dawats'"
                                                :field_title="'vinno_dormalombi_target'" :month="month">
                                            </popup>
                                        </div>
                                    </td>
                                    <td>{{
                                        formatBangla(implementation_rate(report_sum_data?.ward_department4_different_job_holders_dawats?.vinno_dormalombi_target,
                                            report_sum_data?.ward_department4_different_job_holders_dawats?.vinno_dormalombi_been_associated))
                                    }}</td>
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
                                <td>
                                    <div class="parent_popup">
                                        <input name="total_attended_family"
                                            :value="formatBangla(report_sum_data?.ward_department5_paribarik_dawats?.total_attended_family)"
                                            @change="data_upload('ward-department5-paribarik-dawat')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'department5_paribarik_dawats'"
                                            :field_title="'total_attended_family'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td class="width-35">মোট কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="how_many_new_family_invited"
                                            :value="formatBangla(report_sum_data?.ward_department5_paribarik_dawats?.how_many_new_family_invited)"
                                            @change="data_upload('ward-department5-paribarik-dawat')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'department5_paribarik_dawats'"
                                            :field_title="'how_many_new_family_invited'" :month="month">
                                        </popup>
                                    </div>
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
                                <td>
                                    {{ formatBangla(previous_present?.total_mosjid_present) }}
                                    <!-- <input name="total_mosjid" :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.total_mosjid)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" /> -->
                                </td>
                                <td>
                                    <input name="total_mosjid_increase"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.total_mosjid_increase)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">সাধারণ দাওয়াহ্ সেন্টার</td>
                                <td>
                                    {{ formatBangla(previous_present?.general_dawah_center_present) }}
                                    <!-- <input name="general_dawah_center"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.general_dawah_center)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" /> -->
                                </td>
                                <td>
                                    <input name="general_dawah_center_increase"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.general_dawah_center_increase)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">দাওয়াতের আওতাভুক্ত মসজিদ</td>
                                <td>
                                    {{ formatBangla(previous_present?.dawat_included_mosjid_present) }}
                                    <!-- <input name="dawat_included_mosjid"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.dawat_included_mosjid)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" /> -->
                                </td>
                                <td>
                                    <input name="dawat_included_mosjid_increase"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.dawat_included_mosjid_increase)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">তথ্যসেবা কেন্দ্র (মসজিদভিত্তিক /সাধারণ)</td>
                                <td>
                                    <div>
                                        <span>{{ formatBangla(previous_present?.mosjid_wise_information_center_present)
                                            }}</span>/
                                        <span>{{
                                            formatBangla(previous_present?.general_information_center_present) }}</span>

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
                                        <input name="mosjid_wise_information_center_increase"
                                            :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.mosjid_wise_information_center_increase)"
                                            @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="general_information_center_increase"
                                            :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.general_information_center_increase)"
                                            @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মসজিদভিত্তিক দাওয়াহ্ সেন্টার</td>
                                <td>
                                    {{ formatBangla(previous_present?.mosjid_wise_dawah_center_present) }}
                                    <!-- <input name="mosjid_wise_dawah_center"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.mosjid_wise_dawah_center)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" /> -->
                                </td>
                                <td>
                                    <input name="mosjid_wise_dawah_center_increase"
                                        :value="formatBangla(report_sum_data?.ward_department6_mosjid_dawah_infomation_centers?.mosjid_wise_dawah_center_increase)"
                                        @change="data_upload('ward-department6-mosjid-dawah-infomation-centers')"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tottho_projukti d-flex flex-wrap justify-content-between mb-1">
                    <p class="fw-bold fs-6 width-60 ">৭. তথ্যপ্রযুক্তির মাধ্যমে দাওয়াতি কাজের জন্য উপযুক্ত জনশক্তি
                        সংখ্যা:
                        <span>
                            <input name="total_well_known"
                                :value="formatBangla(report_sum_data?.ward_department7_dawat_in_technologies?.total_well_known)"
                                @change="data_upload('ward-department7-dawat-in-technology')" type="text"
                                class="bg-input w-100 text-center" />
                        </span>
                    </p>
                    <p class="fw-bold fs-6 width-40">,অংশগ্রহণকারীর সংখ্যা:
                        <span>
                            <input name="total_attended"
                                :value="formatBangla(report_sum_data?.ward_department7_dawat_in_technologies?.total_attended)"
                                @change="data_upload('ward-department7-dawat-in-technology')" type="text"
                                class="bg-input w-100 text-center" />
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
                                {{ formatBangla(previous_present?.total_pathagar_present) }}
                                <!-- <input name="total_pathagar" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.total_pathagar)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td>
                                <input name="total_pathagar_increase"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.total_pathagar_increase)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয় কেন্দ্র</td>
                            <!-- <td >{{bangla($dawah_prokashona->ward_book_sales_center?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->ward_book_sales_center_increase?? "")}}</td> -->
                            <td>
                                {{ formatBangla(previous_present?.ward_book_sales_center_present) }}
                                <!-- <input name="ward_book_sales_center"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.ward_book_sales_center)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td>
                                <input name="ward_book_sales_center_increase"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.ward_book_sales_center_increase)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই</td>
                            <!-- <td >{{bangla($dawah_prokashona->books_in_pathagar?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->books_in_pathagar_increase?? "")}}</td> -->
                            <td>
                                {{ formatBangla(previous_present?.books_in_pathagar_present) }}
                                <!-- <input name="books_in_pathagar"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.books_in_pathagar)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td>
                                <input name="books_in_pathagar_increase"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.books_in_pathagar_increase)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>

                            <td class="text-start px-2">ওয়ার্ডে বই বিক্রয়</td>
                            <!-- <td >{{bangla($dawah_prokashona->ward_book_sales?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->ward_book_sales_increase?? "")}}</td> -->
                            <td>
                                {{ formatBangla(previous_present?.ward_book_sales_present) }}
                                <!-- <input name="ward_book_sales" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.ward_book_sales)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" /> -->
                            </td>
                            <td>
                                <input name="ward_book_sales_increase"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.ward_book_sales_increase)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিলি</td>
                            <!-- <td >{{bangla($dawah_prokashona->book_distribution?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->book_distribution_increase?? "")}}</td> -->
                            <td>
                                <input name="book_distribution"
                                    :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.book_distribution)"
                                    @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <!-- <input name="book_distribution_increase" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.book_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" /> -->
                            </td>

                            <td class="text-start px-2">বইয়ের সফট কপি বিলি*</td>
                            <!-- <td >{{bangla($dawah_prokashona->soft_copy_book_distribution?? "")}}</td>
                            <td >{{bangla($dawah_prokashona->soft_copy_book_distribution_increase?? "")}}</td> -->
                            <td>
                                <div class="parent_popup">
                                    <input name="soft_copy_book_distribution"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.soft_copy_book_distribution)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <popup :ward_id="report_header?.ward_info?.id" :table_name="'dawah_and_prokashonas'"
                                        :field_title="'soft_copy_book_distribution'" :month="month">
                                    </popup>
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <!-- <input name="soft_copy_book_distribution_increase" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.soft_copy_book_distribution_increase)" @change="data_upload('ward-dawah-and-prokashona')" type="text" class="bg-input w-100 text-center" /> -->
                                    <popup :ward_id="report_header?.ward_info?.id" :table_name="'dawah_and_prokashonas'"
                                        :field_title="'soft_copy_book_distribution_increase'" :month="month">
                                    </popup>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলিকেন্দ্র</td>
                            <td>
                                <div class="parent_popup">
                                    {{ formatBangla(previous_present?.unit_book_distribution_center_present) }}
                                    <!-- <input name="unit_book_distribution_center"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.unit_book_distribution_center)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" /> -->
                                    <popup :ward_id="report_header?.ward_info?.id" :table_name="'dawah_and_prokashonas'"
                                        :field_title="'unit_book_distribution_center'" :month="month">
                                    </popup>
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <input name="unit_book_distribution_center_increase"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.unit_book_distribution_center_increase)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <popup :ward_id="report_header?.ward_info?.id" :table_name="'dawah_and_prokashonas'"
                                        :field_title="'unit_book_distribution_center_increase'" :month="month">
                                    </popup>
                                </div>
                            </td>

                            <td class="text-start px-2">দাওয়াতি লিংক বিতরণ*</td>
                            <td>
                                <div class="parent_popup">
                                    <input name="dawat_link_distribution"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.dawat_link_distribution)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <popup :ward_id="report_header?.ward_info?.id" :table_name="'dawah_and_prokashonas'"
                                        :field_title="'dawat_link_distribution'" :month="month">
                                    </popup>
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <!-- <input name="dawat_link_distribution_increase"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.dawat_link_distribution_increase)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" /> -->
                                    <popup :ward_id="report_header?.ward_info?.id" :table_name="'dawah_and_prokashonas'"
                                        :field_title="'dawat_link_distribution_increase'" :month="month">
                                    </popup>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ইউনিটে বই বিলি</td>
                            <td>
                                <div class="parent_popup">
                                    <input name="unit_book_distribution"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.unit_book_distribution)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <popup :ward_id="report_header?.ward_info?.id" :table_name="'dawah_and_prokashonas'"
                                        :field_title="'unit_book_distribution'" :month="month">
                                    </popup>
                                </div>
                            </td>
                            <td>
                                <div class="parent_popup">
                                    <!-- <input name="unit_book_distribution_increase"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.unit_book_distribution_increase)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" /> -->
                                    <popup :ward_id="report_header?.ward_info?.id" :table_name="'dawah_and_prokashonas'"
                                        :field_title="'unit_book_distribution_increase'" :month="month">
                                    </popup>
                                </div>
                            </td>

                            <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/পৃথিবী কত কপি চলে</td>
                            <td>
                                <div>
                                    <span>{{ formatBangla(previous_present?.sonar_bangla_present) }}</span>/
                                    <span>{{ formatBangla(previous_present?.songram_present) }}</span>/
                                    <span>{{ formatBangla(previous_present?.prithibi_present) }}</span>

                                    <!-- <input name="sonar_bangla" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.sonar_bangla)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />/
                                    <input name="songram" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.songram)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />/
                                    <input name="prithibi" :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.prithibi)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" /> -->
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sonar_bangla_increase"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.sonar_bangla_increase)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />/
                                    <input name="songram_increase"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.songram_increase)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />/
                                    <input name="prithibi_increase"
                                        :value="formatBangla(report_sum_data?.ward_dawah_and_prokashonas?.prithibi_increase)"
                                        @change="data_upload('ward-dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>*সংগঠন অনুমোদিত</p>
                <div class="do_not_print">
                    <popup-note :label="'সোনার বাংলা মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                        :table_name="'dawah_and_prokashonas'" :field_title="'sonar_bangla'" :month="month" />
                    <popup-note :label="'সোনার বাংলা বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                        :table_name="'dawah_and_prokashonas'" :field_title="'sonar_bangla_increase'" :month="month" />
                    <popup-note :label="'সংগ্রাম মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                        :table_name="'dawah_and_prokashonas'" :field_title="'songram'" :month="month" />
                    <popup-note :label="'সংগ্রাম বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                        :table_name="'dawah_and_prokashonas'" :field_title="'songram_increase'" :month="month" />
                    <popup-note :label="'পৃথিবী মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                        :table_name="'dawah_and_prokashonas'" :field_title="'prithibi'" :month="month" />
                    <popup-note :label="'পৃথিবী বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                        :table_name="'dawah_and_prokashonas'" :field_title="'prithibi_increase'" :month="month" />
                </div>
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
                                    <input name="unit_masik_sadaron_sova_total"
                                        :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.unit_masik_sadaron_sova_total)"
                                        @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="unit_masik_sadaron_sova_target"
                                        :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.unit_masik_sadaron_sova_target)"
                                        @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="unit_masik_sadaron_sova_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.unit_masik_sadaron_sova)"
                                        @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.unit_masik_sadaron_sova_total)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td>২.</td>
                                <td class="text-start font-13 px-2">দাওয়াতি সভা/আলোচনা সভা/সুধী সমাবেশ</td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dawati_sova_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dawati_sova_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="alochona_sova_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.alochona_sova_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="sudhi_somabesh_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.sudhi_somabesh_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dawati_sova_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dawati_sova_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="alochona_sova_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.alochona_sova_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="sudhi_somabesh_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.sudhi_somabesh_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dawati_sova_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.dawati_sova)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.dawati_sova_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="alochona_sova_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.alochona_sova)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.alochona_sova_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="sudhi_somabesh_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.sudhi_somabesh)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.sudhi_somabesh_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>৩.</td>
                                <td class="text-start px-2">সীরাতুন্নবী (সাঃ) মাহফিল</td>
                                <td>
                                    <input name="siratunnabi_mahfil_total"
                                        :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.siratunnabi_mahfil_total)"
                                        @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="siratunnabi_mahfil_target"
                                        :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.siratunnabi_mahfil_target)"
                                        @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="siratunnabi_mahfil_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.siratunnabi_mahfil)"
                                        @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.siratunnabi_mahfil_total)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td>৪.</td>
                                <td class="text-start px-2">ঈদ পুনর্মিলনী</td>
                                <td>
                                    <input name="eid_reunion_total"
                                        :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.eid_reunion_total)"
                                        @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="eid_reunion_target"
                                        :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.eid_reunion_target)"
                                        @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="eid_reunion_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.eid_reunion)"
                                        @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.eid_reunion_total)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td>৫.</td>
                                <td class="text-start font-13 letter_spacing px-1">দারস/তাফসীর/দাওয়াতি জনসভা ও ইসলামী
                                    মাহফিল</td>

                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dars_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dars_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="tafsir_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.tafsir_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="dawati_jonosova_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dawati_jonosova_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dars_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dars_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="tafsir_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.tafsir_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="dawati_jonosova_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.dawati_jonosova_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="dars_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.dars)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.dars_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="tafsir_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.tafsir)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.tafsir_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="dawati_jonosova_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.dawati_jonosova)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.dawati_jonosova_total)"
                                            type="text" class="bg-input w-100 text-center" />
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
                                        <input name="iftar_mahfil_personal_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.iftar_mahfil_personal_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="iftar_mahfil_samostic_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.iftar_mahfil_samostic_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="iftar_mahfil_personal_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.iftar_mahfil_personal_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="iftar_mahfil_samostic_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.iftar_mahfil_samostic_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="iftar_mahfil_personal_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.iftar_mahfil_personal)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.iftar_mahfil_personal_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="iftar_mahfil_samostic_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.iftar_mahfil_samostic)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.iftar_mahfil_samostic_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>৭.</td>
                                <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="cha_chakra_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.cha_chakra_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="samostic_khawa_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.samostic_khawa_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="sikkha_sofor_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.sikkha_sofor_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="cha_chakra_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.cha_chakra_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="samostic_khawa_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.samostic_khawa_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="sikkha_sofor_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.sikkha_sofor_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="font-13">
                                    <div class="d-flex">
                                        <input name="cha_chakra_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.cha_chakra)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.cha_chakra_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="samostic_khawa_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.samostic_khawa)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.samostic_khawa_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="sikkha_sofor_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.sikkha_sofor)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.sikkha_sofor_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>৮.</td>
                                <td class="text-start px-2">কিরাত/হামদ না'ত প্ৰতিযোগিতা</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="kirat_protijogita_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.kirat_protijogita_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="hamd_nat_protijogita_total"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.hamd_nat_protijogita_total)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="kirat_protijogita_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.kirat_protijogita_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="hamd_nat_protijogita_target"
                                            :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.hamd_nat_protijogita_target)"
                                            @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="kirat_protijogita_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.kirat_protijogita)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.kirat_protijogita_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="hamd_nat_protijogita_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.hamd_nat_protijogita)"
                                            @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.hamd_nat_protijogita_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>৯.</td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td>
                                    <input name="others_total"
                                        :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.others_total)"
                                        @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="others_target"
                                        :value="formatBangla(report_sum_data?.ward_kormosuci_bastobayons?.others_target)"
                                        @change="data_upload('ward-kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="others_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_kormosuci_bastobayons?.others)"
                                        @change="average_data_upload($event, 'ward-kormosuci-bastobayon', kormosuci.others_total)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="do_not_print d-flex flex-wrap gap-2 mb-2">
                <popup-note :label="'ইউনিটে মাসিক সাধারণ সভা মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'unit_masik_sadaron_sova_total'"
                    :month="month" />
                <popup-note :label="'ইউনিটে মাসিক সাধারণ সভা বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'unit_masik_sadaron_sova_target'"
                    :month="month" />
                <popup-note :label="'ইউনিটে মাসিক সাধারণ সভা মোট উপস্থিতি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'unit_masik_sadaron_sova_uposthiti'"
                    :month="month" />
                <popup-note :label="'ইফতার মাহফিল (ব্যক্তিগত) মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'iftar_mahfil_personal_total'" :month="month" />
                <popup-note :label="'ইফতার মাহফিল (ব্যক্তিগত) বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'iftar_mahfil_personal_target'"
                    :month="month" />
                <popup-note :label="'ইফতার মাহফিল (ব্যক্তিগত) মোট উপস্থিতি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'iftar_mahfil_personal_uposthiti'"
                    :month="month" />
                <popup-note :label="'ইফতার মাহফিল (সাংগঠনিক) মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'iftar_mahfil_samostic_total'" :month="month" />
                <popup-note :label="'ইফতার মাহফিল (সাংগঠনিক) বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'iftar_mahfil_samostic_target'"
                    :month="month" />
                <popup-note :label="'ইফতার মাহফিল (সাংগঠনিক) মোট উপস্থিতি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'iftar_mahfil_samostic_uposthiti'"
                    :month="month" />
                <popup-note :label="'চা চক্র মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'cha_chakra_total'" :month="month" />
                <popup-note :label="'চা চক্র বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'cha_chakra_target'" :month="month" />
                <popup-note :label="'চা চক্র মোট উপস্থিতি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'cha_chakra_uposthiti'" :month="month" />
                <popup-note :label="'সামষ্টিক খাওয়া মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'samostic_khawa_total'" :month="month" />
                <popup-note :label="'সামষ্টিক খাওয়া বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'samostic_khawa_target'" :month="month" />
                <popup-note :label="'সামষ্টিক খাওয়া মোট উপস্থিতি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'samostic_khawa_uposthiti'" :month="month" />
                <popup-note :label="'শিক্ষা সফর মোট সংখ্যা'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'sikkha_sofor_total'" :month="month" />
                <popup-note :label="'শিক্ষা সফর বৃদ্ধি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'sikkha_sofor_target'" :month="month" />
                <popup-note :label="'শিক্ষা সফর মোট উপস্থিতি'" :ward_id="report_header?.ward_info?.id"
                    :table_name="'kormosuci_bastobayons'" :field_title="'sikkha_sofor_uposthiti'" :month="month" />
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
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_previous)" @change="data_upload('ward-songothon1-jonosokti')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{ formatBangla(previous_present?.rokon_previous ?? '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'rokon_previous'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="rokon_present" :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_present)" @change="data_upload('ward-songothon1-jonosokti')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{ formatBangla(previous_present?.rokon_present ?? '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'rokon_present'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="rokon_briddhi"
                                            :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_briddhi)"
                                            @change="data_upload('ward-songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'rokon_briddhi'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="rokon_gatti"
                                            :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_gatti)"
                                            @change="data_upload('ward-songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'rokon_gatti'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="rokon_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.rokon_target)"
                                            @change="data_upload('ward-songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'rokon_target'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon1_jonosoktis?.rokon_target,
                                            report_sum_data?.ward_songothon1_jonosoktis?.rokon_briddhi)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সর্বমোট কর্মী</td>

                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="worker_previous" :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_previous)" @change="data_upload('ward-songothon1-jonosokti')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{ formatBangla(previous_present?.worker_previous ?? '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'worker_previous'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="worker_present" :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_present)" @change="data_upload('ward-songothon1-jonosokti')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{ formatBangla(previous_present?.worker_present ?? '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'worker_present'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="worker_briddhi"
                                            :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_briddhi)"
                                            @change="data_upload('ward-songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'worker_briddhi'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="worker_gatti"
                                            :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_gatti)"
                                            @change="data_upload('ward-songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'worker_gatti'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="worker_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon1_jonosoktis?.worker_target)"
                                            @change="data_upload('ward-songothon1-jonosokti')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon1_jonosoktis'" :field_title="'worker_target'"
                                            :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon1_jonosoktis?.worker_target,
                                            report_sum_data?.ward_songothon1_jonosoktis?.worker_briddhi)) }}
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
                                <td>
                                    <!-- <input name="associate_member_man_previous" :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_previous)" @change="data_upload('ward-songothon2-associate-member')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.associate_member_man_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="associate_member_man_present" :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_present)" @change="data_upload('ward-songothon2-associate-member')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.associate_member_man_present ?? '') }}
                                </td>
                                <td>
                                    <input name="associate_member_man_briddhi"
                                        :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_briddhi)"
                                        @change="data_upload('ward-songothon2-associate-member')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="associate_member_man_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_target)"
                                        @change="data_upload('ward-songothon2-associate-member')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_target,
                                            report_sum_data?.ward_songothon2_associate_members?.associate_member_man_briddhi))
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মোট সহযোগী সদস্য (মহিলা)</td>
                                <td>
                                    <!-- <input name="associate_member_woman_previous" :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_previous)" @change="data_upload('ward-songothon2-associate-member')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.associate_member_woman_previous ?? '')
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="associate_member_woman_present" :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_present)" @change="data_upload('ward-songothon2-associate-member')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.associate_member_woman_present ?? '')
                                    }}
                                </td>
                                <td>
                                    <input name="associate_member_woman_briddhi"
                                        :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_briddhi)"
                                        @change="data_upload('ward-songothon2-associate-member')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="associate_member_woman_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_target)"
                                        @change="data_upload('ward-songothon2-associate-member')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_target,
                                            report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_briddhi))
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সর্বমোট সহযোগী সদস্য সংখ্যা**</td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- {{ formatBangla((previous_present?.associate_member_man_previous ??
                                            0) + (previous_present?.associate_member_woman_previous ?? 0) || '')
                                        }} -->
                                        {{ formatBangla(
                                            Number(previous_present?.associate_member_man_previous ?? 0) +
                                            Number(previous_present?.associate_member_woman_previous ?? 0)
                                        ) }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'associate_member_previous'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{ formatBangla(
                                            Number(previous_present?.associate_member_man_present ?? 0) +
                                            Number(previous_present?.associate_member_woman_present ?? 0)
                                        ) }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'associate_member_present'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{
                                            formatBangla(
                                                Number(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_briddhi
                                                    ?? 0) +
                                                Number(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_briddhi
                                                    ?? 0)
                                            ) }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'associate_member_briddhi'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        {{
                                            formatBangla(
                                                Number(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_target
                                                    ?? 0) +
                                                Number(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_target
                                                    ?? 0)
                                            ) }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'associate_member_target'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                (Number(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_target
                                                    ??
                                                    0) +
                                                    Number(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_target
                                                        ?? 0)),
                                                (Number(report_sum_data?.ward_songothon2_associate_members?.associate_member_man_briddhi
                                                    ?? 0) +
                                                    Number(report_sum_data?.ward_songothon2_associate_members?.associate_member_woman_briddhi
                                                        ?? 0))
                                            )
                                        )
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-14">*সদস্য (রুকন) ঘাটতির ক্ষেত্রে স্থানান্তর, ইন্তেকাল, বাতিল, ইস্তফা ও বিদেশ গমন
                        সংখ্যার হিসাব আলাদাভাবে সংরক্ষণ করে মোট সংখ্যাটি এ ঘরে বসাতে হবে এবং এতদসংক্রান্ত তালিকা
                        ঊর্ধ্বতন সংগঠনে জমা দিতে হবে।</p>
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
                            <tr>
                                <td rowspan="3" class="text-center px-2">মহিলা</td>
                                <td class="text-start">সদস্য (রুকন)</td>

                                <td>
                                    <!-- <input name="women_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.women_rokon_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="women_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.women_rokon_present ?? '') }}
                                </td>
                                <td>
                                    <input name="women_rokon_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="women_rokon_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="women_rokon_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_rokon_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="women_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.women_kormi_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="women_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.women_kormi_present ?? '') }}
                                </td>
                                <td>
                                    <input name="women_kormi_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="women_kormi_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="women_kormi_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_kormi_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="women_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.women_associate_member_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="women_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.women_associate_member_present ?? '') }}
                                </td>
                                <td>
                                    <input name="women_associate_member_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="women_associate_member_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="women_associate_member_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.women_associate_member_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">শ্রম*</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>
                                    <!-- <input name="sromojibi_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.sromojibi_rokon_previous ?? '')
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="sromojibi_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.sromojibi_rokon_present ?? '')
                                    }}
                                </td>
                                <td>
                                    <input name="sromojibi_rokon_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />

                                </td>
                                <td>
                                    <input name="sromojibi_rokon_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="sromojibi_rokon_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_rokon_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="sromojibi_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.sromojibi_kormi_previous ?? '')
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="sromojibi_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.sromojibi_kormi_present ?? '')
                                    }}
                                </td>
                                <td>
                                    <input name="sromojibi_kormi_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="sromojibi_kormi_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="sromojibi_kormi_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_kormi_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="sromojibi_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(previous_present?.sromojibi_associate_member_previous
                                            ??
                                            '') }}
                                </td>
                                <td>
                                    <!-- <input name="sromojibi_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(previous_present?.sromojibi_associate_member_present
                                            ??
                                            '') }}
                                </td>
                                <td>
                                    <input name="sromojibi_associate_member_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="sromojibi_associate_member_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="sromojibi_associate_member_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.sromojibi_associate_member_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">উলামা</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>
                                    <!-- <input name="ulama_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.ulama_rokon_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="ulama_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.ulama_rokon_present ?? '') }}
                                </td>
                                <td>
                                    <input name="ulama_rokon_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ulama_rokon_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ulama_rokon_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_rokon_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="ulama_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.ulama_kormi_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="ulama_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.ulama_kormi_present ?? '') }}
                                </td>
                                <td>
                                    <input name="ulama_kormi_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ulama_kormi_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ulama_kormi_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_kormi_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="ulama_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.ulama_associate_member_previous
                                        ??
                                        '') }}
                                </td>
                                <td>
                                    <!-- <input name="ulama_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.ulama_associate_member_present
                                        ??
                                        '') }}
                                </td>
                                <td>
                                    <input name="ulama_associate_member_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ulama_associate_member_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ulama_associate_member_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.ulama_associate_member_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">পেশাজীবী</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>
                                    <!-- <input name="pesha_jibi_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.pesha_jibi_rokon_previous ?? '')
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="pesha_jibi_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.pesha_jibi_rokon_present ?? '')
                                    }}
                                </td>
                                <td>
                                    <input name="pesha_jibi_rokon_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="pesha_jibi_rokon_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="pesha_jibi_rokon_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_rokon_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="pesha_jibi_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.pesha_jibi_kormi_previous ?? '')
                                    }}
                                </td>
                                <td>
                                    <!-- <input name="pesha_jibi_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.pesha_jibi_kormi_present ?? '')
                                    }}
                                </td>
                                <td>
                                    <input name="pesha_jibi_kormi_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="pesha_jibi_kormi_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="pesha_jibi_kormi_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_kormi_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="pesha_jibi_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(previous_present?.pesha_jibi_associate_member_previous
                                            ??
                                            '') }}
                                </td>
                                <td>
                                    <!-- <input name="pesha_jibi_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{
                                        formatBangla(previous_present?.pesha_jibi_associate_member_present
                                            ??
                                            '') }}
                                </td>
                                <td>
                                    <input name="pesha_jibi_associate_member_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="pesha_jibi_associate_member_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="pesha_jibi_associate_member_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.pesha_jibi_associate_member_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="3" class="text-center px-2">যুব</td>
                                <td class="text-start">সদস্য (রুকন)</td>
                                <td>
                                    <!-- <input name="jubo_rokon_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.jubo_rokon_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="jubo_rokon_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.jubo_rokon_present ?? '') }}
                                </td>
                                <td>
                                    <input name="jubo_rokon_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jubo_rokon_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jubo_rokon_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_rokon_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <!-- <input name="jubo_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.jubo_kormi_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="jubo_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.jubo_kormi_present ?? '') }}
                                </td>
                                <td>
                                    <input name="jubo_kormi_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jubo_kormi_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jubo_kormi_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_kormi_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <!-- <input name="jubo_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.jubo_associate_member_previous
                                        ??
                                        '') }}
                                </td>
                                <td>
                                    <!-- <input name="jubo_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.jubo_associate_member_present ??
                                        '') }}
                                </td>
                                <td>
                                    <input name="jubo_associate_member_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_increase)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jubo_associate_member_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jubo_associate_member_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.jubo_associate_member_target)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="2" class="text-center px-2">ভিন্নধর্মাবলম্বী</td>
                                <td class="text-start">কর্মী</td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="vinno_dormalombi_kormi_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(previous_present?.vinno_dormalombi_kormi_previous
                                                ??
                                                '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'vinno_dormalombi_worker_previous'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="vinno_dormalombi_kormi_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(previous_present?.vinno_dormalombi_kormi_present
                                                ??
                                                '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'vinno_dormalombi_worker_present'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="vinno_dormalombi_kormi_increase"
                                            :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_increase)"
                                            @change="data_upload('ward-songothon3-departmental-information')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'vinno_dormalombi_worker_briddhi'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <input name="vinno_dormalombi_kormi_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="vinno_dormalombi_kormi_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_kormi_target)"
                                            @change="data_upload('ward-songothon3-departmental-information')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'vinno_dormalombi_worker_target'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সহযোগী সদস্য</td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="vinno_dormalombi_associate_member_previous" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_previous)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(previous_present?.vinno_dormalombi_associate_member_previous
                                                ??
                                                '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'vinno_dormalombi_associate_member_previous'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="vinno_dormalombi_associate_member_present" :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_present)" @change="data_upload('ward-songothon3-departmental-information')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{
                                            formatBangla(previous_present?.vinno_dormalombi_associate_member_present
                                                ??
                                                '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'vinno_dormalombi_associate_member_present'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="vinno_dormalombi_associate_member_increase"
                                            :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_increase)"
                                            @change="data_upload('ward-songothon3-departmental-information')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'vinno_dormalombi_associate_member_briddhi'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <input name="vinno_dormalombi_associate_member_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_gatti)"
                                        @change="data_upload('ward-songothon3-departmental-information')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="vinno_dormalombi_associate_member_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon3_departmental_information?.vinno_dormalombi_associate_member_target)"
                                            @change="data_upload('ward-songothon3-departmental-information')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon2_associate_members'"
                                            :field_title="'vinno_dormalombi_associate_member_target'" :month="month">
                                        </popup>
                                    </div>
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
                                <!-- <td>{{bangla($songothon4->general_unit_men_previous?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_men_present?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_men_increase?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_men_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_men_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->general_unit_men_target, $songothon4->general_unit_men_increase))}}
                                </td> -->

                                <td>
                                    <!-- <input name="general_unit_men_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.general_unit_men_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="general_unit_men_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.general_unit_men_present ?? '') }}
                                </td>
                                <td>
                                    <input name="general_unit_men_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_increase)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="general_unit_men_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_gatti)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="general_unit_men_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_target)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_target,
                                            report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_increase)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">সাধারণ ইউনিট (মহিলা)</td>
                                <!-- <td>{{bangla($songothon4->general_unit_women_previous?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_women_present?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_women_increase?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_women_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->general_unit_women_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->general_unit_women_target, $songothon4->general_unit_women_increase))}}
                                </td> -->
                                <td>
                                    <!-- <input name="general_unit_women_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.general_unit_women_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="general_unit_women_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.general_unit_women_present ?? '') }}
                                </td>
                                <td>
                                    <input name="general_unit_women_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_increase)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="general_unit_women_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_gatti)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="general_unit_women_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_target)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_target,
                                            report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_increase)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">উলামা ইউনিট</td>
                                <!-- <td>{{bangla($songothon4->ulama_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->ulama_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->ulama_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->ulama_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->ulama_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->ulama_unit_target, $songothon4->ulama_unit_increase))}}
                                </td> -->
                                <td>
                                    <!-- <input name="ulama_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.ulama_unit_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="ulama_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.ulama_unit_present ?? '') }}
                                </td>
                                <td>
                                    <input name="ulama_unit_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_increase)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ulama_unit_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_gatti)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ulama_unit_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_target)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_target,
                                            report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_increase)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">পেশাজীবী ইউনিট</td>
                                <!-- <td>{{bangla($songothon4->peshajibi_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->peshajibi_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->peshajibi_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->peshajibi_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->peshajibi_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->peshajibi_unit_target, $songothon4->peshajibi_unit_increase))}}
                                </td> -->
                                <td>
                                    <!-- <input name="peshajibi_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.peshajibi_unit_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="peshajibi_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.peshajibi_unit_present ?? '') }}
                                </td>
                                <td>
                                    <input name="peshajibi_unit_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_increase)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="peshajibi_unit_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_gatti)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="peshajibi_unit_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_target)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_target,
                                            report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_increase)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">শ্রমিক কল্যাণ ইউনিট</td>
                                <!-- <td>{{bangla($songothon4->sromik_kollyan_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->sromik_kollyan_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->sromik_kollyan_unit_target, $songothon4->sromik_kollyan_unit_increase))}}
                                </td> -->
                                <td>
                                    <!-- <input name="sromik_kollyan_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.sromik_kollyan_unit_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="sromik_kollyan_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.sromik_kollyan_unit_present ?? '') }}
                                </td>
                                <td>
                                    <input name="sromik_kollyan_unit_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_increase)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="sromik_kollyan_unit_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_gatti)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="sromik_kollyan_unit_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_target)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_target,
                                            report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_increase)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">যুব ইউনিট</td>
                                <!-- <td>{{bangla($songothon4->jubo_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->jubo_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->jubo_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->jubo_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->jubo_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->jubo_unit_target, $songothon4->jubo_unit_increase))}}
                                </td> -->
                                <td>
                                    <!-- <input name="jubo_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.jubo_unit_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="jubo_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.jubo_unit_present ?? '') }}
                                </td>
                                <td>
                                    <input name="jubo_unit_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_increase)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jubo_unit_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_gatti)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jubo_unit_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_target)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_target,
                                            report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_increase)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">মিডিয়া ইউনিট</td>
                                <!-- <td>{{bangla($songothon4->media_unit_previous?? "")}}</td>
                                <td>{{bangla($songothon4->media_unit_present?? "")}}</td>
                                <td>{{bangla($songothon4->media_unit_increase?? "")}}</td>
                                <td>{{bangla($songothon4->media_unit_gatti?? "")}}</td>
                                <td>{{bangla($songothon4->media_unit_target?? "")}}</td>
                                <td>
                                    {{bangla(implementation_rate($songothon4->media_unit_target, $songothon4->media_unit_increase))}}
                                </td> -->
                                <td>
                                    <!-- <input name="media_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_previous)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.media_unit_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="media_unit_present" :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_present)" @change="data_upload('ward-songothon4-unit-songothon')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.media_unit_present ?? '') }}
                                </td>
                                <td>
                                    <input name="media_unit_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_increase)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="media_unit_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_gatti)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="media_unit_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_target)"
                                        @change="data_upload('ward-songothon4-unit-songothon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    {{
                                        formatBangla(implementation_rate(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_target,
                                            report_sum_data?.ward_songothon4_unit_songothons?.media_unit_increase)) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">সর্বমোট ইউনিট সংখ্যা</td>
                                <td>
                                    {{
                                        formatBangla(
                                            (
                                                Number(previous_present?.general_unit_men_previous ?? 0) +
                                                Number(previous_present?.general_unit_women_previous ?? 0) +
                                                Number(previous_present?.ulama_unit_previous ?? 0) +
                                                Number(previous_present?.peshajibi_unit_previous ?? 0) +
                                                Number(previous_present?.sromik_kollyan_unit_previous ?? 0) +
                                                Number(previous_present?.jubo_unit_previous ?? 0) +
                                                Number(previous_present?.media_unit_previous ?? 0)
                                            ) || ''
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            (
                                                Number(previous_present?.general_unit_men_present ?? 0) +
                                                Number(previous_present?.general_unit_women_present ?? 0) +
                                                Number(previous_present?.ulama_unit_present ?? 0) +
                                                Number(previous_present?.peshajibi_unit_present ?? 0) +
                                                Number(previous_present?.sromik_kollyan_unit_present ?? 0) +
                                                Number(previous_present?.jubo_unit_present ?? 0) +
                                                Number(previous_present?.media_unit_present ?? 0)

                                            ) || ''
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        formatBangla(
                                            (
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_increase
                                                    ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_increase
                                                    ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_increase ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_increase ??
                                                    0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_increase
                                                    ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_increase ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_increase ?? 0)
                                            ) || ''
                                        )
                                    }}
                                </td>


                                <td>
                                    {{
                                        formatBangla(
                                            (
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_gatti ??
                                                    0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_gatti ??
                                                    0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_gatti ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_gatti ?? 0)
                                                +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_gatti
                                                    ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_gatti ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_gatti ?? 0)
                                            ) || ''
                                        )
                                    }}
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            (
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_target ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_target ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_target ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_target ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_target ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_target ?? 0) +
                                                Number(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_target ?? 0)
                                            ) || ''
                                        )
                                    }}
                                </td>

                                <td>
                                    {{
                                        formatBangla(
                                            implementation_rate(
                                                // First argument: Target values summed
                                                (
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_target ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_target ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_target ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_target ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_target?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_target ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_target ?? 0)
                                                ),
                                                // Second argument: Increase values summed
                                                (
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_men_increase ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.general_unit_women_increase ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.ulama_unit_increase ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.peshajibi_unit_increase ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.sromik_kollyan_unit_increase ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.jubo_unit_increase ?? 0) +
                                                    Number(report_sum_data?.ward_songothon4_unit_songothons?.media_unit_increase ?? 0)
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
                                    {{ formatBangla(previous_present?.dawati_unit_previous ?? '') }}
                                </td>
                                <td>
                                    <!-- <input name="dawati_unit_present" :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_present)" @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.dawati_unit_present ?? '') }}
                                </td>
                                <td>
                                    <input name="dawati_unit_increase"
                                        :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_increase)"
                                        @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="dawati_unit_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_gatti)"
                                        @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="dawati_unit_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.dawati_unit_target)"
                                        @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">মোট পারিবারিক ইউনিট</td>
                                <td>
                                    <!-- <input name="paribarik_unit_previous" :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_previous)" @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center" /> -->
                                    {{ formatBangla(previous_present?.paribarik_unit_previous ?? '') }}
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <!-- <input name="paribarik_unit_present" :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_present)" @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text" class="bg-input w-100 text-center" /> -->
                                        {{ formatBangla(previous_present?.paribarik_unit_present ?? '') }}
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon5_dawat_and_paribarik_units'"
                                            :field_title="'paribarik_unit_total'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="paribarik_unit_increase"
                                            :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_increase)"
                                            @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon5_dawat_and_paribarik_units'"
                                            :field_title="'paribarik_unit_increase'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <input name="paribarik_unit_gatti"
                                        :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_gatti)"
                                        @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="paribarik_unit_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon5_dawat_and_paribarik_units?.paribarik_unit_target)"
                                            @change="data_upload('ward-songothon5-dawat-and-paribarik-unit')"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon5_dawat_and_paribarik_units'"
                                            :field_title="'paribarik_unit_target'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-13">*দাওয়াতি ইউনিট ও পারিবারিক ইউনিটের সংখ্যা মোট সাংগঠনিক ইউনিটে অন্তর্ভুক্ত হবে
                        না।</p>
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
                                    <div class="d-flex">
                                        <input name="Joined_student_man_member"
                                            :value="formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_man_member)"
                                            @change="data_upload('ward-songothon6-bidayi-students-connect')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="Joined_student_women_member"
                                            :value="formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_women_member)"
                                            @change="data_upload('ward-songothon6-bidayi-students-connect')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="Joined_student_man_associate"
                                            :value="formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_man_associate)"
                                            @change="data_upload('ward-songothon6-bidayi-students-connect')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="Joined_student_women_associate"
                                            :value="formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_women_associate)"
                                            @change="data_upload('ward-songothon6-bidayi-students-connect')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="Joined_student_man_worker"
                                            :value="formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_man_worker)"
                                            @change="data_upload('ward-songothon6-bidayi-students-connect')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="Joined_student_women_worker"
                                            :value="formatBangla(report_sum_data?.ward_songothon6_bidayi_students_connects?.Joined_student_women_worker)"
                                            @change="data_upload('ward-songothon6-bidayi-students-connect')" type="text"
                                            class="bg-input w-100 text-center" />
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
                                        <td>
                                            <input name="upper_leader_sofor"
                                                :value="formatBangla(report_sum_data?.ward_songothon7_sofors?.upper_leader_sofor)"
                                                @change="data_upload('ward-songothon7-sofor')" type="text"
                                                class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">ওয়ার্ড আমীর/সভাপতির সফর</td>
                                        <td>
                                            <input name="ward_sovapotir_sofor"
                                                :value="formatBangla(report_sum_data?.ward_songothon7_sofors?.ward_sovapotir_sofor)"
                                                @change="data_upload('ward-songothon7-sofor')" type="text"
                                                class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">ওয়ার্ড শূরা/কর্মপরিষদ/টিম সদস্যদের সফর</td>
                                        <td>
                                            <input name="word_sura_sodosso_sofor"
                                                :value="formatBangla(report_sum_data?.ward_songothon7_sofors?.word_sura_sodosso_sofor)"
                                                @change="data_upload('ward-songothon7-sofor')" type="text"
                                                class="bg-input w-100 text-center" />
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
                                        <td>
                                            <div class="parent_popup">
                                                <input name="associate_member_total"
                                                    :value="formatBangla(report_sum_data?.ward_songothon8_iyanot_data?.associate_member_total)"
                                                    @change="data_upload('ward-songothon8-iyanot-data')" type="text"
                                                    class="bg-input w-100 text-center" />
                                                <popup :ward_id="report_header?.ward_info?.id"
                                                    :table_name="'songothon8_iyanot_data'"
                                                    :field_title="'associate_member_total'" :month="month">
                                                </popup>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                <input name="associate_member_total_iyanot_amounts"
                                                    :value="formatBangla(report_sum_data?.ward_songothon8_iyanot_data?.associate_member_total_iyanot_amounts)"
                                                    @change="data_upload('ward-songothon8-iyanot-data')" type="text"
                                                    class="bg-input w-100 text-center" />
                                                <popup :ward_id="report_header?.ward_info?.id"
                                                    :table_name="'songothon8_iyanot_data'"
                                                    :field_title="'associate_member_total_iyanot_amounts'"
                                                    :month="month">
                                                </popup>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">সুধী</td>
                                        <td>
                                            <div class="parent_popup">
                                                <input name="sudhi_total"
                                                    :value="formatBangla(report_sum_data?.ward_songothon8_iyanot_data?.sudhi_total)"
                                                    @change="data_upload('ward-songothon8-iyanot-data')" type="text"
                                                    class="bg-input w-100 text-center" />
                                                <popup :ward_id="report_header?.ward_info?.id"
                                                    :table_name="'songothon8_iyanot_data'" :field_title="'sudhi_total'"
                                                    :month="month">
                                                </popup>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="parent_popup">
                                                <input name="sudi_total_iyanot_amounts"
                                                    :value="formatBangla(report_sum_data?.ward_songothon8_iyanot_data?.sudi_total_iyanot_amounts)"
                                                    @change="data_upload('ward-songothon8-iyanot-data')" type="text"
                                                    class="bg-input w-100 text-center" />
                                                <popup :ward_id="report_header?.ward_info?.id"
                                                    :table_name="'songothon8_iyanot_data'"
                                                    :field_title="'sudi_total_iyanot_amounts'" :month="month">
                                                </popup>
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
                                <td class="text-start">ওয়ার্ড শূরা/কর্মপরিষদ / টিম বৈঠক</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="word_sura_boithok_total"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.word_sura_boithok_total)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="kormoporishod_boithok_total"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.kormoporishod_boithok_total)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="team_boithok_total"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.team_boithok_total)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="word_sura_boithok_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.word_sura_boithok_target)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="kormoporishod_boithok_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.kormoporishod_boithok_target)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="team_boithok_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.team_boithok_target)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="word_sura_boithok_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.word_sura_boithok)"
                                            @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.word_sura_boithok_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="kormoporishod_boithok_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.kormoporishod_boithok)"
                                            @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.kormoporishod_boithok_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="team_boithok_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.team_boithok)"
                                            @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.team_boithok_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">২.</td>
                                <td class="text-start">ওয়ার্ড বৈঠক</td>
                                <td>
                                    <input name="word_boithok_total"
                                        :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.word_boithok_total)"
                                        @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="word_boithok_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.word_boithok_target)"
                                        @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="word_boithok_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.word_boithok)"
                                        @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.word_boithok_total)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">৩.</td>
                                <td class="text-start">মাসিক সদস্য (রুকন) বৈঠক</td>
                                <td>
                                    <input name="masik_sodosso_boithok_total"
                                        :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.masik_sodosso_boithok_total)"
                                        @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="masik_sodosso_boithok_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.masik_sodosso_boithok_target)"
                                        @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="masik_sodosso_boithok_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.masik_sodosso_boithok)"
                                        @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.masik_sodosso_boithok_total)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">৪.</td>
                                <td class="text-start">ইউনিটে মোট কর্মী বৈঠক</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="unit_kormi_boithok_total"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.unit_kormi_boithok_total)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon9_sangothonik_boithoks'"
                                            :field_title="'unit_kormi_boithok_total'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td>
                                    <input name="unit_kormi_boithok_target"
                                        :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.unit_kormi_boithok_target)"
                                        @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="unit_kormi_boithok_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.unit_kormi_boithok)"
                                            @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.unit_kormi_boithok_total)"
                                            type="text" class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'songothon9_sangothonik_boithoks'"
                                            :field_title="'unit_kormi_boithok_uposthiti'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">৫.</td>
                                <td class="text-start">উলামা/ যুবক/শ্রমিকদের বৈঠক/সমাবেশ</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="ulama_somabesh_total"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.ulama_somabesh_total)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="jubok_somabesh_total"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.jubok_somabesh_total)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="sromik_somabesh_total"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.sromik_somabesh_total)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="ulama_somabesh_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.ulama_somabesh_target)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="jubok_somabesh_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.jubok_somabesh_target)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="sromik_somabesh_target"
                                            :value="formatBangla(report_sum_data?.ward_songothon9_sangothonik_boithoks?.sromik_somabesh_target)"
                                            @change="data_upload('ward-songothon9-sangothonik-boithok')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="ulama_somabesh_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.ulama_somabesh)"
                                            @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.ulama_somabesh_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="jubok_somabesh_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.jubok_somabesh)"
                                            @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.jubok_somabesh_total)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="sromik_somabesh_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_songothon9_sangothonik_boithoks?.sromik_somabesh)"
                                            @change="average_data_upload($event, 'ward-songothon9-sangothonik-boithok', songothon9.sromik_somabesh_total)"
                                            type="text" class="bg-input w-100 text-center" />
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
                                <td>
                                    <input name="unit_tarbiati_boithok"
                                        :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.unit_tarbiati_boithok)"
                                        @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="unit_tarbiati_boithok_target"
                                        :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.unit_tarbiati_boithok_target)"
                                        @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="unit_tarbiati_boithok_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.unit_tarbiati_boithok)"
                                        @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.unit_tarbiati_boithok)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td>২.</td>
                                <td class="text-start">ওয়ার্ডভিত্তিক কর্মী শিক্ষা বৈঠক</td>
                                <td>
                                    <input name="ward_kormi_sikkha_boithok"
                                        :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.ward_kormi_sikkha_boithok)"
                                        @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ward_kormi_sikkha_boithok_target"
                                        :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.ward_kormi_sikkha_boithok_target)"
                                        @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="ward_kormi_sikkha_boithok_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.ward_kormi_sikkha_boithok)"
                                        @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.ward_kormi_sikkha_boithok)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td>৩.</td>
                                <td class="text-start">ঊর্ধ্বতন সংগঠনের শিক্ষাশিবির/শিক্ষা বৈঠকে অংশগ্রহণকারী</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="urdhotono_sikkha_shibir"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_shibir)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="urdhotono_sikkha_boithok"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_boithok)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="urdhotono_sikkha_shibir_target"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_shibir_target)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="urdhotono_sikkha_boithok_target"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_boithok_target)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="urdhotono_sikkha_shibir_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_shibir)"
                                            @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.urdhotono_sikkha_shibir)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="urdhotono_sikkha_boithok_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_boithok)"
                                            @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.urdhotono_sikkha_boithok)"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>৪.</td>
                                <td class="text-start">গণশিক্ষা বৈঠক/ গণ নৈশ ইবাদত</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="gono_sikkha_boithok"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.gono_sikkha_boithok)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="gono_noisho_ibadot"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.gono_noisho_ibadot)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="gono_sikkha_boithok_target"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.gono_sikkha_boithok_target)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="gono_noisho_ibadot_target"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.gono_noisho_ibadot_target)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="gono_sikkha_boithok_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.gono_sikkha_boithok)"
                                            @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.gono_sikkha_boithok)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="gono_noisho_ibadot_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.gono_noisho_ibadot)"
                                            @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.gono_noisho_ibadot)"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>৫.</td>
                                <td class="text-start">আলোচনা চক্র</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="me-2 text-nowrap">গ্রুপ সংখ্যা:</span>
                                        <input name="alochona_chokro_group"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.alochona_chokro_group)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="me-2 text-nowrap">অধিবেশন সংখ্যা:</span>
                                        <input name="alochona_chokro_program"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.alochona_chokro_program)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center flex-grow-1 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <input name="alochona_chokro_uposthiti"
                                        :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.alochona_chokro)"
                                        @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.alochona_chokro_program)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td>৬.</td>
                                <td class="text-start">দারস্/সহীহ কুরআন তিলাওয়াত অনুশীলন</td>
                                <td class="text-start">
                                    <div class="d-flex">
                                        <span class="me-2 text-nowrap">প্রোগ্রাম সংখ্যা :</span>
                                        <input name="darsul_quran_program"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.darsul_quran_program)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="sohih_tilawat_program"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon1_tarbiats?.sohih_tilawat_program)"
                                            @change="data_upload('ward-proshikkhon1-tarbiat')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="d-flex">
                                        <input name="darsul_quran_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.darsul_quran)"
                                            @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.darsul_quran_program)"
                                            type="text" class="bg-input w-100 text-center" />/
                                        <input name="sohih_tilawat_uposthiti"
                                            :value="formatBangla(average_uposthiti?.ward_proshikkhon1_tarbiats?.sohih_tilawat)"
                                            @change="average_data_upload($event, 'ward-proshikkhon1-tarbiat', proshikkhon1.sohih_tilawat_program)"
                                            type="text" class="bg-input w-100 text-center" />
                                    </div>
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
                                    <div class="d-flex">
                                        <input name="dawah_uposthiti"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.dawah_uposthiti)"
                                            @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="shomajkormo_uposthiti"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.shomajkormo_uposthiti)"
                                            @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="media_uposthiti"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.media_uposthiti)"
                                            @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">আইসিটি/ অফিস/ ফিন্যান্সিয়াল ম্যানেজমেন্ট/ ইংরেজি ভাষা/ আরবি
                                    ভাষা</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="ict_uposthiti"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.ict_uposthiti)"
                                            @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="office_uposthiti"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.office_uposthiti)"
                                            @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="financial_management_uposthiti"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.financial_management_uposthiti)"
                                            @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="english_language_uposthiti"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.english_language_uposthiti)"
                                            @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="arabic_language_uposthiti"
                                            :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.arabic_language_uposthiti)"
                                            @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ*</td>
                                <td>
                                    <input name="trade_oriented_technical_training_uposthiti"
                                        :value="formatBangla(report_sum_data?.ward_proshikkhon2_manob_shompod_unnoyons?.trade_oriented_technical_training_uposthiti)"
                                        @change="data_upload('ward-proshikkhon2-manob-shompod-unnoyon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="font-14">* ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ কোর্সের আওতায় ফার্সিং (পোল্ট্রি, ফিশারিজ,
                        ডেইরি), সেলাই/এমব্রয়ডারী মেশিন অপারেটর, ড্রাইভিং কাম অটোমেকানিক, রন্ধন শিল্প,
                        হর্টিকালচার/নার্সারি, তাঁত শিল্প/বুটিকস, হস্ত শিল্প, ইলেক্ট্রিক্যাল এন্ড ইলেক্ট্রনিক্স
                        সার্ভিসিং, সিভিল কন্সট্রাকশন/প্লাম্বারিং, আমিনশীপ ইত্যাদি কোর্সসমূহের বাস্তবায়ন রিপোর্টের যোগফল
                        এখানে বসাতে হবে।</p>
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
                                <div class="parent_popup">
                                    <input name="how_many_people_did"
                                        :value="formatBangla(report_sum_data?.ward_shomajsheba1_personal_social_works?.how_many_people_did)"
                                        @change="data_upload('ward-shomajsheba1-personal-social-work')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <popup :ward_id="report_header?.ward_info?.id"
                                        :table_name="'shomajsheba1_personal_social_works'"
                                        :field_title="'how_many_people_did'" :month="month">
                                    </popup>
                                </div>
                            </td>
                            <td class="text-start px-2 w-25">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                            <td class="width-20">
                                <div class="parent_popup">
                                    <input name="service_received_total"
                                        :value="formatBangla(report_sum_data?.ward_shomajsheba1_personal_social_works?.service_received_total)"
                                        @change="data_upload('ward-shomajsheba1-personal-social-work')" type="text"
                                        class="bg-input w-100 text-center" />
                                    <popup :ward_id="report_header?.ward_info?.id"
                                        :table_name="'shomajsheba1_personal_social_works'"
                                        :field_title="'service_received_total'" :month="month">
                                    </popup>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="samostik_shamajik_kaj pt-3 mb-2">
                    <h4 class="fs-6 fw-bold">২. সামষ্টিক/সেবা টিমের মাধ্যমে সামাজিক কাজ (প্রযোজ্য ক্ষেত্রে):</h4>
                    <table class="mb-1">
                        <tbody>
                            <td class="w-25 text-center">সাধারণ সেবা টিম সংখ্যা</td>
                            <td>
                                <input name="number_of_general_service_teams"
                                    :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.number_of_general_service_teams)"
                                    @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td class="w-25 text-center">টেকনিক্যাল সেবা টিম সংখ্যা</td>
                            <td>
                                <input name="number_of_technical_service_teams"
                                    :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.number_of_technical_service_teams)"
                                    @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td class="w-25 text-center">স্বেচ্ছাসেবক টিম সংখ্যা</td>
                            <td>
                                <input name="number_of_volunteer_teams"
                                    :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.number_of_volunteer_teams)"
                                    @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                    class="bg-input w-100 text-center" />
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
                                <td>
                                    <input name="minor_unnoyonmulok_kaj"
                                        :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.minor_unnoyonmulok_kaj)"
                                        @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">টেকনিক্যাল সেবা প্রদান (কতজন / কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="technical_services_prodan_kotojonke"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.technical_services_prodan_kotojonke)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="online_services_prodan_kotojonke"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.online_services_prodan_kotojonke)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2 font-13">সামাজিক অনুষ্ঠানে অশংগ্রহণ/সহায়তা প্রদান (সংখ্যা /
                                    কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="shamajik_onusthane_ongshogrohon"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.shamajik_onusthane_ongshogrohon)"
                                                @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                                class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'shomajsheba2_unit_social_works'"
                                                :field_title="'shamajik_onusthane_ongshogrohon'" :month="month">
                                            </popup>
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            <input name="shamajik_onusthane_shohayota_prodan"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.shamajik_onusthane_shohayota_prodan)"
                                                @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                                class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'shomajsheba2_unit_social_works'"
                                                :field_title="'shamajik_onusthane_shohayota_prodan'" :month="month">
                                            </popup>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">অনলাইনের মাধ্যমে সেবা প্রদান (কতজনকে)</td>
                                <td>
                                    <input name="online_services_prodan_kotojonke"
                                        :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.online_services_prodan_kotojonke)"
                                        @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="shamajik_birodh_mimangsha"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.shamajik_birodh_mimangsha)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'shomajsheba2_unit_social_works'"
                                            :field_title="'shamajik_birodh_mimangsha'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td class="text-start px-2">বৃক্ষরোপন (কতটি)</td>
                                <td>
                                    <input name="brikkho_ropon"
                                        :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.brikkho_ropon)"
                                        @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মানবিক সহায়তা প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="manobik_shohayota_prodan"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.manobik_shohayota_prodan)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'shomajsheba2_unit_social_works'"
                                            :field_title="'manobik_shohayota_prodan'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td class="text-start px-2">জনসচেতনতামূলক প্রোগ্রাম (কতটি)</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="public_awareness_programs"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.public_awareness_programs)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <!-- <popup
                                            :ward_id="report_header?.ward_info?.id"
                                            :table_name="'shomajsheba2_unit_social_works'"
                                            :field_title="'shamajik_onusthane_shohayota_prodan'"
                                            :month="month"
                                            >
                                        </popup> -->
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কর্জে হাসানা প্রদান (কতজনকে )</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="korje_hasana_prodan"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.korje_hasana_prodan)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'shomajsheba2_unit_social_works'"
                                            :field_title="'korje_hasana_prodan'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td class="text-start px-2">ত্রাণ বিতরণ (কতজনকে)</td>
                                <td>
                                    <input name="tran_bitoron"
                                        :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.tran_bitoron)"
                                        @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">পরিষ্কার-পরিচ্ছন্নতা/মশক নিধন অভিযান</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="porishkar_poricchonnota_ovijan"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.porishkar_poricchonnota_ovijan)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="moshok_nidhon_ovijan"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.moshok_nidhon_ovijan)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="text-start px-2">ভিন্নধর্মাবলম্বীদের সেবা প্রদান (কতজন/কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="vinnodhormabolombider_service_prodan_kotojon"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.vinnodhormabolombider_service_prodan_kotojon)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="vinnodhormabolombider_service_prodan_kotojonke"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.vinnodhormabolombider_service_prodan_kotojonke)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="rogir_poricorja"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.rogir_poricorja)"
                                                @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                                class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'shomajsheba2_unit_social_works'"
                                                :field_title="'rogir_poricorja'" :month="month">
                                            </popup>
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            <input name="medical_shohayota_prodan"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.medical_shohayota_prodan)"
                                                @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                                class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'shomajsheba2_unit_social_works'"
                                                :field_title="'medical_shohayota_prodan'" :month="month">
                                            </popup>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে )</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="mayeter_gosol_kotojonke"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.mayeter_gosol_kotojonke)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'shomajsheba2_unit_social_works'"
                                            :field_title="'mayeter_gosol_kotojonke'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="parent_popup">
                                            <input name="voluntarily_blood_donation_kotojon"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.voluntarily_blood_donation_kotojon)"
                                                @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                                class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'shomajsheba2_unit_social_works'"
                                                :field_title="'voluntarily_blood_donation_kotojon'" :month="month">
                                            </popup>
                                        </div>
                                        /
                                        <div class="parent_popup">
                                            <input name="voluntarily_blood_donation_kotojonke"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.voluntarily_blood_donation_kotojonke)"
                                                @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                                class="bg-input w-100 text-center" />
                                            <popup :ward_id="report_header?.ward_info?.id"
                                                :table_name="'shomajsheba2_unit_social_works'"
                                                :field_title="'voluntarily_blood_donation_kotojonke'" :month="month">
                                            </popup>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-start px-2">জানাযায় অংশগ্রহণ</td>
                                <td>
                                    <input name="janajay_ongshogrohon"
                                        :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.janajay_ongshogrohon)"
                                        @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নবজাতককে গিফ্‌ট প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="nobojatokke_gift_prodan"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.nobojatokke_gift_prodan)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'shomajsheba2_unit_social_works'"
                                            :field_title="'nobojatokke_gift_prodan'" :month="month">
                                        </popup>
                                    </div>
                                </td>
                                <td class="text-start px-2">স্বল্প পুঁজিতে কর্মসংস্থানের সহায়তা (কতজনকে)</td>
                                <td>
                                    <input name="low_capital_employment_kotojonke"
                                        :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.low_capital_employment_kotojonke)"
                                        @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">ভ্রাম্যমান স্কুল/মক্তব চালু</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="vrammoman_school_calu"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.vrammoman_school_calu)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="vrammoman_moktob_calu"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.vrammoman_moktob_calu)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td class="text-start px-2">অন্যান্য......</td>
                                <td>
                                    <div class="parent_popup">
                                        <input name="others"
                                            :value="formatBangla(report_sum_data?.ward_shomajsheba2_group_social_works?.others)"
                                            @change="data_upload('ward-shomajsheba2-group-social-work')" type="text"
                                            class="bg-input w-100 text-center" />
                                        <popup :ward_id="report_header?.ward_info?.id"
                                            :table_name="'shomajsheba2_unit_social_works'" :field_title="'others'"
                                            :month="month">
                                        </popup>
                                    </div>
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
                                        <td>
                                            <input name="health_worker_training_programs_attendance"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba3_health_and_family_kollans?.health_worker_training_programs_attendance)"
                                                @change="data_upload('ward-shomajsheba3-health-and-family-kollan')"
                                                type="text" class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">কতজন স্বাস্থ্যসেবা কাজে অংশগ্রহণ করেছেন</td>
                                        <td>
                                            <input name="participated_in_health_care_work"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba3_health_and_family_kollans?.participated_in_health_care_work)"
                                                @change="data_upload('ward-shomajsheba3-health-and-family-kollan')"
                                                type="text" class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">সেবাপ্রাপ্ত সংখ্যা</td>
                                        <td>
                                            <input name="served_people"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba3_health_and_family_kollans?.served_people)"
                                                @change="data_upload('ward-shomajsheba3-health-and-family-kollan')"
                                                type="text" class="bg-input w-100 text-center" />
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
                                        <td>
                                            <input name="shamajik_protishthan_kototi"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba4_institutional_social_works?.shamajik_protishthan_kototi)"
                                                @change="data_upload('ward-shomajsheba4-institutional-social-work')"
                                                type="text" class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">কতটি প্রতিষ্ঠানে সামাজিক কাজ হয়েছে</td>
                                        <td>
                                            <input name="shamajik_protishthan_kototite_kaj_hoyeche"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba4_institutional_social_works?.shamajik_protishthan_kototite_kaj_hoyeche)"
                                                @change="data_upload('ward-shomajsheba4-institutional-social-work')"
                                                type="text" class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2 font-13">কতটি নতুন সামাজিক প্রতিষ্ঠান চালু করা হয়েছে
                                            (প্রযোজ্য ক্ষেত্রে)</td>
                                        <td>
                                            <input name="new_shamajik_protishthan"
                                                :value="formatBangla(report_sum_data?.ward_shomajsheba4_institutional_social_works?.new_shamajik_protishthan)"
                                                @change="data_upload('ward-shomajsheba4-institutional-social-work')"
                                                type="text" class="bg-input w-100 text-center" />
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
                                <!-- <td>{{bangla($rastrio1->rajnoitik_bekti_jogajog_koreche_kotojon?? "")}}</td>
                                <td>{{bangla($rastrio1->rajnoitik_bekti_jogajog_koreche_kotojonke?? "")}}</td> -->
                                <td>
                                    <input name="rajnoitik_bekti_jogajog_koreche_kotojon"
                                        :value="formatBangla(report_sum_data?.ward_rastrio1_political_communications?.rajnoitik_bekti_jogajog_koreche_kotojon)"
                                        @change="data_upload('ward-rastrio1-political-communication')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="rajnoitik_bekti_jogajog_koreche_kotojonke"
                                        :value="formatBangla(report_sum_data?.ward_rastrio1_political_communications?.rajnoitik_bekti_jogajog_koreche_kotojonke)"
                                        @change="data_upload('ward-rastrio1-political-communication')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">প্রশাসনিক ব্যক্তিবর্গ</td>
                                <!-- <td>{{bangla($rastrio1->proshoshonik_bekti_jogajog_koreche_kotojon?? "")}}</td>
                                <td>{{bangla($rastrio1->proshoshonik_bekti_jogajog_koreche_kotojonke?? "")}}</td> -->
                                <td>
                                    <input name="proshoshonik_bekti_jogajog_koreche_kotojon"
                                        :value="formatBangla(report_sum_data?.ward_rastrio1_political_communications?.proshoshonik_bekti_jogajog_koreche_kotojon)"
                                        @change="data_upload('ward-rastrio1-political-communication')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="proshoshonik_bekti_jogajog_koreche_kotojonke"
                                        :value="formatBangla(report_sum_data?.ward_rastrio1_political_communications?.proshoshonik_bekti_jogajog_koreche_kotojonke)"
                                        @change="data_upload('ward-rastrio1-political-communication')" type="text"
                                        class="bg-input w-100 text-center" />
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
                                        <!-- <td>{{bangla($rastrio2->centrally_announced_political_program?? "")}}</td> -->
                                        <td>
                                            <input name="centrally_announced_political_program"
                                                :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.centrally_announced_political_program)"
                                                @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                type="text" class="bg-input w-100 text-center" />
                                        </td>
                                        <td>
                                            <!-- {{bangla(calculate_average($rastrio2->centrally_announced_political_program, $rastrio2->centrally_announced_political_program_attend))}} -->
                                            <input name="centrally_announced_political_program_attend"
                                                :value="formatBangla(average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.centrally_announced_political_program)"
                                                @change="average_data_upload($event, 'ward-rastrio2-kormoshuchi-bastobayon', rastrio2.centrally_announced_political_program)"
                                                type="text" class="bg-input w-100 text-center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2 font-13">স্থানীয়ভাবে ঘোষিত কর্মসূচি :
                                            জনসভা/সমাবেশ/মিছিল</td>
                                        <td class="font-13">
                                            <!-- {{bangla($rastrio2->locally_announced_jonoshova?? "")}}/
                                            {{bangla($rastrio2->locally_announced_shomabesh?? "")}}/
                                            {{bangla($rastrio2->locally_announced_michil?? "")}} -->
                                            <div class="d-flex">
                                                <input name="locally_announced_jonoshova"
                                                    :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_jonoshova)"
                                                    @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                    type="text" class="bg-input w-100 text-center" />/
                                                <input name="locally_announced_shomabesh"
                                                    :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_shomabesh)"
                                                    @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                    type="text" class="bg-input w-100 text-center" />/
                                                <input name="locally_announced_michil"
                                                    :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_michil)"
                                                    @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                    type="text" class="bg-input w-100 text-center" />
                                            </div>
                                        </td>
                                        <!-- <td class="font-13">
                                            {{bangla(calculate_average($rastrio2->locally_announced_jonoshova, $rastrio2->locally_announced_jonoshova_attend))}}/
                                            {{bangla(calculate_average($rastrio2->locally_announced_shomabesh, $rastrio2->locally_announced_shomabesh_attend))}}/
                                            {{bangla(calculate_average($rastrio2->locally_announced_michil, $rastrio2->locally_announced_michil_attend))}}
                                        </td> -->
                                        <td>
                                            <div class="d-flex">
                                                <input name="locally_announced_jonoshova_attend"
                                                    :value="formatBangla(average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_jonoshova)"
                                                    @change="average_data_upload($event, 'ward-rastrio2-kormoshuchi-bastobayon', rastrio2.locally_announced_jonoshova)"
                                                    type="text" class="bg-input w-100 text-center" />/
                                                <input name="locally_announced_shomabesh_attend"
                                                    :value="formatBangla(average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_shomabesh)"
                                                    @change="average_data_upload($event, 'ward-rastrio2-kormoshuchi-bastobayon', rastrio2.locally_announced_shomabesh)"
                                                    type="text" class="bg-input w-100 text-center" />/
                                                <input name="locally_announced_michil_attend"
                                                    :value="formatBangla(average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_michil)"
                                                    @change="average_data_upload($event, 'ward-rastrio2-kormoshuchi-bastobayon', rastrio2.locally_announced_michil)"
                                                    type="text" class="bg-input w-100 text-center" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="right width-45">
                            <table class="text-center  mb-1">
                                <thead>
                                    <tr>
                                        <th class="width-65">কর্মসূচির বিবরণ</th>
                                        <th>মোট সংখ্যা</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-start px-2 font-14">পোস্টার/লিফলেট/বুকলেট/স্মারকলিপি বিতরণ</td>
                                        <td class="font-13">
                                            <!-- {{bangla($rastrio2->poster_bitoron?? "")}}/
                                            {{bangla($rastrio2->leaflet_bitoron?? "")}}/
                                            {{bangla($rastrio2->booklet_bitoron?? "")}}/
                                            {{bangla($rastrio2->sharoklipi_bitoron?? "")}} -->
                                            <div class="d-flex">
                                                <input name="poster_bitoron"
                                                    :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.poster_bitoron)"
                                                    @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                    type="text" class="bg-input w-100 text-center" />/
                                                <input name="leaflet_bitoron"
                                                    :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.leaflet_bitoron)"
                                                    @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                    type="text" class="bg-input w-100 text-center" />/
                                                <input name="booklet_bitoron"
                                                    :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.booklet_bitoron)"
                                                    @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                    type="text" class="bg-input w-100 text-center" />/
                                                <input name="sharoklipi_bitoron"
                                                    :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.sharoklipi_bitoron)"
                                                    @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                    type="text" class="bg-input w-100 text-center" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start px-2">অন্যান্য</td>
                                        <!-- <td>{{bangla($rastrio2->others?? "")}}</td> -->
                                        <td>
                                            <input name="others"
                                                :value="formatBangla(report_sum_data?.ward_rastrio2_kormoshuchi_bastobayons?.others)"
                                                @change="data_upload('ward-rastrio2-kormoshuchi-bastobayon')"
                                                type="text" class="bg-input w-100 text-center" />
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
                                    <input name="shadhinota_o_jatio_dibosh_total_programs"
                                        :value="formatBangla(report_sum_data?.ward_rastrio3_dibosh_palons?.shadhinota_o_jatio_dibosh_total_programs)"
                                        @change="data_upload('ward-rastrio3-dibosh-palon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="shadhinota_o_jatio_dibosh_attend"
                                        :value="formatBangla(average_uposthiti?.ward_rastrio3_dibosh_palons?.shadhinota_o_jatio_dibosh)"
                                        @change="average_data_upload($event, 'ward-rastrio3-dibosh-palon', rastrio3.shadhinota_o_jatio_dibosh_total_programs)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start">আন্তর্জাতিক মাতৃভাষা দিবস</td>
                                <td>
                                    <input name="mattrivasha_dibosh_total_programs"
                                        :value="formatBangla(report_sum_data?.ward_rastrio3_dibosh_palons?.mattrivasha_dibosh_total_programs)"
                                        @change="data_upload('ward-rastrio3-dibosh-palon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="mattrivasha_dibosh_attend"
                                        :value="formatBangla(average_uposthiti?.ward_rastrio3_dibosh_palons?.mattrivasha_dibosh)"
                                        @change="average_data_upload($event, 'ward-rastrio3-dibosh-palon', rastrio3.mattrivasha_dibosh_total_programs)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start">বিজয় দিবস</td>
                                <td>
                                    <input name="bijoy_dibosh_total_programs"
                                        :value="formatBangla(report_sum_data?.ward_rastrio3_dibosh_palons?.bijoy_dibosh_total_programs)"
                                        @change="data_upload('ward-rastrio3-dibosh-palon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="bijoy_dibosh_attend"
                                        :value="formatBangla(average_uposthiti?.ward_rastrio3_dibosh_palons?.bijoy_dibosh)"
                                        @change="average_data_upload($event, 'ward-rastrio3-dibosh-palon', rastrio3.bijoy_dibosh_total_programs)"
                                        type="text" class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start">অন্যান্য</td>
                                <td>
                                    <input name="others_total_programs"
                                        :value="formatBangla(report_sum_data?.ward_rastrio3_dibosh_palons?.others_total_programs)"
                                        @change="data_upload('ward-rastrio3-dibosh-palon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="others_attend"
                                        :value="formatBangla(average_uposthiti?.ward_rastrio3_dibosh_palons?.others)"
                                        @change="average_data_upload($event, 'ward-rastrio3-dibosh-palon', rastrio3.others_total_programs)"
                                        type="text" class="bg-input w-100 text-center" />
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
                                <th class="w-25">নির্বাচনের ধরন</th>
                                <th>মোট প্রার্থী সংখ্যা</th>
                                <th>নির্বাচিত সংখ্যা</th>
                                <th>দ্বিতীয় অবস্থান</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start px-2">কাউন্সিলর/মেম্বার</td>
                                <td>
                                    <!-- {{bangla($rastrio4->councilor_candidate?? "")}} /
                                    {{bangla($rastrio4->member_candidate?? "")}} -->
                                    <div class="d-flex">
                                        <input name="councilor_candidate"
                                            :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.councilor_candidate)"
                                            @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="member_candidate"
                                            :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.member_candidate)"
                                            @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <!-- {{bangla($rastrio4->councilor_candidate_elected?? "")}} /
                                    {{bangla($rastrio4->member_candidate_elected?? "")}} -->
                                    <div class="d-flex">
                                        <input name="councilor_candidate_elected"
                                            :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.councilor_candidate_elected)"
                                            @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="member_candidate_elected"
                                            :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.member_candidate_elected)"
                                            @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
                                </td>
                                <td>
                                    <!-- {{bangla($rastrio4->councilor_candidate_second_position?? "")}} /
                                    {{bangla($rastrio4->member_candidate_second_position?? "")}} -->
                                    <div class="d-flex">
                                        <input name="councilor_candidate_second_position"
                                            :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.councilor_candidate_second_position)"
                                            @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                            class="bg-input w-100 text-center" />/
                                        <input name="member_candidate_second_position"
                                            :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.member_candidate_second_position)"
                                            @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                            class="bg-input w-100 text-center" />
                                    </div>
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
                                        <!-- {{bangla($rastrio4->national_vote_kendro?? "")}} /
                                        {{bangla($rastrio4->local_vote_kendro?? "")}} -->
                                        <div>
                                            <!-- <input name="national_vote_kendro"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.national_vote_kendro)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />/
                                            <input name="local_vote_kendro"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.local_vote_kendro)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" /> -->
                                            <span>{{ formatBangla(previous_present.national_vote_kendro_present) }}</span>/
                                            <span>{{ formatBangla(previous_present.local_vote_kendro_present) }}</span>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <!-- {{bangla($rastrio4->national_vote_kendro_increase?? "")}} /
                                        {{bangla($rastrio4->local_vote_kendro_increase?? "")}} -->
                                        <div class="d-flex">
                                            <input name="national_vote_kendro_increase"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.national_vote_kendro_increase)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />/
                                            <input name="local_vote_kendro_increase"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.local_vote_kendro_increase)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                    <td>
                                        <!-- {{bangla($rastrio4->national_vote_kendro_target?? "")}} /
                                        {{bangla($rastrio4->local_vote_kendro_target?? "")}} -->
                                        <div class="d-flex">
                                            <input name="national_vote_kendro_target"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.national_vote_kendro_target)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />/
                                            <input name="local_vote_kendro_target"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.local_vote_kendro_target)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-start">ভোট কেন্দ্র কমিটি/কেন্দ্র/ বুথভিত্তিক ইউনিট</td>
                                    <td>
                                        <!-- {{bangla($rastrio4->vote_kendro_committee?? "")}} /
                                        {{bangla($rastrio4->vote_kendro_vittik_unit?? "")}} -->
                                        <div>
                                            <!-- <input name="vote_kendro_committee"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_committee)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />/
                                            <input name="vote_kendro_vittik_unit"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_vittik_unit)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" /> -->
                                            <span>{{ formatBangla(previous_present.vote_kendro_committee_present) }}</span>/
                                            <span>{{ formatBangla(previous_present.vote_kendro_vittik_unit_present) }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <!-- {{bangla($rastrio4->vote_kendro_committee_increase?? "")}} /
                                        {{bangla($rastrio4->vote_kendro_vittik_unit_increase?? "")}} -->
                                        <div class="d-flex">
                                            <input name="vote_kendro_committee_increase"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_committee_increase)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />/
                                            <input name="vote_kendro_vittik_unit_increase"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_vittik_unit_increase)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />
                                        </div>
                                    </td>
                                    <td>
                                        <!-- {{bangla($rastrio4->vote_kendro_committee_target?? "")}} /
                                        {{bangla($rastrio4->vote_kendro_vittik_unit_target?? "")}} -->
                                        <div class="d-flex">
                                            <input name="vote_kendro_committee_target"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_committee_target)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />/
                                            <input name="vote_kendro_vittik_unit_target"
                                                :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.vote_kendro_vittik_unit_target)"
                                                @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                                class="bg-input w-100 text-center" />
                                        </div>
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
                                    <!-- <td>{{bangla($rastrio4->election_management_committee_meeting?? "")}}</td> -->
                                    <td>
                                        <input name="election_management_committee_meeting"
                                            :value="formatBangla(report_sum_data?.ward_rastrio4_election_activities?.election_management_committee_meeting)"
                                            @change="data_upload('ward-rastrio4-election-activitie')" type="text"
                                            class="bg-input w-100 text-center" />
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
                                        <tr v-for="(income_category, index) in income_report?.category_wise_data"
                                            :key="index">
                                            <td class="text-start px-2 w-50 border_bottom">{{
                                                income_category.category_name }}</td>
                                            <td class="border_left_bottom">
                                                <input name="bm_entry" :value="formatBangla(income_category.amount)"
                                                    @change="income_store(income_category.category_id, $event.target.value)"
                                                    type="text" class="bg-input w-100 text-center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        <tr v-for="(expense_category, index) in expense_report?.category_wise_data"
                                            :key="index">
                                            <td class="text-start px-2 w-50 border_bottom">{{ expense_category.category_name }}
                                            </td>
                                            <td class="border_left_bottom">
                                                <input name="bm_entry" :value="formatBangla(expense_category.amount)"
                                                    @change="expense_store(expense_category.category_id, $event.target.value)"
                                                    type="text" class="bg-input w-100 text-center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">মোট</td>
                            <td>{{ formatBangla(parseInt(income_report?.total_amount) ?? "") }}</td>
                            <td class="text-end px-2">মোট</td>
                            <td>{{ formatBangla(parseInt(expense_report?.total_amount) ?? "") }}</td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">গত মাসের উদ্বৃত্ত</td>
                            <td>{{ formatBangla(parseInt(total_previous) ?? "") }}</td>
                            <td class="text-end px-2">এ মাসের উদ্বৃত্ত</td>
                            <td>{{ formatBangla(parseInt(total_current_income) ?? "") }}</td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>{{ formatBangla(parseInt(total_current_income) ?? "") }}</td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>{{ formatBangla(parseInt(in_total) ?? "") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="montobbo">
                <h1 class="fs-6 fw-bold">ওয়ার্ড আমীর/সভাপতির মন্তব্য :</h1>
                <textarea name="montobbo" @change="data_upload('ward-montobbo')" id="" cols="30" class="w-100 bg-input"
                    rows="5">{{ report_sum_data?.ward_montobbos?.montobbo }}</textarea>
            </div>
        </section>

        <div class="joma_din text-center mt-3 pb-5">
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
    </div>
</template>

<script>
import axios from "axios";
import Popup from "../components/Popup.vue"
import PopupNote from "../components/PopupNote.vue"

export default {
    components: { Popup, PopupNote },
    data() {
        return {
            month: '',
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

    created() {
        this.uploaded_data()
        // this.income_category()
        // this.expense_category()
        // this.bm_category_wise()/
        // this.bm_expense_category_wise()
        this.report_status()
    },
    watch: {
        'report_sum_data.ward_kormosuci_bastobayons': function () {
            this.average_data('ward_kormosuci_bastobayons');
        },
        'report_sum_data.ward_songothon9_sangothonik_boithoks': function () {
            this.average_data('ward_songothon9_sangothonik_boithoks');
        },
        'report_sum_data.ward_proshikkhon1_tarbiats': function () {
            this.average_data('ward_proshikkhon1_tarbiats');
        },
        'report_sum_data.ward_rastrio2_kormoshuchi_bastobayons': function () {
            this.average_data('ward_rastrio2_kormoshuchi_bastobayons');
        },
        'report_sum_data.ward_rastrio3_dibosh_palons': function () {
            this.average_data('ward_rastrio3_dibosh_palons');
        },
        // kormosuci: function () {
        //     this.average_data();
        // },
        // songothon9: function () {
        //     this.average_data();
        // },
        // proshikkhon1: function () {
        //     this.average_data();
        // },
        // rastrio2: function () {
        //     this.average_data();
        // },

        total_income: function () {
            console.log(typeof this.total_income);
        },

    },
    methods: {
        uploaded_data: async function () {

            const month = this.$route.params.month;
            const user_id = this.$route.params.user_id;
            console.log("month from uploaded_data load", month);
            let res = await axios.get('/ward/uploaded-data-monthly', {
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
                    this.income_report = res.data.data.income_report,
                    this.expense_report = res.data.data.expense_report

                this.total_previous = res.data.total_previous,
                    this.total_current_income = res.data.total_current_income,
                    this.in_total = res.data.in_total
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
                    "others"
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
                    "sromik_somabesh"
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
                    "sohih_tilawat"
                ],
                ward_rastrio2_kormoshuchi_bastobayons: [
                    "centrally_announced_political_program",
                    "locally_announced_jonoshova",
                    "locally_announced_shomabesh",
                    "locally_announced_michil"
                ],
                ward_rastrio3_dibosh_palons: [
                    "shadhinota_o_jatio_dibosh",
                    "bijoy_dibosh",
                    "mattrivasha_dibosh",
                    "others"
                ]
            };

            const attendance_key_suffix = {
                ward_kormosuci_bastobayons: "_uposthiti",
                ward_songothon9_sangothonik_boithoks: "_uposthiti",
                ward_proshikkhon1_tarbiats: "_uposthiti",
                ward_rastrio2_kormoshuchi_bastobayons: "_attend",
                ward_rastrio3_dibosh_palons: "_attend"
            };

            const total_key_suffix = {
                ward_kormosuci_bastobayons: "_total",
                ward_songothon9_sangothonik_boithoks: "_total",
                ward_proshikkhon1_tarbiats: "_total",
                ward_rastrio2_kormoshuchi_bastobayons: "",
                ward_rastrio3_dibosh_palons: ""
            };

            if (field_mappings[$table_name] && this.report_sum_data[$table_name]) {
                const fields = field_mappings[$table_name];
                const attendance_suffix = attendance_key_suffix[$table_name];
                const total_suffix = total_key_suffix[$table_name];

                fields.forEach(field => {
                    const uposthiti_key = `${field}${attendance_suffix}`;
                    const total_key = `${field}${total_suffix}`;
                    this.average_uposthiti[$table_name][field] = Math.round(
                        (this.report_sum_data[$table_name][uposthiti_key] ?? 0) /
                        (this.report_sum_data[$table_name][total_key] ?? 1)
                    );
                });
            }
        },


        // average_data: async function () {
        //     // -------------- kormosuci --------------
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.unit_masik_sadaron_sova =
        //         this.kormosuci ? Math.round((this.kormosuci.unit_masik_sadaron_sova_uposthiti ?? 0) / (this.kormosuci.unit_masik_sadaron_sova_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.dawati_sova =
        //         this.kormosuci ? Math.round((this.kormosuci.dawati_sova_uposthiti ?? 0) / (this.kormosuci.dawati_sova_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.alochona_sova =
        //         this.kormosuci ? Math.round((this.kormosuci.alochona_sova_uposthiti ?? 0) / (this.kormosuci.alochona_sova_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.sudhi_somabesh =
        //         this.kormosuci ? Math.round((this.kormosuci.sudhi_somabesh_uposthiti ?? 0) / (this.kormosuci.sudhi_somabesh_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.siratunnabi_mahfil =
        //         this.kormosuci ? Math.round((this.kormosuci.siratunnabi_mahfil_uposthiti ?? 0) / (this.kormosuci.siratunnabi_mahfil_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.eid_reunion =
        //         this.kormosuci ? Math.round((this.kormosuci.eid_reunion_uposthiti ?? 0) / (this.kormosuci.eid_reunion_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.dars =
        //         this.kormosuci ? Math.round((this.kormosuci.dars_uposthiti ?? 0) / (this.kormosuci.dars_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.tafsir =
        //         this.kormosuci ? Math.round((this.kormosuci.tafsir_uposthiti ?? 0) / (this.kormosuci.tafsir_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.dawati_jonosova =
        //         this.kormosuci ? Math.round((this.kormosuci.dawati_jonosova_uposthiti ?? 0) / (this.kormosuci.dawati_jonosova_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.iftar_mahfil_personal =
        //         this.kormosuci ? Math.round((this.kormosuci.iftar_mahfil_personal_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_personal_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.iftar_mahfil_samostic =
        //         this.kormosuci ? Math.round((this.kormosuci.iftar_mahfil_samostic_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_samostic_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.cha_chakra =
        //         this.kormosuci ? Math.round((this.kormosuci.cha_chakra_uposthiti ?? 0) / (this.kormosuci.cha_chakra_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.samostic_khawa =
        //         this.kormosuci ? Math.round((this.kormosuci.samostic_khawa_uposthiti ?? 0) / (this.kormosuci.samostic_khawa_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.sikkha_sofor =
        //         this.kormosuci ? Math.round((this.kormosuci.sikkha_sofor_uposthiti ?? 0) / (this.kormosuci.sikkha_sofor_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.kirat_protijogita =
        //         this.kormosuci ? Math.round((this.kormosuci.kirat_protijogita_uposthiti ?? 0) / (this.kormosuci.kirat_protijogita_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.hamd_nat_protijogita =
        //         this.kormosuci ? Math.round((this.kormosuci.hamd_nat_protijogita_uposthiti ?? 0) / (this.kormosuci.hamd_nat_protijogita_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_kormosuci_bastobayons?.others =
        //         this.kormosuci ? Math.round((this.kormosuci.others_uposthiti ?? 0) / (this.kormosuci.others_total ?? 1)) : 0;
        //     // -------------- kormosuci --------------

        //     // -------------- songothon9 --------------
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.word_sura_boithok =
        //         this.songothon9 ? Math.round((this.songothon9.word_sura_boithok_uposthiti ?? 0) / (this.songothon9.word_sura_boithok_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.kormoporishod_boithok =
        //         this.songothon9 ? Math.round((this.songothon9.kormoporishod_boithok_uposthiti ?? 0) / (this.songothon9.kormoporishod_boithok_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.team_boithok =
        //         this.songothon9 ? Math.round((this.songothon9.team_boithok_uposthiti ?? 0) / (this.songothon9.team_boithok_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.word_boithok =
        //         this.songothon9 ? Math.round((this.songothon9.word_boithok_uposthiti ?? 0) / (this.songothon9.word_boithok_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.masik_sodosso_boithok =
        //         this.songothon9 ? Math.round((this.songothon9.masik_sodosso_boithok_uposthiti ?? 0) / (this.songothon9.masik_sodosso_boithok_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.unit_kormi_boithok =
        //         this.songothon9 ? Math.round((this.songothon9.unit_kormi_boithok_uposthiti ?? 0) / (this.songothon9.unit_kormi_boithok_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.ulama_somabesh =
        //         this.songothon9 ? Math.round((this.songothon9.ulama_somabesh_uposthiti ?? 0) / (this.songothon9.ulama_somabesh_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.jubok_somabesh =
        //         this.songothon9 ? Math.round((this.songothon9.jubok_somabesh_uposthiti ?? 0) / (this.songothon9.jubok_somabesh_total ?? 1)) : 0;
        //     this.average_uposthiti?.ward_songothon9_sangothonik_boithoks?.sromik_somabesh =
        //         this.songothon9 ? Math.round((this.songothon9.sromik_somabesh_uposthiti ?? 0) / (this.songothon9.sromik_somabesh_total ?? 1)) : 0;
        //     // -------------- songothon9 --------------

        //     // -------------- proshikkhon1 --------------
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.unit_tarbiati_boithok =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.unit_tarbiati_boithok_uposthiti ?? 0) / (this.proshikkhon1.unit_tarbiati_boithok ?? 1)) : 0;
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.ward_kormi_sikkha_boithok =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.ward_kormi_sikkha_boithok_uposthiti ?? 0) / (this.proshikkhon1.ward_kormi_sikkha_boithok ?? 1)) : 0;
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_shibir =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.urdhotono_sikkha_shibir_uposthiti ?? 0) / (this.proshikkhon1.urdhotono_sikkha_shibir ?? 1)) : 0;
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.urdhotono_sikkha_boithok =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.urdhotono_sikkha_boithok_uposthiti ?? 0) / (this.proshikkhon1.urdhotono_sikkha_boithok ?? 1)) : 0;
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.gono_sikkha_boithok =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.gono_sikkha_boithok_uposthiti ?? 0) / (this.proshikkhon1.gono_sikkha_boithok ?? 1)) : 0;
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.gono_noisho_ibadot =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.gono_noisho_ibadot_uposthiti ?? 0) / (this.proshikkhon1.gono_noisho_ibadot ?? 1)) : 0;
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.alochona_chokro =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.alochona_chokro_uposthiti ?? 0) / (this.proshikkhon1.alochona_chokro_program ?? 1)) : 0;
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.darsul_quran =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.darsul_quran_uposthiti ?? 0) / (this.proshikkhon1.darsul_quran_program ?? 1)) : 0;
        //     this.average_uposthiti?.ward_proshikkhon1_tarbiats?.sohih_tilawat =
        //         this.proshikkhon1 ? Math.round((this.proshikkhon1.sohih_tilawat_uposthiti ?? 0) / (this.proshikkhon1.sohih_tilawat_program ?? 1)) : 0;
        //     // -------------- proshikkhon1 --------------

        //     // -------------- rastrio2 --------------
        //     this.average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.centrally_announced_political_program =
        //         this.rastrio2 ? Math.round((this.rastrio2.centrally_announced_political_program_attend ?? 0) / (this.rastrio2.centrally_announced_political_program ?? 1)) : 0;
        //     this.average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_jonoshova =
        //         this.rastrio2 ? Math.round((this.rastrio2.locally_announced_jonoshova_attend ?? 0) / (this.rastrio2.locally_announced_jonoshova ?? 1)) : 0;
        //     this.average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_shomabesh =
        //         this.rastrio2 ? Math.round((this.rastrio2.locally_announced_shomabesh_attend ?? 0) / (this.rastrio2.locally_announced_shomabesh ?? 1)) : 0;
        //     this.average_uposthiti?.ward_rastrio2_kormoshuchi_bastobayons?.locally_announced_michil =
        //         this.rastrio2 ? Math.round((this.rastrio2.locally_announced_michil_attend ?? 0) / (this.rastrio2.locally_announced_michil ?? 1)) : 0;
        //     // -------------- rastrio2 --------------


        //     // -------------- rastrio3 --------------
        //     this.average_uposthiti?.ward_rastrio3_dibosh_palons?.shadhinota_o_jatio_dibosh =
        //         this.rastrio3 ? Math.round((this.rastrio3.shadhinota_o_jatio_dibosh_attend ?? 0) / (this.rastrio3.shadhinota_o_jatio_dibosh_total_programs ?? 1)) : 0;
        //     this.average_uposthiti?.ward_rastrio3_dibosh_palons?.bijoy_dibosh =
        //         this.rastrio3 ? Math.round((this.rastrio3.bijoy_dibosh_attend ?? 0) / (this.rastrio3.bijoy_dibosh_total_programs ?? 1)) : 0;
        //     this.average_uposthiti?.ward_rastrio3_dibosh_palons?.mattrivasha_dibosh =
        //         this.rastrio3 ? Math.round((this.rastrio3.mattrivasha_dibosh_attend ?? 0) / (this.rastrio3.mattrivasha_dibosh_total_programs ?? 1)) : 0;
        //     this.average_uposthiti?.ward_rastrio3_dibosh_palons?.others =
        //         this.rastrio3 ? Math.round((this.rastrio3.others_attend ?? 0) / (this.rastrio3.others_total_programs ?? 1)) : 0;
        //     // -------------- rastrio3 --------------
        // },

        formatBangla(number) {
            if (number == 0 || number === null || number === undefined || isNaN(number)) {
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
            return year.toString().replace(/\d/g, (digit) => "০১২৩৪৫৬৭৮৯"[digit]);
        },
        data_upload(endpoint) {
            console.log("data_upload", this.month);
            
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
                            // average_songothon9
                            'word_sura_boithok_total',
                            'kormoporishod_boithok_total',
                            'team_boithok_total',
                            'word_boithok_total',
                            'masik_sodosso_boithok_total',
                            'unit_kormi_boithok_total',
                            'ulama_somabesh_total',
                            'jubok_somabesh_total',
                            'sromik_somabesh_total',
                            // average_proshikkhon1
                            'unit_tarbiati_boithok',
                            'ward_kormi_sikkha_boithok',
                            'urdhotono_sikkha_shibir',
                            'urdhotono_sikkha_boithok',
                            'gono_sikkha_boithok',
                            'gono_noisho_ibadot',
                            'alochona_chokro',
                            'darsul_quran',
                            'sohih_tilawat',
                            // average_rastrio2
                            'centrally_announced_political_program',
                            'locally_announced_jonoshova',
                            'locally_announced_shomabesh',
                            'locally_announced_michil',
                            // average_rastrio3
                            'shadhinota_o_jatio_dibosh_total_programs',
                            'bijoy_dibosh_total_programs',
                            'mattrivasha_dibosh_total_programs',
                            'others_total_programs',

                        ].includes(name)) {
                        this.uploaded_data();  // Call uploaded_data if name matches
                    }

                })
                .catch((error) => {
                    console.error("Error uploading data", error);
                });
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
        implementation_rate(target, achieved) {
            if (target && achieved && target !== 0) {
                return Math.round((achieved / target) * 100) + '%';
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
            axios.post('/ward-bm-income/store', formData)
                .then(function (response) {
                    window.toaster('New BM entry Created successfuly', 'success');
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
            axios.post('/ward-bm-expense/store', formData)
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
            const url = `/ward/ward-report-monthly?user_id=${user_id}&month=${month}&print=true`;
            window.location.href = url;

            setTimeout(() => {
                window.print(); // Trigger the print dialog
            }, 200);
        },

        implementation_rate: function (target, achieved) {
            if (target && achieved && target !== 0) {
                return this.formatBangla(Math.round((achieved / target) * 100)) + '%';
            }
            return ' ';
        },

        report_status: async function () {
            const month = this.$route.params.month;
            let response = await axios.get('/ward/report-status', {
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
            if (window.confirm("আপনি কি জমা দানের বিষয়ে নিশ্চিত?")) {
                const month = this.$route.params.month;
                let response = await axios.get('/ward/report-joma', {
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
            } else {
                window.toaster("রিপোর্ট জমা বন্ধ করা হয়েছে । অনুগ্রহ করে সমস্ত প্রয়োজনীয় তথ্য পূরণ করুন ", 'info');
            }
        },
        toggle_popup(event) {
            const parent = event.currentTarget.closest('.unit_info_icon');
            const popup = parent.querySelector('.unit_data_popup');
            if (popup) {
                popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
            }
        }


    },
    computed: {
        total_dawat: function () {
            const total =
                (Number(this.report_sum_data?.ward_dawat1_regular_group_wises?.how_many_have_been_invited || 0)) +
                (Number(this.report_sum_data?.ward_dawat2_personal_and_targets?.how_many_have_been_invited || 0)) +
                (Number(this.report_sum_data?.ward_dawat3_general_program_and_others?.how_many_were_give_dawat || 0)) +
                (Number(this.report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.how_many_have_been_invited || 0)) +
                (Number(this.report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.jela_mohanogor_declared_gonosonjog_invited || 0)) +
                (Number(this.report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.election_how_many_have_been_invited || 0)) +
                (Number(this.report_sum_data?.ward_dawat4_gono_songjog_and_dawat_ovijans?.other_how_many_have_been_invited || 0));
            return this.formatBangla(total);
        },
    },
};
</script>

<style>
/* @import url("../../../../../../public/css/unit/unit_report_upload.css"); */
@import url("../../../../../../public/css/ward/ward_report_upload.css");
</style>
