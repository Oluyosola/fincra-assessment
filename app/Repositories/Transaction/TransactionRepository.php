<?php

namespace Vanguard\Repositories\Transaction;

interface TransactionRepository
{
  /**
   * Get all transactions.
   * @return mixed
   */
  public function all();

  /**
   * Save a new transaction record
   */
  public function save(array $params, int $sender_id);
}
