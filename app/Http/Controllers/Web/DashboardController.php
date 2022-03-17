<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Vanguard\User;
use Vanguard\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Displays the application dashboard.
     *
     * @return Factory|View
     */
    public function index(User $user)
    {
        if (session()->has('verified')  ) {
            session()->flash('success', __('E-Mail verified successfully.'));
        }
        if(auth()->user()->role_id != 3){

        return view('dashboard.index');
        }else{
            return redirect()->route('agent.dashboard');
    }
}
}
