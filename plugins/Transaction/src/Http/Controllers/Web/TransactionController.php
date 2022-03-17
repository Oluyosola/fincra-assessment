<?php

namespace Vanguard\Transaction\Http\Controllers\Web;
use Vanguard\User;
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
        $transaction = Transaction::with(['sender', 'agent'])->paginate(10);
        return view('transaction::index', compact('transaction'));
    }
}
