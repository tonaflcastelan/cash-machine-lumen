<?php

namespace App\Constants;

class Constants
{
    const PAYMENT_LABEL = 'Pago';
    const WITHDRAW_LABEL = 'Retiro';
    const PAYMENT_TRANSACTION = 1;
    const WITHDRAW_TRANSACTION = 2;
    const TRANSACTIONS_TYPE = [
        self::PAYMENT_TRANSACTION => self::PAYMENT_LABEL,
        self::WITHDRAW_TRANSACTION => self:: WITHDRAW_LABEL,
    ];
    const DEBIT_ACCOUNT = 1;
    const CREDIT_ACCOUNT = 2;
    const DEBIT_LABEL = 'Débito';
    const CREDIT_LABEL = 'Crédito';
    const ACCOUNTS_TYPE = [
        self::DEBIT_ACCOUNT => self::DEBIT_LABEL,
        self::CREDIT_ACCOUNT => self:: CREDIT_LABEL,
    ];
    const COMMISSION            = 10;
    const MIN_PERCENTAGE        = 10;
    const PAYMENT_PERCENTAGE    = 6;
}