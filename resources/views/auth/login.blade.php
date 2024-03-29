@extends('layouts.default')
@section('content')
<div class="page-header">
    <h3>Login</h3>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'auth.login', 'class' => 'form-horizontal']) !!}
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

            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('password.reset-request') }}">Request password reset</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
