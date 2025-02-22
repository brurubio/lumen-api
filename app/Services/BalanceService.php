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

    public function getBalanceForAccount(string $id)
    {
        $data = $this->dataService->getData();

        $account = $this->dataService->getAccountById($id);

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
