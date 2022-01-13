@extends('doctor.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Add New Clinic</li>

                </ul>

            </div>
        </section>



        <section class="section main-section">
            <div class="card mb-6">

                <div class="card-content">
                    <form method="post" action="{{route('clinics.store')}}">
                        @csrf
                        <div class="field">
                            <label class="label">Add</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" required type="text" id="name" name="name" placeholder="Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left">
                                        <textarea  class="input" name="location_name" placeholder="Location"></textarea>
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">
                                   Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
