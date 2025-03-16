<template>
    <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
        <div class="form_label">
            <label for="">{{label}}</label>
        </div>
        <div class="form_input">
            <input type="number"
                :id="unique_key+name"
                @change="onchange(endpoint)"
                :name="name"
                class="form-control te">
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'label','name','onchange','unique_key', 'endpoint',
    ]
}
</script>

<style>

</style>
