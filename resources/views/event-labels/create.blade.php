@extends('layouts.default')
@section('content')
<div class="page-header">
    <h3>Create Event Label</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'event-labels.create', 'class' => 'form-horizontal']) !!}
            <!-- Name Form Input -->
            <div class="form-group {{ setHasError($errors, 'name') }}">
                {!! Form::label('name', 'Name', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    {!! Form::submit('Create Event Label', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
