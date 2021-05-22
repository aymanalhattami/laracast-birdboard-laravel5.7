@if(count($activity->changes['after']) == 1)
    <strong>{{ $activity->user->name }}</strong> updated {{ key($activity->changes['after']) }} of the project
@else
    <strong>{{ $activity->user->name }}</strong> updated a project
@endif
