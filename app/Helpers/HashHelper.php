<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 22/12/2016
 * Time: 23:02
 */

namespace app\Helpers;


class HashHelper
{


    public static function md5Hash($word) {
        return  md5($word->name);
    }

    public static function sha1Hash($word) {
        return sha1($word->name);
    }

    public static function sha256Hash($word) {
        return hash('sha256', $word);
    }

    public static function cryptHash($word) {
        return crypt($word->name, str_random(10));
    }

    public static function crc32Hash($word) {
        return hash('crc32', $word->name);
    }


}