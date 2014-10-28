@if($event->hasEnded())
    <span data-duration="{{ $event->getDuration() }}"></span>
@else
    <time datetime="{{ $event->started_at->toRfc3339String() }}" data-time-label="td_hh:d_mm:d_ss"></time>
@endif
