<?php

use Illuminate\Support\Facades\Config;

if (!function_exists('contact_config')) {
    /**
     * Haal een configuratiewaarde op uit de contact configuratie.
     *
     * @param  string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    function contact_config($key = null, $default = null)
    {
        if (is_null($key)) {
            return Config::get('contact');
        }

        return Config::get("contact.{$key}", $default);
    }
}

if (!function_exists('contact_asset')) {
    /**
     * Genereer een URL voor een asset in de contact module.
     *
     * @param  string  $path
     * @return string
     */
    function contact_asset($path)
    {
        return asset("vendor/contact/{$path}");
    }
}

if (!function_exists('contact_route')) {
    /**
     * Genereer een route URL voor de contact module.
     *
     * @param  string  $name
     * @param  array  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function contact_route($name, $parameters = [], $absolute = true)
    {
        return route("contact.{$name}", $parameters, $absolute);
    }
}
