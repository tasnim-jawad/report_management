<template>
    <div>
        <div class="previous_next_link gap-0 column-gap-2" v-if="month">
            <div class="btn btn-info btn-sm button_width_95px" v-if="prevRoute">
                <router-link class="text-dark" :to="prevRoute">
                    <span class="icon_margin"><i class="fa-solid fa-backward"></i></span>Previous
                </router-link>
            </div>
            <div class="btn btn-info btn-sm button_width_95px" v-if="nextRoute">
                <router-link class="text-dark" :to="nextRoute">
                    Next<span class="ms-2"><i class="fa-solid fa-forward"></i></span>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
        prevRoute: {
            type: Object,
            default: null
        },
        nextRoute: {
            type: Object,
            default: null
        },
        month: {
            type: String,
            default: null
        }
    }
    }
</script>
