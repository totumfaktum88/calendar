import { fileURLToPath } from 'url';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { quasar, transformAssetUrls } from '@quasar/vite-plugin'
import postcssNesting from 'postcss-nesting';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: 'localhost',
        },
    },
    resolve: {
        alias:{
            '@assets' : fileURLToPath(new URL('./resources/assets', import.meta.url)),
            '@js' : fileURLToPath(new URL('./resources/js', import.meta.url)),
            '@sass' : fileURLToPath(new URL('./resources/sass', import.meta.url)),
            'ziggy': fileURLToPath(new URL('./vendor/tightenco/ziggy/src/js', import.meta.url)),
            'ziggy-vue': fileURLToPath(new URL('./vendor/tightenco/ziggy/src/js/vue', import.meta.url)),
        },
        dedupe: [
            'vue'
        ]
    },
    css: {
        postcss: {
            plugins: [
                postcssNesting
            ],
        },
    },
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        quasar({
            sassVariables: 'resources/sass/quasar-variables.sass'
        })
    ],
    build: {
        chunkSizeWarningLimit: 1000
    },
})