import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from "path"
import { quasar, transformAssetUrls } from '@quasar/vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/style/sass/app.scss', 'resources/js/app.js'],
            refresh: true
        }),
        vue({
            template: {
                transformAssetUrls
            }
        }),
        quasar({
            sassVariables: 'resources/style/sass/variables/quasar-variables.sass'
        })
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            '@components': path.resolve(__dirname, 'resources/js/vue/components/'),
            '$vue': path.resolve(__dirname, 'resources/js/vue/'),
            '@style': path.resolve(__dirname, 'resources/style/'),
            '@js': path.resolve(__dirname, 'resources/js/'),
            '@images':  path.resolve(__dirname, 'resources/images/'),
            '@utils': path.resolve(__dirname, 'resources/js/utils'),
            '@stores': path.resolve(__dirname, 'resources/js/vue/stores/')
        }
    },
    server : {
        proxy: {
            "localhost:5173": 'iam.test'
        }
    }
})
