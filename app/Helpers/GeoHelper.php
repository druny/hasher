<?php


namespace App\Helpers;


class GeoHelper
{
    //API http://ipinfo.io

    public static $file = 'http://ipinfo.io/geo';

    public static function getInfo() {
        return json_decode(file_get_contents(self::$file), true);
    }
}