<?php

if (!function_exists('next_url')) {
    function next_url($url)
    {
        return strtolower(env("APP_FRONTEND_URL") . "/$url");
    }
}
if (!function_exists('base')) {
    function base($url)
    {
        preg_match('/(https?:\/\/)([^\/]+)/i', $url, $matches);
        return preg_replace('/(https?:\/\/)([^\/]+)/i', "$1" . config("app.domain") . "", $url);
    }
}
