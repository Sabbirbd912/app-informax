<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return cache()->rememberForever("setting_{$key}", function () use ($key, $default) {
            return Setting::where('key', $key)->value('value') ?? $default;
        });
    }
}

function setting_image($key)
{
    $value = setting($key);

    return $value
        ? asset('storage/' . $value)
        : asset('websites_assets/images/In-Logo.png');
}
