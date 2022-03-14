<form action="/account/password" method="Put">
    @csrf
    <h3 class="fw-normal mb-5">General Infomation</h3>

    <div>
        <input 
            name="first_name"
            type="text" 
            id="first_name" 
            value="{{ old('first_name') ?? $user->first_name }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="first_name">First name</label>
    </div>
    <div>
        <input 
            name="last_name"
            type="text" 
            id="last_name" 
            value="{{ old('last_name') ?? $user->last_name }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="last_name">Last name</label>
    </div>
    <div>
        <input 
            name="email"
            type="text" 
            id="email" 
            value="{{ old('email') ?? $user->email }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="email">Email</label>
    </div>
    <div>
        <input 
            name="phonenr"
            type="text" 
            id="phonenr" 
            value="{{ old('phonenr') ?? $user->phonenr }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="phonenr">Phonenr</label>
    </div>
                                   
    <button type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Save</button>
</form>

<form action="account{{Auth::user()->id}}" method="DELETE">
@csrf
<button type="submit">Delete account</button>
</form>