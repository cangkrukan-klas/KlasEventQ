<p>Limit 3 Event</p>

@foreach($triEvent as $u)
    <p>{{ $u->name }}</p>
@endforeach

<br><br>
<p>Next Event</p>
@foreach($event as $u)
<p>{{ $u->name }}</p>
@endforeach

<br><br>
<p>User</p>
@foreach($user as $u)
<p>{{ $u->name }}</p>
@endforeach