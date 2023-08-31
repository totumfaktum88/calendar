<template>
    <q-layout view="hHh lpR fFf">

        <q-header elevated class="bg-primary text-white" height-hint="98">
            <q-toolbar>
                <q-toolbar-title>
                    Határidőnapló
                </q-toolbar-title>
            </q-toolbar>
        </q-header>
        <q-page-container>
            <slot></slot>
        </q-page-container>

    </q-layout>
</template>

<script lang="ts">

import {computed, defineComponent} from "vue";

export default defineComponent({
    name: "AppQuasar",
    props: {
        config: Object,
        errors: Object
    },
    provide() {
        return {
            config: computed(() => this.config)
        };
    }
});

</script>

<style scoped>

</style>