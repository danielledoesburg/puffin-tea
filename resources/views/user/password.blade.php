<form action="/account/password" method="POST" >
    @method('patch')
    @csrf
    <h3 class="fw-normal mb-5">General Infomation</h3>

    <div>
        <input 
            name="old_password"
            type="password" 
            id="old_password" 
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="old_password">Old password</label>
    </div>
    @error('old_password')
        <p>{{$message}}</p>
    @enderror
    <div>
        <input 
            name="password"
            type="password" 
            id="password" 
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="password">New password</label>
    </div>
    <div>
        <input 
            name="password_confirmation"
            type="password" 
            id="password_confirmation" 
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="password_confirmation">Confirm password</label>
    </div>
                                   
    <button type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Save</button>
</form>