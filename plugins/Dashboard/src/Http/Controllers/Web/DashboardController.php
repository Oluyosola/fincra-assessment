<?php

namespace Vanguard\Dashboard\Http\Controllers\Web;
use Vanguard\Agent;
use Vanguard\Transaction;
use Illuminate\Http\Request;


use Vanguard\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Displays the plugin index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $agent = Agent::where('id', auth()->user()->id)->first();
        $transaction = Transaction::all();
        return view('dashboard::index', compact('agent','transaction'));
    }
    public function transfer(){
        $agent = Agent::all();
        return view('dashboard::transfer', compact('agent'));
    }
    public function makeTransfer(Request $request, Agent $agent){
        $transaction = new Transaction();
        $transaction->agent_id = auth()->user()->id;
        $transaction->amount = $request->input('amount');
        $transaction->transaction_type = $request->input('transaction_type');
        $transaction->balance_before = $request->input('balance_before');
        $transaction->balance_after = $transaction->balance_before - $request->input('amount');
        $transaction->bank_name = $request->input('bank');
        $transaction->account_number = $request->input('account_number');
        $transaction->agent_name = $request->input('agent_name');
        $transaction->save();

        $agent->wallet_balance = $agent->wallet_balance + $request->input('amount');
        $agent->update();
        return back();




    }

}
