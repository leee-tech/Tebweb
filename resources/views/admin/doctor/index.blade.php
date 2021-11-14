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
                <a href="{{route('doctors.create')}}"  class="button blue">
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
                    <th>Department</th>
                    <th>Position</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $d)
                <tr>

                    <td data-label="Name">{{$d->user['first_name']. ' '. $d->user['last_name']}}</td>
                    <td data-label="Company">{{$d->user['email']}}</td>
                    <td data-label="City">{{$d->department['name']}}</td>
                    <td data-label="City">{{$d->position}}</td>

                    <td class="actions-cell">
                        <div class="buttons right nowrap">
                            <a href="{{route('doctors.edit',$d->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </a>
                            <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>

    </div>
@endsection
