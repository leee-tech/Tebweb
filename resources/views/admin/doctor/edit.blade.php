@extends('admin.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Doctor</li>
                    <li>Update</li>
                    <li> {{$doctor->user->first_name .' '.$doctor->user->last_name}}</li>
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
                    <form method="post" action="{{route('doctors.update',$doctor->id)}}">
                        @csrf
                        @method('patch')
                        <div class="field">
                            <label class="label">From</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" name="first_name" value="{{$doctor->user->first_name}}" placeholder="First Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" name="last_name" value="{{$doctor->user->last_name}}" placeholder="Last Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control icons-left icons-right">
                                        <input class="input" type="email" name="email" value="{{$doctor->user->email}}" placeholder="Email" >
                                            <span class="icon left"><i class="mdi mdi-mail"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left icons-right">

                                        <div class="select is-fullwidth">
                                            <select class="form-control" name="department_id">
                                                <option>Select Department</option>
                                                @foreach ($departments as $key => $value)
                                                    <option value="{{ $key }}" {{ ( $key == $doctor->department_id) ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="icon left"><i class="mdi mdi-adjust"></i></span>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control icons-left icons-right">
                                        <input class="input" type="text" name="position" value="{{$doctor->position}}" placeholder="Position" >
                                        <span class="icon left"><i class="mdi mdi-mail"></i></span>
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
@endsection
