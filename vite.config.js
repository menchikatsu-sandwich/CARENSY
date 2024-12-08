import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: 'piusapp3.test', // Sesuaikan dengan host di Laragon
        port: 5173, // Tetap gunakan port default Vite
        hmr: {
          host: 'piusapp3.test',
          port: 5173,
        },
      },
});
