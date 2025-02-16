<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header border-bottom-0">
                মাস:
                <input
                    type="month"
                    @change="get_monthly_data"
                    v-model="month"
                    ref="month"
                    name="month"
                />
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-bolder">খ) বিভাগ ভিত্তিক তথ্য:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-bold">১. তালিমুল কুরআনের মাধ্যমে দাওয়াত:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ব্যক্তিগত উদ্যোগে:</h1>
            </div>
            <div class="card-body">
                <div class="mb-1 border-bottom">
                    <h1 class="font_bng fw-bold">কতজন কুরআন শিক্ষা প্রদান করেছেন :</h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_teacher"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে:</h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_student"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সামষ্টিক উদ্যোগ:</h1>
            </div>
            <div class="card-body">
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">কুরআন শিক্ষার গ্রুপ:</h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_quran_learning_group"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">মক্তব:</h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_moktob"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">ফোরকানিয়া মাদ্রাসা:</h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_forkania"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields6"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">
                        মোট কতজন সহীহ তিলাওয়াত শিখেছেন:
                    </h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_learned_sohih_tilawat"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">
                        মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে:
                    </h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_invited"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">
                        মোট কতজন সহযোগী সদস্য হয়েছেন:
                    </h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_associated"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <!-- <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">
                        তা'লিমুল কুরআন : মুয়াল্লিম সংখ্যা :
                    </h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in fields9"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form> -->
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">
                        সর্বমোট মুয়াল্লিম/মুয়াল্লিমা : বৃদ্ধি সংখ্যা :
                    </h1>
                </div>
                <form action="">
                    <form-input
                        v-for="(field, index) in department1_muallim_increased"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department1-talimul-quran'"
                        :unique_key="1"
                    ></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">২. গ্রাম ও মহল্লাভিত্তিক দাওয়াত:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সরকারি হিসাবে গ্রাম/মহল্লা সংখ্যা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department2_govment_calculated"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department2-moholla-vittik-dawat'"
                        :unique_key="2"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট গ্রাম/মহল্লা কমিটি বৃদ্ধি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department2_committee_increased"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department2-moholla-vittik-dawat'"
                        :unique_key="2"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বিশেষ দাওয়াতের অন্তর্ভুক্ত মোট গ্রাম/মহল্লা বৃদ্ধি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department2_special_dawat_included"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department2-moholla-vittik-dawat'"
                        :unique_key="2"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <!-- <div class="card-header">
                <h1>বিশেষ দাওয়াতের অন্তর্ভুক্ত গ্রাম:</h1>
            </div> -->
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department2_invited_and_associated"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department2-moholla-vittik-dawat'"
                        :unique_key="2"
                    ></form-input>
                </form>
            </div>
        </div>
        <!-- <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বিশেষ দাওয়াতের অন্তর্ভুক্ত মহল্লা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields15"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department2-moholla-vittik-dawat'"
                        :unique_key="2"
                    ></form-input>
                </form>
            </div>
        </div> -->
        <!-- <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields16"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department2-moholla-vittik-dawat'"
                        :unique_key="2"
                    ></form-input>
                </form>
            </div>
        </div> -->

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৩. যুব বিভাগের মাধ্যমে দাওয়াত :</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department3_young_dawat"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department3-jubo-somaj-dawat'"
                        :unique_key="3"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>নতুন সমিতি/ক্লাব প্রতিষ্ঠা করা হয়েছে - বৃদ্ধি :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department3_new_somiti_club"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department3-jubo-somaj-dawat'"
                        :unique_key="3"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো হয়েছে - বৃদ্ধি :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_new_somiti_club"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department3-jubo-somaj-dawat'"
                        :unique_key="3"
                    ></form-input>
                </form>
            </div>
        </div>
        <!-- <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো হয়েছে:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields20"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department3-jubo-somaj-dawat'"
                        :unique_key="3"
                    ></form-input>
                </form>
            </div>
        </div> -->

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">
                    ৪. বিভিন্ন শ্রেণি-পেশার মানুষের মাঝে দাওয়াত :
                </h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>রাজনৈতিক ও বিশিষ্ট ব্যক্তিবর্গ (পু) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_political_and_special_man"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>রাজনৈতিক ও বিশিষ্ট ব্যক্তিবর্গ (ম) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_political_and_special_woman"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পেশাজীবী (পু) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_pesha_jibi_man"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পেশাজীবী(ম) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_pesha_jibi_woman"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উলামা-মাশায়েখ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_olama_masayekh"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কর্মজীবী মহিলা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_kormo_jibi_woman"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শ্রমজীবী (পু):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_sromo_jibi_man"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শ্রমজীবী(ম):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_sromo_jibi_woman"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মিডিয়া কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_media_worker"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_prantik_jonogosti"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ভিন্নধর্মাবলম্বী :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department4_vinno_dormalombi"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'department4-different-job-holders-dawat'"
                        :unique_key="4"
                    ></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৫. পরিবারভিত্তিক দাওয়াত :</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department5_paribarik_dawat"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department5-paribarik-dawat'"
                        :unique_key="5"
                    ></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">
                    ৬. মসজিদ/দাওয়াহ্ সেন্টার/তথ্যসেবা কেন্দ্রভিত্তিক দাওয়াত - বৃদ্ধি :
                </h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <!-- <div class="card-header">
                <h1>মসজিদ:</h1>
            </div> -->
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department6_mosjid_dawah"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'ward-department6-mosjid-dawah-infomation-centers'"
                        :unique_key="6"
                    ></form-input>
                </form>
            </div>
        </div>
        <!-- <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দাওয়াতের আওতাভুক্ত মসজিদ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields29"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'ward-department6-mosjid-dawah-infomation-centers'"
                        :unique_key="6"
                    ></form-input>
                </form>
            </div>
        </div> -->
        <!-- <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মসজিদভিত্তিক দাওয়াহ্ সেন্টার:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields30"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'ward-department6-mosjid-dawah-infomation-centers'"
                        :unique_key="6"
                    ></form-input>
                </form>
            </div>
        </div> -->
        <!-- <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সাধারণ দাওয়াহ্ সেন্টার :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields31"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'ward-department6-mosjid-dawah-infomation-centers'"
                        :unique_key="6"
                    ></form-input>
                </form>
            </div>
        </div> -->
        <!-- <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>তথ্যসেবা কেন্দ্র (মসজিদভিত্তিক) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields32"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'ward-department6-mosjid-dawah-infomation-centers'"
                        :unique_key="6"
                    ></form-input>
                </form>
            </div>
        </div> -->
        <!-- <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>তথ্যসেবা কেন্দ্র (সাধারণ) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in fields33"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'ward-department6-mosjid-dawah-infomation-centers'"
                        :unique_key="6"
                    ></form-input>
                </form>
            </div>
        </div> -->

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৭. তথ্যপ্রযুক্তির মাধ্যমে দাওয়াত:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট উপযুক্ত জনশক্তি সংখ্যা :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department7_well_known"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department7-dawat-in-technology'"
                        :unique_key="7"
                    ></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট অংশগ্রহণকারী সংখ্যা :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department7_attended"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department7-dawat-in-technology'"
                        :unique_key="7"
                    ></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৮. সাংস্কৃতিক কাজের মাধ্যমে দাওয়াত:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <!-- <div class="card-header">
                <h1>মোট উপযুক্ত জনশক্তি সংখ্যা :</h1>
            </div> -->
            <div class="card-body">
                <form action="">
                    <form-input
                        v-for="(field, index) in department8_cultural"
                        :label="field.label"
                        :name="field.name"
                        :key="index"
                        :onchange="dawat_upload"
                        :endpoint="'thana-department8-dawat-in-cultural-activity'"
                        :unique_key="8"
                    ></form-input>
                </form>
            </div>
        </div>
        

        <previous-next
            :prev-route="{ name: 'Dawat' }"
            :next-route="{ name: 'DawahAndProkashona' }"
            :month="month"
        >
        </previous-next>
    </div>
