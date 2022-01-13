@extends('patient.layout.app')
@section('section')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">


    <style>
    img {

        max-width: 100%; }

    .preview {

        display: -webkit-box;

        display: -webkit-flex;

        display: -ms-flexbox;

        display: flex;

        -webkit-box-orient: vertical;

        -webkit-box-direction: normal;

        -webkit-flex-direction: column;

        -ms-flex-direction: column;

        flex-direction: column; }

    @media screen and (max-width: 996px) {

        .preview {

            margin-bottom: 20px; } }

    .preview-pic {

        -webkit-box-flex: 1;

        -webkit-flex-grow: 1;

        -ms-flex-positive: 1;

        flex-grow: 1; }

    .preview-thumbnail.nav-tabs {

        border: none;

        margin-top: 15px; }

    .preview-thumbnail.nav-tabs li {

        width: 18%;

        margin-right: 2.5%; }

    .preview-thumbnail.nav-tabs li img {

        max-width: 100%;

        display: block; }

    .preview-thumbnail.nav-tabs li a {

        padding: 0;

        margin: 0; }

    .preview-thumbnail.nav-tabs li:last-of-type {

        margin-right: 0; }

    .tab-content {

        overflow: hidden; }

    .tab-content img {

        width: 100%;

        -webkit-animation-name: opacity;

        animation-name: opacity;

        -webkit-animation-duration: .3s;

        animation-duration: .3s; }

    .card {

        background: #eee;

        padding: 3em;

        line-height: 1.5em; }

    @media screen and (min-width: 997px) {

        .wrapper {

            display: -webkit-box;

            display: -webkit-flex;

            display: -ms-flexbox;

            display: flex; } }

    .details {

        display: -webkit-box;

        display: -webkit-flex;

        display: -ms-flexbox;

        display: flex;

        -webkit-box-orient: vertical;

        -webkit-box-direction: normal;

        -webkit-flex-direction: column;

        -ms-flex-direction: column;

        flex-direction: column; }

    .colors {

        -webkit-box-flex: 1;

        -webkit-flex-grow: 1;

        -ms-flex-positive: 1;

        flex-grow: 1; }

    .product-title, .price, .sizes, .colors {

        text-transform: UPPERCASE;

        font-weight: bold; }

    .checked, .price span {

        color: #ff9f1a; }

    .product-title, .rating, .product-description, .price, .vote, .sizes {

        margin-bottom: 15px; }

    .product-title {

        margin-top: 0; }

    .size {

        margin-right: 10px; }

    .size:first-of-type {

        margin-left: 40px; }

    .color {

        display: inline-block;

        vertical-align: middle;

        margin-right: 10px;

        height: 2em;

        width: 2em;

        border-radius: 2px; }

    .color:first-of-type {

        margin-left: 20px; }

    .add-to-cart, .like {

        background: #ff9f1a !important;

        padding: 1.2em 1.5em !important;

        border: none;

        text-transform: UPPERCASE;

        font-weight: bold;

        color: #fff !important;

        -webkit-transition: background .3s ease;

        transition: background .3s ease; }

    .add-to-cart:hover, .like:hover {

        background: #b36800;

        color: #fff; }

    .not-available {

        text-align: center;

        line-height: 2em; }

    .not-available:before {

        font-family: fontawesome;

        content: "\f00d";

        color: #fff; }

    .orange {

        background: #ff9f1a; }

    .green {

        background: #85ad00; }

    .blue {

        background: #0076ad; }

    .tooltip-inner {

        padding: 1.3em; }
</style>
    @include('flash-message')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Paint</li>
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
                    <th scope="col">Rate</th>
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

                                <input   id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $appointment->rate }}" data-size="xs" disabled="">

                            </td>
                            <td>
                                @if ($appointment->status == 0)
                                    <p style="color: red">Not Visited</p>
                                @else
                                    <p style="color: #0d8ebd">Visited</p>
                                @endif
                            </td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <a href="{{route('show.prescription',$appointment->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                        <span class="icon"><i class="mdi mdi-medical-bag"></i></span>
                                    </a>
                                    @if ($appointment->status == 1)

                                    <a href="{{route('rate.view',$appointment->id)}}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                        <span class="icon"><i class="mdi mdi-account-star"></i></span>
                                    </a>
                                        @endif
                                </div>
                            </td>
                        </tr>

                    @empty
                        <td style="color: #d32020">You have no any appointments</td>
                    @endforelse

                </tbody>
            </table>
        </section>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


    <script type="text/javascript">

        $("#input-id").rating();

    </script>
@endsection
