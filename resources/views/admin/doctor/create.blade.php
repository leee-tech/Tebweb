@extends('admin.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Patient</li>
                    <li>create</li>
                    <li >New</li>

                </ul>

            </div>
        </section>

        <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    Forms
                </h1>
            </div>
        </section>

        <section class="section main-section">
            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Forms
                    </p>
                </header>
                <div class="card-content">
                    <form method="post" action="{{route('patients.store')}}">
                        @csrf
                        <div class="field">
                            <label class="label">From</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" id="first_name" name="first_name" placeholder="First Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" id="last_name" name="last_name" placeholder="Last Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control icons-left icons-right">
                                        <input class="input" type="email" name="email" placeholder="Email" >
                                            <span class="icon left"><i class="mdi mdi-mail"></i></span>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control icons-left icons-right">
                                        <input class="input" type="number" name="age" placeholder="Age" >
                                        <span class="icon left"><i class="mdi mdi-adjust"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left icons-right">
                                        <input class="input" type="password" name="password" placeholder="Password">
                                        <span class="icon left"><i class="mdi mdi-textbox-password"></i></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="field">
                            <label class="label">Address</label>
                            <div class="control">
                                <textarea class="textarea" name="address" placeholder="Address"></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">
                                    Submit
                                </button>
                            </div>
                            <div class="control">
                                <button type="reset" class="button red">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
