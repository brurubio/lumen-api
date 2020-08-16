<?php

namespace App\Services;

use App\Enums\EventTypes;

class EventService
{
    /** @var DataService $dataService */
    private $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function handleEvent($data)
    {
        $type = $data['type'];

        switch ($type) {
            case EventTypes::DEPOSIT:
                return $this->makeDeposit($data);
            case EventTypes::WITHDRAW:
                dd('make withdraw');
                return $this->makeWithdraw($data);
            case EventTypes::TRANSFER:
                dd('make transfer');
                return $this->makeTransfer($data);
            default:
                return [
                    'status' => 404,
                ];
        }
    }

    public function makeDeposit($data)
    {
        $id = $data['destination'];

        $accounts = $this->dataService->getData();

        $account = collect($accounts)->filter(function ($value, $key) use ($id) {
                return strval($key) === $id;
            })
            ->first();

        $updatedData = [
            'id' => $data['destination'],
            'balance' => $data['amount'],
        ];

        if (!empty($account)) {
            $updatedData['balance'] += $account['balance'];
        }

        $response = $this->dataService->saveData($updatedData);

        return [
            'status' => '201',
            'value' => [
                'destination' => $response,
            ],
        ];
    }

    public function makeWithdraw($data)
    {
        # Withdraw from non-existing account -> 404 0
        # Withdraw from existing account -> 201 {"origin": {"id":"100", "balance":15}}
    }

    public function makeTransfer($data)
    {
        # Transfer from existing account -> 201 {"origin": {"id":"100", "balance":0}, "destination": {"id":"300", "balance":15}}
        # Transfer from non-existing account -> 404 0
    }
}

