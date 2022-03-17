<?php

namespace Vanguard\Repositories\Agent;

use Vanguard\User;

class EloquentAgent implements AgentRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return User::where('role_id', 3)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
      return User::where('id', $id)->first();
    }
}
