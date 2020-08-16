<?php

namespace App\Http\Controllers;

use App\Services\BalanceService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /** @var BalanceService $balanceService */
    private $balanceService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function getBalance(int $id)
    {
        return $this->balanceService->getBalanceForAccount($id);
    }

    public function postEvent(Request $request)
    {
        dd('posting event...', $request->all());
    }

    public function postReset()
    {
        dd('posting reset...',);
    }
}
