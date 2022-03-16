<?php

namespace Vanguard\Transaction\Http\Controllers\Web;
use Vanguard\Agent;
use Vanguard\Transaction;

use Vanguard\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Displays the plugin index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $agent = Agent::where('id', auth()->user()->id);
        $transaction = Transaction::all();
        return view('transaction::index', compact('agent','transaction'));
    }
}
