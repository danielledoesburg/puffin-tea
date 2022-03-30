<form action="/admin/messages/{{ $message->id }}" method="POST">
    @method('PATCH')
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') ?? $message->name }}">
    </div>
    @error('name')
        <p>{{$message}}</p>
    @enderror
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ old('email') ?? $message->email }}">
    </div>
    @error('email')
        <p>{{$message}}</p>
    @enderror
    <div>
        <label for="message">Message</label>
        <textarea cols="40" rows="10" name="message" id="message">{{ old('message') ?? $message->message }}</textarea>
    </div>
    @error('message')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">submit changes</button>
</form>
<div>
    <a href="/admin/messages/{{ $message->id }}">
        <button>Cancel</button>
    </a>
</div>