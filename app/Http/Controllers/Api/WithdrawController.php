<?php

namespace App\Http\Controllers\Api;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Tools\Tools;
use App\Constants\Constants;
use App\Http\Requests\WithdrawRequest;
use App\Services\WithdrawService;
use Carbon\Carbon;
use Exception;

class WithdrawController extends Controller
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
     * Make a withdraw from the account
     * 
     * @param {json} $request
     * @return {json} $response
     */
    public function __invoke(Request $request)
    {
        try {
            $this->validate($request, [
                'account_id' => 'required',
                'amount' => 'required'
            ]);
            $percentage = null;
            $accountId = $request->input('account_id');
            $amount = $request->input('amount');
            $account = Tools::getAccountById($accountId);

            $currentTime = Carbon::now()->format('Y-m-d');
            
            $expires = Tools::getDifferenceBetweenDates($currentTime, $account->expires);
            
            if (!$expires) {
                throw new Exception('The credit has been expired');
            }

            $service = new WithdrawService;
            list($account, $percentage) = $service->createWithdraw($account, $amount);

            $transaction = [
                'account_id' => $account->id,
                'amount' => $amount,
                'interests' => $percentage,
                'type_id' => Constants::WITHDRAW_TRANSACTION,
            ];

            Transaction::create($transaction);

            return response()->json(
                ['message' => 'You withdrew ' . $amount]
            , 200);
            
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}