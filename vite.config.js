import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import vue from "@vitejs/plugin-vue";
import path from "path";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  plugins: [react(), vue(), tailwindcss()],
  root: path.resolve(__dirname, 'assets'),
  build: {
    outDir: path.resolve(__dirname, 'public'),
    emptyOutDir: true,
    rollupOptions: {
      input: {
        app: path.resolve(__dirname, 'assets/js/app.js')
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name]-[hash].js',
        assetFileNames: (assetInfo) => {
          const info = assetInfo.name.split('.')
          const ext = info[info.length - 1]
          if (/\.(css|scss|sass|less)$/.test(assetInfo.name)) {
            return 'css/[name]-[hash][extname]'
          }
          return `${ext}/[name]-[hash][extname]`
        }
      }
    }
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "${path.resolve(__dirname, 'assets/sass/variables.scss')}";`
      },
      less: {
        javascriptEnabled: true
      }
    }
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'assets/js'),
      '@sass': path.resolve(__dirname, 'assets/sass')
    }
  },
  server: {
    watch: {
      usePolling: true
    }
  }
});
