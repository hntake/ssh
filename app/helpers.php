<?php

if (!function_exists('format_number')) {
    /**
     * Format a number to display as 1k if it's >= 1000.
     *
     * @param int|float $number
     * @return string
     */
    function format_number($number)
    {
        if ($number >= 1000) {
            return sprintf("%.1fk", $number / 1000);
        } else {
            return $number;
        }
    }
}

// 他のカスタムヘルパー関数を追加する場合はここに追加します。
