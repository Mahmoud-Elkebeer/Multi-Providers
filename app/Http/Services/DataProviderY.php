<?php

namespace App\Http\Services;

use App\Constants\StatusesDataProviderY;
use Nahid\JsonQ\Jsonq;

class DataProviderY implements DataProviderInterface
{
    public function fetchJsonData()
    {
        $q = new Jsonq('providers/DataProviderY.json');
        $users = collect(json_decode($q->from('users'), true));

        $list = $users->map(function($user){
            $data['id'] = $user["id"];
            $data['amount'] = $user["balance"];
            $data['currency'] = $user["currency"];
            $data['email'] = $user["email"];
            $data['status'] = StatusesDataProviderY::getOne($user["status"]);
            $data['date'] = $user["created_at"];
            $data['provider'] = "StatusesDataProviderY";
            return $data;
        });

        return $list->toArray();
    }
}
