import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react-swc';
import tsconfigPaths from 'vite-tsconfig-paths';
import { resolve } from 'path';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react(), tsconfigPaths()],
  root: 'src',
  build: {
    manifest: true,
    emptyOutDir: true,
    outDir: '../../public/dist',
    sourcemap: true,
    cssCodeSplit: false,
    rollupOptions: {
      input: {
        login: resolve(__dirname, 'src/pages/login/index.jsx'),
      },
    },
  },
  css: {
    devSourcemap: true,
  },
})