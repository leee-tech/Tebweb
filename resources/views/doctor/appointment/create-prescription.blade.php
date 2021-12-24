@extends('doctor.layout.app')
@section('section')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>
                    <li>Department</li>
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
                            <tr id="trxxx">
                                <th scope="col">
                                    <input class="input" type="text"  name="symptoms[]" placeholder="Symptom" required>
                                </th>
                                <th scope="col">
                                    <input class="input" type="text"  name="medicines[]" placeholder="Medicine">
                                </th>
                                <th scope="col">
                                    <input class="input" type="text"  name="usage_instructions[]" placeholder="Usage Instruction">
                                </th>
                                <th scope="col">
                                    <input class="input" type="text"  name="feedbacks[]" placeholder="Feedback">
                                </th>
{{--                                <th scope="col">--}}
{{--                                    <input class="input" type="text" id="name" name="name[]" placeholder="Name">--}}
{{--                                </th>--}}
{{--                                <th scope="col">--}}
{{--                                    <input class="input" type="text" id="name" name="name[]" placeholder="Name">--}}
{{--                                </th>--}}
                                <th scope="col">
                                    <a href="#"  class="xxxxx">
                                        Submit
                                    </a>
                                </th>
                            </tr>

                            </thead>
                        </table>



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
    <script type="text/javascript">
        $(document).ready(function(){
            var counter = 0;
            $(document).on("click",".xxxxx",function(){
                var whole_extra_item_add = $('#trxxx').html();
                console.log('<tr>'+whole_extra_item_add+'<tr/>');

                $(this).closest(".ttttttttttt").append('<tr class="rerr">'+whole_extra_item_add+'  <th scope="col"> <a href="#" class="removebtn">Remove </a> </th><tr/>');
                counter++;
            });
            $(document).on("click",'.removebtn',function(event){
                $(this).closest(".rerr").remove();
                counter -= 1
            });

        });
    </script>

@endsection

