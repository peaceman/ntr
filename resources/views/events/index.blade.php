@extends('layouts.default')
@section('content')
<script>
$(function() {
    $("[name='event_label_id']").selectize({
        create: true
    });
});
</script>
<div class="row">
    <div class="col-md-6">
        <div class="well">
            {!! Form::open(['route' => 'events.store', 'class' => '']) !!}
            <div class="form-group">
                {!! Form::select('event_label_id', [null => ''] + $eventLabels, null, ['class' => 'form-control', 'placeholder' => 'select an existing label or create a new one']) !!}
            </div>
            {!! Form::submit('Start tracking', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
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
