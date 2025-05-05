<template>
    <div>
        <div class="previous_next_link gap-2 column-gap-2" v-if="month">
            <div class="" v-if="prevRoute">
                <router-link class="btn btn-info btn-sm button_width_100px text-dark" :to="prevRoute">
                    <span class="icon_margin"><i class="fa-solid fa-backward"></i></span>Previous
                </router-link>
            </div>
            <div class="" v-if="nextRoute">
                <router-link class="btn btn-info btn-sm button_width_100px text-dark" :to="nextRoute">
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
