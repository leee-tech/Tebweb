@extends('doctor.layout.app')

@section('section')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>


                <li>Patient's Medical Record</li>

            </ul>


        </div>
    </section>
    <section class="section main-section">
        <div class="card mb-6">
            <form action="{{ route('patient.medical.record') }}" method="get">
                <p><h1>Inter the SSN_Patient to show the Medical Record:</h1></p>
                <br>
                <div class="field">
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">

                                <input class="input" type="text" id="name" name="ssn" placeholder="Search SSN">
                                <span class="icon left"><i class="mdi mdi-account"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit" class="button blue">Search</button>

            </form>

            <br/>
        </div>
        @if(isset($patients))
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>By ALL</th>
                    <th>By Doctor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $d)
                    <tr>

                        <td data-label="Name">{{$d->first_name. ' '. $d->last_name}}</td>
                        <td data-label="Company">{{$d->email}}</td>
                        <td data-label="City">{{$d->phone}}
                        <td data-label="City">{{$d->age}}</td>
                        <td data-label="City">{{$d->gender}}</td>
                        {{--                    <td data-label="City">{{$d->position}}</td>--}}
                        <td class="actions-cell">
                            <div >
                                <a title="Appointment" href="{{route('patient.medical.appointment',$d->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="mdi mdi-calendar-clock"></i></span>
                                </a>
                                <a title="Prescription" href="{{route('patient.medical.prescription',$d->id)}}" alt class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="mdi mdi-library-books"></i></span>
                                </a>
                            </div>
                        </td>
                        <td class="actions-cell">
                            <div >

                                <a title="Appointment" href="{{route('patient.medical.appointment',[$d->id,'own'=>true])}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="mdi mdi-calendar-clock"></i></span>
                                </a>
                                <a title="Prescription" href="{{route('patient.medical.prescription',[$d->id,'own'=>true])}}" alt class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="mdi mdi-library-books"></i></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif

    </section>
@endsection
