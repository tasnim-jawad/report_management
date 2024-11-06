<template>
    <div class="unit_info_icon" @click="toggle_popup">
        <span class="i_icon">
            <i class="fa fa-list"></i>
        </span>
        <div class="unit_data_popup" :class="{active:is_popup_visible}">
            <!-- <span>{{popup_data }}</span> -->
            <table class="table table-striped mb-0">
                <tbody class="">
                    <tr>
                        <td>Ummesh</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>Pollobi</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Pollobi</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>total</td>
                        <td>30</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        popup_data: {
            type: [String, Number],
            required: false,
        }
    },
    data() {
        return {
            is_popup_visible: false
        };
    },
    methods: {
        toggle_popup() {

            [...document.querySelectorAll('.unit_data_popup')].forEach(i=>i.classList.remove('active'))

            this.is_popup_visible = !this.is_popup_visible;
        }
    }
};
</script>

<style>

</style>
