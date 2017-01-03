@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('flash_message'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ Session::get('flash_message') }}
                </div>
                <script>
                    $('div.alert').delay(3000).fadeOut('slow');
                </script>
            @endif
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
                            @foreach($vote_types as $vote_type)
                                <label class="btn btn-{{ $vote_type->color }} btn-lg">
                                    {!! Form::radio('vote_type_id', $vote_type->id) !!}
                                    <i class="fa {{ $vote_type->icon }}" aria-hidden="true"></i>
                                </label>
                            @endforeach
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