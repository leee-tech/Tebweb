@extends('doctor.layout.app')
@section('section')
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Appointment</li>
                    <li>create</li>
                    <li>New</li>

                </ul>

            </div>
        </section>

        <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    Forms
                </h1>
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
                    <form method="post" action="{{route('appointments.store')}}">
                        @csrf

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
                        <div class="card">
                            <div class="card-header">
                                Choose AM Time
                                <span class="ml-auto">Check/Uncheck
                            <input type="checkbox"
                                   onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                        </span>
                            </div>
                            <div class="card-body">

                                <table class="table table-striped">


                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><input type="checkbox" name="time[]" value="6am"> 6am</td>
                                        <td><input type="checkbox" name="time[]" value="6.20am"> 6.20am</td>
                                        <td><input type="checkbox" name="time[]" value="6.40am"> 6.40am</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td><input type="checkbox" name="time[]" value="7am"> 7am</td>
                                        <td><input type="checkbox" name="time[]" value="7.20am"> 7.20am</td>
                                        <td><input type="checkbox" name="time[]" value="7.40am"> 7.40am</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td><input type="checkbox" name="time[]" value="8am"> 8am</td>
                                        <td><input type="checkbox" name="time[]" value="8.20am"> 8.20am</td>
                                        <td><input type="checkbox" name="time[]" value="8.40am"> 8.40am</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">4</th>
                                        <td><input type="checkbox" name="time[]" value="9am"> 9am</td>
                                        <td><input type="checkbox" name="time[]" value="9.20am"> 9.20am</td>
                                        <td><input type="checkbox" name="time[]" value="9.40am"> 9.40am</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">5</th>
                                        <td><input type="checkbox" name="time[]" value="10am"> 10am</td>
                                        <td><input type="checkbox" name="time[]" value="10.20am"> 10.20am</td>
                                        <td><input type="checkbox" name="time[]" value="10.40am"> 10.40am</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">6</th>
                                        <td><input type="checkbox" name="time[]" value="11am"> 11am</td>
                                        <td><input type="checkbox" name="time[]" value="11.20am"> 11.20am</td>
                                        <td><input type="checkbox" name="time[]" value="11.40am"> 11.40am</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Choose PM Time
                            </div>
                            <div class="card-body">

                                <table class="table table-striped">


                                    <tbody>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td><input type="checkbox" name="time[]" value="12pm"> 12pm</td>
                                        <td><input type="checkbox" name="time[]" value="12.20pm"> 12.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="12.40pm"> 12.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td><input type="checkbox" name="time[]" value="1pm"> 1pm</td>
                                        <td><input type="checkbox" name="time[]" value="1.20pm"> 1.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="1.40pm"> 1.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td><input type="checkbox" name="time[]" value="2pm"> 2pm</td>
                                        <td><input type="checkbox" name="time[]" value="2.20pm"> 2.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="2.40pm"> 2.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td><input type="checkbox" name="time[]" value="3pm"> 3pm</td>
                                        <td><input type="checkbox" name="time[]" value="3.20pm"> 3.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="3.40pm"> 3.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td><input type="checkbox" name="time[]" value="4pm"> 4pm</td>
                                        <td><input type="checkbox" name="time[]" value="4.20pm"> 4.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="4.40pm"> 4.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td><input type="checkbox" name="time[]" value="5pm"> 5pm</td>
                                        <td><input type="checkbox" name="time[]" value="5.20pm"> 5.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="5.40pm"> 5.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12</th>
                                        <td><input type="checkbox" name="time[]" value="6pm"> 6pm</td>
                                        <td><input type="checkbox" name="time[]" value="6.20pm"> 6.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="6.40pm"> 6.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">13</th>
                                        <td><input type="checkbox" name="time[]" value="7pm"> 7pm</td>
                                        <td><input type="checkbox" name="time[]" value="7.20pm"> 7.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="7.40pm"> 7.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">14</th>
                                        <td><input type="checkbox" name="time[]" value="8pm"> 8pm</td>
                                        <td><input type="checkbox" name="time[]" value="8.20pm"> 8.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="8.40pm"> 8.40pm</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">15</th>
                                        <td><input type="checkbox" name="time[]" value="9pm"> 9pm</td>
                                        <td><input type="checkbox" name="time[]" value="9.20pm"> 9.20pm</td>
                                        <td><input type="checkbox" name="time[]" value="9.40pm"> 9.40pm</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
    <script src="http://localhost/project/public/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            $("#datepicker").datetimepicker({
                format: 'MM-DD-YYYY'
            });
            alert('JQuery is ready!');
        });
    </script>
