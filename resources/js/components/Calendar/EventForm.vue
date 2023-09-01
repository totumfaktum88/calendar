<script lang="ts">
export default {
    name: "EventForm"
}

</script>
<script lang="ts" setup>
import axios, {isAxiosError} from "axios";
import {useQuasar} from "quasar";
import {reactive, ref, watch} from "vue";

const emit = defineEmits(["eventSaved"]);

const props = defineProps({
});

const q = useQuasar();

const data = reactive({
    start: null,
    end: null,
    first_name: null,
    last_name: null,
});

const modalShowing = ref(false);

function show(args: any) {
    data.start = getDateTime(args.start);
    data.end = getDateTime(args.end);
    data.first_name = null;
    data.last_name = null;
    modalShowing.value = true;
}

function getDateTime(date: Date) {
    return date.getFullYear() + "-" +
        String(date.getMonth() + 1).padStart(2, '0') + "-" +
        String(date.getDate()).padStart(2, '0') + " " +
        String(date.getHours()).padStart(2, '0') + ":" +
        String(date.getMinutes()).padStart(2, '0')
}

async function saveEvent() {
    try {
        const response = await axios.post(
            route("calendar.store"),
            data
        );

        q.notify({type: "positive", message: "Sikeres mentés!"});

        emit("eventSaved", response);
        modalShowing.value = false;
    }catch (e) {
        if (isAxiosError(e)) {
            const errors = e.response.data.errors;
            q.notify({type: "negative", message: errors[Object.keys(errors)[0]]});
        }else {
            console.log(e);
        }
    }
}

defineExpose({
    show
});

</script>
<template>
    <q-dialog v-model="modalShowing">
        <q-card>
            <q-card-section>
                <div class="text-h6">
                    Esemény létrehozása
                </div>
            </q-card-section>
            <q-card-section class="q-pt-none">
                <div class="row">
                    <div class="col-6 q-mb-md q-px-md">
                        <q-input
                            label="Keresztnév"
                            v-model="data.first_name"
                            dense
                        />
                    </div>
                    <div class="col-6 q-mb-md q-px-md">
                        <q-input
                            label="Vezetéknév"
                            v-model="data.last_name"
                            dense
                        />
                    </div>
                    <div class="col-6 q-mb-md q-px-md">
                        <q-input
                            label="-tól"
                            v-model="data.start"
                            dense
                        />
                    </div>
                    <div class="col-6 q-mb-md q-px-md">
                        <q-input
                            label="-ig"
                            v-model="data.end"
                            dense
                        />
                    </div>
                </div>
            </q-card-section>

            <q-card-actions align="right">
                <q-btn flat label="Mégse" color="primary" v-close-popup />
                <q-btn flat label="Mentés" color="primary" @click="saveEvent" />
            </q-card-actions>
        </q-card>
    </q-dialog>
</template>

<style scoped>

</style>