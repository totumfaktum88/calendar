
<script lang="ts" setup>

import {ref} from "vue";
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import listPlugin from '@fullcalendar/list';
import timeGridPlugin from '@fullcalendar/timegrid';

import App from "../components/App.vue";

const props = defineProps({
    config: Object,
    errors: Object
});

const calendarOptions = ref({
    plugins: [dayGridPlugin, listPlugin, timeGridPlugin],
    initialView: 'dayGridMonth',
    weekends: false,
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
    },
    events: [
        { title: 'Meeting', start: new Date() }
    ]
});


</script>

<template>
    <app :config="config" :errors="errors">
        <div class="row q-py-lg">
            <div class="col-8 q-mx-auto">
                <FullCalendar :options='calendarOptions' />
            </div>
        </div>
    </app>
</template>

<style scoped>

</style>