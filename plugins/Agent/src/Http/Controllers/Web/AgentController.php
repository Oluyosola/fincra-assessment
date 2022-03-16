<?php

namespace Vanguard\Agent\Http\Controllers\Web;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Vanguard\Agent;
use Vanguard\User;
use Vanguard\Http\Controllers\Controller;

class AgentController extends Controller
{
    /**
     * Displays the plugin index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('role_id', 3)->get();
        // $agents = Agent::all();
        return view('agent::index', compact('users'));
    }

    public function create()
    {
        return view('agent::create');
    }

    public function add(Request $request)
    {
        $agent = New Agent();
        $agent->name = $request->input('name');
        $agent->email = $request->input('email');
        $agent->phone_number = $request->input('phone');
        $agent->password = Hash::make($request->input('password'));
        $agent->save();
        return back();
    }

    public function fundWallet(Agent $agent){
        return view('agent::wallet', compact('agent'));

    }
    public function addFund(Request $request, Agent $agent){

        $agent->wallet_balance = $agent->wallet_balance + $request->input('wallet');
        $agent->update();
        return back();
    }
}

