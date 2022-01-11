@extends('doctor.layout.app')
@section('section')
<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Profile
        </h1>
    </div>
</section>

<section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    Edit Profile
                </p>
            </header>
            <div class="card">
                <div class="card-content">

                    <hr>
                    <form action="{{route('doctor.profile.update')}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="field">
                            <label class="label">First Name</label>
                            <div class="control">
                                <input type="text" name="first_name" value="{{auth()->user()->first_name}}" class="input is-static">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Last Name</label>
                            <div class="control">
                                <input type="text" name="last_name" value="{{auth()->user()->last_name}}" class="input is-static">
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <label class="label">E-mail</label>
                            <div class="control">
                                <input type="text" name="email"  value="{{auth()->user()->email}}" class="input is-static">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Phone</label>
                            <div class="control">
                                <input type="text" name="phone"  value="{{auth()->user()->phone}}" class="input is-static">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Age</label>
                            <div class="control">
                                <input type="text" name="age"  value="{{auth()->user()->age}}" class="input is-static">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Gender</label>
                            <p class="control icons-left">
                                <select class="input"  name="gender" required>
                                    <option value="Male">Male</option>

                                    <option value="Female">Female</option>

                                </select>
                            </p>

                        </div>
                        <hr/>

                        <div class="field">
                            <label class="label">Hospital</label>

                            <div class="control icons-left icons-right">
                                <div class="select is-fullwidth">
                                    <select class="form-control" name="hospital_id">
                                        @foreach ($hospitals as $key)
                                            <option value="{{ $key->id }}" {{auth()->user()->hospital_id == $key->id ?'selected': ''}}>
                                                {{ $key->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="icon left"><i class="mdi mdi-adjust"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Department</label>

                            <div class="control icons-left icons-right">
                                <div class="select is-fullwidth">
                                    <select class="form-control" name="department_id">
                                        @foreach ($departments as $key)
                                            <option value="{{ $key->id }}" {{auth()->user()->department_id == $key->id ?'selected': ''}}>
                                                {{ $key->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="icon left"><i class="mdi mdi-adjust"></i></span>
                            </div>
                        </div>
                        <hr/>
                        <div class="field">
                            <label class="label">Description</label>
                            <div class="control">
                                <textarea style="width:800px; height:300px;"  type="text" name="description" class="input is-static">{{auth()->user()->description}}</textarea>
                            </div>
                        </div>
                        <hr/>

                        <div class="field">
                            <label class="label">Address</label>
                            <div class="control">
                                <textarea name="address" class="input is-static">{{auth()->user()->address}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="button green">
                            Edit
                        </button>
                    </form>


                </div>
            </div>

</section>
@endsection
