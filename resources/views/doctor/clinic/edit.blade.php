@extends('doctor.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Clinic</li>
                    <li>Update</li>
                    <li> {{$clinics->name}}</li>
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
                    <form method="post" action="{{route('clinics.update',$clinics->id)}}">
                        @csrf
                        @method('patch')
                        <div class="field">
                            <label class="label">From</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" name="name" value="{{$clinics->name}}" placeholder="Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left">
                                        <textarea class="input" name="location_name" placeholder="Location">{{$clinics->location_name}}</textarea>
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
