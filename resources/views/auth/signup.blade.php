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
                <form method="POST" action="/signup">
                    @csrf
                    <div class="field spaced">
                        <label class="label">First Name</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="first_name" placeholder="First Name" autocomplete="username">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <p class="help">
                            Please enter your First Name
                        </p>
                    </div>
                    <div class="field spaced">
                        <label class="label">Last Name</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="last_name" placeholder="Last Name" autocomplete="username">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <p class="help">
                            Please enter your Last Name
                        </p>
                    </div>
                    <div class="field spaced">
                        <label class="label">Email</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="email" placeholder="user@example.com" autocomplete="username">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <p class="help">
                            Please enter your Email
                        </p>
                    </div>
                    <div class="field spaced">
                        <label class="label">Password</label>
                        <p class="control icons-left">
                            <input class="input" type="password" name="password" placeholder="Password" autocomplete="current-password">
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </p>
                        <p class="help">
                            Please enter your password
                        </p>
                    </div>
                    <div class="field spaced">
                        <label class="label">Age</label>
                        <p class="control icons-left">
                            <input class="input" type="number" name="age" placeholder="Age" autocomplete="current-password">
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                            @if ($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                        </p>
                        <p class="help">
                            Please enter your Age
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
                        <p class="help">
                            Please enter your Address
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
