@extends('layout.app')
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br>

<br/>
<br/>
<br/>
<br/>
@section('section')

    <title>Register Doctor</title>

    <body>

<div id="app">

    <section class="section main-section">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    Register Doctor
                </p>





            </header>
            <div class="card-content">
                <form method="POST" action="{{route('doctor.signup.store')}}">
                    @csrf
                    <div class="field spaced">
                        <label class="label">First Name</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="first_name" placeholder="First Name" required>
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="field spaced">
                        <label class="label">Last Name</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="last_name" placeholder="Last Name" required>
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="field spaced">
                        <label class="label">Phone</label>
                        <div class="control icons-left">
                            <input class="input" type="number" name="phone" placeholder="Phone" required>
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="field spaced">
                        <label class="label">Email</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="email" placeholder="user@example.com" required>
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="field spaced">
                        <label class="label">Password</label>
                        <p class="control icons-left">
                            <input class="input" type="password" name="password" placeholder="Password" required>
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </p>
                    </div>
                    <div class="field spaced">
                        <label class="label">Birth date</label>
                        <p class="control icons-left">
                            <input class="input" id="bdate" type="date" name="bdate" placeholder="Date" required>
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                            @if ($errors->has('bdate'))
                                <span class="text-danger">{{ $errors->first('bdate') }}</span>
                            @endif
                        </p>

                    </div>

                    <div class="field spaced">
                        <label class="label">Age</label>
                        <p class="control icons-left">
                            <input class="input" id="age" type="number" name="age" placeholder="Age" required>
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                            @if ($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                        </p>

                    </div>

                    <div class="field spaced">
                        <label class="label">Hospital <small>(where you are work in )</small></label>

                        <div class="control icons-left icons-right">
                            <div class="select is-fullwidth">
                                <select class="form-control" name="hospital_id">
                                    @foreach ($hospitals as $key)
                                        <option value="{{ $key->id }}">
                                            {{ $key->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="icon left"><i class="mdi mdi-adjust"></i></span>
                        </div>
                    </div>
                    <div class="field spaced">
                        <label class="label">Department <small>(What is your specialty )</small></label>

                        <div class="control icons-left icons-right">
                            <div class="select is-fullwidth">
                                <select class="form-control" name="department_id">
                                    @foreach ($departments as $key)
                                        <option value="{{ $key->id }}">
                                            {{ $key->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="icon left"><i class="mdi mdi-adjust"></i></span>
                        </div>
                    </div>
                    <div class="field spaced">
                        <label class="label">Gender</label>
                        <p class="control icons-left">
                            <select class="input"  name="gender" required>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>

                            </select>
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                        </p>

                    </div>

                    <div class="field spaced">
                        <label class="label">Address</label>
                        <p class="control icons-left">
                            <textarea class="input" name="address" placeholder="Address" ></textarea>
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </p>

                    </div>


                    <hr>

                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button blue">
                                Register
                            </button>
                            <small> Wait the admin agreegation</small>
                            @include('flash-message')
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </section>


</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $('#bdate').on('change', function() {
        var today = new Date();
        var birthDate = new Date(this.value);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        $('#age').val(age);
    });

</script>
@endsection
<!-- Scripts below are for demo only -->
