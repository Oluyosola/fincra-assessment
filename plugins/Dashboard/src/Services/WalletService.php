<?php

namespace Vanguard\Dashboard\Services;

use Vanguard\Repositories\Transaction\TransactionRepository;
use Vanguard\Repositories\Wallet\WalletRepository;
use Illuminate\Support\Facades\DB;

class WalletService
{
  protected $transactions;
  protected $wallet;

  public function __construct(TransactionRepository $transactions, WalletRepository $wallet)
  {
    $this->transactions = $transactions;
    $this->wallet = $wallet;
  }

  public function walletTransfer($params, $sender_id)
  {
    try{
      // get the wallet balance of the sender
      // check if the sender has enough wallet balance for transfer
      // return an error response that sender wallet balance is not enough to make a transfer
      $sender_wallet = $this->wallet->find($sender_id);
      // dd($sender_wallet);
      if($sender_wallet->balance <= $params['amount']){
        return ['status' => false, 'message' => 'Request failed. Insufficient wallet balance'];
      }

      /**
       * get receiver id from $params['agent_data'].
       * $params['agent_data'] is a string that contains the agent_name and agent_id data.
       * explode the data to get $agent_name and $agent_id seperately
      */
      $agent_data = explode(",", $params['agent_data']);

      $params['agent_name'] = $agent_data[0];
      $params['agent_id'] = $agent_data[1];
    

      // get the wallet details of the receiver
      $receiver_wallet = $this->wallet->find($params['agent_id']);
      $params['balance_before'] = $receiver_wallet->balance;

      
      DB::beginTransaction();
      // save transaction details;
      $save_transaction = $this->transactions->save($params, $sender_id);

      // fund receiver wallet
      $receiver_wallet->balance += $params['amount'];
      $receiver_wallet->update();

      // update the sender wallet
      $sender_wallet->balance -= $params['amount'];
      $sender_wallet->update();
      DB::commit();
      return $save_transaction;
    }catch(\Exception $error){
      DB::rollback();
      throw $error;
    }
  }
}