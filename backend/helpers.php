<?php

if (! function_exists('user')) {
    function user($guard = null): App\Models\User
    {
        return auth($guard)->user();
    }
}

if (! function_exists('faker')) {
    function faker(string $locale = \Faker\Factory::DEFAULT_LOCALE): \Faker\Generator
    {
        return \Faker\Factory::create($locale);
    }
}
