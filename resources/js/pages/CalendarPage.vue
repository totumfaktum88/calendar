
<script lang="ts" setup>

import axios, {isAxiosError} from "axios";
import {onMounted, ref} from "vue";
import {useQuasar} from "quasar";
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import listPlugin from '@fullcalendar/list';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import rrulePlugin from '@fullcalendar/rrule';
import huLocale from '@fullcalendar/core/locales/hu';

import App from "../components/App.vue";
import EventForm from "../components/Calendar/EventForm.vue";

const props = defineProps({
    config: Object,
    errors: Object
});

const q = useQuasar();
const events = ref([]);

const calendar = ref(null);
const form = ref(null);

const calendarOptions = ref({
    plugins: [dayGridPlugin, interactionPlugin, listPlugin, rrulePlugin, timeGridPlugin],
    locales: [huLocale],
    locale: "hu",
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
    },
    selectable: true,
    select: handleSelect,
    events: []
});

function handleSelect(arg) {
    form.value.show(arg);
}

async function refresh() {
    try {
        const response = await axios.get(
            route("calendar.index"),
            {
                headers: {
                    "X-Resource-List": true
                }
            }
        );

        calendarOptions.value.events = [...response.data.background_events, ...response.data.data];
    }catch (e) {
        if (isAxiosError(e)) {
            const errors = e.response.data.errors;
            q.notify({type: "negative", message: errors[Object.keys(errors)[0]]});
        }else {
            const errors = e.response.data.errors;
            q.notify({type: "negative", message: "Rendszer hiba!"});
        }
    }
}

onMounted(() => {
    refresh();
});

</script>

<template>
    <app :config="config" :errors="errors">
        <div class="row q-py-lg">
            <div class="col-8 q-mx-auto">
                <full-calendar ref="calendar" :options='calendarOptions' />
                <event-form ref="form" @event-saved="refresh" />
            </div>
        </div>
    </app>
</template>

<style scoped>

</style>