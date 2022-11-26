<?php

if (!function_exists('mix')) {
    /**
     * Get mixfile chunkhash version
     *
     * @param string $path
     * @return string
     */
    function mix($path)
    {
        $manifest = config('app.mixfile_path');

        if (! file_exists($manifest)) {
            return $path;
        }

        $content = json_decode(file_get_contents($manifest), true);

        $key = '/' . ltrim($path, '/');

        if (isset($content[$key])) {
            return $content[$key];
        }

        throw new Exception($path . " Not exists");
    }
}

if (!function_exists('public_path')) {
    /**
     * Get public directory
     *
     * @param string $path
     * @return string
     */
    function public_path($path = '')
    {
        return __DIR__ . '/../public/' . ltrim($path, '/');
    }
}

if (!function_exists('frontend_path')) {
    /**
     * Get frontend directory
     *
     * @param string $path
     * @return string
     */
    function frontend_path($path = '')
    {
        return __DIR__ . '/../frontend/' . ltrim($path, '/');
    }
}

if (!function_exists('storage_path')) {
    /**
     * Get storages directory
     *
     * @param string $path
     * @return string
     */
    function storage_path($path = '')
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
    function base_path($path = '')
    {
        return rtrim(rtrim(realpath(__DIR__ . '/..'), '/') . '/' . $path, '/');
    }
}

if (! function_exists('gen_slix')) {
    /**
     * Generate a random code.
     * Can be used to hide the name of form fields.
     *
     * @param int $len
     * @return string
     */
    function gen_slix($len = 4)
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
    function gen_unique_id()
    {
        $id = base_convert(microtime(false), 10, 36);

        return $id;
    }
}
