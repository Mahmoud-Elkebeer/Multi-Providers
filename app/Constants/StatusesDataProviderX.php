<?php

namespace App\Constants;

final class StatusesDataProviderX
{
    const AUTHORIZED = 1;
    const DECLINE = 2;
    const REFUNDED = 3;

    public static function getList()
    {
        return [
            StatusesDataProviderX::AUTHORIZED => 'authorised',
            StatusesDataProviderX::DECLINE => 'decline',
            StatusesDataProviderX::REFUNDED => 'refunded',
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
