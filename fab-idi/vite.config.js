import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/gestionProyectosIntercentros.js',
                'resources/js/gestionProyectosPip.js',
                'resources/js/gestionUsuarios.js', 
                'resources/js/gestionPremios.js', 
                'resources/js/gestionEntidades.js',
                'resources/js/altaUsuarios.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    },
});


