@if($event->hasEnded())
    {{ $event->ended_at }}
@else
    {!! Form::open(['route' => 'events.stop', $event->id]) !!}
    <input type="submit" value="Stop tracking" class="btn btn-danger btn-xs" />
    {!! Form::close() !!}
@endif
