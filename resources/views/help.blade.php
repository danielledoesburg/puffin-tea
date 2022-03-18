@if (session()->has('success'))
    <div>
        <p>{{session()->get('success')}}</p>
    </div>
@endif

@foreach ($faq as $q)
    <li>{{ $q->question }}</li>
    {{ $q->answer }}
    <hr>
@endforeach

<form action="/help" method="POST">
    @csrf
    <input type="text" name="name" value="{{ old('name') ?? Auth::user()->name }}">
    @error('name')
        <p>{{$message}}</p>
    @enderror
    <input type="text" name="email" value="{{ old('email') ?? Auth::user()->email }}">
    @error('email')
        <p>{{$message}}</p>
    @enderror
    <textarea name="message_text" cols="40" rows="5" value="{{ old('message_text') }}"></textarea>
    @error('message_text')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">submit</button>
</form>