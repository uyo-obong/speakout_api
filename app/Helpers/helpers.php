<?php

use Carbon\Carbon;

if (!function_exists("formatDate")) {

    function formatDate($date)
    {
        return  Carbon::parse($date)->format('Y-m-d\TH:i:s.vP');
    }
}

if (!function_exists("currentTime")) {
    
    function currentTime()
    {
        return  Carbon::now()->toDateTimeString();
    }
}
