import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/addTocart.js',
                // 'public/js/jquery-3.3.1.min.js',
                'public/js/bootstrap.min.js',
                'public/js/jquery.nice-select.min.js',
                'public/js/jquery.nicescroll.min.js',
                'public/js/jquery.magnific-popup.min.js',
                'public/js/jquery.countdown.min.js',
                'public/js/jquery.slicknav.js',
                'public/js/mixitup.min.js',
                'public/js/owl.carousel.min.js',
                'public/js/main.js',
                'public/css/bootstrap.min.css',
                'public/css/font-awesome.min.css',
                'public/css/elegant-icons.css',
                'public/css/magnific-popup.css',
                'public/css/nice-select.css',
                'public/css/owl.carousel.min.css',
                'public/css/slicknav.min.css',
                'public/css/style.css',
            ],
            refresh: true,
        }),
        vue()
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        }
    }
});
