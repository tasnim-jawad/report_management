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
        rokon:[
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
        kormi:[
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
        shohojogi_man:[
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
        shohojogi_woman:[
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

        // {
        //     label:'বৃদ্ধি মানোন্নয়ন',
        //     name:'rokon_briddhi',
        // },
        // {
        //     label:'বৃদ্ধি আগত',
        //     name:'rokon_briddhi',
        // },

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
                label:'বৃদ্ধি',
                name:'women_kormi_increase',
            },
            {
                label:'ঘাটতি',
                name:'women_kormi_gatti',
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
            {
                label:'ঘাটতি',
                name:'women_associate_member_gatti',
            },
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
                label:'বৃদ্ধি',
                name:'sromojibi_rokon_increase',
            },
            {
                label:'ঘাটতি',
                name:'sromojibi_rokon_gatti',
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
                label:'বৃদ্ধি',
                name:'sromojibi_kormi_increase',
            },
            {
                label:'ঘাটতি',
                name:'sromojibi_kormi_gatti',
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
            {
                label:'ঘাটতি',
                name:'sromojibi_associate_member_gatti',
            },
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
                label:'বৃদ্ধি',
                name:'ulama_rokon_increase',
            },
            {
                label:'ঘাটতি',
                name:'ulama_rokon_gatti',
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
                label:'বৃদ্ধি',
                name:'ulama_kormi_increase',
            },
            {
                label:'ঘাটতি',
                name:'ulama_kormi_gatti',
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
            {
                label:'ঘাটতি',
                name:'ulama_associate_member_gatti',
            },
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
                label:'বৃদ্ধি',
                name:'pesha_jibi_rokon_increase',
            },
            {
                label:'ঘাটতি',
                name:'pesha_jibi_rokon_gatti',
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
                label:'বৃদ্ধি',
                name:'pesha_jibi_kormi_increase',
            },
            {
                label:'ঘাটতি',
                name:'pesha_jibi_kormi_gatti',
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
            {
                label:'ঘাটতি',
                name:'pesha_jibi_associate_member_gatti',
            },
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
                label:'বৃদ্ধি',
                name:'jubo_rokon_increase',
            },
            {
                label:'ঘাটতি',
                name:'jubo_rokon_gatti',
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
                label:'বৃদ্ধি',
                name:'jubo_kormi_increase',
            },
            {
                label:'ঘাটতি',
                name:'jubo_kormi_gatti',
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
            {
                label:'ঘাটতি',
                name:'jubo_associate_member_gatti',
            },
            {
                label:'টার্গেট',
                name:'jubo_associate_member_target',
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
                label:'বৃদ্ধি',
                name:'vinno_dormalombi_kormi_increase',
            },
            {
                label:'ঘাটতি',
                name:'vinno_dormalombi_kormi_gatti',
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
            {
                label:'ঘাটতি',
                name:'vinno_dormalombi_associate_member_gatti',
            },
            {
                label:'টার্গেট',
                name:'vinno_dormalombi_associate_member_target',
            },
        ],



        general_unit_men:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'general_unit_men_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'general_unit_men_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'general_unit_men_increase',
            },
            {
                label:'ঘাটতি',
                name:'general_unit_men_gatti',
            },
            {
                label:'টার্গেট',
                name:'general_unit_men_target',
            },
        ],
        general_unit_women:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'general_unit_women_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'general_unit_women_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'general_unit_women_increase',
            },
            {
                label:'ঘাটতি',
                name:'general_unit_women_gatti',
            },
            {
                label:'টার্গেট',
                name:'general_unit_women_target',
            },
        ],
        ulama_unit:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'ulama_unit_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'ulama_unit_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'ulama_unit_increase',
            },
            {
                label:'ঘাটতি',
                name:'ulama_unit_gatti',
            },
            {
                label:'টার্গেট',
                name:'ulama_unit_target',
            },
        ],
        peshajibi_unit:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'peshajibi_unit_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'peshajibi_unit_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'peshajibi_unit_increase',
            },
            {
                label:'ঘাটতি',
                name:'peshajibi_unit_gatti',
            },
            {
                label:'টার্গেট',
                name:'peshajibi_unit_target',
            },
        ],
        sromik_kollyan_unit:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'sromik_kollyan_unit_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'sromik_kollyan_unit_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'sromik_kollyan_unit_increase',
            },
            {
                label:'ঘাটতি',
                name:'sromik_kollyan_unit_gatti',
            },
            {
                label:'টার্গেট',
                name:'sromik_kollyan_unit_target',
            },
        ],
        jubo_unit:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'jubo_unit_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'jubo_unit_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'jubo_unit_increase',
            },
            {
                label:'ঘাটতি',
                name:'jubo_unit_gatti',
            },
            {
                label:'টার্গেট',
                name:'jubo_unit_target',
            },
        ],
        media_unit:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'media_unit_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'media_unit_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'media_unit_increase',
            },
            {
                label:'ঘাটতি',
                name:'media_unit_gatti',
            },
            {
                label:'টার্গেট',
                name:'media_unit_target',
            },
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


        Joined_student_man:[
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
        Joined_student_woman:[
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


        sofor:[
            {
                label:'ঊর্ধ্বতন দায়িত্বশীলদের সফর',
                name:'upper_leader_sofor',
            },
            {
                label:'ওয়ার্ড আমীর/সভাপতির সফর',
                name:'ward_sovapotir_sofor',
            },
            {
                label:'ওয়ার্ড শূরা/কর্মপরিষদ/টিম সদস্যদের সফর',
                name:'word_sura_sodosso_sofor',
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



        word_sura_boithok:[
            {
                label:'সংখ্যা',
                name:'word_sura_boithok_total',
            },
            {
                label:'টার্গেট',
                name:'word_sura_boithok_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'word_sura_boithok_uposthiti',
            },
        ],
        kormoporishod_boithok:[
            {
                label:'সংখ্যা',
                name:'kormoporishod_boithok_total',
            },
            {
                label:'টার্গেট',
                name:'kormoporishod_boithok_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'kormoporishod_boithok_uposthiti',
            },
        ],
        team_boithok:[
            {
                label:'সংখ্যা',
                name:'team_boithok_total',
            },
            {
                label:'টার্গেট',
                name:'team_boithok_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'team_boithok_uposthiti',
            },
        ],
        word_boithok:[
            {
                label:'সংখ্যা',
                name:'word_boithok_total',
            },
            {
                label:'টার্গেট',
                name:'word_boithok_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'word_boithok_uposthiti',
            },
        ],
        masik_sodosso_boithok:[
            {
                label:'সংখ্যা',
                name:'masik_sodosso_boithok_total',
            },
            {
                label:'টার্গেট',
                name:'masik_sodosso_boithok_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'masik_sodosso_boithok_uposthiti',
            },
        ],
        unit_kormi_boithok:[
            {
                label:'সংখ্যা',
                name:'unit_kormi_boithok_total',
            },
            {
                label:'টার্গেট',
                name:'unit_kormi_boithok_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'unit_kormi_boithok_uposthiti',
            },
        ],
        ulama_somabesh:[
            {
                label:'সংখ্যা',
                name:'ulama_somabesh_total',
            },
            {
                label:'টার্গেট',
                name:'ulama_somabesh_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'ulama_somabesh_uposthiti',
            },
        ],
        jubok_somabesh:[
            {
                label:'সংখ্যা',
                name:'jubok_somabesh_total',
            },
            {
                label:'টার্গেট',
                name:'jubok_somabesh_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'jubok_somabesh_uposthiti',
            },
        ],
        sromik_somabesh:[
            {
                label:'সংখ্যা',
                name:'sromik_somabesh_total',
            },
            {
                label:'টার্গেট',
                name:'sromik_somabesh_target',
            },
            {
                label:'টোটাল উপস্থিতি',
                name:'sromik_somabesh_uposthiti',
            },
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
