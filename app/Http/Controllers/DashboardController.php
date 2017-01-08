<?php

namespace App\Http\Controllers;

use App\Vote;
use App\VoteType;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vote_types = VoteType::all();

        $day_votes = $this->getStatistics()->today()->get();
        $day_votes_total = $day_votes->sum('total');

        $week_votes = $this->getStatistics()->week()->get();
        $week_votes_total = $week_votes->sum('total');

        $month_votes = $this->getStatistics()->month()->get();
        $month_votes_total = $month_votes->sum('total');

        $latest_votes = DB::table('votes')
            ->join('vote_types', 'votes.vote_type_id', '=', 'vote_types.id')
            ->latest()
            ->take(5)
            ->get();

        return view('pages.dashboard', [
            'vote_types' => $vote_types,
            'day_votes' => $day_votes,
            'day_votes_total' => $day_votes_total,
            'week_votes' => $week_votes,
            'week_votes_total' => $week_votes_total,
            'month_votes' => $month_votes,
            'month_votes_total' => $month_votes_total,
            'latest_votes' => $latest_votes
        ]);
    }

    private function getStatistics()
    {
        return Vote::select(DB::raw('MIN(vote_types.name) as name, MIN(vote_types.color) as color, count(*) as total'))
            ->join('vote_types', 'votes.vote_type_id', '=', 'vote_types.id')
            ->groupBy('vote_type_id');
    }
}
