<?php

namespace App\Http\Controllers;

use App\Services\BalanceService;
use App\Services\EventService;
use App\Services\ResetService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /** @var BalanceService $balanceService */
    private $balanceService;
    /** @var EventService $eventService */
    private $eventService;
    /** @var ResetService $resetService */
    private $resetService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        BalanceService $balanceService,
        EventService $eventService,
        ResetService $resetService
    ) {
        $this->balanceService = $balanceService;
        $this->eventService = $eventService;
        $this->resetService = $resetService;
    }

    public function getBalance(Request $request)
    {
        $accountId = $request->get('account_id');
        $response = $this->balanceService->getBalanceForAccount($accountId);

        return response($response['value'], $response['status'])
            ->header('Content-Type', 'text/plain');
    }

    public function postEvent(Request $request)
    {
        $response = $this->eventService->handleEvent($request->all());

        return response($response['value'], $response['status'])
            ->header('Content-Type', 'text/json');
    }

    public function postReset()
    {
        $response = $this->resetService->resetData();

        return response($response['value'], $response['status'])
            ->header('Content-Type', 'text/plain');
    }
}
