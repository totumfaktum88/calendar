import { createInertiaApp, Link, Head } from '@inertiajs/vue3';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-vue';
import { Ziggy } from './ziggy.js';
import { Quasar, Notify } from 'quasar';
import "./bootstrap";

// Import icon libraries
import '@quasar/extras/roboto-font/roboto-font.css'
import '@quasar/extras/material-icons/material-icons.css'
import '@quasar/extras/fontawesome-v6/fontawesome-v6.css'

// Import Quasar css
import 'quasar/src/css/index.sass'

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./pages/**/*.vue', { eager: true });

        return pages[`./pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {

        const app = createApp({ render: () => h(App, props) })
            .component("Link", Link)
            .component("Head", Head)
            .mixin({ methods: { route } })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(Quasar, {
                plugins: {
                    Notify
                },
                config: {
                    notify: {}/* look at QuasarConfOptions from the API card */
                }
            });

        app.mount(el);
    },
});