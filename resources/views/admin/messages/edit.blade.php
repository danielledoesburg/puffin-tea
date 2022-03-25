<form action="/admin/messages" method="POST">
    @method('PATCH')
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') ?? $message->name }}">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ old('email') ?? $message->email }}">
    </div>
    <div>
        <label for="message">Message</label>
        <textarea cols="40" rows="10" name="message" id="message">{{ old('message') ?? $message->message }}</textarea>
    </div>
    <button type="submit">submit changes</button>

</form>