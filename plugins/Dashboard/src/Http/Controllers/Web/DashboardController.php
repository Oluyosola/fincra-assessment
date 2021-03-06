<?php

namespace Vanguard\Dashboard\Http\Controllers\Web;

use Vanguard\Agent;
use Vanguard\Transaction;
use Illuminate\Http\Request;
use Vanguard\Dashboard\Services\WalletService;
use Vanguard\Dashboard\Services\FundService;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Agent\AgentRepository;
use Vanguard\Repositories\Transaction\TransactionRepository;

class DashboardController extends Controller
{
  protected $agent;
  protected $transactions;
  protected $walletService;
  protected $fundService;

  public function __construct(AgentRepository $agent, 
                              TransactionRepository $transactions,
                              WalletService $walletService,
                              FundService $fundService
  ){ 
    $this->agent = $agent;
    $this->transactions = $transactions;
    $this->walletService = $walletService;
    $this->fundService = $fundService;
  }

  /**
   * Displays the plugin index page.
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index()
  {
    $agent = $this->agent->find(auth()->user()->id);
    $transaction = $this->transactions->all();
    $agent_trans = Transaction::where('sender_id', auth()->user()->id)->with(['sender', 'agent'])->paginate(10);
    return view('dashboard::index', compact('agent', 'transaction', 'agent_trans'));
  }

  public function transfer(){
    $agent = $this->agent->all();
    return view('dashboard::transfer', compact('agent'));
  }

  public function makeTransfer(Request $request, Agent $agent)
  {
    if($request->transaction_type == 'wallet transfer'){

    $this->validate($request,[
      'transaction_type' => 'required',
      'agent_data' => 'required',
      'amount' => 'required',

      ]);
    }else{
      $this->validate($request,[
        'transaction_type' => 'required',
        'agent_data' => 'required',
        'amount' => 'required',
        'account_number' => 'required',
        'bank_name' => 'required',

        ]);
    }
    $sender_id = auth()->user()->id;
    switch($request->transaction_type){
      case "wallet transfer":
        $data = $this->walletService->walletTransfer($request->all(), $sender_id);
        break;
      case "fund transfer":
        $data = $this->fundService->transferFunds($request->all(), $sender_id);
        break;
    }


    if(isset($data['status']) && $data['status'] == false){
      
      return back()->with('error', 'Request failed, Insufficient wallet balance');

    }


    return redirect()->route('agent.dashboard')->with('success', 'Transfer Successful');


    
  }

}
