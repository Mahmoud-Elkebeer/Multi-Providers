<?php

namespace App\Http\Services;

class DataProviderFactory
{
    public $dataProvider;

    public function setJson(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function getJson()
    {
        return $this->dataProvider->fetchJsonData();
    }
}
