<?php

namespace App\Services;

use App\Constants\Constants;
use Exception;

class PaymentService
{
    /**
     * Process and create payment
     *
     * @param {object} $account
     * @param {float} $amount
     * @return {array} [$account, $toInterests]
     */
    public function createPayment($account, $amount)
    {
        $accountInt = $account->interests;
        $availableCredit = $account->available_credit;
        $toCreditLine = $account->credit_line - $account->available_credit;
        $lastInterests = null;
        $totalCreditInterests = null;
        $lastAmount = null;
        $toInterests= null;

        if ($account->type_id == Constants::WITHDRAW_TRANSACTION) {
            $toInterests = ($amount * Constants::PAYMENT_PERCENTAGE) / 100;
            $lastAmount = $amount - $toInterests;
            $lastInterests = $account->interests - $toInterests;
            $totalCreditInterests = $toCreditLine + $account->interests;

            if ($account->credit_line === $account->available_credit) {
                throw new Exception('The credit is up to date');
            }

            if ($amount > $totalCreditInterests) {
                throw new Exception('The amount exceeds the total debt. You must pay '
                    . $totalCreditInterests);
            }
        }

        $result = $amount - $account->interests;

        if ($lastAmount > $toCreditLine && $account->type_id == Constants::WITHDRAW_TRANSACTION) {
            $account->available_credit = $account->available_credit + $result;
            if ($account->interests) {
                $account->interests = null;
            }
        } else {
            $account->available_credit = $account->available_credit + $lastAmount;
            $account->interests = $lastInterests;
            if (!$accountInt) {
                $account->available_credit = $availableCredit + $result;
                $account->interests = null;
            }
        }

        $account->save();

        return [$account, $toInterests];
    }

}