<?php

if (! function_exists('toastr')) {
    function toastr($message = null, $title = null, $level = 'info')
    {
        $toaster = app('toaster');
        if (! is_null($message)) {
            return $toaster->toast($message, $level, $title);
        }

        return $toaster;
    }
}
