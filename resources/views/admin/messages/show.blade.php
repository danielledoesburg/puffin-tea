@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div>
    {{ $message }}
</div>
<div><a href="/admin/messages/{{ $message->id }}/edit"><button>Edit</button></a></div>

<div>
    <a href="/admin/messages/{{ $message->id }}/edit">
        <form action="/admin/messages/{{ $message->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete message</button>
        </form>
    </a>
</div>

<div><a href="{{ url()->previous() }}"><button><- Back</button></a></div>