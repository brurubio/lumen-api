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

        dd($data);
    }
}
