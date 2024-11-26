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
                    <p>ইউনিটের নাম: {{ unit_info.title || '' }}</p>
                    <p>ওয়ার্ড নং ও নাম: {{ ward_info.no || '' }} ও {{ ward_info.title || '' }}</p>
                    <p class="w-25">উপজেলা/থানা: {{ thana_info.title || '' }}</p>
                </div>
                <div class="line d-flex flex-wrap justify-content-between">
                    <p>ইউনিট সভাপতির নাম: {{ president.full_name || '' }}</p>
                    <p class="width-30">ইউনিটের ধরন: {{ org_type.title || '' }}</p>
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
                    <p class="fw-bold w-25">টার্গেট:</p>
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
                                    <input name="how_many_groups_are_out"
                                        :value="formatBangla(dawat1?.how_many_groups_are_out)"
                                        @change="data_upload('dawat1-regular-group-wise')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="number_of_participants"
                                        :value="formatBangla(dawat1?.number_of_participants)"
                                        @change="data_upload('dawat1-regular-group-wise')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_have_been_invited"
                                        :value="formatBangla(dawat1?.how_many_have_been_invited)"
                                        @change="data_upload('dawat1-regular-group-wise')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_associate_members_created"
                                        :value="formatBangla(dawat1?.how_many_associate_members_created)"
                                        @change="data_upload('dawat1-regular-group-wise')" type="text"
                                        class="bg-input w-100 text-center" />
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
                                    <input name="total_rokon" :value="formatBangla(dawat2?.total_rokon)"
                                        @change="data_upload('dawat2-personal-and-target')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="total_worker" :value="formatBangla(dawat2?.total_worker)"
                                        @change="data_upload('dawat2-personal-and-target')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</td>
                                <td>
                                    <input name="how_many_have_been_invited"
                                        :value="formatBangla(dawat2?.how_many_have_been_invited)"
                                        @change="data_upload('dawat2-personal-and-target')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</td>
                                <td>
                                    <input name="how_many_were_give_dawat_rokon"
                                        :value="formatBangla(dawat2?.how_many_were_give_dawat_rokon)"
                                        @change="data_upload('dawat2-personal-and-target')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_were_give_dawat_worker"
                                        :value="formatBangla(dawat2?.how_many_were_give_dawat_worker)"
                                        @change="data_upload('dawat2-personal-and-target')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td class="text-start px-2">কতজন সহযোগী সদস্য হয়েছেন</td>
                                <td>
                                    <input name="how_many_associate_members_created"
                                        :value="formatBangla(dawat2?.how_many_associate_members_created)"
                                        @change="data_upload('dawat2-personal-and-target')" type="text"
                                        class="bg-input w-100 text-center" />
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
                                    <input name="how_many_were_give_dawat"
                                        :value="formatBangla(dawat3?.how_many_were_give_dawat)"
                                        @change="data_upload('dawat3-general-program-and-others')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_associate_members_created"
                                        :value="formatBangla(dawat3?.how_many_associate_members_created)"
                                        @change="data_upload('dawat3-general-program-and-others')" type="text"
                                        class="bg-input w-100 text-center" />
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
                                    <input name="total_gono_songjog_group"
                                        :value="formatBangla(dawat4?.total_gono_songjog_group ?? '')"
                                        @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="total_attended" :value="formatBangla(dawat4?.total_attended ?? '')"
                                        @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_have_been_invited"
                                        :value="formatBangla(dawat4?.how_many_have_been_invited ?? '')"
                                        @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_many_associate_members_created"
                                        :value="formatBangla(dawat4?.how_many_associate_members_created ?? '')"
                                        @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান</td>
                                <td>
                                    <input name="jela_mohanogor_declared_gonosonjog_group"
                                        :value="formatBangla(dawat4?.jela_mohanogor_declared_gonosonjog_group ?? '')"
                                        @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jela_mohanogor_declared_gonosonjog_attended"
                                        :value="formatBangla(dawat4?.jela_mohanogor_declared_gonosonjog_attended ?? '')"
                                        @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jela_mohanogor_declared_gonosonjog_invited"
                                        :value="formatBangla(dawat4?.jela_mohanogor_declared_gonosonjog_invited ?? '')"
                                        @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="jela_mohanogor_declared_gonosonjog_associated_created"
                                        :value="formatBangla(dawat4?.jela_mohanogor_declared_gonosonjog_associated_created ?? '')"
                                        @change="data_upload('dawat4-gono-songjog-and-dawat-ovijan')" type="text"
                                        class="bg-input w-100 text-center" />
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
                                    <input name="teacher_rokon" :value="formatBangla(department1?.teacher_rokon ?? '')"
                                        @change="data_upload('department1-talimul-quran')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="teacher_worker"
                                        :value="formatBangla(department1?.teacher_worker ?? '')"
                                        @change="data_upload('department1-talimul-quran')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>{{ formatBangla((department1?.teacher_rokon ?? 0) + (department1?.teacher_worker ??
                                    0)) }}</td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে</td>
                                <td>
                                    <input name="student_rokon" :value="formatBangla(department1?.student_rokon ?? '')"
                                        @change="data_upload('department1-talimul-quran')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="student_worker"
                                        :value="formatBangla(department1?.student_worker ?? '')"
                                        @change="data_upload('department1-talimul-quran')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>{{ formatBangla((department1?.student_rokon ?? 0) + (department1?.student_worker ??
                                    0)) }}</td>
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
                                    <input name="how_much_learned_quran"
                                        :value="formatBangla(department1?.how_much_learned_quran ?? '')"
                                        @change="data_upload('department1-talimul-quran')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_much_invited"
                                        :value="formatBangla(department1?.how_much_invited ?? '')"
                                        @change="data_upload('department1-talimul-quran')" type="text"
                                        class="bg-input w-100 text-center" />
                                </td>
                                <td>
                                    <input name="how_much_been_associated"
                                        :value="formatBangla(department1?.how_much_been_associated ?? '')"
                                        @change="data_upload('department1-talimul-quran')" type="text"
                                        class="bg-input w-100 text-center" />
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
                                <input name="political_and_special_invited"
                                    :value="formatBangla(department4?.political_and_special_invited ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="political_and_special_been_associated"
                                    :value="formatBangla(department4?.political_and_special_been_associated ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="political_and_special_target"
                                    :value="formatBangla(department4?.political_and_special_target ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)</td>
                            <td>
                                <input name="prantik_jonogosti_invited"
                                    :value="formatBangla(department4?.prantik_jonogosti_invited ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="prantik_jonogosti_been_associated"
                                    :value="formatBangla(department4?.prantik_jonogosti_been_associated ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="prantik_jonogosti_target"
                                    :value="formatBangla(department4?.prantik_jonogosti_target ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">ভিন্নধর্মাবলম্বী</td>
                            <td>
                                <input name="vinno_dormalombi_invited"
                                    :value="formatBangla(department4?.vinno_dormalombi_invited ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="vinno_dormalombi_been_associated"
                                    :value="formatBangla(department4?.vinno_dormalombi_been_associated ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="vinno_dormalombi_target"
                                    :value="formatBangla(department4?.vinno_dormalombi_target ?? '')"
                                    @change="data_upload('department4-different-job-holders-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
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
                                <input name="total_attended_family"
                                    :value="formatBangla(department5?.total_attended_family ?? '')"
                                    @change="data_upload('department5-paribarik-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="how_many_new_family_invited"
                                    :value="formatBangla(department5?.how_many_new_family_invited ?? '')"
                                    @change="data_upload('department5-paribarik-dawat')" type="text"
                                    class="bg-input w-100 text-center" />
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
                                <input name="unit_book_distribution_center"
                                    :value="formatBangla(dawah_prokashona?.unit_book_distribution_center ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="unit_book_distribution_center_increase"
                                    :value="formatBangla(dawah_prokashona?.unit_book_distribution_center_increase ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td class="text-start px-2">বইয়ের সফ্ট কপি বিলি<span>(সংগঠন অনুমোদিত)</span></td>
                            <td>
                                <input name="soft_copy_book_distribution"
                                    :value="formatBangla(dawah_prokashona?.soft_copy_book_distribution ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="soft_copy_book_distribution_increase"
                                    :value="formatBangla(dawah_prokashona?.soft_copy_book_distribution_increase ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই</td>
                            <td>
                                <input name="books_in_pathagar"
                                    :value="formatBangla(dawah_prokashona?.books_in_pathagar ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="books_in_pathagar_increase"
                                    :value="formatBangla(dawah_prokashona?.books_in_pathagar_increase ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td class="text-start px-2">দাওয়াতি লিংক বিতরণ<span>(সংগঠন অনুমোদিত)</span></td>
                            <td>
                                <input name="dawat_link_distribution"
                                    :value="formatBangla(dawah_prokashona?.dawat_link_distribution ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="dawat_link_distribution_increase"
                                    :value="formatBangla(dawah_prokashona?.dawat_link_distribution_increase ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start px-2">বই বিলি/বিক্রি</td>
                            <td>
                                <input name="unit_book_distribution"
                                    :value="formatBangla(dawah_prokashona?.unit_book_distribution ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="unit_book_distribution_increase"
                                    :value="formatBangla(dawah_prokashona?.unit_book_distribution_increase ?? '')"
                                    @change="data_upload('dawah-and-prokashona')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td class="text-start px-2">সোনার বাংলা/সংগ্রাম/ পৃথিবী কত কপি চলে</td>
                            <td>
                                <div class="d-flex">
                                    <input name="sonar_bangla"
                                        :value="formatBangla(dawah_prokashona?.sonar_bangla ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="songram" :value="formatBangla(dawah_prokashona?.songram ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="prithibi" :value="formatBangla(dawah_prokashona?.prithibi ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sonar_bangla_increase"
                                        :value="formatBangla(dawah_prokashona?.sonar_bangla_increase ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="songram_increase"
                                        :value="formatBangla(dawah_prokashona?.songram_increase ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="prithibi_increase"
                                        :value="formatBangla(dawah_prokashona?.prithibi_increase ?? '')"
                                        @change="data_upload('dawah-and-prokashona')" type="text"
                                        class="bg-input w-100 text-center" />
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
                                <input name="unit_masik_sadaron_sova_total"
                                    :value="formatBangla(kormosuci?.unit_masik_sadaron_sova_total ?? '')"
                                    @change="data_upload('kormosuci-bastobayon')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="unit_masik_sadaron_sova_target"
                                    :value="formatBangla(kormosuci?.unit_masik_sadaron_sova_target ?? '')"
                                    @change="data_upload('kormosuci-bastobayon')" type="text"
                                    class="bg-input w-100 text-center" />
                            </td>
                            <td>
                                <input name="unit_masik_sadaron_sova_uposthiti"
                                    :value="formatBangla(average_kormosuci.unit_masik_sadaron_sova)"
                                    @change="average_data_upload($event, 'kormosuci-bastobayon', kormosuci.unit_masik_sadaron_sova_total)"
                                    type="text" class="bg-input w-100 text-center" />
                            </td>
                        </tr>
                        <tr>
                            <td>২.</td>
                            <td class="text-start px-2">ইফতার মাহফিল (ব্যক্তিগত/সাংগঠনিক)</td>
                            <td>
                                <div class="d-flex">
                                    <input name="iftar_mahfil_personal_total"
                                        :value="formatBangla(kormosuci?.iftar_mahfil_personal_total ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="iftar_mahfil_samostic_total"
                                        :value="formatBangla(kormosuci?.iftar_mahfil_samostic_total ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="iftar_mahfil_personal_target"
                                        :value="formatBangla(kormosuci?.iftar_mahfil_personal_target ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="iftar_mahfil_samostic_target"
                                        :value="formatBangla(kormosuci?.iftar_mahfil_samostic_target ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="iftar_mahfil_personal_uposthiti"
                                        :value="formatBangla(average_kormosuci.iftar_mahfil_personal)"
                                        @change="average_data_upload($event, 'kormosuci-bastobayon', kormosuci.iftar_mahfil_personal_total)"
                                        type="text" class="bg-input w-100 text-center" /> /
                                    <input name="iftar_mahfil_samostic_uposthiti"
                                        :value="formatBangla(average_kormosuci.iftar_mahfil_samostic)"
                                        @change="average_data_upload($event, 'kormosuci-bastobayon', kormosuci.iftar_mahfil_samostic_total)"
                                        type="text" class="bg-input w-100 text-center" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>৩.</td>
                            <td class="text-start px-2">চা চক্র/সামষ্টিক খাওয়া/শিক্ষা সফর</td>
                            <td>
                                <div class="d-flex">
                                    <input name="cha_chakra_total"
                                        :value="formatBangla(kormosuci?.cha_chakra_total ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="samostic_khawa_total"
                                        :value="formatBangla(kormosuci?.samostic_khawa_total ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="sikkha_sofor_total"
                                        :value="formatBangla(kormosuci?.sikkha_sofor_total ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="cha_chakra_target"
                                        :value="formatBangla(kormosuci?.cha_chakra_target ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="samostic_khawa_target"
                                        :value="formatBangla(kormosuci?.samostic_khawa_target ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" /> /
                                    <input name="sikkha_sofor_target"
                                        :value="formatBangla(kormosuci?.sikkha_sofor_target ?? '')"
                                        @change="data_upload('kormosuci-bastobayon')" type="text"
                                        class="bg-input w-100 text-center" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="cha_chakra_uposthiti"
                                        :value="formatBangla(average_kormosuci.cha_chakra)"
                                        @change="average_data_upload($event, 'kormosuci-bastobayon', kormosuci.cha_chakra_total)"
                                        type="text" class="bg-input w-100 text-center" /> /
                                    <input name="samostic_khawa_uposthiti"
                                        :value="formatBangla(average_kormosuci.samostic_khawa)"
                                        @change="average_data_upload($event, 'kormosuci-bastobayon', kormosuci.samostic_khawa_total)"
                                        type="text" class="bg-input w-100 text-center" /> /
                                    <input name="sikkha_sofor_uposthiti"
                                        :value="formatBangla(average_kormosuci.sikkha_sofor)"
                                        @change="average_data_upload($event, 'kormosuci-bastobayon', kormosuci.sikkha_sofor_total)"
                                        type="text" class="bg-input w-100 text-center" />
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
                                <td><input name="rokon_briddhi" :value="formatBangla(songothon1?.rokon_briddhi ?? '')"
                                        @change="data_upload('songothon1-jonosokti')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="rokon_gatti" :value="formatBangla(songothon1?.rokon_gatti ?? '')"
                                        @change="data_upload('songothon1-jonosokti')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="rokon_target" :value="formatBangla(songothon1?.rokon_target ?? '')"
                                        @change="data_upload('songothon1-jonosokti')" type="text"
                                        class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">কর্মী</td>
                                <td>{{ formatBangla(previous_present?.worker_previous ?? '') }}</td>
                                <td>{{ formatBangla(previous_present?.worker_present ?? '') }}</td>
                                <td><input name="worker_briddhi" :value="formatBangla(songothon1?.worker_briddhi ?? '')"
                                        @change="data_upload('songothon1-jonosokti')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="worker_gatti" :value="formatBangla(songothon1?.worker_gatti ?? '')"
                                        @change="data_upload('songothon1-jonosokti')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="worker_target" :value="formatBangla(songothon1?.worker_target ?? '')"
                                        @change="data_upload('songothon1-jonosokti')" type="text"
                                        class="bg-input w-100 text-center"></td>
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
                                <td><input name="associate_member_briddhi"
                                        :value="formatBangla(songothon2?.associate_member_briddhi ?? '')"
                                        @change="data_upload('songothon2-associate-member')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="associate_member_target"
                                        :value="formatBangla(songothon2?.associate_member_target ?? '')"
                                        @change="data_upload('songothon2-associate-member')" type="text"
                                        class="bg-input w-100 text-center"></td>
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
                                        <input name="vinno_dormalombi_worker_briddhi"
                                            :value="formatBangla(songothon2?.vinno_dormalombi_worker_briddhi ?? '')"
                                            @change="data_upload('songothon2-associate-member')" type="text"
                                            class="bg-input w-100 text-center"> /
                                        <input name="vinno_dormalombi_associate_member_briddhi"
                                            :value="formatBangla(songothon2?.vinno_dormalombi_associate_member_briddhi ?? '')"
                                            @change="data_upload('songothon2-associate-member')" type="text"
                                            class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input name="vinno_dormalombi_worker_target"
                                            :value="formatBangla(songothon2?.vinno_dormalombi_worker_target ?? '')"
                                            @change="data_upload('songothon2-associate-member')" type="text"
                                            class="bg-input w-100 text-center"> /
                                        <input name="vinno_dormalombi_associate_member_target"
                                            :value="formatBangla(songothon2?.vinno_dormalombi_associate_member_target ?? '')"
                                            @change="data_upload('songothon2-associate-member')" type="text"
                                            class="bg-input w-100 text-center">
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
                        <input class="border_dot width-60 bg-input ps-2" name="unit_kormi_boithok_total"
                            :value="formatBangla(songothon9?.unit_kormi_boithok_total ?? '')"
                            @change="data_upload('songothon9-sangothonik-boithok')" type="text">
                    </div>
                    <div class="d-flex justify-content-start w-50">
                        <label for="" class="fw-bold fs-6">, উপস্থিতি:</label>
                        <input class="border_dot width-80 bg-input ps-2" name="unit_kormi_boithok_uposthiti"
                            :value="formatBangla(songothon9?.unit_kormi_boithok_uposthiti ?? '')"
                            @change="data_upload('songothon9-sangothonik-boithok')" type="text">
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
                                <td><input name="paribarik_unit_total"
                                        :value="formatBangla(songothon5?.paribarik_unit_total ?? '')"
                                        @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="paribarik_unit_increase"
                                        :value="formatBangla(songothon5?.paribarik_unit_increase ?? '')"
                                        @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="paribarik_unit_target"
                                        :value="formatBangla(songothon5?.paribarik_unit_target ?? '')"
                                        @change="data_upload('songothon5-dawat-and-paribarik-unit')" type="text"
                                        class="bg-input w-100 text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                    <p>* পরিবারের জনশক্তি পুরুষ ও মহিলা উভয় হলে পারিবারিক ইউনিটের হিসাব একবারই আসবে।</p>
                </div>
                <div class="urdotono mb-1">
                    <div class="d-flex justify-content-start ">
                        <label for="" class="fw-bold fs-6">৫. ঊর্ধ্বতন দায়িত্বশীলদের সফর সংখ্যা :</label>
                        <input class="border_dot bg-input w-75" name="upper_leader_sofor"
                            :value="formatBangla(songothon7?.upper_leader_sofor ?? '')"
                            @change="data_upload('songothon7-sofor')" type="text">
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
                                <td><input name="associate_member_total"
                                        :value="formatBangla(songothon8?.associate_member_total ?? '')"
                                        @change="data_upload('songothon8-iyanot-data')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="associate_member_total_iyanot_amounts"
                                        :value="formatBangla(songothon8?.associate_member_total_iyanot_amounts ?? '')"
                                        @change="data_upload('songothon8-iyanot-data')" type="text"
                                        class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সুধী</td>
                                <td><input name="sudhi_total" :value="formatBangla(songothon8?.sudhi_total ?? '')"
                                        @change="data_upload('songothon8-iyanot-data')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td><input name="sudi_total_iyanot_amounts"
                                        :value="formatBangla(songothon8?.sudi_total_iyanot_amounts ?? '')"
                                        @change="data_upload('songothon8-iyanot-data')" type="text"
                                        class="bg-input w-100 text-center"></td>
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
                                        :value="formatBangla(proshikkhon?.sohi_quran_onushilon ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel"
                                        :value="formatBangla(proshikkhon?.masala_masayel ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran" :value="formatBangla(proshikkhon?.darsul_quran ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis" :value="formatBangla(proshikkhon?.darsul_hadis ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="samostik_path" :value="formatBangla(proshikkhon?.samostik_path ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon"
                                        :value="formatBangla(proshikkhon?.bishoy_vittik_onushilon ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sohi_quran_onushilon_target"
                                        :value="formatBangla(proshikkhon?.sohi_quran_onushilon_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel_target"
                                        :value="formatBangla(proshikkhon?.masala_masayel_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran_target"
                                        :value="formatBangla(proshikkhon?.darsul_quran_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis_target"
                                        :value="formatBangla(proshikkhon?.darsul_hadis_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="samostik_path_target"
                                        :value="formatBangla(proshikkhon?.samostik_path_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon_target"
                                        :value="formatBangla(proshikkhon?.bishoy_vittik_onushilon_target ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <input name="sohi_quran_onushilon_uposthiti"
                                        :value="formatBangla(proshikkhon?.sohi_quran_onushilon_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="masala_masayel_uposthiti"
                                        :value="formatBangla(proshikkhon?.masala_masayel_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_quran_uposthiti"
                                        :value="formatBangla(proshikkhon?.darsul_quran_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="darsul_hadis_uposthiti"
                                        :value="formatBangla(proshikkhon?.darsul_hadis_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="samostik_path_uposthiti"
                                        :value="formatBangla(proshikkhon?.samostik_path_uposthiti ?? '')"
                                        @change="data_upload('proshikkhon1-tarbiat')" type="text"
                                        class="bg-input w-100 text-center"> /
                                    <input name="bishoy_vittik_onushilon_uposthiti"
                                        :value="formatBangla(proshikkhon?.bishoy_vittik_onushilon_uposthiti ?? '')"
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
                            <td class="width-20"><input name="how_many_people_did"
                                    :value="formatBangla(shomajsheba1?.how_many_people_did ?? '')"
                                    @change="data_upload('shomajsheba1-personal-social-work')" type="text"
                                    class="bg-input w-100 text-center"></td>
                            <td class="text-start px-2 w-25">মোট সেবাপ্রাপ্ত সংখ্যা</td>
                            <td class="width-20"><input name="service_received_total"
                                    :value="formatBangla(shomajsheba1?.service_received_total ?? '')"
                                    @change="data_upload('shomajsheba1-personal-social-work')" type="text"
                                    class="bg-input w-100 text-center"></td>
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
                                        <input name="shamajik_onusthane_ongshogrohon"
                                            :value="formatBangla(shomajsheba2?.shamajik_onusthane_ongshogrohon ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center"> /
                                        <input name="shamajik_onusthane_shohayota_prodan"
                                            :value="formatBangla(shomajsheba2?.shamajik_onusthane_shohayota_prodan ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td class="text-start px-2">স্বেচ্ছায় রক্ত দান (কতজন/কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="voluntarily_blood_donation_kotojon"
                                            :value="formatBangla(shomajsheba2?.voluntarily_blood_donation_kotojon ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center"> /
                                        <input name="voluntarily_blood_donation_kotojonke"
                                            :value="formatBangla(shomajsheba2?.voluntarily_blood_donation_kotojonke ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">সামাজিক বিরোধ মীমাংসা</td>
                                <td><input name="shamajik_birodh_mimangsha"
                                        :value="formatBangla(shomajsheba2?.shamajik_birodh_mimangsha ?? '')"
                                        @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                        class="bg-input w-100 text-center"></td>
                                <td class="text-start px-2">মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজন/কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="matrikalin_sheba_prodan_kotojon"
                                            :value="formatBangla(shomajsheba2?.matrikalin_sheba_prodan_kotojon ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center"> /
                                        <input name="matrikalin_sheba_prodan_kotojonke"
                                            :value="formatBangla(shomajsheba2?.matrikalin_sheba_prodan_kotojonke ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">মানবিক সহায়তা/কর্জে হাসানা প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="manobik_shohayota_prodan"
                                            :value="formatBangla(shomajsheba2?.manobik_shohayota_prodan ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center"> /
                                        <input name="korje_hasana_prodan"
                                            :value="formatBangla(shomajsheba2?.korje_hasana_prodan ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td class="text-start px-2">মাইয়্যেতের গোসল (কতজনকে)</td>
                                <td><input name="mayeter_gosol" :value="formatBangla(shomajsheba2?.mayeter_gosol ?? '')"
                                        @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                        class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">রোগীর পরিচর্যা/চিকিৎসা সহায়তা প্রদান (কতজনকে)</td>
                                <td>
                                    <div class="d-flex">
                                        <input name="rogir_poricorja"
                                            :value="formatBangla(shomajsheba2?.rogir_poricorja ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center"> /
                                        <input name="medical_shohayota_prodan"
                                            :value="formatBangla(shomajsheba2?.medical_shohayota_prodan ?? '')"
                                            @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                            class="bg-input w-100 text-center">
                                    </div>
                                </td>
                                <td class="text-start px-2">অন্যান্য</td>
                                <td><input name="others" :value="formatBangla(shomajsheba2?.others ?? '')"
                                        @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                        class="bg-input w-100 text-center"></td>
                            </tr>
                            <tr>
                                <td class="text-start px-2">নবজাতককে গিফ্ট প্রদান (কতজনকে )</td>
                                <td><input name="nobojatokke_gift_prodan"
                                        :value="formatBangla(shomajsheba2?.nobojatokke_gift_prodan ?? '')"
                                        @change="data_upload('shomajsheba2-unit-social-work')" type="text"
                                        class="bg-input w-100 text-center"></td>
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
                        <input class="border_dot  bg-input" name="bishishto_bekti_jogajog"
                            :value="formatBangla(rastrio?.bishishto_bekti_jogajog ?? '')"
                            @change="data_upload('rastrio1-bishishto-bekti')" type="text">
                    </div>
                </div>
            </div>
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
                                        <tr v-for="(bm_cat, index) in bm_categories" :key="index">
                                            <td class="text-start px-2 w-50 border_bottom">{{ bm_cat.title }}</td>
                                            <td class="border_left_bottom">
                                                <input name="bm_entry"
                                                    :value="formatBangla(bm_categoty_amount(bm_cat.id))"
                                                    @change="income_store(bm_cat.id, $event.target.value)" type="text"
                                                    class="bg-input w-100 text-center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="p-0 vertical_align_baseline" colspan="2">
                                <table class="border_none">
                                    <tbody>
                                        <tr v-for="(expense_cat, index) in bm_expense_categories" :key="index">
                                            <td class="text-start px-2 w-50 border_bottom">{{ expense_cat.title }}</td>
                                            <td class="border_left_bottom">
                                                <input name="bm_entry"
                                                    :value="formatBangla(expense_categoty_amount(expense_cat.id))"
                                                    @change="expense_store(expense_cat.id, $event.target.value)"
                                                    type="text" class="bg-input w-100 text-center">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>{{ formatBangla(parseInt(total_income) ?? "") }}</td>
                            <td class="text-end px-2">সর্বমোট</td>
                            <td>{{ formatBangla(parseInt(total_expense) ?? "") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="montobbo">
                <h1 class="fs-6">ইউনিট সভাপতির মন্তব্য :</h1>
                <textarea name="montobbo" @change="data_upload('montobbo')" id="" cols="30" class="w-100 bg-input"
                    rows="5">{{ montobbo?.montobbo }}</textarea>
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
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            month: '',
            joma_status: null,
            org_type: {},
            unit_info: {},
            ward_info: {},
            thana_info: {},
            president: {},

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

            previous_present: {},

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

    created() {
        this.uploaded_data()
        this.income_category()
        this.expense_category()
        this.bm_category_wise()
        this.bm_expense_category_wise()
        this.report_status()

    },
    watch: {
        kormosuci: function () {
            this.average_data();
        },
        total_income: function () {
            console.log(typeof this.total_income);

        },

    },
    methods: {
        uploaded_data: async function () {
            const month = this.$route.params.month;
            const user_id = this.$route.params.user_id;

            let res = await axios.get('/unit/uploaded-data', {
                params: {
                    month: month,
                    user_id: user_id
                }
            })

            if (res.data.status == 'success') {

                this.month = res.data.month,
                    this.org_type = res.data.org_type,
                    this.unit_info = res.data.unit_info,
                    this.ward_info = res.data.ward_info,
                    this.thana_info = res.data.thana_info,
                    this.president = res.data.president,

                    this.dawat1 = res.data.dawat1,
                    this.dawat2 = res.data.dawat2,
                    this.dawat3 = res.data.dawat3,
                    this.dawat4 = res.data.dawat4,
                    this.department1 = res.data.department1,
                    this.department4 = res.data.department4,
                    this.department5 = res.data.department5,
                    this.dawah_prokashona = res.data.dawah_prokashona,
                    this.kormosuci = res.data.kormosuci,
                    this.songothon1 = res.data.songothon1,
                    this.songothon2 = res.data.songothon2,
                    this.songothon9 = res.data.songothon9,
                    this.songothon5 = res.data.songothon5,
                    this.songothon7 = res.data.songothon7,
                    this.songothon8 = res.data.songothon8,
                    this.proshikkhon = res.data.proshikkhon,
                    this.shomajsheba1 = res.data.shomajsheba1,
                    this.shomajsheba2 = res.data.shomajsheba2,
                    this.rastrio = res.data.rastrio,
                    this.montobbo = res.data.montobbo,

                    this.previous_present = res.data.previous_present,

                    this.income_category_wise = res.data.income_category_wise,
                    this.total_income = res.data.total_income,

                    this.expense_category_wise = res.data.expense_category_wise,
                    this.total_expense = res.data.total_expense

            }
            console.log("unit_info", this.unit_info);
            console.log("this.montobbo", this.montobbo);
        },
        average_data: async function () {
            this.average_kormosuci.unit_masik_sadaron_sova =
                this.kormosuci ? (this.kormosuci.unit_masik_sadaron_sova_uposthiti ?? 0) / (this.kormosuci.unit_masik_sadaron_sova_total ?? 1) : 0;
            this.average_kormosuci.iftar_mahfil_personal =
                this.kormosuci ? (this.kormosuci.iftar_mahfil_personal_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_personal_total ?? 1) : 0;
            this.average_kormosuci.iftar_mahfil_personal =
                this.kormosuci ? (this.kormosuci.iftar_mahfil_personal_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_personal_total ?? 1) : 0;
            this.average_kormosuci.iftar_mahfil_samostic =
                this.kormosuci ? (this.kormosuci.iftar_mahfil_samostic_uposthiti ?? 0) / (this.kormosuci.iftar_mahfil_samostic_total ?? 1) : 0;
            this.average_kormosuci.cha_chakra =
                this.kormosuci ? (this.kormosuci.cha_chakra_uposthiti ?? 0) / (this.kormosuci.cha_chakra_total ?? 1) : 0;
            this.average_kormosuci.samostic_khawa =
                this.kormosuci ? (this.kormosuci.samostic_khawa_uposthiti ?? 0) / (this.kormosuci.samostic_khawa_total ?? 1) : 0;
            this.average_kormosuci.sikkha_sofor =
                this.kormosuci ? (this.kormosuci.sikkha_sofor_uposthiti ?? 0) / (this.kormosuci.sikkha_sofor_total ?? 1) : 0;
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
        expense_category: async function () {
            let res = await axios.get('/bm-expense-category/all')
            if (res.data.status == 'success') {
                this.bm_expense_categories = res?.data?.data?.data
            }

        },
        income_category: async function () {
            let res = await axios.get('/bm-category/all')
            if (res) {
                this.bm_categories = res.data?.data
            }

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

        bm_category_wise: async function () {
            const month = this.$route.params.month;

            let res = await axios.get('/unit/bm-category-wise', {
                params: {
                    month: month
                }
            })
            if (res) {
                this.bm_cat_wise = res.data?.data
            }
        },
        bm_categoty_amount: function (bm_cat_id) {
            if (this.bm_cat_wise != null) {
                const element = this.bm_cat_wise.find(element => element.bm_category.id == bm_cat_id);
                if (element) {
                    console.log("amount", element.amount);

                    return element.amount;
                }
            } else {
                return "";
            }
        },

        bm_expense_category_wise: async function () {
            const month = this.$route.params.month;

            let res = await axios.get('/unit/expense-category-wise', {
                params: {
                    month: month
                }
            })
            if (res) {
                this.expense_cat_wise = res.data?.data
            }
        },

        expense_categoty_amount: function (expense_cat_id) {
            if (this.expense_cat_wise != null) {
                const element = this.expense_cat_wise.find(element => element.bm_expense_category.id == expense_cat_id);
                if (element) {
                    return element.amount;
                }
            } else {
                return "";
            }
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
            const url = `/unit/report?user_id=${user_id}&month=${month}&print=true`;
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

    },
    computed: {
        total_dawat: function () {
            const total =
                (this.dawat1?.how_many_have_been_invited ?? 0) +
                (this.dawat2?.how_many_have_been_invited ?? 0) +
                (this.dawat3?.how_many_were_give_dawat ?? 0) +
                (this.dawat4?.how_many_have_been_invited ?? 0) +
                (this.dawat4?.jela_mohanogor_declared_gonosonjog_invited ?? 0);
            return this.formatBangla(total);
        },
    },
};
</script>

<style>
@import url("../../../../../../public/css/unit/unit_report_upload.css");
</style>
