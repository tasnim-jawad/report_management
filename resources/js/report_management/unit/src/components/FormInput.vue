<template>
    <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
        <div class="form_label">
            <label for="">{{label}}</label>
        </div>
        <div class="form_input">
            <input type="text" @change="onchange" :name="name" class="form-control">
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'label','name','onchange'
    ]
}
</script>

<style>

</style>
