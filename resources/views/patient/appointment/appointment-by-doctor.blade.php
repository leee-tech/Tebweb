@extends('patient.layout.app')
@section('section')
    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Doctor Information
                </p>
            </header>
            <div class="card-content">
                        <p class="lead"> <b>Name</b>: {{ ucfirst($user->first_name . ' ' .$user->first_name) }}</p>
                <p class="lead"> <b>Department</b>: {{ ucfirst($user->department->name) }}</p>
                <p class="lead"> <b>Hospital</b>: {{ ucfirst($user->hospital->name) }}</p>
                <p class="lead"> <b>Rate Doctor</b>: {{ ucfirst($avg_rate) .' / '. '5' }}</p>

                        {{--                    <p class="lead"> Degree: {{ $user->education }}</p>--}}
                        {{--                    <p class="lead"> Specialist: {{ $user->department }}</p>--}}
                </div>

            </div>
        </div>
    </section>
    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Appointment Date: {{ $date }}
                </p>
            </header>
            <div class="card-content">
                <form action="{{route('bookings.store')}}" method="post">
                    @csrf
                    <table>
                        <thead>
                                @foreach ($times as $time)

                            <tr>
                                <th scope="col"> <label class="btn btn-outline-primary btn-block">
                                        <input type="radio" name="time" value="{{ $time->time }}">
                                        <span>{{ $time->time }}</span>
                                    </label></th>
                                <input type="hidden" name="doctorId" value="{{ $doctor_id }}">
                                <input type="hidden" name="appointmentId" value="{{ $time->appointment_id }}">
                                <input type="hidden" name="date" value="{{ $date }}">
                            </tr>
                                @endforeach
                        </thead>
                    </table>
                    <div class="card-footer">
                        <button type="submit" class="button green">Book Appointment</button>
                    </div>

                </form>

            </div>

        </div>
        </div>
    </section>

@endsection
