@extends('layouts.default')
@section('content')
<div class="page-header">
    <h3>Request password reset</h3>
</div>
<div class="container">
    <div class="col-md-6">
        {!! Form::open(['route' => 'password.reset-request', 'class' => 'form-horizontal']) !!}
        <!-- Email Form Input -->
        <div class="form-group {{ setHasError($errors, 'email') }}">
            {!! Form::label('email', 'Email', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                @if($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
                {!! Form::submit('Request password reset', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
