<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index() {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function store(Request $request) {
        Agent::create($request->all());
        return back();
    }

}
