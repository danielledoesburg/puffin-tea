@section('footer')
<footer>
    <div class="newsletter ">
        <p>Sign up to our newsletter! </p>

        <form class="form" action="/newsletter" method="POST">
            @csrf
            Your e-mail: <input class="form-width" type="text" name="newsletter_email">
        </form>
        @error('newsletter_email')
            <p>{{ $message }}</p>
        @enderror

        @if(session()->has('newsletter_email'))
            <div class="alert alert-success">
                {{ session()->get('newsletter_email') }}
            </div>
        @endif
    </div>
    <p><img class="footer-image" src="https://i.ibb.co/vwGH5pk/footer-02.png"></p>
</footer>
@endsection
