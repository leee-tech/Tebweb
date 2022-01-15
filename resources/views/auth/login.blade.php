@extends('layout.app')

@section('section')

    <title>Register</title>

    <body>

<div id="app">

    <section class="section main-section">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi  mdi-home"></i></span>
                    <a  href="{{route('home')}}">Register</a>
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action="{{route('auth.login')}}">
                    @csrf

                    <div style="margin: auto;
  width: 60%;
  padding: 10px;
">
                        <a href="{{route('signup')}}" class="button blue">

                            Register Patient
                        </a>

                        <a href="{{route('doctor.signup')}}" class="button blue">
                            Register Doctor
                        </a>
                    </div>





                </form>
            </div>
        </div>

    </section>


</div>
@endsection
<!-- Scripts below are for demo only -->
