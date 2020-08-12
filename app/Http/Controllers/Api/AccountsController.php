<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Transaction;
use App\Tools\Tools;
use App\Constants\Constants;
use Carbon\Carbon;
use Exception;

class AccountsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $request;

    /**
     *
     * @return void
     */
    private $userId;
    
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
        $this->userId = $this->request->auth->id;
    }

    /**
     * Get accounts by user
     */
    public function __invoke()
    {
        try {
            $accounts = Account::where('user_id', $this->userId)->get();

            return response()->json(
                ['accounts' => $accounts]
            , 200);
        } catch(Exception $e) {
            return response()->json([
                'error' => 'Unexpected error has been ocurred'
            ], 500);
        }
    }
}