<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['account_id', 'amount', 'interests', 'type_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'account_id' => 'integer',
        'amount' => 'decimal:2',
        'interests' => 'decimal:2',
        'type_id' => 'integer',
    ];
}
