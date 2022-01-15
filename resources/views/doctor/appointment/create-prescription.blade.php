@extends('doctor.layout.app')
@section('section')
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
    .kbw-signature { width: 100%; height: 100px;}
    #sig canvas{
        width: 100% !important;
        height: auto;
    }
</style>
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
                    <form method="post" action="{{route('appointments.prescription.store',$booking->id)}}">
                        @csrf
                        <table>
                            <thead class="ttttttttttt">
                            <tr >
                                <th scope="col">
                               Select Disease
                                </th>
                                <th scope="col">
                               Select Drug
                                </th>

                                <th scope="col">
                                    Usage Instruction
                                </th>
                                <th scope="col">
                                    Feedback
                                </th>

                            </tr>

                            <tr id="trxxx">
                                <th scope="col">
                                        <input class="input" type="text"  name="disease_id[]" required placeholder="Disease">
                                </th>
                                <th scope="col">
                                        <input class="input" type="text"  name="drug_id[]" required placeholder="Drug">
                                </th>
                                <th scope="col">
                                    <input class="input" type="text"  name="usage_instruction[]" required placeholder="Usage Instruction">
                                </th>
                                <th scope="col">
                                    <input class="input" type="text"  name="feedback[]" required placeholder="Feedback">
                                </th>
                                <th scope="col">
                                    <a href="#"  class="button small green --jb-modal xxxxx">
                                        <span class="icon"><i class="mdi mdi-clipboard-plus"></i></span>
                                    </a>
                                </th>
                            </tr>

                            </thead>
                        </table>
                        <div class="col-md-12">
                            <div id="sig" ></div>
                            <br/>
                            <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                        <p class="card-header-title">
                            <span class="icon"><i class="mdi mdi-ballot"></i></span>
                            Feed Back
                        </p>
                        <div class="col-md-12">
                            <textarea name="feedback_appointment" style=" width: 1400px;height: 150px;">{{$booking->feedback}}</textarea>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>

    <script type="text/javascript">
        $(document).ready(function() {
            console.log('2')
            $('.select-x').select2();
        });
        $(document).ready(function(){
            var counter = 0;
            $(document).on("click",".xxxxx",function(){
                var whole_extra_item_add = $('#trxxx').html();
                console.log('<tr>'+whole_extra_item_add+'<tr/>');

                $(this).closest(".ttttttttttt").append('<tr class="rerr">'+whole_extra_item_add+'  <th scope="col"> <a href="#" class="button small red --jb-modal removebtn"> <span class="icon"><i class="mdi mdi-delete-forever"></i></span> </a> </th><tr/>');
                counter++;
            });
            $(document).on("click",'.removebtn',function(event){
                $(this).closest(".rerr").remove();
                counter -= 1
            });

        });
    </script>

@endsection

