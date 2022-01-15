@extends('doctor.layout.app')

@section('section')
    @include('flash-message')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>

                    <li>diagnosis</li>
                </ul>
            </div>
        </section>

        <section class="section main-section">
            <table>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Patient name</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Drug</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Times of take Medicine</th>
                </tr>
                </thead>
                <tbody>
                @forelse($prescriptions as $key=>$prescription)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $prescription->user->first_name . ' ' . $prescription->user->last_name }}</td>
                        <td>{{ $prescription->doctor->first_name . ' ' . $prescription->doctor->last_name }}</td>
                        <td>{{ $prescription->drug_id}}</td>
                        <td>{{ $prescription->disease_id}}</td>
                        <td>{{ $prescription->usage_instruction }}</td>
                    </tr>
                @empty
                    <td>You have no any prescriptions</td>
                @endforelse

                </tbody>
            </table>
        </section>

    </div>
@endsection
