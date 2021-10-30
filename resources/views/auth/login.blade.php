@extends('layout.app')

@section('section')
    <title>Login</title>

    <body>

<div id="app">

    <section class="section main-section">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    Login
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="field spaced">
                        <label class="label">Login</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="email" placeholder="user@example.com" autocomplete="username">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <p class="help">
                            Please enter your login
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



                    <hr>

                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button blue">
                                Login
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
