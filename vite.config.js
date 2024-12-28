import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import { networkInterfaces } from 'os';
const nets = networkInterfaces();
const localIPs = Object.create({});
for (const name of Object.keys(nets)) {
    for (const net of nets[name]) {
      // Skip over non-IPv4 and internal (i.e. 127.0.0.1) addresses
      // 'IPv4' is in Node <= 17, from 18 it's a number 4 or 6
      const familyV4Value = typeof net.family === 'string' ? 'IPv4' : 4

      if (net.family === familyV4Value && !net.internal) {
          if (!localIPs[name]) {
              localIPs[name] = [];
          }
          // localIPs[name].push(net.address);
          localIPs[name] = net.address;
      }
    }
}

export default defineConfig({
    server: {
      host: localIPs.Ethernet,
      port: 5173,
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
