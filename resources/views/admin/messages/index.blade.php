@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<a href="/admin/messages"><h1>Messages </h1></a>

<form action="#" method="GET">
    <input type="text" name="search" placeholder="find message">
    <label for="exact">Exact search</label>
    <input type="checkbox" name="exact" id="exact" value="true">

</form>

@if ($messages->total())
    @foreach ($messages as $message)
        <hr>
        <div>
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
            <a href="/admin/messages/{{ $message->id }}"><button>Show</button></a>
            <a href="/admin/messages/{{ $message->id }}/edit"><button>Edit</button></a>
        </div>
    @endforeach
    <div>{{ $messages->links()}}</div>
@else 
    <p>no messages found</p>
@endif
