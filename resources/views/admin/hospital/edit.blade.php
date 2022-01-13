@extends('admin.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Edit hospital</li>
                        <li> {{$hospital->name}}</li>
                </ul>

            </div>
        </section>



        <section class="section main-section">
            <div class="card mb-6">

                <div class="card-content">
                    <form method="post" action="{{route('hospitals.update',$hospital->id)}}">
                        @csrf
                        @method('patch')
                        <div class="field">
                            <label class="label">Edit</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" name="name" value="{{$hospital->name}}" placeholder="Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>

                        <hr>

                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">
                                    <Submit>Save</Submit>
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
