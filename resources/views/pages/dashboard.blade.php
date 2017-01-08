@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#day" aria-controls="day" role="tab" data-toggle="tab">Day</a>
                        </li>
                        <li role="presentation">
                            <a href="#week" aria-controls="week" role="tab" data-toggle="tab">Week</a>
                        </li>
                        <li role="presentation">
                            <a href="#month" aria-controls="month" role="tab" data-toggle="tab">Month</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="day">
                            <div class="progress">
                                @foreach($day_votes as $day_vote)
                                    <div class="progress-bar progress-bar-{{ $day_vote->color }}" style="width: {{ ($day_vote->total / $day_votes_total) * 100 }}%">
                                        {{ round(($day_vote->total / $day_votes_total) * 100) }}%
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="week">
                            <div class="progress">
                                @foreach($week_votes as $week_vote)
                                    <div class="progress-bar progress-bar-{{ $week_vote->color }}" style="width: {{ ($week_vote->total / $week_votes_total) * 100 }}%">
                                        {{ round(($week_vote->total / $week_votes_total) * 100) }}%
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="month">
                            <div class="progress">
                                @foreach($month_votes as $month_vote)
                                    <div class="progress-bar progress-bar-{{ $month_vote->color }}" style="width: {{ ($month_vote->total / $month_votes_total) * 100 }}%">
                                        {{ round(($month_vote->total / $month_votes_total) * 100) }}%
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline">
                        @foreach($vote_types as $vote_type)
                            <li>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-{{ $vote_type->color }}"></i>
                                    <i class="fa {{ $vote_type->icon }} fa-stack-1x fa-inverse"></i>
                                </span>
                                <span class="text-muted">{{ $vote_type->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Latest votes</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Vote</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($latest_votes as $vote)
                        <tr>
                            <td><i class="fa {{ $vote->icon }}" aria-hidden="true"></i> {{ $vote->name }}</td>
                            <td>{{ $vote->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
