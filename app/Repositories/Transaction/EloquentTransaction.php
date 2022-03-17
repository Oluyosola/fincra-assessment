<?php

namespace Vanguard\Repositories\Transaction;

use Vanguard\Transaction;

class EloquentTransaction implements TransactionRepository
{
  /**
   * {@inheritdoc}
   */
  public function all()
  {
    return Transaction::all();
  }

  public function save($params, $sender_id)
  {
    $transaction = new Transaction();
    $transaction->sender_id = $sender_id;
    $transaction->amount = $params['amount'];
    $transaction->transaction_type = $params['transaction_type'];
    $transaction->agent_id = $params['agent_id'];
    $transaction->agent_name = $params['agent_name'];
    $transaction->status = $params['status'] ?? "successful";
    $transaction->payment_reference = $params['payment_reference'] ?? '';
    $transaction->customer_payment_reference = $params['customer_payment_reference'] ?? '';
    $transaction->bank_name = $params['bank_name'] ?? '';
    $transaction->account_number = $params['account_number'] ?? '';
    $transaction->balance_before = $params['balance_before'];

    /**
     * for wallet transfer, the balance of the reciever is recorded.
     * while the wallet balance of the sender is recorded for fund transfer 
     * since the sender is sending from the wallet to the a local bank account
    */ 
    // if($params['transaction_type'] === 'wallet transfer'){
      $transaction->balance_after = ($params['balance_before'] + $params['amount']);
    // }elseif($params['transaction_type'] === 'fund transfer'){
    //   $transaction->balance_after = ($params['balance_before'] - $params['amount']);
    // }
  
    $transaction->save();

    return $transaction;
  }
}
