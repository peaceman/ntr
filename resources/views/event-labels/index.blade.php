@extends('layouts.default')
@section('content')
<div class="page-header">
    <h3>Event Labels</h3>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($eventLabels as $eventLabel)
        <tr>
            <td>{{ $eventLabel->id }}</td>
            <td>{{ $eventLabel->name }}</td>
            <td>{{ $eventLabel->created_at }}</td>
            <td>{{ $eventLabel->updated_at }}</td>
            <td class="actions-column">
                <a href="{{ route('event-labels.edit', $eventLabel->id) }}" class="btn btn-xs btn-default">Edit</a>
                {!! Form::open(['route' => ['event-labels.destroy', $eventLabel->id], 'method' => 'delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No entries available</td>
        </tr>
        @endforelse
    </tbody>
</table>

@stop
