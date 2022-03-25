<div>
    {{ $message }}
</div>
<div><a href="/admin/messages/{{ $message->id }}/edit">Edit</a></div>
<div><a href="{{ url()->previous() }}"><- Back</a></div>