<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuAccountType extends Model
{
    protected $table = 'lu_accounts_types';

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
