<?php

use Retinens\LaravelToastr\LaravelToastr;

if (! function_exists('toastr')) {
    function toastr($message = null, $title = null, $level = 'info'): LaravelToastr
    {
        $toaster = app('toastr');
        if (! is_null($message)) {
            return $toaster->toast($message, $level, $title);
        }

        return $toaster;
    }
}
