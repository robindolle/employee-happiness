<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\VoteRequest;
use App\Vote;
use App\Http\Controllers\Controller;

/**
 * Class VotesController
 * @package App\Http\Controllers\Api
 */
class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vote::paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoteRequest $request)
    {
        $vote = Vote::create($request->all());
        return response([
            'success' => true,
            'data' => [
                'id' => $vote->id
            ]
        ], 200);
    }
}
