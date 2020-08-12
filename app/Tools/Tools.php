<?php

namespace App\Tools;

use App\Account;
use Exception;

class Tools
{
    /**
     * @method
     * @param {int} $id
     * @return {object} $account
     */
    public static function getAccountById(int $id)
    {
        $account = Account::find($id);
        if (!$account) {
            throw new Exception('Account not found');
        }
        return $account;
    }

    /**
     * @method getDifferenceBetweenDates
     * @description Obtiene la diferencia de días entre dos fechas
     * @param (string) $startDate
     * @param (string) $endDate
     * @return (float) $dateDiff
     */
    public static function getDifferenceBetweenDates(string $startDate, string $endDate){
        $startDate 	= strtotime($startDate);
        $endDate 	= strtotime($endDate);
        if ($startDate <= $endDate) {
            $dateDiff = $endDate - $startDate;
            return floor($dateDiff / (60 * 60 * 24));
        }
        return false;
    }
}