<?php

namespace App\Http\Controllers\Api;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Tools\Tools;
use App\Constants\Constants;
use App\Http\Requests\WithdrawRequest;
use App\Services\PaymentService;
use App\Services\WithdrawService;
use Carbon\Carbon;
use Exception;

class PaymentController extends Controller
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
     * Make a payment transaction
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
            $accountId = $request->input('account_id');
            $amount = $request->input('amount');
            $account = Tools::getAccountById($accountId);

            $paymentService = new PaymentService;
            list($account, $toInterests) = $paymentService->createPayment($account, $amount);

            $saveTransaction = [
                'account_id' => $account->id,
                'amount' => $amount,
                'interests' => $toInterests,
                'type_id' => Constants::PAYMENT_TRANSACTION,
            ];
            $transaction = Transaction::create($saveTransaction);

            return response()->json(
                ['message' => 'You paid ' . $amount]
            , 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}