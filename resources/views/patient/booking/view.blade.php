@extends('patient.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>

                    <li> Take New Appointment </li>

                </ul>

            </div>
        </section>
        <section class="section main-section">
            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Search a department you want to visit                    </p>
                </header>
                <div class="card-content">
                    <form method="GET" action="{{route('bookings.index')}}">

                        <div class="field">
                            <label class="label">Department</label>
                            <div class="select is-fullwidth">

                                <select class="form-control" name="department_id">
                                    <option value="0">Select Department</option>
                                    @foreach ($departments as $key)
                                        <option value="{{ $key->id }}">
                                            {{ $key->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="field"> <br><br>
                            <label class="label">Date</label><SMALL></SMALL>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="date" id="name" name="date" placeholder="Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
<br>
                        <button type="submit" class="button blue">Search</button>

                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div style="color: #3ebe1e">Appointments available for today @isset($formatDate) {{ $formatDate }}
                        @endisset
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Hospital</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($doctors as $key=>$doctor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $doctor->doctor->first_name .' '.$doctor->doctor->last_name}}</td>
                                    <td>{{ $doctor->doctor->department->name }}</td>
                                    <td>{{ $doctor->doctor->hospital->name }}</td>
                                    <td>{{ $doctor->date }}</td>

                                    <td>
                                            <a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}"><button
                                                    class="button green">BOOK NOW</button></a>
                                        </td>

                                </tr>
                            @empty
                                <td style="color: #d32020">No doctors available</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
@endsection
