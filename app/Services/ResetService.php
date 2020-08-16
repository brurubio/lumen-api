<?php

namespace App\Services;

class ResetService
{
    /** @var DataService $dataService */
    private $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function resetData()
    {
        $this->dataService->removeData();

        return [
            'status' => '200',
            'value' => 'OK'
        ];
    }
}
