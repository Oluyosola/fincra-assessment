<?php

namespace Vanguard\Transaction\Http\Controllers\Web;

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
        return view('transaction::index');
    }
}
