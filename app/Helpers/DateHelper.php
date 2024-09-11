<?php

namespace App\Helpers;

class DateHelper
{
    public static function toJapaneseEra($date)
    {
        $date = new \DateTime($date);
        $year = $date->format('Y');
        $month = $date->format('n');
        $day = $date->format('j');

        $era = '';
        if ($year >= 2019) {
            $era = '令和';
            $year -= 2018; // 令和元年は2019年
        } elseif ($year >= 1989) {
            $era = '平成';
            $year -= 1988;
        } elseif ($year >= 1926) {
            $era = '昭和';
            $year -= 1925;
        } elseif ($year >= 1912) {
            $era = '大正';
            $year -= 1911;
        } else {
            $era = '明治';
            $year -= 1867;
        }

        return sprintf('%s%d年%d月%d日', $era, $year, $month, $day);
    }
}