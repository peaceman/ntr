@extends('layouts.default')
@section('content')
<div class="page-header">
    <h3>Reset password</h3>
</div>
<div class="container">
    <div class="col-md-6">
        {!! Form::open(['route' => 'password.reset', 'class' => 'form-horizontal']) !!}

        {!! Form::hidden('token', $token) !!}

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

        <!-- Password Form Input -->
        <div class="form-group {{ setHasError($errors, 'password') }}">
            {!! Form::label('password', 'Password', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::password('password', ['class' => 'form-control']) !!}
                @if($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <!-- Password confirmation Form Input -->
        <div class="form-group {{ setHasError($errors, 'password_confirmation') }}">
            {!! Form::label('password_confirmation', 'Password confirmation', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-10">
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                @if($errors->has('password_confirmation'))
                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
                {!! Form::submit('Reset password', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
