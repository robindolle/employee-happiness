<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Vote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoteRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoteRequest $request)
    {
        Vote::create($request->all());

        return redirect('/');
    }
}
