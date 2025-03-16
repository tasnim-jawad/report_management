<template>
    <div>
        <ul class="notes">
            <li v-for="(note,index) in notes" :key="index">{{ note.label }}:{{note.name}}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:['notes']
    }
</script>
