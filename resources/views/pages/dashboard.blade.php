@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vote</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($votes as $vote)
                            <tr>
                                <th>{{ $vote->id }}</th>
                                <td><i class="fa fa-{{ $vote->vote }}-o" aria-hidden="true"></i> {{ $vote->vote }}</td>
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
