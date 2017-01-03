<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Vote;
use App\VoteType;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $vote_types = VoteType::all();
        return view('pages.home', compact('vote_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoteRequest $request)
    {
        $vote = new Vote($request->all());
        $vote->created_at = Carbon::now();
        $vote->save();

        return redirect('/')->with('flash_message', 'Your vote was successfully submitted.');
    }
}
