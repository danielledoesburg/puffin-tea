<a href="/admin/messages"><h1>Messages </h1></a>

<form action="#" method="GET">
    <input type="text" name="search" placeholder="find message">
    <label for="exact">Exact search</label>
    <input type="checkbox" name="exact" id="exact" value="true">

</form>

@if ($messages->total())
    @foreach ($messages as $message)
        <div class="border">
            <ul>
                <li>
                    from:
                    @if ($message->user_id)
                        <a href="/admin/users/{{ $message->user_id }}">{{ $message->name }}</a>
                    @else
                        {{ $message->name }} 
                    @endif
                </li>
                <li>email: {{ $message->email }}</li>
            </ul>
            <p>{{ $message->message}}</p>
            <a href="/admin/messages/{{ $message->id }}">show</a>
            <a href="/admin/messages/{{ $message->id }}/edit">edit</a>
        </div>
    @endforeach
    <div>{{ $messages->links()}}</div>
@else 
    <p>no messages found</p>
@endif