</template>

<script>
import axios from "axios";
import FormInput from "../components/FormInput.vue";
import PreviousNext from "../components/PreviousNext.vue";
import { store as data_store } from "../stores/ReportStore";
import { mapState, mapWritableState } from "pinia";

export default {
    components: { FormInput, PreviousNext },
    data: () => ({
        // কতজন কুরআন শিক্ষা প্রদান করেছেন 
        department1_teacher: [
            {
                label: "সদস্য(রুকন)-(পুরুষ)",
                name: "teacher_rokon_man",
            },
            {
                label: "সদস্য(রুকন)-(পুরুষ)",
                name: "teacher_rokon_woman",
            },
            {
                label: "কর্মী-(পুরুষ)",
                name: "teacher_worker_man",
            },
            {
                label: "কর্মী-(মহিলা)",
                name: "teacher_worker_woman",
            },
        ],
        // কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে
        department1_student: [
            {
                label: "সদস্য(রুকন)(পুরুষ)",
                name: "student_rokon_man",
            },
            {
                label: "সদস্য(রুকন)(পুরুষ)",
                name: "student_rokon_woman",
            },
            {
                label: "কর্মী(পুরুষ)",
                name: "student_worker_man",
            },
            {
                label: "কর্মী(মহিলা)",
                name: "student_worker_woman",
            },
        ],
        // কুরআন শিক্ষার গ্রুপ
        department1_quran_learning_group: [
            {
                label: "মোট সংখ্যা",
                name: "quran_learning_total_group",
            },
            {
                label: "মোট শিক্ষার্থী সংখ্যা",
                name: "quran_learning_total_students",
            },
        ],
        // মক্তব
        department1_moktob: [
            {
                label: "মোট সংখ্যা",
                name: "total_moktob",
            },
            {
                label: "মোট শিক্ষার্থী সংখ্যা",
                name: "total_moktob_students",
            },
        ],
        // ফোরকানিয়া মাদ্রাসা
        department1_forkania: [
            {
                label: "মোট সংখ্যা",
                name: "total_forkania_madrasah",
            },
            {
                label: "মোট শিক্ষার্থী সংখ্যা",
                name: "total_forkania_madrasah_students",
            },
        ],
        // মোট কতজন সহীহ তিলাওয়াত শিখেছেন
        department1_learned_sohih_tilawat: [
            {
                label: "মোট সংখ্যা",
                name: "how_much_learned_sohih_tilawat",
            },
        ],
        // মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে (পু/ম) 
        department1_invited: [
            {
                label: "পুরুষ",
                name: "how_much_invited_man",
            },
            {
                label: "মহিলা",
                name: "how_much_invited_woman",
            },
        ],
        // মোট কতজন সহযোগী সদস্য হয়েছেন (পু/ম)
        department1_associated: [
            {
                label: "পুরুষ",
                name: "how_much_been_associated_man",
            },
            {
                label: "মহিলা",
                name: "how_much_been_associated_woman",
            },
        ],
        // সর্বমোট মুয়াল্লিম/মুয়াল্লিমা সংখ্যা
        // department1_total_muallim: [
        //     {
        //         label: "পুরুষ",
        //         name: "total_muallim_man",
        //     },
        //     {
        //         label: "মহিলা",
        //         name: "total_muallim_woman",
        //     },
        // ],
        // সর্বমোট মুয়াল্লিম/মুয়াল্লিমা bridddhi
        department1_muallim_increased: [
            {
                label: "পুরুষ",
                name: "total_muallim_increased_man",
            },
            {
                label: "মহিলা",
                name: "total_muallim_increased_woman",
            },
        ],

        // সরকারি হিসাবে গ্রাম/মহল্লা সংখ্যা
        department2_govment_calculated: [
            {
                label: "গ্রাম",
                name: "govment_calculated_village_amount",
            },
            {
                label: "মহল্লা",
                name: "govment_calculated_moholla_amount",
            },
        ],
        // মোট গ্রাম/মহল্লা কমিটি বৃদ্ধি
        department2_committee_increased: [
            {
                label: "গ্রাম",
                name: "total_village_committee_increased",
            },
            {
                label: "মহল্লা",
                name: "total_moholla_committee_increased",
            },
        ],

        // বিশেষ দাওয়াতের অন্তর্ভুক্ত মোট গ্রাম/মহল্লা বৃদ্ধি
        department2_special_dawat_included: [
            {
                label: "গ্রাম",
                name: "special_dawat_included_village_increased",
            },
            {
                label: "মহল্লা",
                name: "special_dawat_included_moholla_increased",
            },
        ],
        department2_invited_and_associated: [
            {
                label: "মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে",
                name: "how_many_been_invited",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "how_many_associated_created",
            },
        ],

        // ৩. যুব সমাজের মাঝে দাওয়াত*:

        
        department3_young_dawat: [
            {
                label: "কতজন যুবকের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "how_many_young_been_invited",
            },
            {
                label: "কতজন যুবক সহযোগী সদস্য হয়েছেন",
                name: "how_many_young_been_associated",
            },
            {
                label: "যুব কমিটি বৃদ্ধি",
                name: "total_young_committee_increased",
            },
        ],
        // প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো হয়েছে
        
        // নতুন সমিতি/ক্লাব প্রতিষ্ঠা করা হয়েছে - বৃদ্ধি 
        department3_new_somiti_club: [
            {
                label: "সমিতি",
                name: "total_new_somiti_increased",
            },
            {
                label: "ক্লাব",
                name: "total_new_club_increased",
            },
        ],
        // প্রতিষ্ঠিত সমিতি/ক্লাবে দাওয়াত পৌঁছানো হয়েছে - বৃদ্ধি 
        department4_new_somiti_club: [
            {
                label: "সমিতি",
                name: "stablished_somiti_total_increased",
            },
            {
                label: "ক্লাব",
                name: "stablished_club_total_increased",
            },
        ],
        

        
        // ৪. বিভিন্ন শ্রেণি-পেশার মানুষের মাঝে দাওয়াত:
        // রাজনৈতিক ও বিশিষ্ট ব্যক্তিবর্গ (পু)
        department4_political_and_special_man: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "political_and_special_invited_man",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "political_and_special_been_associated_man",
            },
            {
                label: "টার্গেট",
                name: "political_and_special_target_man",
            },
        ],
        // রাজনৈতিক ও বিশিষ্ট ব্যক্তিবর্গ (ম)
        department4_political_and_special_woman: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "political_and_special_invited_woman",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "political_and_special_been_associated_woman",
            },
            {
                label: "টার্গেট",
                name: "political_and_special_target_woman",
            },
        ],


        // পেশাজীবী (পু)
        department4_pesha_jibi_man: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "pesha_jibi_invited_man",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "pesha_jibi_been_associated_man",
            },
            {
                label: "টার্গেট",
                name: "pesha_jibi_target_man",
            },
        ],
        // পেশাজীবী(ম)
        department4_pesha_jibi_woman: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "pesha_jibi_invited_woman",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "pesha_jibi_been_associated_woman",
            },
            {
                label: "টার্গেট",
                name: "pesha_jibi_target_woman",
            },
        ],


        // উলামা-মাশায়েখ
        department4_olama_masayekh: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "olama_masayekh_invited",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "olama_masayekh_been_associated",
            },
            {
                label: "টার্গেট",
                name: "olama_masayekh_target",
            },
        ],
        // কর্মজীবী মহিলা
        department4_kormo_jibi_woman: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "kormo_jibi_woman_invited",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "kormo_jibi_woman_been_associated",
            },
            {
                label: "টার্গেট",
                name: "kormo_jibi_woman_target",
            },
        ],

        // শ্রমজীবী (পু)
        department4_sromo_jibi_man: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "sromo_jibi_invited_man",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "sromo_jibi_been_associated_man",
            },
            {
                label: "টার্গেট",
                name: "sromo_jibi_target_man",
            },
        ],
        // শ্রমজীবী(ম)
        department4_sromo_jibi_woman: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "sromo_jibi_invited_woman",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "sromo_jibi_been_associated_woman",
            },
            {
                label: "টার্গেট",
                name: "sromo_jibi_target_woman",
            },
        ],

        // মিডিয়া কর্মী
        department4_media_worker: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "media_worker_invited",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "media_worker_been_associated",
            },
            {
                label: "টার্গেট",
                name: "media_worker_target",
            },
        ],

        // প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র)
        department4_prantik_jonogosti: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "prantik_jonogosti_invited",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "prantik_jonogosti_been_associated",
            },
            {
                label: "টার্গেট",
                name: "prantik_jonogosti_target",
            },
        ],

        // ভিন্নধর্মাবলম্বী
        department4_vinno_dormalombi: [
            {
                label: "মোট কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে",
                name: "vinno_dormalombi_invited",
            },
            {
                label: "মোট কতজন সহযোগী সদস্য হয়েছেন",
                name: "vinno_dormalombi_been_associated",
            },
            {
                label: "টার্গেট",
                name: "vinno_dormalombi_target",
            },
        ],

        // ৫. পরিবারভিত্তিক দাওয়াত
        department5_paribarik_dawat: [
            {
                label: "দাওয়াতি কাজে অংশগ্রহণকারী মোট পরিবার",
                name: "total_attended_family",
            },
            {
                label: "মোট কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে",
                name: "how_many_new_family_invited",
            },
        ],

       



        // ৬. মসজিদ/দাওয়াহ্ সেন্টার/তথ্যসেবা কেন্দ্রভিত্তিক দাওয়াত - বৃদ্ধি 
        department6_mosjid_dawah: [
            {
                label: "মসজিদ বৃদ্ধি",
                name: "total_mosjid_increase বৃদ্ধি",
            },
            {
                label: "দাওয়াতের আওতাভুক্ত মসজিদ বৃদ্ধি",
                name: "dawat_included_mosjid_increase বৃদ্ধি",
            },
            {
                label: "মসজিদভিত্তিক দাওয়াহ্ সেন্টার বৃদ্ধি",
                name: "mosjid_wise_dawah_center_increase",
            },
            {
                label: "সাধারণ দাওয়াহ্ সেন্টার বৃদ্ধি",
                name: "general_dawah_center_increase",
            },
            {
                label: "মসজিদভিত্তিক তথ্যসেবা কেন্দ্র বৃদ্ধি",
                name: "mosjid_wise_information_center_increase",
            },
            {
                label: "সাধারণ তথ্যসেবা কেন্দ্র বৃদ্ধি",
                name: "general_information_center_increase",
            },
            {
                label: "নিয়োজিত প্রশিক্ষিত দাঈ বৃদ্ধি",
                name: "trained_employed_dai_increase",
            },
        ],

        // ৭. তথ্যপ্রযুক্তির মাধ্যমে দাওয়াত
        // মোট উপযুক্ত জনশক্তি সংখ্যা 
        department7_well_known: [
            {
                label: "পুরুষ",
                name: "total_well_known_man",
            },
            {
                label: "মহিলা",
                name: "total_well_known_woman",
            },
        ],
        // মোট অংশগ্রহণকারী সংখ্যা
        department7_attended: [
            {
                label: "পুরুষ",
                name: "total_attended_man",
            },
            {
                label: "মহিলা",
                name: "total_attended_woman",
            },
        ],

        // ৮. সাংস্কৃতিক কাজের মাধ্যমে দাওয়াত:
        department8_cultural: [
            {
                label: "প্রফেশনাল সাংস্কৃতিক টিম সংখ্যা",
                name: "total_cultural_team",
            },
            {
                label: "মোট দাওয়াতি সাংস্কৃতিক প্রোগ্রাম সংখ্যা",
                name: "total_program বৃদ্ধি",
            },
            {
                label: "মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে",
                name: "total_invited",
            },
        ],
    }),
    created: function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });

        if (this.month != null) {
            this.get_monthly_data();
        }
    },
    computed: {
        ...mapWritableState(data_store, ["month"]),
    },
    methods: {
        dawat_upload: function (endpoint) {
            var value = event.target.value;
            var name = event.target.name;
            var month = new Date(this.$refs.month.value);
            axios.post(`${endpoint}/store-single`, {
                value,
                name,
                month,
            });
        },
        get_data_by_api: function (endpoint, unique_key) {
            axios
                .get(`${endpoint}/data?month=${this.month}-01`)
                .then(({ data: object }) => {
                    for (const key in object) {
                        if (Object.hasOwnProperty.call(object, key)) {
                            const value = object[key];
                            let el = document.querySelector(
                                `input[id="${unique_key}${key}"]`
                            );
                            if (el) {
                                el.value = value;
                            }
                        }
                    }
                });
        },
        get_monthly_data: function () {
            let els = document.querySelectorAll('input[type="text"]');
            els = [...els].forEach((e) => (e.value = ""));

            this.get_data_by_api("thana-department1-talimul-quran", 1);
            this.get_data_by_api("thana-department2-moholla-vittik-dawat", 2);
            this.get_data_by_api("thana-department3-jubo-somaj-dawat", 3);
            this.get_data_by_api(
                "thana-department4-different-job-holders-dawat",
                4
            );
            this.get_data_by_api("thana-department5-paribarik-dawat", 5);
            this.get_data_by_api(
                "thana-department6-mosjid-dawah-infomation-centers",
                6
            );
            this.get_data_by_api("thana-department7-dawat-in-technology", 7);
            this.get_data_by_api("thana-department8-dawat-in-cultural-activity", 8);
        },
    },
};
</script>

<style></style>
