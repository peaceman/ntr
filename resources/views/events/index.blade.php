@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(['route' => 'events.store', 'class' => 'form-inline']) !!}
                <div class="form-group">
                    {!! Form::select('event_label_id', $eventLabels, null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Start tracking', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <fieldset>
            <legend>Recent events</legend>
            {!! $tableListing->getTableData() !!}
            {!! $tableListing->getPagination() !!}
            {!! $tableListing->getPaginationInfo() !!}
        </fieldset>
    </div>
</div>
@stop
