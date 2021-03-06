<?php

namespace Vanguard\Repositories\Wallet;

use Vanguard\Wallet;

class EloquentWallet implements WalletRepository
{
  /**
   * {@inheritdoc}
   */
  public function find($user_id)
  {
    return Wallet::where('agent_id', $user_id)->first();
  }
}
