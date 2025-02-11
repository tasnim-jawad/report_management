<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header border-bottom-0">
                মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">ঘ) সংগঠন:</h1>
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">১. জনশক্তি:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সদস্য (রুকন):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rokon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon1-jonosokti'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon1-jonosokti'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">২. সহযোগী সদস্য:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সহযোগী সদস্য (পুরুষ) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in shohojogi_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon2-associate-member'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সহযোগী সদস্য (মহিলা) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in shohojogi_woman" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon2-associate-member'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৩. বিভাগভিত্তিক তথ্য:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মহিলা - সদস্য (রুকন):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in women_rokon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মহিলা - কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in women_kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মহিলা - সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in women_associate_member" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শ্রম - সদস্য (রুকন):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sromojibi_rokon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শ্রম - কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sromojibi_kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শ্রম - সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sromojibi_associate_member" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উলামা - সদস্য (রুকন):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in ulama_rokon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উলামা - কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in ulama_kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উলামা - সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in ulama_associate_member" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পেশাজীবী - সদস্য (রুকন):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in pesha_jibi_rokon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পেশাজীবী - কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in pesha_jibi_kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পেশাজীবী - সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in pesha_jibi_associate_member" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>যুব - সদস্য (রুকন):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in jubo_rokon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>যুব - কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in jubo_kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>যুব - সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in jubo_associate_member" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ভিন্নধর্মাবলম্বী - কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in vinno_dormalombi_kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ভিন্নধর্মাবলম্বী - সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in vinno_dormalombi_associate_member" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon3-departmental-information'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৪. ইউনিট সংগঠন:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সাধারণ ইউনিট (পুরুষ):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in general_unit_men" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon4-unit-songothon'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সাধারণ ইউনিট (মহিলা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in general_unit_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon4-unit-songothon'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উলামা ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in ulama_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon4-unit-songothon'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পেশাজীবী ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in peshajibi_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon4-unit-songothon'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শ্রমিক কল্যাণ ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sromik_kollyan_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon4-unit-songothon'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>যুব ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in jubo_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon4-unit-songothon'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মিডিয়া ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in media_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon4-unit-songothon'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>



        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৫. দাওয়াতি ও পারিবারিক ইউনিট:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট দাওয়াতি ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dawati_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon5-dawat-and-paribarik-unit'" :unique_key="5"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট পারিবারিক ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in paribarik_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon5-dawat-and-paribarik-unit'" :unique_key="5"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৬. বিদায়ী ছাত্র-ছাত্রী জনশক্তির সংগঠনে যোগদান:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>যোগদানকৃত ছাত্রের সংখ্যা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in Joined_student_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon6-bidayi-students-connect'" :unique_key="6"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>যোগদানকৃত ছাত্রীর সংখ্যা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in Joined_student_woman" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon6-bidayi-students-connect'" :unique_key="6"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৭. সফর:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sofor" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon7-sofor'" :unique_key="7"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৮. ইয়ানত দাতা:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in associate_member_iyanot" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon8-iyanot-data'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সুধী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sudi_iyanot" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon8-iyanot-data'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৯. সাংগঠনিক বৈঠকাদি:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ড শূরা বৈঠক:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in word_sura_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ড কর্মপরিষদ বৈঠক:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in kormoporishod_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ড টিম বৈঠক:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in team_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ড বৈঠক:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in word_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মাসিক সদস্য (রুকন) বৈঠক:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in masik_sodosso_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিটে মোট কর্মী বৈঠক:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in unit_kormi_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উলামা সমাবেশ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in ulama_somabesh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>যুবক সমাবেশ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in jubok_somabesh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শ্রমিকদের সমাবেশ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sromik_somabesh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>


        <previous-next
                :prev-route="{ name: 'Kormosuci' }"
                :next-route="{ name: 'Proshikkhon' }"
                :month="month"
            >
        </previous-next>
    </div>
</template>

<script>
import FormInput from '../components/FormInput.vue'
import PreviousNext from '../components/PreviousNext.vue';
import { store as data_store} from "../stores/ReportStore";
import { mapState, mapWritableState } from 'pinia';

export default {
    components: { FormInput, PreviousNext },
    data: ()=>({
        // month: null,
        songothon1_rokon:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'rokon_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'rokon_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'rokon_briddhi',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'rokon_briddhi',
            },
            {
                label:'ঘাটতি',
                name:'rokon_gatti',
            },
            {
                label:'টার্গেট',
                name:'rokon_target',
            },
        ],
        songothon1_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'worker_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'worker_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'worker_briddhi',
            },
            {
                label:'ঘাটতি',
                name:'worker_gatti',
            },
            {
                label:'টার্গেট',
                name:'worker_target',
            },


        ],
        songothon2_shohojogi_man:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'associate_member_man_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'associate_member_man_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'associate_member_man_briddhi',
            },
            {
                label:'টার্গেট',
                name:'associate_member_man_target',
            },
        ],
        songothon2_shohojogi_woman:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'associate_member_woman_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'associate_member_woman_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'associate_member_woman_briddhi',
            },
            {
                label:'টার্গেট',
                name:'associate_member_woman_target',
            },
        ],

  


        //------------------- thana_songothon3_departmental_information ----------------

        women_rokon:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'women_rokon_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'women_rokon_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'women_rokon_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'women_rokon_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'women_rokon_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'women_rokon_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'women_rokon_target',
            },
        ],
        women_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'women_kormi_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'women_kormi_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'women_kormi_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'women_kormi_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'women_kormi_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'women_kormi_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'women_kormi_target',
            },
        ],
        women_associate_member:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'women_associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'women_associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'women_associate_member_increase',
            },
            // {
            //     label:'ঘাটতি',
            //     name:'women_associate_member_gatti',
            // },
            {
                label:'টার্গেট',
                name:'women_associate_member_target',
            },
        ],


        sromojibi_rokon:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'sromojibi_rokon_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'sromojibi_rokon_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'sromojibi_rokon_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'sromojibi_rokon_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'sromojibi_rokon_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'sromojibi_rokon_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'sromojibi_rokon_target',
            },
        ],
        sromojibi_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'sromojibi_kormi_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'sromojibi_kormi_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'sromojibi_kormi_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'sromojibi_kormi_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'sromojibi_kormi_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'sromojibi_kormi_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'sromojibi_kormi_target',
            },
        ],
        sromojibi_associate_member:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'sromojibi_associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'sromojibi_associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'sromojibi_associate_member_increase',
            },
            // {
            //     label:'ঘাটতি',
            //     name:'sromojibi_associate_member_gatti',
            // },
            {
                label:'টার্গেট',
                name:'sromojibi_associate_member_target',
            },
        ],


        ulama_rokon:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'ulama_rokon_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'ulama_rokon_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'ulama_rokon_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'ulama_rokon_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'ulama_rokon_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'ulama_rokon_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'ulama_rokon_target',
            },
        ],
        ulama_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'ulama_kormi_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'ulama_kormi_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'ulama_kormi_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'ulama_kormi_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'ulama_kormi_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'ulama_kormi_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'ulama_kormi_target',
            },
        ],
        ulama_associate_member:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'ulama_associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'ulama_associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'ulama_associate_member_increase',
            },
            // {
            //     label:'ঘাটতি',
            //     name:'ulama_associate_member_gatti',
            // },
            {
                label:'টার্গেট',
                name:'ulama_associate_member_target',
            },
        ],


        pesha_jibi_rokon:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'pesha_jibi_rokon_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'pesha_jibi_rokon_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'pesha_jibi_rokon_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'pesha_jibi_rokon_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'pesha_jibi_rokon_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'pesha_jibi_rokon_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'pesha_jibi_rokon_target',
            },
        ],
        pesha_jibi_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'pesha_jibi_kormi_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'pesha_jibi_kormi_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'pesha_jibi_kormi_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'pesha_jibi_kormi_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'pesha_jibi_kormi_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'pesha_jibi_kormi_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'pesha_jibi_kormi_target',
            },
        ],
        pesha_jibi_associate_member:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'pesha_jibi_associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'pesha_jibi_associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'pesha_jibi_associate_member_increase',
            },
            // {
            //     label:'ঘাটতি',
            //     name:'pesha_jibi_associate_member_gatti',
            // },
            {
                label:'টার্গেট',
                name:'pesha_jibi_associate_member_target',
            },
        ],


        jubo_rokon:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'jubo_rokon_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'jubo_rokon_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'jubo_rokon_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'jubo_rokon_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'jubo_rokon_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'jubo_rokon_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'jubo_rokon_target',
            },
        ],
        jubo_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'jubo_kormi_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'jubo_kormi_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'jubo_kormi_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'jubo_kormi_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'jubo_kormi_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'jubo_kormi_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'jubo_kormi_target',
            },
        ],
        jubo_associate_member:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'jubo_associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'jubo_associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'jubo_associate_member_increase',
            },
            // {
            //     label:'ঘাটতি',
            //     name:'jubo_associate_member_gatti',
            // },
            {
                label:'টার্গেট',
                name:'jubo_associate_member_target',
            },
        ],
        cultural_rokon:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'cultural_rokon_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'cultural_rokon_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'cultural_rokon_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'cultural_rokon_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'cultural_rokon_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'cultural_rokon_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'cultural_rokon_target',
            },
        ],
        cultural_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'cultural_kormi_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'cultural_kormi_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'cultural_kormi_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'cultural_kormi_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'cultural_kormi_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'cultural_kormi_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'cultural_kormi_target',
            },
        ],
        cultural_associate_member:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'cultural_associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'cultural_associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'cultural_associate_member_increase',
            },
            // {
            //     label:'ঘাটতি',
            //     name:'cultural_associate_member_gatti',
            // },
            {
                label:'টার্গেট',
                name:'cultural_associate_member_target',
            },
        ],



        vinno_dormalombi_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'vinno_dormalombi_kormi_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'vinno_dormalombi_kormi_present',
            // },
            {
                label:'বৃদ্ধি মানোন্নয়ন',
                name:'vinno_dormalombi_kormi_increase_manonnoyon',
            },
            {
                label:'বৃদ্ধি আগত',
                name:'vinno_dormalombi_kormi_increase_agoto',
            },
            {
                label:'ঘাটতি মানোন্নয়ন',
                name:'vinno_dormalombi_kormi_gatti_manonnoyon',
            },
            {
                label:'ঘাটতি স্থানান্তর',
                name:'vinno_dormalombi_kormi_gatti_sthanantor',
            },
            {
                label:'টার্গেট',
                name:'vinno_dormalombi_kormi_target',
            },
        ],
        vinno_dormalombi_associate_member:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'vinno_dormalombi_associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'vinno_dormalombi_associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'vinno_dormalombi_associate_member_increase',
            },
            // {
            //     label:'ঘাটতি',
            //     name:'vinno_dormalombi_associate_member_gatti',
            // },
            {
                label:'টার্গেট',
                name:'vinno_dormalombi_associate_member_target',
            },
        ],




        pouroshova: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'pouroshov_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'pouroshova_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'pouroshova_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'pouroshova_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'pouroshova_target',
            },
        ],

        songothito_pouroshova: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothito_pouroshova_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothito_pouroshova_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothito_pouroshova_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothito_pouroshova_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothito_pouroshova_target',
            },
        ],

        union: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'union_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'union_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'union_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'union_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'union_target',
            },
        ],

        songothito_union_man: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothito_union_man_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothito_union_man_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothito_union_man_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothito_union_man_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothito_union_man_target',
            },
        ],

        songothito_union_woman: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothito_union_woman_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothito_union_woman_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothito_union_woman_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothito_union_woman_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothito_union_woman_target',
            },
        ],

        union_without_member_woman: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'union_without_member_woman_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'union_without_member_woman_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'union_without_member_woman_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'union_without_member_woman_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'union_without_member_woman_target',
            },
        ],

        total_proshashonik_ward_of_city_corporation: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_proshashonik_ward_of_city_corporation_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_proshashonik_ward_of_city_corporation_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_proshashonik_ward_of_city_corporation_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_proshashonik_ward_of_city_corporation_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_proshashonik_ward_of_city_corporation_target',
            },
        ],

        total_songothito_ward_of_city_corporation: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothito_ward_of_city_corporation_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothito_ward_of_city_corporation_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothito_ward_of_city_corporation_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothito_ward_of_city_corporation_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothito_ward_of_city_corporation_target',
            },
        ],

        total_songothonik_ward_man: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothonik_ward_man_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothonik_ward_man_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothonik_ward_man_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothonik_ward_man_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothonik_ward_man_target',
            },
        ],

        total_songothonik_ward_woman: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothonik_ward_woman_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothonik_ward_woman_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothonik_ward_woman_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothonik_ward_woman_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothonik_ward_woman_target',
            },
        ],

        total_proshashonik_ward_of_pouroshova: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_proshashonik_ward_of_pouroshova_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_proshashonik_ward_of_pouroshova_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_proshashonik_ward_of_pouroshova_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_proshashonik_ward_of_pouroshova_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_proshashonik_ward_of_pouroshova_target',
            },
        ],

        total_proshashonik_ward_of_union: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_proshashonik_ward_of_union_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_proshashonik_ward_of_union_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_proshashonik_ward_of_union_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_proshashonik_ward_of_union_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_proshashonik_ward_of_union_target',
            },
        ],

        total_songothito_ward_of_pouroshova: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothito_ward_of_pouroshova_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothito_ward_of_pouroshova_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothito_ward_of_pouroshova_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothito_ward_of_pouroshova_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothito_ward_of_pouroshova_target',
            },
        ],

        total_songothito_ward_of_union: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothito_ward_of_union_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothito_ward_of_union_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothito_ward_of_union_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothito_ward_of_union_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothito_ward_of_union_target',
            },
        ],

        total_songothonik_ward_of_pouroshova_man: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothonik_ward_of_pouroshova_man_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothonik_ward_of_pouroshova_man_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothonik_ward_of_pouroshova_man_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothonik_ward_of_pouroshova_man_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothonik_ward_of_pouroshova_man_target',
            },
        ],

        total_songothonik_ward_of_union_man: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothonik_ward_of_union_man_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothonik_ward_of_union_man_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothonik_ward_of_union_man_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothonik_ward_of_union_man_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothonik_ward_of_union_man_target',
            },
        ],

        total_songothonik_ward_of_pouroshova_woman: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothonik_ward_of_pouroshova_woman_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothonik_ward_of_pouroshova_woman_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothonik_ward_of_pouroshova_woman_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothonik_ward_of_pouroshova_woman_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothonik_ward_of_pouroshova_woman_target',
            },
        ],

        total_songothonik_ward_of_union_woman: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'total_songothonik_ward_of_union_woman_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'total_songothonik_ward_of_union_woman_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'total_songothonik_ward_of_union_woman_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_songothonik_ward_of_union_woman_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'total_songothonik_ward_of_union_woman_target',
            },
        ],

        songothonik_ward_ulama: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothonik_ward_ulama_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothonik_ward_ulama_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothonik_ward_ulama_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothonik_ward_ulama_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothonik_ward_ulama_target',
            },
        ],

        songothonik_ward_peshajibi: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothonik_ward_peshajibi_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothonik_ward_peshajibi_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothonik_ward_peshajibi_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothonik_ward_peshajibi_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothonik_ward_peshajibi_target',
            },
        ],

        songothonik_ward_jubo: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothonik_ward_jubo_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothonik_ward_jubo_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothonik_ward_jubo_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothonik_ward_jubo_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothonik_ward_jubo_target',
            },
        ],

        songothonik_ward_sromo: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothonik_ward_sromo_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothonik_ward_sromo_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothonik_ward_sromo_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothonik_ward_sromo_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothonik_ward_sromo_target',
            },
        ],

        songothonik_ward_media: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothonik_ward_media_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothonik_ward_media_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothonik_ward_media_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothonik_ward_media_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothonik_ward_media_target',
            },
        ],

        songothonik_ward_cultural: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'songothonik_ward_cultural_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'songothonik_ward_cultural_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'songothonik_ward_cultural_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'songothonik_ward_cultural_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'songothonik_ward_cultural_target',
            },
        ],

        general_unit_men: [
            // {
            //     label: 'বিগত মাসের সংখ্যা',
            //     name: 'general_unit_men_previous',
            // },
            // {
            //     label: 'বর্তমান সংখ্যা',
            //     name: 'general_unit_men_present',
            // },
            {
                label: 'বৃদ্ধি',
                name: 'general_unit_men_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'general_unit_men_gatti',
            },
        ],
        general_unit_women: [
            { label: 'বৃদ্ধি', name: 'general_unit_women_increase' },
            { label: 'ঘাটতি', name: 'general_unit_women_gatti' },
            { label: 'টার্গেট', name: 'general_unit_women_target' },
        ],
        ulama_unit: [
            { label: 'বৃদ্ধি', name: 'ulama_unit_increase' },
            { label: 'ঘাটতি', name: 'ulama_unit_gatti' },
            { label: 'টার্গেট', name: 'ulama_unit_target' },
        ],
        peshajibi_unit_men: [
            { label: 'বৃদ্ধি', name: 'peshajibi_unit_men_increase' },
            { label: 'ঘাটতি', name: 'peshajibi_unit_men_gatti' },
            { label: 'টার্গেট', name: 'peshajibi_unit_men_target' },
        ],
        peshajibi_unit_women: [
            { label: 'বৃদ্ধি', name: 'peshajibi_unit_women_increase' },
            { label: 'ঘাটতি', name: 'peshajibi_unit_women_gatti' },
            { label: 'টার্গেট', name: 'peshajibi_unit_women_target' },
        ],
        kormojibi_unit_women: [
            { label: 'বৃদ্ধি', name: 'kormojibi_unit_women_increase' },
            { label: 'ঘাটতি', name: 'kormojibi_unit_women_gatti' },
            { label: 'টার্গেট', name: 'kormojibi_unit_women_target' },
        ],
        jubo_unit: [
            { label: 'বৃদ্ধি', name: 'jubo_unit_increase' },
            { label: 'ঘাটতি', name: 'jubo_unit_gatti' },
            { label: 'টার্গেট', name: 'jubo_unit_target' },
        ],
        sromo_unit_man: [
            { label: 'বৃদ্ধি', name: 'sromo_unit_man_increase' },
            { label: 'ঘাটতি', name: 'sromo_unit_man_gatti' },
            { label: 'টার্গেট', name: 'sromo_unit_man_target' },
        ],
        sromo_unit_woman: [
            { label: 'বৃদ্ধি', name: 'sromo_unit_woman_increase' },
            { label: 'ঘাটতি', name: 'sromo_unit_woman_gatti' },
            { label: 'টার্গেট', name: 'sromo_unit_woman_target' },
        ],
        media_unit: [
            { label: 'বৃদ্ধি', name: 'media_unit_increase' },
            { label: 'ঘাটতি', name: 'media_unit_gatti' },
            { label: 'টার্গেট', name: 'media_unit_target' },
        ],
        cultural_unit: [
            { label: 'বৃদ্ধি', name: 'cultural_unit_increase' },
            { label: 'ঘাটতি', name: 'cultural_unit_gatti' },
            { label: 'টার্গেট', name: 'cultural_unit_target' },
        ],


 













        dawati_unit:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'dawati_unit_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'dawati_unit_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'dawati_unit_increase',
            },
            {
                label:'ঘাটতি',
                name:'dawati_unit_gatti',
            },
            {
                label:'টার্গেট',
                name:'dawati_unit_target',
            },
        ],
        paribarik_unit:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'paribarik_unit_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'paribarik_unit_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'paribarik_unit_increase',
            },
            {
                label:'ঘাটতি',
                name:'paribarik_unit_gatti',
            },
            {
                label:'টার্গেট',
                name:'paribarik_unit_target',
            },
        ],


        songothon6_pouroshova: [
            {
                label: 'বৃদ্ধি',
                name: 'pouroshova_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'pouroshova_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'pouroshova_target',
            },
        ],

        songothon6_union: [
            {
                label: 'বৃদ্ধি',
                name: 'union_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'union_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'union_target',
            },
        ],

        songothon6_ward_of_city: [
            {
                label: 'বৃদ্ধি',
                name: 'ward_of_city_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'ward_of_city_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'ward_of_city_target',
            },
        ],

        songothon6_ward_of_pouroshova: [
            {
                label: 'বৃদ্ধি',
                name: 'ward_of_pouroshova_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'ward_of_pouroshova_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'ward_of_pouroshova_target',
            },
        ],

        songothon6_ward_of_union: [
            {
                label: 'বৃদ্ধি',
                name: 'ward_of_union_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'ward_of_union_gatti',
            },
            {
                label: 'টার্গেট',
                name: 'ward_of_union_target',
            },
        ],





        songothon7_Joined_student_man:[
            {
                label:'সদস্য',
                name:'Joined_student_man_member',
            },
            {
                label:'সাথী',
                name:'Joined_student_man_associate',
            },
            {
                label:'কর্মী',
                name:'Joined_student_man_worker',
            },
        ],
        songothon7_Joined_student_woman:[
            {
                label:'সদস্যা',
                name:'Joined_student_women_member',
            },
            {
                label:'অগ্রসর কর্মী',
                name:'Joined_student_women_associate',
            },
            {
                label:'কর্মী',
                name:'Joined_student_women_worker',
            },
        ],

        songothon8_total_trade_union: [
            {
                label: 'বৃদ্ধি',
                name: 'total_trade_union_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_trade_union_gatti',
            },
        ],

        songothon8_total_trust: [
            {
                label: 'বৃদ্ধি',
                name: 'total_trust_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_trust_gatti',
            },
        ],

        songothon8_total_foundation: [
            {
                label: 'বৃদ্ধি',
                name: 'total_foundation_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_foundation_gatti',
            },
        ],

        songothon8_total_societie: [
            {
                label: 'বৃদ্ধি',
                name: 'total_societie_increase',
            },
            {
                label: 'ঘাটতি',
                name: 'total_societie_gatti',
            },
        ],
        
        
        sofor_man: [
            {
                label:'জেলা দায়িত্বশীলদের সফর',
                name:'jela_daittoshil_total_sofor_man',
            },
            {
                label:'মহানগরী দায়িত্বশীলদের সফর',
                name:'mohanogor_daittoshil_total_sofor_man',
            },

            {
                label:'উপজেলা আমীর/সভাপতির সফর',
                name:'upojela_president_total_sofor_man',
            },
            {
                label:'থানা আমীর/সভাপতির সফর',
                name:'thana_president_total_sofor_man',
            },

            {
                label:'উপজেলা কর্মপরিষদ সদস্যদের সফর',
                name:'upojela_kormoporishod_total_sofor_man',
            },
            {
                label:'উপজেলা টিম সদস্যদের সফর',
                name:'upojela_team_total_sofor_man',
            },
            {
                label:'থানা কর্মপরিষদ সদস্যদের সফর',
                name:'thana_kormoporishod_total_sofor_man',
            },
            {
                label:'থানা টিম সদস্যদের সফর',
                name:'thana_team_total_sofor_man',
            },
        ],
        //মহিলা 
        sofor_woman:[
            {
                label:'জেলা দায়িত্বশীলদের সফর',
                name:'jela_daittoshil_total_sofor_woman',
            },
            {
                label:'মহানগরী দায়িত্বশীলদের সফর',
                name:'mohanogor_daittoshil_total_sofor_woman',
            },

            {
                label:'উপজেলা বিভাগীয় সেক্রেটারির সফর',
                name:'upojela_secretariat_total_sofor_woman',
            },
            {
                label:'থানা বিভাগীয় সেক্রেটারির সফর',
                name:'thana_secretariat_total_sofor_woman',
            },

            {
                label:'উপজেলা কর্মপরিষদ সদস্যদের সফর',
                name:'upojela_kormoporishod_total_sofor_woman',
            },
            {
                label:'উপজেলা টিম সদস্যদের সফর',
                name:'upojela_team_total_sofor_woman',
            },
            {
                label:'থানা কর্মপরিষদ সদস্যদের সফর',
                name:'thana_kormoporishod_total_sofor_woman',
            },
            {
                label:'থানা টিম সদস্যদের সফর',
                name:'thana_team_total_sofor_woman',
            },
        ],

        associate_member_iyanot:[
            {
                label:'মোট সংখ্যা',
                name:'associate_member_total',
            },
            {
                label:'অর্থের পরিমাণ',
                name:'associate_member_total_iyanot_amounts',
            },
        ],
        sudi_iyanot:[
            {
                label:'মোট সংখ্যা',
                name:'sudhi_total',
            },
            {
                label:'অর্থের পরিমাণ',
                name:'sudi_total_iyanot_amounts',
            },
        ],

        upojela_mozlishe_sura_boithok_man: [
            { label: 'সংখ্যা', name: 'upojela_mozlishe_sura_boithok_man_total' },
            { label: 'টার্গেট', name: 'upojela_mozlishe_sura_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upojela_mozlishe_sura_boithok_man_uposthiti' },
        ],
        upojela_mozlishe_sura_boithok_women: [
            { label: 'সংখ্যা', name: 'upojela_mozlishe_sura_boithok_women_total' },
            { label: 'টার্গেট', name: 'upojela_mozlishe_sura_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upojela_mozlishe_sura_boithok_women_uposthiti' },
        ],
        thana_mozlishe_sura_boithok_man: [
            { label: 'সংখ্যা', name: 'thana_mozlishe_sura_boithok_man_total' },
            { label: 'টার্গেট', name: 'thana_mozlishe_sura_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_mozlishe_sura_boithok_man_uposthiti' },
        ],
        thana_mozlishe_sura_boithok_women: [
            { label: 'সংখ্যা', name: 'thana_mozlishe_sura_boithok_women_total' },
            { label: 'টার্গেট', name: 'thana_mozlishe_sura_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_mozlishe_sura_boithok_women_uposthiti' },
        ],
        pourosova_mozlishe_sura_boithok_man: [
            { label: 'সংখ্যা', name: 'pourosova_mozlishe_sura_boithok_man_total' },
            { label: 'টার্গেট', name: 'pourosova_mozlishe_sura_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pourosova_mozlishe_sura_boithok_man_uposthiti' },
        ],
        pourosova_mozlishe_sura_boithok_women: [
            { label: 'সংখ্যা', name: 'pourosova_mozlishe_sura_boithok_women_total' },
            { label: 'টার্গেট', name: 'pourosova_mozlishe_sura_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pourosova_mozlishe_sura_boithok_women_uposthiti' },
        ],


        union_mozlishe_sura_boithok_man: [
            { label: 'সংখ্যা', name: 'union_mozlishe_sura_boithok_man_total' },
            { label: 'টার্গেট', name: 'union_mozlishe_sura_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_mozlishe_sura_boithok_man_uposthiti' },
        ],

        union_mozlishe_sura_boithok_women: [
            { label: 'সংখ্যা', name: 'union_mozlishe_sura_boithok_women_total' },
            { label: 'টার্গেট', name: 'union_mozlishe_sura_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_mozlishe_sura_boithok_women_uposthiti' },
        ],

        upojela_kormoporishod_boithok_man: [
            { label: 'সংখ্যা', name: 'upojela_kormoporishod_boithok_man_total' },
            { label: 'টার্গেট', name: 'upojela_kormoporishod_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upojela_kormoporishod_boithok_man_uposthiti' },
        ],

        upojela_kormoporishod_boithok_women: [
            { label: 'সংখ্যা', name: 'upojela_kormoporishod_boithok_women_total' },
            { label: 'টার্গেট', name: 'upojela_kormoporishod_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upojela_kormoporishod_boithok_women_uposthiti' },
        ],

        thana_kormoporishod_boithok_man: [
            { label: 'সংখ্যা', name: 'thana_kormoporishod_boithok_man_total' },
            { label: 'টার্গেট', name: 'thana_kormoporishod_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_kormoporishod_boithok_man_uposthiti' },
        ],

        thana_kormoporishod_boithok_women: [
            { label: 'সংখ্যা', name: 'thana_kormoporishod_boithok_women_total' },
            { label: 'টার্গেট', name: 'thana_kormoporishod_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_kormoporishod_boithok_women_uposthiti' },
        ],

        pourosova_kormoporishod_boithok_man: [
            { label: 'সংখ্যা', name: 'pourosova_kormoporishod_boithok_man_total' },
            { label: 'টার্গেট', name: 'pourosova_kormoporishod_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pourosova_kormoporishod_boithok_man_uposthiti' },
        ],

        pourosova_kormoporishod_boithok_women: [
            { label: 'সংখ্যা', name: 'pourosova_kormoporishod_boithok_women_total' },
            { label: 'টার্গেট', name: 'pourosova_kormoporishod_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pourosova_kormoporishod_boithok_women_uposthiti' },
        ],

        union_kormoporishod_boithok_man: [
            { label: 'সংখ্যা', name: 'union_kormoporishod_boithok_man_total' },
            { label: 'টার্গেট', name: 'union_kormoporishod_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_kormoporishod_boithok_man_uposthiti' },
        ],

        union_kormoporishod_boithok_women: [
            { label: 'সংখ্যা', name: 'union_kormoporishod_boithok_women_total' },
            { label: 'টার্গেট', name: 'union_kormoporishod_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_kormoporishod_boithok_women_uposthiti' },
        ],

        upojela_mashik_rokon_boithok_man: [
            { label: 'সংখ্যা', name: 'upojela_mashik_rokon_boithok_man_total' },
            { label: 'টার্গেট', name: 'upojela_mashik_rokon_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upojela_mashik_rokon_boithok_man_uposthiti' },
        ],

        upojela_mashik_rokon_boithok_women: [
            { label: 'সংখ্যা', name: 'upojela_mashik_rokon_boithok_women_total' },
            { label: 'টার্গেট', name: 'upojela_mashik_rokon_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upojela_mashik_rokon_boithok_women_uposthiti' },
        ],

        thana_mashik_rokon_boithok_man: [
            { label: 'সংখ্যা', name: 'thana_mashik_rokon_boithok_man_total' },
            { label: 'টার্গেট', name: 'thana_mashik_rokon_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_mashik_rokon_boithok_man_uposthiti' },
        ],

        thana_mashik_rokon_boithok_women: [
            { label: 'সংখ্যা', name: 'thana_mashik_rokon_boithok_women_total' },
            { label: 'টার্গেট', name: 'thana_mashik_rokon_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_mashik_rokon_boithok_women_uposthiti' },
        ],

        upojela_boithok_man: [
            { label: 'সংখ্যা', name: 'upojela_boithok_man_total' },
            { label: 'টার্গেট', name: 'upojela_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upojela_boithok_man_uposthiti' },
        ],

        upojela_boithok_women: [
            { label: 'সংখ্যা', name: 'upojela_boithok_women_total' },
            { label: 'টার্গেট', name: 'upojela_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upojela_boithok_women_uposthiti' },
        ],

        thana_boithok_man: [
            { label: 'সংখ্যা', name: 'thana_boithok_man_total' },
            { label: 'টার্গেট', name: 'thana_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_boithok_man_uposthiti' },
        ],

        thana_boithok_women: [
            { label: 'সংখ্যা', name: 'thana_boithok_women_total' },
            { label: 'টার্গেট', name: 'thana_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_boithok_women_uposthiti' },
        ],

        bivagio_committee_boithok_man: [
            { label: 'সংখ্যা', name: 'bivagio_committee_boithok_man_total' },
            { label: 'টার্গেট', name: 'bivagio_committee_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'bivagio_committee_boithok_man_uposthiti' },
        ],

        bivagio_committee_boithok_women: [
            { label: 'সংখ্যা', name: 'bivagio_committee_boithok_women_total' },
            { label: 'টার্গেট', name: 'bivagio_committee_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'bivagio_committee_boithok_women_uposthiti' },
        ],

        pouroshova_boithok_man: [
            { label: 'সংখ্যা', name: 'pouroshova_boithok_man_total' },
            { label: 'টার্গেট', name: 'pouroshova_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pouroshova_boithok_man_uposthiti' },
        ],

        pouroshova_boithok_women: [
            { label: 'সংখ্যা', name: 'pouroshova_boithok_women_total' },
            { label: 'টার্গেট', name: 'pouroshova_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pouroshova_boithok_women_uposthiti' },
        ],

        union_boithok_man: [
            { label: 'সংখ্যা', name: 'union_boithok_man_total' },
            { label: 'টার্গেট', name: 'union_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_boithok_man_uposthiti' },
        ],

        union_boithok_women: [
            { label: 'সংখ্যা', name: 'union_boithok_women_total' },
            { label: 'টার্গেট', name: 'union_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_boithok_women_uposthiti' },
        ],

        ward_boithok_man: [
            { label: 'সংখ্যা', name: 'ward_boithok_man_total' },
            { label: 'টার্গেট', name: 'ward_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ward_boithok_man_uposthiti' },
        ],

        ward_boithok_women: [
            { label: 'সংখ্যা', name: 'ward_boithok_women_total' },
            { label: 'টার্গেট', name: 'ward_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ward_boithok_women_uposthiti' },
        ],

        pouroshova_mashik_rokon_boithok_man: [
            { label: 'সংখ্যা', name: 'pouroshova_mashik_rokon_boithok_man_total' },
            { label: 'টার্গেট', name: 'pouroshova_mashik_rokon_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pouroshova_mashik_rokon_boithok_man_uposthiti' },
        ],

        pouroshova_mashik_rokon_boithok_women: [
            { label: 'সংখ্যা', name: 'pouroshova_mashik_rokon_boithok_women_total' },
            { label: 'টার্গেট', name: 'pouroshova_mashik_rokon_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pouroshova_mashik_rokon_boithok_women_uposthiti' },
        ],

        union_mashik_rokon_boithok_man: [
            { label: 'সংখ্যা', name: 'union_mashik_rokon_boithok_man_total' },
            { label: 'টার্গেট', name: 'union_mashik_rokon_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_mashik_rokon_boithok_man_uposthiti' },
        ],

        union_mashik_rokon_boithok_women: [
            { label: 'সংখ্যা', name: 'union_mashik_rokon_boithok_women_total' },
            { label: 'টার্গেট', name: 'union_mashik_rokon_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_mashik_rokon_boithok_women_uposthiti' },
        ],

        unit_kormi_boithok_man: [
            { label: 'সংখ্যা', name: 'unit_kormi_boithok_man_total' },
            { label: 'টার্গেট', name: 'unit_kormi_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'unit_kormi_boithok_man_uposthiti' },
        ],

        unit_kormi_boithok_women: [
            { label: 'সংখ্যা', name: 'unit_kormi_boithok_women_total' },
            { label: 'টার্গেট', name: 'unit_kormi_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'unit_kormi_boithok_women_uposthiti' },
        ],

        troimasik_rokon_sommelon_man: [
            { label: 'সংখ্যা', name: 'troimasik_rokon_sommelon_man_total' },
            { label: 'টার্গেট', name: 'troimasik_rokon_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'troimasik_rokon_sommelon_man_uposthiti' },
        ],

        troimasik_rokon_sommelon_women: [
            { label: 'সংখ্যা', name: 'troimasik_rokon_sommelon_women_total' },
            { label: 'টার্গেট', name: 'troimasik_rokon_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'troimasik_rokon_sommelon_women_uposthiti' },
        ],

        shanmasik_rokon_sommelon_man: [
            { label: 'সংখ্যা', name: 'shanmasik_rokon_sommelon_man_total' },
            { label: 'টার্গেট', name: 'shanmasik_rokon_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'shanmasik_rokon_sommelon_man_uposthiti' },
        ],

        shanmasik_rokon_sommelon_women: [
            { label: 'সংখ্যা', name: 'shanmasik_rokon_sommelon_women_total' },
            { label: 'টার্গেট', name: 'shanmasik_rokon_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'shanmasik_rokon_sommelon_women_uposthiti' },
        ],

        barshik_rokon_sommelon_man: [
            { label: 'সংখ্যা', name: 'barshik_rokon_sommelon_man_total' },
            { label: 'টার্গেট', name: 'barshik_rokon_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'barshik_rokon_sommelon_man_uposthiti' },
        ],

        barshik_rokon_sommelon_women: [
            { label: 'সংখ্যা', name: 'barshik_rokon_sommelon_women_total' },
            { label: 'টার্গেট', name: 'barshik_rokon_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'barshik_rokon_sommelon_women_uposthiti' },
        ],


        upozila_word_sovapoti_sommelon_man: [
            { label: 'সংখ্যা', name: 'upozila_word_sovapoti_sommelon_man_total' },
            { label: 'টার্গেট', name: 'upozila_word_sovapoti_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_word_sovapoti_sommelon_man_uposthiti' },
        ],

        upozila_word_sovapoti_sommelon_women: [
            { label: 'সংখ্যা', name: 'upozila_word_sovapoti_sommelon_women_total' },
            { label: 'টার্গেট', name: 'upozila_word_sovapoti_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_word_sovapoti_sommelon_women_uposthiti' },
        ],

        thana_word_sovapoti_sommelon_man: [
            { label: 'সংখ্যা', name: 'thana_word_sovapoti_sommelon_man_total' },
            { label: 'টার্গেট', name: 'thana_word_sovapoti_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_word_sovapoti_sommelon_man_uposthiti' },
        ],

        thana_word_sovapoti_sommelon_women: [
            { label: 'সংখ্যা', name: 'thana_word_sovapoti_sommelon_women_total' },
            { label: 'টার্গেট', name: 'thana_word_sovapoti_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_word_sovapoti_sommelon_women_uposthiti' },
        ],

        upozila_kormi_sommelon_man: [
            { label: 'সংখ্যা', name: 'upozila_kormi_sommelon_man_total' },
            { label: 'টার্গেট', name: 'upozila_kormi_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_kormi_sommelon_man_uposthiti' },
        ],

        upozila_kormi_sommelon_women: [
            { label: 'সংখ্যা', name: 'upozila_kormi_sommelon_women_total' },
            { label: 'টার্গেট', name: 'upozila_kormi_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_kormi_sommelon_women_uposthiti' },
        ],

        thana_kormi_sommelon_man: [
            { label: 'সংখ্যা', name: 'thana_kormi_sommelon_man_total' },
            { label: 'টার্গেট', name: 'thana_kormi_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_kormi_sommelon_man_uposthiti' },
        ],

        thana_kormi_sommelon_women: [
            { label: 'সংখ্যা', name: 'thana_kormi_sommelon_women_total' },
            { label: 'টার্গেট', name: 'thana_kormi_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_kormi_sommelon_women_uposthiti' },
        ],

        union_kormi_sommelon_man: [
            { label: 'সংখ্যা', name: 'union_kormi_sommelon_man_total' },
            { label: 'টার্গেট', name: 'union_kormi_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_kormi_sommelon_man_uposthiti' },
        ],

        union_kormi_sommelon_women: [
            { label: 'সংখ্যা', name: 'union_kormi_sommelon_women_total' },
            { label: 'টার্গেট', name: 'union_kormi_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_kormi_sommelon_women_uposthiti' },
        ],

        ward_kormi_sommelon_man: [
            { label: 'সংখ্যা', name: 'ward_kormi_sommelon_man_total' },
            { label: 'টার্গেট', name: 'ward_kormi_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ward_kormi_sommelon_man_uposthiti' },
        ],

        ward_kormi_sommelon_women: [
            { label: 'সংখ্যা', name: 'ward_kormi_sommelon_women_total' },
            { label: 'টার্গেট', name: 'ward_kormi_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ward_kormi_sommelon_women_uposthiti' },
        ],

        upozila_unit_sovapoti_sommelon_man: [
            { label: 'সংখ্যা', name: 'upozila_unit_sovapoti_sommelon_man_total' },
            { label: 'টার্গেট', name: 'upozila_unit_sovapoti_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_unit_sovapoti_sommelon_man_uposthiti' },
        ],

        upozila_unit_sovapoti_sommelon_women: [
            { label: 'সংখ্যা', name: 'upozila_unit_sovapoti_sommelon_women_total' },
            { label: 'টার্গেট', name: 'upozila_unit_sovapoti_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_unit_sovapoti_sommelon_women_uposthiti' },
        ],

        thana_unit_sovapoti_sommelon_man: [
            { label: 'সংখ্যা', name: 'thana_unit_sovapoti_sommelon_man_total' },
            { label: 'টার্গেট', name: 'thana_unit_sovapoti_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_unit_sovapoti_sommelon_man_uposthiti' },
        ],

        thana_unit_sovapoti_sommelon_women: [
            { label: 'সংখ্যা', name: 'thana_unit_sovapoti_sommelon_women_total' },
            { label: 'টার্গেট', name: 'thana_unit_sovapoti_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_unit_sovapoti_sommelon_women_uposthiti' },
        ],

        ulama_boithok_man: [
            { label: 'সংখ্যা', name: 'ulama_boithok_man_total' },
            { label: 'টার্গেট', name: 'ulama_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ulama_boithok_man_uposthiti' },
        ],

        ulama_boithok_women: [
            { label: 'সংখ্যা', name: 'ulama_boithok_women_total' },
            { label: 'টার্গেট', name: 'ulama_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ulama_boithok_women_uposthiti' },
        ],

        ulama_somabesh_man: [
            { label: 'সংখ্যা', name: 'ulama_somabesh_man_total' },
            { label: 'টার্গেট', name: 'ulama_somabesh_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ulama_somabesh_man_uposthiti' },
        ],

        ulama_somabesh_women: [
            { label: 'সংখ্যা', name: 'ulama_somabesh_women_total' },
            { label: 'টার্গেট', name: 'ulama_somabesh_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ulama_somabesh_women_uposthiti' },
        ],

        pesha_jibi_boithok_man: [
            { label: 'সংখ্যা', name: 'pesha_jibi_boithok_man_total' },
            { label: 'টার্গেট', name: 'pesha_jibi_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pesha_jibi_boithok_man_uposthiti' },
        ],

        pesha_jibi_boithok_women: [
            { label: 'সংখ্যা', name: 'pesha_jibi_boithok_women_total' },
            { label: 'টার্গেট', name: 'pesha_jibi_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pesha_jibi_boithok_women_uposthiti' },
        ],

        sromik_boithok_man: [
            { label: 'সংখ্যা', name: 'sromik_boithok_man_total' },
            { label: 'টার্গেট', name: 'sromik_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'sromik_boithok_man_uposthiti' },
        ],

        sromik_boithok_women: [
            { label: 'সংখ্যা', name: 'sromik_boithok_women_total' },
            { label: 'টার্গেট', name: 'sromik_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'sromik_boithok_women_uposthiti' },
        ],

        sromik_somabesh_man: [
            { label: 'সংখ্যা', name: 'sromik_somabesh_man_total' },
            { label: 'টার্গেট', name: 'sromik_somabesh_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'sromik_somabesh_man_uposthiti' },
        ],

        sromik_somabesh_women: [
            { label: 'সংখ্যা', name: 'sromik_somabesh_women_total' },
            { label: 'টার্গেট', name: 'sromik_somabesh_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'sromik_somabesh_women_uposthiti' },
        ],

        jubok_boithok_man: [
            { label: 'সংখ্যা', name: 'jubok_boithok_man_total' },
            { label: 'টার্গেট', name: 'jubok_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'jubok_boithok_man_uposthiti' },
        ],

        jubok_boithok_women: [
            { label: 'সংখ্যা', name: 'jubok_boithok_women_total' },
            { label: 'টার্গেট', name: 'jubok_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'jubok_boithok_women_uposthiti' },
        ],

        // Student Daittoshil Boithok
        student_daittoshil_boithok_man: [
            { label: 'সংখ্যা', name: 'student_daittoshil_boithok_man_total' },
            { label: 'টার্গেট', name: 'student_daittoshil_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'student_daittoshil_boithok_man_uposthiti' },
        ],

        student_daittoshil_boithok_women: [
            { label: 'সংখ্যা', name: 'student_daittoshil_boithok_women_total' },
            { label: 'টার্গেট', name: 'student_daittoshil_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'student_daittoshil_boithok_women_uposthiti' },
        ],

        // Associate Member Somabesh
        associate_member_somabesh_man: [
            { label: 'সংখ্যা', name: 'associate_member_somabesh_man_total' },
            { label: 'টার্গেট', name: 'associate_member_somabesh_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'associate_member_somabesh_man_uposthiti' },
        ],

        associate_member_somabesh_women: [
            { label: 'সংখ্যা', name: 'associate_member_somabesh_women_total' },
            { label: 'টার্গেট', name: 'associate_member_somabesh_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'associate_member_somabesh_women_uposthiti' },
        ],

        // Associate Member Sommelon
        associate_member_sommelon_man: [
            { label: 'সংখ্যা', name: 'associate_member_sommelon_man_total' },
            { label: 'টার্গেট', name: 'associate_member_sommelon_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'associate_member_sommelon_man_uposthiti' },
        ],

        associate_member_sommelon_women: [
            { label: 'সংখ্যা', name: 'associate_member_sommelon_women_total' },
            { label: 'টার্গেট', name: 'associate_member_sommelon_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'associate_member_sommelon_women_uposthiti' },
        ],





    }),
    created:function(){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        if(this.month != null){
            this.get_monthly_data();
        }
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    methods: {
        dawat_upload: function (endpoint) {
            var value = event.target.value;
            var name = event.target.name;
            var month = new Date(this.$refs.month.value);
            axios.post(`${endpoint}/store-single`, {
                value, name, month
            })
        },
        get_data_by_api: function (endpoint, unique_key) {
            axios.get(`${endpoint}/data?month=${this.month}-01`)
                .then(({ data: object }) => {
                    for (const key in object) {
                        if (Object.hasOwnProperty.call(object, key)) {
                            const value = object[key];
                            let el = document.querySelector(`input[id="${unique_key}${key}"]`);
                            if (el) {
                                el.value = value;
                            }
                        }
                    }
                });
        },
        get_monthly_data: function () {
            let els = document.querySelectorAll('input[type="text"]');
            els = [...els].forEach(e => e.value = '');

            this.get_data_by_api('ward-songothon1-jonosokti', 1);
            this.get_data_by_api('ward-songothon2-associate-member', 2);
            this.get_data_by_api('ward-songothon3-departmental-information', 3);
            this.get_data_by_api('ward-songothon4-unit-songothon', 4);
            this.get_data_by_api('ward-songothon5-dawat-and-paribarik-unit', 5);
            this.get_data_by_api('ward-songothon6-bidayi-students-connect', 6);
            this.get_data_by_api('ward-songothon7-sofor', 7);
            this.get_data_by_api('ward-songothon8-iyanot-data', 8);
            this.get_data_by_api('ward-songothon9-sangothonik-boithok', 9);
        }
    }

}
</script>

<style>

</style>
