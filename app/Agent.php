<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Agent extends Model
{
    // use Vanguard/HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'wallet_balance'

    ];
}
