@if($event->hasEnded())
{!! Form::open(['route' => ['events.restart', $event->id], 'class' => 'action-form']) !!}
<input type="submit" value="Restart event" class="btn btn-primary btn-xs" />
{!! Form::close() !!}
@endif
{!! Form::open(['route' => ['events.delete', $event->id], 'method' => 'DELETE', 'class' => 'action-form']) !!}
<input type="submit" value="Delete" class="btn btn-xs btn-danger" />
{!! Form::close() !!}
