<?php

namespace App\Services;

class BalanceService
{
    /** @var DataService $dataService */
    private $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function getBalanceForAccount(int $id)
    {
        $data = $this->dataService->getData();

        $account = collect($data)->filter(function ($value, $key) use ($id) {
            return $key === $id;
        })
        ->first();

        $hasAccount = !empty($account);

        return [
            'status' => $hasAccount
                ? '200'
                : '404',
            'value' => $hasAccount
                ? $account['balance']
                : '0',
        ];
    }
}
