<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'agent_id',
        'transaction_type',
        'amount',
        'balance_before',
        'balance_after',
        'bank_name',
        'account_number',
        'agent_name'
    ];
}
