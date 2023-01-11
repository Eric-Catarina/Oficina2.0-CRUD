import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      find: "@vue/runtime-core",
      replacement: "@vue/runtime-core/dist/runtime-core.esm-bundler.js",    }, 
  },
  server:{
    hmr:{
      host: 'localhost',
    },
      port: 3000,
    },
})
