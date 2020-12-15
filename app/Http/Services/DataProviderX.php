<?php

namespace App\Http\Services;

use App\Constants\StatusesDataProviderX;
use Nahid\JsonQ\Jsonq;

class DataProviderX implements DataProviderInterface
{
    public function fetchJsonData(){
        $q = new Jsonq('providers/DataProviderX.json');
        $users = collect(json_decode($q->from('users'), true));
        $list = $users->map(function($user){
            $data['id'] = $user["parentIdentification"];
            $data['amount'] = $user["parentAmount"];
            $data['currency'] = $user["Currency"];
            $data['email'] = $user["parentEmail"];
            $data['status'] = StatusesDataProviderX::getOne($user["statusCode"]);
            $data['date'] = $user["registerationDate"];
            $data['provider'] = "StatusesDataProviderX";
            return $data;
        });

        return $list->toArray();
    }
}
