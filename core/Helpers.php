<?php

if (!function_exists('next_url')) {
    function next_url($url)
    {
        return strtolower(env("APP_FRONTEND_URL") . "/$url");
    }
}
