@extends('admin.layout.app')
@section('section')
    @include('flash-message')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>Management Doctors</li>
                </ul>
                <a href="{{route('users.create')}}"  class="button blue">
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
                    <th>Hospital</th>
                    <th>Department</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $d)
                <tr>

                    <td data-label="Name">{{$d->first_name. ' '. $d->last_name}}</td>
                    <td data-label="Email">{{$d->email}}</td>
                    <td data-label="Phone">{{$d->phone}}
                    <td data-label="Age">{{$d->age}}</td>
                    <td data-label="Gender">{{$d->gender}}</td>
                    <td data-label="Hospital">{{$d->hospital->name ?? ''}}</td>
                    <td data-label="Department">{{$d->department->name ?? ''}}</td>


                    {{--                    <td data-label="City">{{$d->position}}</td>--}}

                    <td class="actions-cell">
                        <div class="buttons right nowrap">


                            <a href="{{route('users.edit',$d->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </a>
                            @if($d->active == 0)
                            <a href="{{route('doctor.active',$d->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                <span class="icon"><i class="mdi mdi-account-check"></i></span>
                            </a>
                            @else
                            <a href="{{route('doctor.unactive',$d->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                <span class="icon"><i class="mdi mdi-block-helper"></i></span>
                            </a>

                            @endif
                            <a class="button small red --jb-modal" href="{{route('users.destroy',$d->id)}}"
                               onclick="event.preventDefault();
                                   document.getElementById('delete-form-{{$d->id}}').submit();">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>

    </div>
@endsection
