<?php

namespace Vanguard\Repositories\Agent;

interface AgentRepository
{
  /**
   * Get all registered agents.
   * @return mixed
   */
  public function all();


  /**
   * Find a particular agent using id
   *  @return mixed
   */
  public function find(int $agent_id);
}
