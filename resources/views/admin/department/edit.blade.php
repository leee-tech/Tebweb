@extends('admin.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Edit Department</li>

                    <li> {{$department->name}}</li>
                </ul>

            </div>
        </section>

        <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">

            </div>
        </section>

        <section class="section main-section">
            <div class="card mb-6">

                <div class="card-content">
                    <form method="post" action="{{route('departments.update',$department->id)}}">
                        @csrf
                        @method('patch')
                        <div class="field">
                            <label class="label">Name of department</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="text" name="name" value="{{$department->name}}" placeholder="Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>

                        <hr>
<br>
                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">
                                    Edit
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
