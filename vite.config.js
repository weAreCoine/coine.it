import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

const host = 'dev.coine.it';
export default defineConfig({
    server: {
        host,
        hmr: {host},
        https: {
            key: fs.readFileSync(`/Applications/MAMP/Library/OpenSSL/certs/${host}.key`),
            cert: fs.readFileSync(`/Applications/MAMP/Library/OpenSSL/certs/${host}.crt`),
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/icons/fontawesome/css/all.css'],
            refresh: true,
        }),
    ],
});
