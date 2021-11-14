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
                    <th>Age</th>
                    <th>Created</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $p)
                <tr>

                    <td data-label="Name">{{$p->user['first_name']. ' '. $p->user['last_name']}}</td>
                    <td data-label="Company">{{$p->user['email']}}</td>
                    <td data-label="City">{{$p->age}}</td>
                    <td data-label="City">{{$p->created_at}}</td>

                    <td class="actions-cell">
                        <div class="buttons right nowrap">
                            <a href="{{route('patients.edit',$p->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
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
