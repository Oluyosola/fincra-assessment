<?php

namespace Vanguard\Agent\Http\Controllers\Web;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Vanguard\Wallet;
use Vanguard\User;
use Vanguard\Role;
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
        $agent = Role::where('name', 'Agent')->first();

        $users = User::where('role_id', $agent->id)->with('wallet')->paginate(10);
        return view('agent::index', compact('users', 'wallet'));
    }

    public function create()
    {
        return view('agent::create');
    }


    public function fundWallet(User $user){
        return view('agent::wallet', compact('user'));

    }
    public function addFund(Request $request, User $user){
        $this->validate($request,[
            'wallet' => 'required',
            ]);
    

        $user->wallet->balance = $user->wallet->balance + $request->input('wallet');
        $user->wallet->update();
        return redirect()->route('agent')->with('success', $user->last_name. " ". $user->first_name." ". 'Wallet Funded');
    
    }
}

