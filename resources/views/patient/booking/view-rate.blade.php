@extends('patient.layout.app')
@section('section')

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
    /** rating **/
    div.stars {
        display: inline-block;
    }

    input.star { display: none; }

    label.star {
        float: right;
        padding: 10px;
        font-size: 20px;
        color:
            #444;
        transition: all .2s;
    }

    input.star:checked ~ label.star:before {
        content: '\f005';
        color:
            #e74c3c;
        transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
        color:
            #e74c3c;
        text-shadow: 0 0 5px
        #7f8c8d;
    }

    input.star-1:checked ~ label.star:before { color:
        #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
        content: '\f005';
        font-family: 'Font Awesome\ 5 Free';
    }


    .horline > li:not(:last-child):after {
        content: " |";
    }
    .horline > li {
        font-weight: bold;
        color: #ea0505;

    }
    /** end rating **/
</style>
<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <ul>

                    <li>Rating</li>

                </ul>

            </div>
        </section>



        <section class="section main-section">
            <div class="card mb-6">

                <div class="card-content">
                    <form method="post" action="{{route('rate.store',$booking->id)}}">
                        @csrf
                        <div class="txt-center">
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                            </div>

                        </div>
                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button green">
                                    Rate
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

