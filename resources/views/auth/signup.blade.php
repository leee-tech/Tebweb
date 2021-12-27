@extends('layout.app')
<br/>
<br/>
<br/>
<br/>
@section('section')
    <title>Login</title>

    <body>

<div id="app">

    <section class="section main-section">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    Register
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action="{{route('signup.store')}}">
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
                            <input class="input" type="text" name="phone" placeholder="Phone" required>
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
                        <label class="label">Age</label>
                        <p class="control icons-left">
                            <input class="input" type="number" name="age" placeholder="Age" required>
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                            @if ($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                        </p>

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
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </section>


</div>
@endsection
<!-- Scripts below are for demo only -->
