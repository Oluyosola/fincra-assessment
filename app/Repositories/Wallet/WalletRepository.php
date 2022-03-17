<?php

namespace Vanguard\Repositories\Wallet;

interface WalletRepository
{
  /**
   * Find a wallet details using user_id.
   * @return mixed
   */
  public function find(int $user_id);

  /**
   * Save a new transaction record
   */
  // public function save(array $params);
}
