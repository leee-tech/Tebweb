@extends('patient.layout.app')
@section('section')
    @include('flash-message')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Admin</li>
                    <li>My Appointment</li>
                </ul>


            </div>
        </section>

        <section class="section main-section">
            <table>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date for</th>
                    <th scope="col">Created date</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $key=>$appointment)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if ($appointment->status == 0)
                                    <p>Not Visited</p>
                                @else
                                    <p>Checked-In</p>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <td>You have no any appointments</td>
                    @endforelse

                </tbody>
            </table>
        </section>

    </div>
@endsection
