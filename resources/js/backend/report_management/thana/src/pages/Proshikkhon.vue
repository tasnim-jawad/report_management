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
                <h1 class="fw-semibold">প্রশিক্ষণ:</h1>
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">ক) তারবিয়াত (নৈতিক শিক্ষা ও সাংগঠনিক প্রশিক্ষণ):</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিটে মোট তারবিয়াতী বৈঠক (পুরুষ):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in unit_tarbiati_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thanauuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিটে মোট তারবিয়াতী বৈঠক (মহিলা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in unit_tarbiati_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>



        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক সদস্য (রুকন) শিক্ষাশিবির (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_rokon_shikkha_shibir_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক সদস্য (রুকন) শিক্ষাশিবির (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_rokon_shikkha_shibir_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক সদস্য (রুকন) শিক্ষাশিবির (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_rokon_shikkha_shibir_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক সদস্য (রুকন) শিক্ষাশিবির (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_rokon_shikkha_shibir_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক সদস্য (রুকন) শিক্ষা বৈঠক (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_rokon_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক সদস্য (রুকন) শিক্ষা বৈঠক (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_rokon_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক সদস্য (রুকন) শিক্ষা বৈঠক (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_rokon_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক সদস্য (রুকন) শিক্ষা বৈঠক (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_rokon_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক বাছাইকৃত কর্মীদের শিক্ষাশিবির (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_selected_kormi_shikkha_shibir_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক বাছাইকৃত কর্মীদের শিক্ষাশিবির (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_selected_kormi_shikkha_shibir_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক বাছাইকৃত কর্মীদের শিক্ষাশিবির (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_selected_kormi_shikkha_shibir_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক বাছাইকৃত কর্মীদের শিক্ষাশিবির (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_selected_kormi_shikkha_shibir_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক বাছাইকৃত কর্মীদের শিক্ষা বৈঠক (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_selected_kormi_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক বাছাইকৃত কর্মীদের শিক্ষা বৈঠক (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_selected_kormi_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক বাছাইকৃত কর্মীদের শিক্ষা বৈঠক (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_selected_kormi_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক বাছাইকৃত কর্মীদের শিক্ষা বৈঠক (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_selected_kormi_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক কর্মীদের শিক্ষাশিবির (পুরুষ):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_kormi_shikkha_shibir_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক কর্মীদের শিক্ষাশিবির (মহিলা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_kormi_shikkha_shibir_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক কর্মীদের শিক্ষাশিবির (পুরুষ):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_kormi_shikkha_shibir_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক কর্মীদের শিক্ষাশিবির (মহিলা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_kormi_shikkha_shibir_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক কর্মীদের শিক্ষা বৈঠক (পুরুষ):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_kormi_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক কর্মীদের শিক্ষা বৈঠক (মহিলা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_vittik_kormi_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক কর্মীদের শিক্ষা বৈঠক (পুরুষ):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_kormi_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানা ভিত্তিক কর্মীদের শিক্ষা বৈঠক (মহিলা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_vittik_kormi_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক সাবেক ছাত্র/ছাত্রী কর্মীদের প্রশিক্ষণ প্রোগ্রাম (পুরুষ):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_former_Student_kormi_training_program_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা ভিত্তিক সাবেক ছাত্র/ছাত্রী কর্মীদের প্রশিক্ষণ প্রোগ্রাম (মহিলা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upozila_former_Student_kormi_training_program_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানাভিত্তিক সাবেক ছাত্র/ছাত্রী কর্মীদের প্রশিক্ষণ প্রোগ্রাম (পুরুষ):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_former_Student_kormi_training_program_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>থানাভিত্তিক সাবেক ছাত্র/ছাত্রী কর্মীদের প্রশিক্ষণ প্রোগ্রাম (মহিলা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in thana_former_Student_kormi_training_program_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পৌরসভা ভিত্তিক কর্মী শিক্ষা বৈঠক (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in pouroshova_kormi_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পৌরসভা ভিত্তিক কর্মী শিক্ষা বৈঠক (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in pouroshova_kormi_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিয়ন ভিত্তিক কর্মী শিক্ষা বৈঠক (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in union_kormi_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিয়ন ভিত্তিক কর্মী শিক্ষা বৈঠক (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in union_kormi_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ড ভিত্তিক কর্মী শিক্ষা বৈঠক (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in ward_kormi_shikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ড ভিত্তিক কর্মী শিক্ষা বৈঠক (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in ward_kormi_shikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>গণশিক্ষা বৈঠক (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in gono_sikkha_boithok_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>গণশিক্ষা বৈঠক (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in gono_sikkha_boithok_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>গণ নৈশ ইবাদত (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in gono_noisho_ibadot_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>গণ নৈশ ইবাদত (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in gono_noisho_ibadot_women" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>















        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সদস্য (রুকন) পাঠচক্র (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rokon_path_cokro_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সদস্য (রুকন) পাঠচক্র (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rokon_path_cokro_woman" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কর্মী পাঠচক্র চক্র (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in kormi_path_cokro_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কর্মী পাঠচক্র চক্র (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in kormi_path_cokro_woman" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কর্মী আলোচনা চক্র (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in kormi_alochona_cokro_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কর্মী আলোচনা চক্র (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in kormi_alochona_cokro_woman" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কুরআন স্টাডি সার্কেল (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in quran_study_circle_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কুরআন স্টাডি সার্কেল (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in quran_study_circle_woman" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দারস (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in darsul_quran_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দারস (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in darsul_quran_woman" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সহীহ কুরান তিলাওয়াত অনুশীলন (পুরুষ)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sohih_tilawat_man" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সহীহ কুরান তিলাওয়াত অনুশীলন (মহিলা)</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sohih_tilawat_woman" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>




        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">খ) মানবসম্পদ উন্নয়ন:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা/থানা মানবসম্পদ কমিটি সংখ্যা</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in proshikkhon2_committee" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon2-manob-shompod-organizational-activitie'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা/থানা মানবসম্পদ কমিটির বৈঠক সংখ্যা</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in proshikkhon2_committee_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon2-manob-shompod-organizational-activitie'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>জনশক্তির ক্যারিয়ার মোটিভেশন প্রোগ্রাম সংখ্যা</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in proshikkhon2_career_motivation" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon2-manob-shompod-organizational-activitie'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        


        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>প্রশিক্ষণ কোর্স: অংশগ্রহণকারীর সংখ্যা</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in manob_shompod_unnoyon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-proshikkhon3-manob-shompod-traning-course'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>



        <previous-next
                :prev-route="{ name: 'Songothon' }"
                :next-route="{ name: 'Shomajsheba' }"
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
        // month:null,

        // Unit Tarbiati Boithok
        unit_tarbiati_boithok_man: [
            { label: 'সংখ্যা', name: 'unit_tarbiati_boithok_man_total' },
            { label: 'টার্গেট', name: 'unit_tarbiati_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'unit_tarbiati_boithok_man_uposthiti' },
        ],

        unit_tarbiati_boithok_women: [
            { label: 'সংখ্যা', name: 'unit_tarbiati_boithok_women_total' },
            { label: 'টার্গেট', name: 'unit_tarbiati_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'unit_tarbiati_boithok_women_uposthiti' },
        ],

        // Upozila Vittik Rokon Shikkha Shibir
        upozila_vittik_rokon_shikkha_shibir_man: [
            { label: 'সংখ্যা', name: 'upozila_vittik_rokon_shikkha_shibir_man_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_rokon_shikkha_shibir_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_rokon_shikkha_shibir_man_uposthiti' },
        ],

        upozila_vittik_rokon_shikkha_shibir_women: [
            { label: 'সংখ্যা', name: 'upozila_vittik_rokon_shikkha_shibir_women_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_rokon_shikkha_shibir_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_rokon_shikkha_shibir_women_uposthiti' },
        ],

        // thana Vittik Rokon Shikkha Shibir
        thana_vittik_rokon_shikkha_shibir_man: [
            { label: 'সংখ্যা', name: 'thana_vittik_rokon_shikkha_shibir_man_total' },
            { label: 'টার্গেট', name: 'thana_vittik_rokon_shikkha_shibir_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_rokon_shikkha_shibir_man_uposthiti' },
        ],

        thana_vittik_rokon_shikkha_shibir_women: [
            { label: 'সংখ্যা', name: 'thana_vittik_rokon_shikkha_shibir_women_total' },
            { label: 'টার্গেট', name: 'thana_vittik_rokon_shikkha_shibir_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_rokon_shikkha_shibir_women_uposthiti' },
        ],

        // upozila Vittik Rokon Shikkha Boithok
        upozila_vittik_rokon_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'upozila_vittik_rokon_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_rokon_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_rokon_shikkha_boithok_man_uposthiti' },
        ],

        upozila_vittik_rokon_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'upozila_vittik_rokon_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_rokon_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_rokon_shikkha_boithok_women_uposthiti' },
        ],

        // Thana Vittik Rokon Shikkha Boithok
        thana_vittik_rokon_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'thana_vittik_rokon_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'thana_vittik_rokon_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_rokon_shikkha_boithok_man_uposthiti' },
        ],

        thana_vittik_rokon_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'thana_vittik_rokon_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'thana_vittik_rokon_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_rokon_shikkha_boithok_women_uposthiti' },
        ],



        // Upozila Vittik Selected Kormi Shikkha Shibir
        upozila_vittik_selected_kormi_shikkha_shibir_man: [
            { label: 'সংখ্যা', name: 'upozila_vittik_selected_kormi_shikkha_shibir_man_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_selected_kormi_shikkha_shibir_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_selected_kormi_shikkha_shibir_man_uposthiti' },
        ],

        upozila_vittik_selected_kormi_shikkha_shibir_women: [
            { label: 'সংখ্যা', name: 'upozila_vittik_selected_kormi_shikkha_shibir_women_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_selected_kormi_shikkha_shibir_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_selected_kormi_shikkha_shibir_women_uposthiti' },
        ],

        // thana Vittik Selected Kormi Shikkha Shibir
        thana_vittik_selected_kormi_shikkha_shibir_man: [
            { label: 'সংখ্যা', name: 'thana_vittik_selected_kormi_shikkha_shibir_man_total' },
            { label: 'টার্গেট', name: 'thana_vittik_selected_kormi_shikkha_shibir_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_selected_kormi_shikkha_shibir_man_uposthiti' },
        ],

        thana_vittik_selected_kormi_shikkha_shibir_women: [
            { label: 'সংখ্যা', name: 'thana_vittik_selected_kormi_shikkha_shibir_women_total' },
            { label: 'টার্গেট', name: 'thana_vittik_selected_kormi_shikkha_shibir_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_selected_kormi_shikkha_shibir_women_uposthiti' },
        ],

        // upozila Vittik Selected Kormi Shikkha Boithok
        upozila_vittik_selected_kormi_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'upozila_vittik_selected_kormi_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_selected_kormi_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_selected_kormi_shikkha_boithok_man_uposthiti' },
        ],

        upozila_vittik_selected_kormi_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'upozila_vittik_selected_kormi_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_selected_kormi_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_selected_kormi_shikkha_boithok_women_uposthiti' },
        ],
        // Thana Vittik Selected Kormi Shikkha Boithok
        thana_vittik_selected_kormi_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'thana_vittik_selected_kormi_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'thana_vittik_selected_kormi_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_selected_kormi_shikkha_boithok_man_uposthiti' },
        ],

        thana_vittik_selected_kormi_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'thana_vittik_selected_kormi_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'thana_vittik_selected_kormi_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_selected_kormi_shikkha_boithok_women_uposthiti' },
        ],

        // Upozila Vittik Kormi Shikkha Shibir
        upozila_vittik_kormi_shikkha_shibir_man: [
            { label: 'সংখ্যা', name: 'upozila_vittik_kormi_shikkha_shibir_man_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_kormi_shikkha_shibir_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_kormi_shikkha_shibir_man_uposthiti' },
        ],

        upozila_vittik_kormi_shikkha_shibir_women: [
            { label: 'সংখ্যা', name: 'upozila_vittik_kormi_shikkha_shibir_women_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_kormi_shikkha_shibir_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_kormi_shikkha_shibir_women_uposthiti' },
        ],
        // thana Vittik Kormi Shikkha Shibir
        thana_vittik_kormi_shikkha_shibir_man: [
            { label: 'সংখ্যা', name: 'thana_vittik_kormi_shikkha_shibir_man_total' },
            { label: 'টার্গেট', name: 'thana_vittik_kormi_shikkha_shibir_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_kormi_shikkha_shibir_man_uposthiti' },
        ],

        thana_vittik_kormi_shikkha_shibir_women: [
            { label: 'সংখ্যা', name: 'thana_vittik_kormi_shikkha_shibir_women_total' },
            { label: 'টার্গেট', name: 'thana_vittik_kormi_shikkha_shibir_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_kormi_shikkha_shibir_women_uposthiti' },
        ],

        // upozila Vittik Kormi Shikkha Boithok
        upozila_vittik_kormi_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'upozila_vittik_kormi_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_kormi_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_kormi_shikkha_boithok_man_uposthiti' },
        ],

        upozila_vittik_kormi_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'upozila_vittik_kormi_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'upozila_vittik_kormi_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_vittik_kormi_shikkha_boithok_women_uposthiti' },
        ],
        // Thana Vittik Kormi Shikkha Boithok
        thana_vittik_kormi_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'thana_vittik_kormi_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'thana_vittik_kormi_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_kormi_shikkha_boithok_man_uposthiti' },
        ],

        thana_vittik_kormi_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'thana_vittik_kormi_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'thana_vittik_kormi_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_vittik_kormi_shikkha_boithok_women_uposthiti' },
        ],

        upozila_former_Student_kormi_training_program_man: [
            { label: 'সংখ্যা', name: 'upozila_former_Student_kormi_training_program_man_total' },
            { label: 'টার্গেট', name: 'upozila_former_Student_kormi_training_program_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_former_Student_kormi_training_program_man_uposthiti' },
        ],
        upozila_former_Student_kormi_training_program_women: [
            { label: 'সংখ্যা', name: 'upozila_former_Student_kormi_training_program_women_total' },
            { label: 'টার্গেট', name: 'upozila_former_Student_kormi_training_program_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'upozila_former_Student_kormi_training_program_women_uposthiti' },
        ],
        thana_former_Student_kormi_training_program_man: [
            { label: 'সংখ্যা', name: 'thana_former_Student_kormi_training_program_man_total' },
            { label: 'টার্গেট', name: 'thana_former_Student_kormi_training_program_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_former_Student_kormi_training_program_man_uposthiti' },
        ],
        thana_former_Student_kormi_training_program_women: [
            { label: 'সংখ্যা', name: 'thana_former_Student_kormi_training_program_women_total' },
            { label: 'টার্গেট', name: 'thana_former_Student_kormi_training_program_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'thana_former_Student_kormi_training_program_women_uposthiti' },
        ],
        pouroshova_kormi_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'pouroshova_kormi_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'pouroshova_kormi_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pouroshova_kormi_shikkha_boithok_man_uposthiti' },
        ],
        pouroshova_kormi_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'pouroshova_kormi_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'pouroshova_kormi_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'pouroshova_kormi_shikkha_boithok_women_uposthiti' },
        ],
        union_kormi_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'union_kormi_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'union_kormi_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_kormi_shikkha_boithok_man_uposthiti' },
        ],
        union_kormi_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'union_kormi_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'union_kormi_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'union_kormi_shikkha_boithok_women_uposthiti' },
        ],
        ward_kormi_shikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'ward_kormi_shikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'ward_kormi_shikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ward_kormi_shikkha_boithok_man_uposthiti' },
        ],
        ward_kormi_shikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'ward_kormi_shikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'ward_kormi_shikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'ward_kormi_shikkha_boithok_women_uposthiti' },
        ],
        gono_sikkha_boithok_man: [
            { label: 'সংখ্যা', name: 'gono_sikkha_boithok_man_total' },
            { label: 'টার্গেট', name: 'gono_sikkha_boithok_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'gono_sikkha_boithok_man_uposthiti' },
        ],
        gono_sikkha_boithok_women: [
            { label: 'সংখ্যা', name: 'gono_sikkha_boithok_women_total' },
            { label: 'টার্গেট', name: 'gono_sikkha_boithok_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'gono_sikkha_boithok_women_uposthiti' },
        ],
        gono_noisho_ibadot_man: [
            { label: 'সংখ্যা', name: 'gono_noisho_ibadot_man_total' },
            { label: 'টার্গেট', name: 'gono_noisho_ibadot_man_target' },
            { label: 'টোটাল উপস্থিতি', name: 'gono_noisho_ibadot_man_uposthiti' },
        ],
        gono_noisho_ibadot_women: [
            { label: 'সংখ্যা', name: 'gono_noisho_ibadot_women_total' },
            { label: 'টার্গেট', name: 'gono_noisho_ibadot_women_target' },
            { label: 'টোটাল উপস্থিতি', name: 'gono_noisho_ibadot_women_uposthiti' },
        ],




        rokon_path_cokro_man: [
            { label: 'গ্রুপ', name: 'rokon_path_cokro_man_total_group' },
            { label: 'অধিবেশন', name: 'rokon_path_cokro_man_total_odhibeshon' },
            { label: 'টোটাল উপস্থিতি', name: 'rokon_path_cokro_man_total_uposthiti' },
        ],
        rokon_path_cokro_woman: [
            { label: 'গ্রুপ', name: 'rokon_path_cokro_woman_total_group' },
            { label: 'অধিবেশন', name: 'rokon_path_cokro_woman_total_odhibeshon' },
            { label: 'টোটাল উপস্থিতি', name: 'rokon_path_cokro_woman_total_uposthiti' },
        ],
        kormi_path_cokro_man: [
            { label: 'গ্রুপ', name: 'kormi_path_cokro_man_total_group' },
            { label: 'অধিবেশন', name: 'kormi_path_cokro_man_total_odhibeshon' },
            { label: 'টোটাল উপস্থিতি', name: 'kormi_path_cokro_man_total_uposthiti' },
        ],
        kormi_path_cokro_woman: [
            { label: 'গ্রুপ', name: 'kormi_path_cokro_woman_total_group' },
            { label: 'অধিবেশন', name: 'kormi_path_cokro_woman_total_odhibeshon' },
            { label: 'টোটাল উপস্থিতি', name: 'kormi_path_cokro_woman_total_uposthiti' },
        ],
        kormi_alochona_cokro_man: [
            { label: 'গ্রুপ', name: 'kormi_alochona_cokro_man_total_group' },
            { label: 'অধিবেশন', name: 'kormi_alochona_cokro_man_total_odhibeshon' },
            { label: 'টোটাল উপস্থিতি', name: 'kormi_alochona_cokro_man_total_uposthiti' },
        ],
        kormi_alochona_cokro_woman: [
            { label: 'গ্রুপ', name: 'kormi_alochona_cokro_woman_total_group' },
            { label: 'অধিবেশন', name: 'kormi_alochona_cokro_woman_total_odhibeshon' },
            { label: 'টোটাল উপস্থিতি', name: 'kormi_alochona_cokro_woman_total_uposthiti' },
        ],
        quran_study_circle_man: [
            { label: 'গ্রুপ', name: 'quran_study_circle_man_total_group' },
            { label: 'অধিবেশন', name: 'quran_study_circle_man_total_odhibeshon' },
            { label: 'টোটাল উপস্থিতি', name: 'quran_study_circle_man_total_uposthiti' },
        ],
        quran_study_circle_woman: [
            { label: 'গ্রুপ', name: 'quran_study_circle_woman_total_group' },
            { label: 'অধিবেশন', name: 'quran_study_circle_woman_total_odhibeshon' },
            { label: 'টোটাল উপস্থিতি', name: 'quran_study_circle_woman_total_uposthiti' },
        ],

        darsul_quran_man:[
            {
                label:'প্রোগ্রাম সংখ্যা',
                name:'darsul_quran_man_program',
            },
            {
                label:'উপস্থিতি',
                name:'darsul_quran_man_uposthiti',
            },
        ],
        darsul_quran_woman:[
            {
                label:'প্রোগ্রাম সংখ্যা',
                name:'darsul_quran_woman_program',
            },
            {
                label:'উপস্থিতি',
                name:'darsul_quran_woman_uposthiti',
            },
        ],
        sohih_tilawat_man:[
            {
                label:'প্রোগ্রাম সংখ্যা',
                name:'sohih_tilawat_man_program',
            },
            {
                label:'উপস্থিতি',
                name:'sohih_tilawat_man_uposthiti',
            },
        ],
        sohih_tilawat_woman:[
            {
                label:'প্রোগ্রাম সংখ্যা',
                name:'sohih_tilawat_woman_program',
            },
            {
                label:'উপস্থিতি',
                name:'sohih_tilawat_woman_uposthiti',
            },
        ],





        // উপজেলা/থানা মানবসম্পদ কমিটি সংখ্যা
        proshikkhon2_committee:[
            {
                label:'উপজেলা কমিটি সংখ্যা',
                name:'upojela_manobshompod_committee',
            },
            {
                label:'থানা কমিটি সংখ্যা',
                name:'thana_manobshompod_committee',
            },
        ],

        // উপজেলা/থানা মানবসম্পদ কমিটির বৈঠক সংখ্যা
        proshikkhon2_committee_boithok:[
            {
                label:'উপজেলা কমিটির বৈঠক সংখ্যা',
                name:'upojela_manobshompod_committee_boithok',
            },
            {
                label:'থানা কমিটির বৈঠক সংখ্যা',
                name:'thana_manobshompod_committee_boithok',
            },
        ],

        // জনশক্তির ক্যারিয়ার মোটিভেশন প্রোগ্রাম সংখ্যা
        proshikkhon2_career_motivation:[
            {
                label:'জনশক্তির ক্যারিয়ার মোটিভেশন প্রোগ্রাম সংখ্যা',
                name:'manpower_career_motivation_programs',
            },
        ],
        // প্রশিক্ষণ কোর্স: অংশগ্রহণকারীর সংখ্যা
        manob_shompod_unnoyon:[
            {
                label:'দাওয়াহ',
                name:'dawah_uposthiti',
            },
            {
                label:'সমাজকর্ম',
                name:'shomajkormo_uposthiti',
            },
            {
                label:'মিডিয়া',
                name:'media_uposthiti',
            },
            {
                label:'আইসিটি',
                name:'ict_uposthiti',
            },
            {
                label:'অফিস',
                name:'office_uposthiti',
            },
            {
                label:'ফিন্যান্সিয়াল ম্যানেজমেন্ট',
                name:'financial_management_uposthiti',
            },
            {
                label:'ইংরেজি ভাষা',
                name:'english_language_uposthiti',
            },
            {
                label:'আরবি ভাষা',
                name:'arabic_language_uposthiti',
            },
            {
                label:'ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ',
                name:'trade_oriented_technical_training_uposthiti',
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

            this.get_data_by_api('thana-proshikkhon1-tarbiat', 1);
            this.get_data_by_api('thana-proshikkhon2-manob-shompod-organizational-activitie', 2);
            this.get_data_by_api('thana-proshikkhon3-manob-shompod-traning-course', 3);
        }
    }

}
</script>

<style>

</style>
