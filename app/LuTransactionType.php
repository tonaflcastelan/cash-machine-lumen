<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuTransactionType extends Model
{
    protected $table = 'lu_transactions_types';

    protected $fillable = ['name'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];
}
