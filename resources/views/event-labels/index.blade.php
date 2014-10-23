@extends('layouts.default')
@section('content')
<div class="page-header">
    <h3>Event Labels</h3>
</div>

<ul>
    @foreach($eventLabels as $eventLabel)
    <li>{{ $eventLabel->name }}</li>
    @endforeach
</ul>

@stop
