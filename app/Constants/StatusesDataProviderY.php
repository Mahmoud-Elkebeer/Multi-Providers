<?php

namespace App\Constants;

final class StatusesDataProviderY
{
    const AUTHORIZED = 100;
    const DECLINE = 200;
    const REFUNDED = 300;

    public static function getList()
    {
        return [
            StatusesDataProviderY::AUTHORIZED => 'authorised',
            StatusesDataProviderY::DECLINE => 'decline',
            StatusesDataProviderY::REFUNDED => 'refunded',
        ];
    }

    public static function getOne($key = '')
    {
        if (!array_key_exists($key, self::getList())) {
            return "";
        }
        return self::getList()[$key];
    }
}
