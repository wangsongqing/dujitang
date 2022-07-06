<?php


namespace App\Helpers;


class CacheKey
{
    public static function setSoul(): string
    {
        return 'set_soul_list';
    }

    public static function getSoulById($id) {
        return 'set_soul_list:' . $id;
    }
}