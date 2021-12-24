@extends('patient.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Appointment</li>
                    <li>Booking</li>

                </ul>

            </div>
        </section>
        <section class="section main-section">
            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Forms
                    </p>
                </header>
                <div class="card-content">
                    <form method="GET" action="{{route('bookings.index')}}">

                        <div class="field">
                            <label class="label">From</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="date" id="name" name="date" placeholder="Name">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="button blue">Check</button>

                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-header">List of Doctors Available: @isset($formatDate) {{ $formatDate }}
                        @endisset
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Expertise</th>
                                <th>Book</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($doctors as $key=>$doctor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $doctor->doctor->first_name }}</td>
                                    <td>{{ $doctor->doctor->department->name }}</td>
                                        <td>
                                            <a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}"><button
                                                    class="btn btn-primary">Appointment</button></a>
                                        </td>

                                </tr>
                            @empty
                                <td>No doctors available</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
@endsection
