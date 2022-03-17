<?php

namespace Vanguard\Dashboard\Services;

use Vanguard\Repositories\Transaction\TransactionRepository;
use Vanguard\Repositories\Wallet\WalletRepository;
use Illuminate\Support\Facades\DB;
use Vanguard\Dashboard\Services\PaymentService;

class FundService
{
  protected $transactions;
  protected $wallet;
  protected $paymentService;

  public function __construct(TransactionRepository $transactions, 
                              WalletRepository $wallet,
                              PaymentService $paymentService
  ){
    $this->transactions = $transactions;
    $this->wallet = $wallet;
    $this->paymentService = $paymentService;
  }

  public function transferFunds($params, $sender_id)
  {
    try{
      // get the wallet balance of the sender
      // check if the sender has enough wallet balance for transfer
      // return an error response that sender wallet balance is not enough to make a transfer
      $sender_wallet = $this->wallet->find($sender_id);

      if($sender_wallet->balance <= $params['amount']){
        return ['status' => false, 'message'];
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
      // $receiver_wallet = $this->wallet->find($params['agent_id']);
      // $params['balance_before'] = $receiver_wallet->balance;

      // send money
      $payment_payload = [
        'sourceCurrency' => 'NGN',
        'destinationCurrency' => 'NGN',
        'amount' => $params['amount'],
        'business' => env('MY_FINCRA_BUSINESS_ID'),
        'description' => 'send Payment to '.$params['agent_name'],
        'customerReference' => uniqid(), //generate a unique ID
        'beneficiary' => [
          'firstName' => $params['agent_name'],
          'type' => 'individual',
          'accountHolderName' =>  $params['agent_name'],
          'accountNumber' => $params['account_number']
        ],
        'paymentDestination' => 'bank_account'
      ];
      
      $send_money = $this->paymentService->payoutToIndividual($payment_payload);

      // dd(gettype($send_money));
      dd($send_money);

      if(isset($send_money->success) && ($send_money->success === true)){
        $params['status'] = $send_money->data->status;
        $params['payment_reference'] = $send_money->data->reference;
        $params['customer_payment_reference'] = $send_money->data->customerReference;
        $params['balance_before'] = $sender_wallet->balance;
dd($send_money);
        DB::beginTransaction();
        // save transaction details;
        $save_transaction = $this->transactions->save($params, $sender_id);

        // update the sender wallet
        $sender_wallet->balance -= $params['amount'];
        $sender_wallet->update();

        DB::commit();
        return [$send_money, $save_transaction];
      }else{
        return [
          'status' => false,
          'message' => 'request not successful'
        ];
      }
    }catch(\Exception $error){
      DB::rollback();
      throw $error;
    }
    
  }
}