<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Notifications\ConsecutiveNegativeVotes;
use App\User;
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

        $this->sendNotification();

        return redirect('/')->with('flash_message', 'Your vote was successfully submitted.');
    }

    /**
     * Send a notification to the manager after 3 consecutive negative votes.
     */
    private function sendNotification()
    {
        $unique_votes = Vote::latest()->take(3)->get()->unique('vote_type_id')->values()->all();
        if(count($unique_votes) === 1 && $unique_votes[0]->vote_type_id === 3) {
            $user = User::first();
            $user->notify(new ConsecutiveNegativeVotes());
        }
    }
}
