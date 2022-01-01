@extends('doctor.layout.app')
@section('section')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Profile
            </h1>
        </div>
    </section>

    <section class="section main-section items-center">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 mb-12">
            <div class="card">
                <div class="card-content">
                    <div class="image w-48 h-48 mx-auto">
                        <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
                    </div>
                    <hr>
                    <div class="field">
                        <label class="label">Full Name</label>
                        <div class="control">
                            <input type="text" disabled value="{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}" class="input is-static">
                        </div>
                    </div>
                    <hr>
                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control">
                            <input type="text" disabled value="{{auth()->user()->email}}" class="input is-static">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Phone</label>
                        <div class="control">
                            <input type="text" disabled value="{{auth()->user()->phone}}" class="input is-static">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Age</label>
                        <div class="control">
                            <input type="text" disabled value="{{auth()->user()->age}}" class="input is-static">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Gender</label>
                        <div class="control">
                            <input type="text" disabled value="{{auth()->user()->gender}}" class="input is-static">
                        </div>
                    </div>
                    <hr/>

                    <div class="field">
                        <label class="label">Hospital</label>
                        <div class="control">
                            <input type="text" disabled value="{{auth()->user()->hospital->name}}" class="input is-static">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Department</label>
                        <div class="control">
                            <input type="text" disabled value="{{auth()->user()->department->name}}" class="input is-static">
                        </div>
                    </div>
                    <hr/>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea style="width:800px; height:300px;"  type="text" disabled class="input is-static">{{auth()->user()->description}}</textarea>
                        </div>
                    </div>
                    <hr/>

                    <div class="field">
                        <label class="label">Address</label>
                        <div class="control">
                            <textarea type="text" disabled class="input is-static">{{auth()->user()->address}}</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
