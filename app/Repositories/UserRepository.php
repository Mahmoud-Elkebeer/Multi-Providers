<?php

namespace App\Repositories;

use App\Constants\Providers;
use App\Http\Services\DataProviderFactory;
use Symfony\Component\HttpFoundation\Request;

class UserRepository
{
    protected $dataProviderFactory;

    public function __construct(DataProviderFactory $dataProviderFactory)
    {
        $this->dataProviderFactory = $dataProviderFactory;
    }

    public function searchFromProviders(Request $request)
    {
        $users = [];
        foreach (Providers::getList() as $key => $provider) {
            $providerService = '\App\Http\Services\\' . $provider;
            $this->dataProviderFactory->setJson(new $providerService());
            $users = array_merge((array)$users, (array)$this->dataProviderFactory->getJson(new $providerService()));
        }
        $users = collect($users);

        if ($request->filled("provider")) {
            $users = $users->where('provider', '=', $request->get("provider"));
        }
        if ($request->filled("currency")) {
            $users = $users->where('currency', '=', $request->get("currency"));
        }
        if ($request->filled("statusCode")) {
            $users = $users->where('status', '=', $request->get("statusCode"));
        }
        if ($request->filled("balanceMin")) {
            $users = $users->where('amount', '>=', $request->get("balanceMin"));
        }
        if ($request->filled("balanceMax")) {
            $users = $users->where('amount', '<=', $request->get("balanceMax"));
        }

        return $users;
    }
}
