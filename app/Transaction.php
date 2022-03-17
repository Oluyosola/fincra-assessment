<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'agent_id',
        'transaction_type',
        'payment_reference',
        'amount',
        'balance_before',
        'balance_after',
        'bank_name',
        'account_number',
        'agent_name'
    ];
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
