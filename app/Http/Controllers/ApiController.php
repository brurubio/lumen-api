<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getBalance(int $id)
    {
        dd('getting balance...', $id);
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
