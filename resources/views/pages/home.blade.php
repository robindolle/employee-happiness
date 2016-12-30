@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if($errors->any())
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">How was your day?</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/']) !!}
                        <div class="form-group" data-toggle="buttons">
                            <label class="btn btn-success btn-lg">
                                {!! Form::radio('vote', 'smile') !!}
                                <i class="fa fa-smile-o" aria-hidden="true"></i>
                            </label>
                            <label class="btn btn-warning btn-lg">
                                {!! Form::radio('vote', 'meh') !!}
                                <i class="fa fa-meh-o" aria-hidden="true"></i>
                            </label>
                            <label class="btn btn-danger btn-lg">
                                {!! Form::radio('vote', 'frown') !!}
                                <i class="fa fa-frown-o" aria-hidden="true"></i>
                            </label>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection