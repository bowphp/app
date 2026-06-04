<?php

if (!function_exists('vite')) {
    /**
     * Resolve a Vite-built asset URL from the manifest.
     *
     * @param  string $file     Manifest entry key, e.g. "js/app.js".
     * @param  bool   $absolute Return an absolute URL prefixed with the app URL.
     * @return string
     * @throws Exception
     */
    function vite(string $file, bool $absolute = false): string
    {
        static $manifest = null;

        if ($manifest === null) {
            $candidates = [
                public_path('build/.vite/manifest.json'),
                public_path('build/manifest.json'),
                public_path('.vite/manifest.json'),
                base_path() . '/manifest.json',
            ];

            $manifest = [];
            foreach ($candidates as $candidate) {
                if (file_exists($candidate)) {
                    $manifest = json_decode(file_get_contents($candidate), true) ?: [];
                    break;
                }
            }
        }

        $key = ltrim($file, '/');

        if (!isset($manifest[$key]['file'])) {
            throw new Exception("Vite manifest entry not found: {$file}");
        }

        $path = '/build/' . ltrim($manifest[$key]['file'], '/');

        return $absolute ? url($path) : $path;
    }
}

if (!function_exists('public_path')) {
    /**
     * Get public directory
     *
     * @param  string $path
     * @return string
     */
    function public_path(string $path = ''): string
    {
        return __DIR__ . '/../public/' . ltrim($path, '/');
    }
}

if (!function_exists('frontend_path')) {
    /**
     * Get frontend directory
     *
     * @param  string $path
     * @return string
     */
    function frontend_path(string $path = '')
    {
        return __DIR__ . '/../frontend/' . ltrim($path, '/');
    }
}

if (!function_exists('storage_path')) {
    /**
     * Get storages directory
     *
     * @param  string $path
     * @return string
     */
    function storage_path(string $path = '')
    {
        return __DIR__ . '/../var/' . ltrim($path, '/');
    }
}

if (! function_exists('base_path')) {
    /**
     * Returns the path of the root folder of the bow framework application
     *
     * @return string
     */
    function base_path($path = ''): string
    {
        return rtrim(rtrim(realpath(__DIR__ . '/..'), '/') . '/' . $path, '/');
    }
}

if (! function_exists('gen_slix')) {
    /**
     * Generate a random code.
     * Can be used to hide the name of form fields.
     *
     * @param  int $len
     * @return string
     */
    function gen_slix(int $len = 4): string
    {
        return substr(str_shuffle(uniqid()), 0, $len);
    }
}

if (! function_exists('gen_unique_id')) {
    /**
     * Generate unique ID
     *
     * @return string
     */
    function gen_unique_id(): string
    {
        $id = base_convert(microtime(false), 10, 36);

        return $id;
    }
}
