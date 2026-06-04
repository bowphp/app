
import { defineConfig, loadEnv } from 'vite';
import vue from '@vitejs/plugin-vue';
import react from '@vitejs/plugin-react';
import tailwindcss from '@tailwindcss/vite';
import fullReload from 'vite-plugin-full-reload';
import { resolve } from 'path';
import { existsSync, readFileSync, writeFileSync, rmSync } from 'fs';

// Publish the Vite build manifest at the project root (`manifest.json`) instead
// of leaving it under `public/.vite/`. Vite's `manifest` option only accepts a
// path relative to `outDir` (Rollup forbids escaping it with `..`), so we move
// the emitted file in a post-build hook. Only runs when a manifest is produced.
const publishManifestToRoot = () => ({
	name: 'bow-publish-manifest',
	apply: 'build',
	enforce: 'post',
	writeBundle(options, bundle) {
		const key = Object.keys(bundle).find((name) => name.endsWith('.vite/manifest.json'));
		if (!key) {
			return;
		}

		const asset = bundle[key];
		writeFileSync(resolve(__dirname, 'manifest.json'), asset.source ?? asset.code ?? '');

		// Drop the default copy so the root file is the single source of truth.
		rmSync(resolve(options.dir, '.vite'), { recursive: true, force: true });
	},
});

// Load .env.json if exists
const loadBowEnv = () => {
	const envPath = resolve(__dirname, '.env.json');
	if (existsSync(envPath)) {
		try {
			const env = JSON.parse(readFileSync(envPath, 'utf-8'));
			// Expose VITE_* variables
			Object.keys(env).forEach((key) => {
				if (key.startsWith('VITE_')) {
					process.env[key] = env[key];
				}
			});
			return env;
		} catch (e) {
			console.warn('Failed to parse .env.json:', e.message);
		}
	}
	return {};
};

export default defineConfig(({ mode }) => {
	const bowEnv = loadBowEnv();
	const isDev = mode === 'development';
	const isProd = mode === 'production';

	return {
		plugins: [
			vue({
				script: {
					defineModel: true,
					propsDestructure: true,
				},
			}),
			react({
				fastRefresh: true,
			}),
			tailwindcss(),
			// Full-page live reload when server-rendered files change. Vite's HMR
			// only covers JS/CSS modules it serves from `assets/`; editing a
			// Tintin/Twig template, a route or a PHP class won't reload the page
			// on its own. This watches those files and triggers a browser reload.
			// `apply: 'serve'` means it is a no-op during `vite build`.
			fullReload(
				[
					'templates/**/*.tintin.php',
					'templates/**/*.twig',
					'templates/**/*.php',
					'routes/**/*.php',
					'app/**/*.php',
					'config/**/*.php',
					'lang/**/*.php',
				],
				{ root: __dirname, delay: 100 }
			),
			publishManifestToRoot(),
		],

		root: resolve(__dirname, 'assets'),
		publicDir: resolve(__dirname, 'public/static'),

		build: {
			outDir: resolve(__dirname, 'public'),
			emptyOutDir: false,
			manifest: isProd,
			sourcemap: isDev,
			minify: isProd ? 'esbuild' : false,
			target: 'es2020',
			cssCodeSplit: true,
			chunkSizeWarningLimit: 500,

			rollupOptions: {
				input: {
					app: resolve(__dirname, 'assets/js/app.js'),
				},
				output: {
					entryFileNames: isProd ? 'js/[name]-[hash].js' : 'js/[name].js',
					chunkFileNames: 'js/chunks/[name]-[hash].js',
					assetFileNames: (assetInfo) => {
						const name = assetInfo.name || '';
						if (/\.(css|scss|sass|less)$/.test(name)) {
							return isProd ? 'css/[name]-[hash][extname]' : 'css/[name][extname]';
						}
						if (/\.(png|jpe?g|gif|svg|webp|ico|avif)$/.test(name)) {
							return 'img/[name]-[hash][extname]';
						}
						if (/\.(woff2?|eot|ttf|otf)$/.test(name)) {
							return 'fonts/[name]-[hash][extname]';
						}
						if (/\.(mp4|webm|ogg|mp3|wav|flac|aac)$/.test(name)) {
							return 'media/[name]-[hash][extname]';
						}
						return 'assets/[name]-[hash][extname]';
					},
					manualChunks: isProd
						? {
								vendor: ['vue', 'react', 'react-dom'],
							}
						: undefined,
				},
			},
		},

		css: {
			devSourcemap: true,
			preprocessorOptions: {
				scss: {
					additionalData: `@use "${resolve(__dirname, 'assets/sass/variables.scss')}" as *;`,
					silenceDeprecations: ['legacy-js-api'],
				},
			},
		},

		resolve: {
			alias: {
				'@': resolve(__dirname, 'assets/js'),
				'@components': resolve(__dirname, 'assets/js/components'),
				'@sass': resolve(__dirname, 'assets/sass'),
				'@css': resolve(__dirname, 'assets/css'),
				'@img': resolve(__dirname, 'assets/img'),
			},
			extensions: ['.js', '.jsx', '.ts', '.tsx', '.vue', '.json'],
		},

		server: {
			host: '0.0.0.0',
			port: 5173,
			strictPort: false,
			open: false,
			cors: true,
			hmr: {
				overlay: true,
			},
			watch: {
				usePolling: true,
				interval: 100,
			},
		},

		preview: {
			host: '0.0.0.0',
			port: 4173,
			open: false,
		},

		optimizeDeps: {
			include: ['vue', 'react', 'react-dom'],
			exclude: [],
		},

		esbuild: {
			drop: isProd ? ['console', 'debugger'] : [],
			legalComments: 'none',
		},

		define: {
			__APP_VERSION__: JSON.stringify(process.env.npm_package_version || '1.0.0'),
			__DEV__: isDev,
		},
	};
});
