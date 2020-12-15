<?php

namespace App\Constants;

final class Providers
{
    const DATA_PROVIDER_X = "DataProviderX";
    const  DATA_PROVIDER_Y = "DataProviderY";

    public static function getList()
    {
        return [
            Providers::DATA_PROVIDER_X => 'DataProviderX',
            Providers::DATA_PROVIDER_Y => 'DataProviderY',
        ];
    }

    public static function getKeyList()
    {
        return [
            'DataProviderX' => Providers::DATA_PROVIDER_X,
            'DataProviderY' => Providers::DATA_PROVIDER_Y,
        ];
    }

    public static function getOne($index = '')
    {
        $list = self::getKeyList();
        $listOne = '';
        if ($index) {
            $listOne = $list[$index];
        }
        return $listOne;
    }
}
