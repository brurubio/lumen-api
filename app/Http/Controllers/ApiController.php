<?php

namespace App\Http\Controllers;

use App\Services\BalanceService;
use App\Services\ResetService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /** @var BalanceService $balanceService */
    private $balanceService;
    /** @var ResetService $resetService */
    private $resetService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        BalanceService $balanceService,
        ResetService $resetService
    ) {
        $this->balanceService = $balanceService;
        $this->resetService = $resetService;
    }

    public function getBalance(int $id)
    {
        $response = $this->balanceService->getBalanceForAccount($id);

        return response($response['value'], $response['status'])
            ->header('Content-Type', 'text/plain');
    }

    public function postEvent(Request $request)
    {
        dd('posting event...', $request->all());
    }

    public function postReset()
    {
        $response = $this->resetService->resetData();

        return response($response['value'], $response['status'])
            ->header('Content-Type', 'text/plain');
    }
}
