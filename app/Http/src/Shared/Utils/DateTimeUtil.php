<?php

namespace App\Http\src\Shared\Utils;


class DateTimeUtil
{
    public static function baseTime(?string $baseTime = null): string
    {
        return date($baseTime??"Y-m-d H:i:s");
    }

    public static function sign(int $value)
    {
        return ($value > 0)?'+':'-';
    }

    public static function adjustTimeInTime(?string $baseTime = null, int $amout, $unit)
    {
        return date("Y-m-d H:i:s", strtotime(self::baseTime($baseTime).self::sign($amout)." ".$amout." ".$unit));
    }

    public static function adjustTimeInSeconds(int $seconds, ?string $baseTime = null): string
    {
        return self::adjustTimeInTime($baseTime, $seconds, 'seconds');
    }

    public static function adjustTimeInMinutes(int $minutes, ?string $baseTime = null): string
    {
        return self::adjustTimeInTime($baseTime, $minutes, 'minutes');
    }

    public static function adjustTimeInHours(int $hours, ?string $baseTime = null): string
    {
        return self::adjustTimeInTime($baseTime, $hours, 'hours');
    }

    public static function adjustTimeInDays(int $days, ?string $baseTime = null): string
    {
        return self::adjustTimeInTime($baseTime, $days, 'days');
    }

    public static function adjustTimeInMonths(int $months, ?string $baseTime = null): string
    {
        return self::adjustTimeInTime($baseTime, $months, 'months');
    }

    public static function adjustTimeInYears(int $years, ?string $baseTime = null): string
    {
        return self::adjustTimeInTime($baseTime, $years, 'years');
    }
}
