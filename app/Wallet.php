<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'agent_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
