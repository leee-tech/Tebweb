@extends('admin.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Doctor</li>
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

                    </p>
                </header>
                <div class="card-content">
                    <form method="post" action="{{route('users.store')}}">
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
                                        <input class="input" type="password" name="password" placeholder="Password" >
                                        <span class="icon left"><i class="mdi mdi-mail"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left icons-right">
                                        <input class="input" type="text" name="phone" placeholder="Phone" >
                                        <span class="icon left"><i class="mdi mdi-mail"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Hospitals</label>

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
                                <div class="field">
                                    <label class="label">Departments</label>

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



                                <div class="field">
                                    <div class="control icons-left icons-right">
                                        <select class="input"  name="gender" required>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>

                                        </select>
                                        <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>

                                    </div>
                                </div>
                                <div class="field spaced">
                                    <p class="control icons-left">
                                        <input class="input" id="bdate" type="date" name="bdate" placeholder="Date" required>
                                        <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                                        @if ($errors->has('bdate'))
                                            <span class="text-danger">{{ $errors->first('bdate') }}</span>
                                        @endif
                                    </p>

                                </div>
                                <div class="field spaced">
                                    <div class="control icons-left icons-right">
                                        <input class="input" id="age" type="number" name="age" placeholder="Age" required>
                                        <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                                        @if ($errors->has('age'))
                                            <span class="text-danger">{{ $errors->first('age') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left icons-right">
                                        <textarea class="input" name="address" placeholder="Address" ></textarea>
                                        <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>



                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">
                                    Submit
                                </button>
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
