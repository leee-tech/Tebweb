@extends('admin.layout.app')
@section('section')
    @include('flash-message')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>Management Patients</li>
                </ul>
                <a href="{{route('patients.create')}}"  class="button blue">
                    <span>Create</span>
                </a>

            </div>
        </section>

        <section class="section main-section">
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $d)
                <tr>

                    <td data-label="Name">{{$d->first_name. ' '. $d->last_name}}</td>
                    <td data-label="Company">{{$d->email}}</td>
                    <td data-label="City">{{$d->phone}}
                    <td data-label="City">{{$d->age}}</td>
                    <td data-label="City">{{$d->gender}}</td>
                    {{--                    <td data-label="City">{{$d->position}}</td>--}}

                    <td class="actions-cell">
                        <div class="buttons right nowrap">
                            <a href="{{route('patients.edit',$d->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </a>
                            <a class="button small red --jb-modal" href="{{route('patients.destroy',$d->id)}}"
                               onclick="event.preventDefault();
                                   document.getElementById('delete-form-{{$d->id}}').submit();">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </a>
                            <form id="delete-form-{{$d->id}}" action="{{route('patients.destroy',$d->id)}}" method="POST" style="display: none;">
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>

    </div>
@endsection
