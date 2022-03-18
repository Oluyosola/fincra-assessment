<?php

namespace Vanguard\Repositories\Agent;

use Vanguard\User;
use Vanguard\Role;


class EloquentAgent implements AgentRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
      $agent = Role::where('name', 'Agent')->first();

        return User::where('role_id', $agent->id)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
      return User::where('id', $id)->first();
    }
}
