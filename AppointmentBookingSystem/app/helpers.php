<?php

// app/helpers.php

if (!function_exists('dayFromDate')) {
    function dayFromDate($date)
    {
        return optional(\Carbon\Carbon::parse($date))->format('l');
    }
}
