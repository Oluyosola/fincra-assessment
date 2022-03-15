<?php

namespace Vanguard\Agent\Http\Controllers\Web;

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
        return view('agent::index');
    }

    public function create()
    {
        return view('agent::create');
    }

    public function add()
    {
        
    }

}
