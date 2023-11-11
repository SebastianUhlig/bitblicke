import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    plugins: [
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/fonts/poppins/*',
                    dest: 'fonts/poppins'
                },
                {
                    src: 'resources/images/*',
                    dest: 'images'
                },
            ]
        }),
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
