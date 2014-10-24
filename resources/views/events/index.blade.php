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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Label</th>
                        <th>Started at</th>
                        <th>Ended at</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentEvents as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->eventLabel->name }}</td>
                        <td>{{ $event->started_at }}</td>
                        <td>{{ $event->ended_at }}</td>
                        <td>{{ $event->getDuration() }}</td>
                        <td>blubber</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No entries available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </fieldset>
    </div>
</div>
@stop
