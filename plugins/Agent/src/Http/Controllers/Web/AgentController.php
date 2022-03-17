<?php

namespace Vanguard\Agent\Http\Controllers\Web;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Vanguard\Wallet;
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
        $wallet = Wallet::all();
        $users = User::where('role_id', 3)->with('wallet')->get();
        return view('agent::index', compact('users', 'wallet'));
    }

    public function create()
    {
        return view('agent::create');
    }

    // public function add(Request $request)
    // {
    //     $agent = New Agent();
    //     $agent->name = $request->input('name');
    //     $agent->email = $request->input('email');
    //     $agent->phone_number = $request->input('phone');
    //     $agent->password = Hash::make($request->input('password'));
    //     $agent->save();
    //     return back();
    // }

    public function fundWallet(User $user){
        return view('agent::wallet', compact('user'));

    }
    public function addFund(Request $request, User $user){

        $user->wallet->balance = $user->wallet->balance + $request->input('wallet');
        $user->wallet->update();
    
        return back();
    
    }
}

