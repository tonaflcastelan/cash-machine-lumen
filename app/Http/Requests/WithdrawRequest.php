<?php
 
namespace App\Http\Requests;

use Illuminate\Http\Request;

class WithdrawRequest extends Request
{
    public function rules()
    {
        return [
            'account_id' => 'required',
            'amount' => 'required|min:1000',
        ];
    }
}