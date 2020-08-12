<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['account_number', 'credit_line', 'available_credit', 'type_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'account_number' => 'string',
        'credit_line' => 'decimal:2',
        'available_credit' => 'decimal:2',
        'type_id' => 'integer',
    ];
}
