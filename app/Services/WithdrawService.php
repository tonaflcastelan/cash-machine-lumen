<?php

namespace App\Services;

use App\Constants\Constants;
use Exception;

class WithdrawService
{
    /**
     * Process and create withdraw
     *
     * @param {object} $account
     * @param {float} $amount
     * @return {array} [$account, $percentage]
     */
    public function createWithdraw($account, $amount)
    {
        $interests = null;
        $percentage = null;

        if ($account->type_id !== Constants::DEBIT_ACCOUNT) {
            $percentage = ($amount * Constants::COMMISSION) / 100;
            $interests = $account->interests + $percentage;
        }

        $minCredit = ($account->credit_line * Constants::MIN_PERCENTAGE) / 100;
        $availableCredit = $account->available_credit - $amount;

        if ($account->available_credit <= $minCredit) {
            throw new Exception('You can not withdraw anymore. You exceeded the limit credit');
        }

        if (($availableCredit) < $minCredit) {
            $minWithdraw = $account->available_credit - $minCredit;
            throw new Exception('You can only withdraw ' . $minWithdraw);
        }

        $account->available_credit = $availableCredit;
        $account->interests = $interests;
        $account->save();
        return [$account, $percentage];
    }
}