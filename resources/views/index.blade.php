<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medical Rec.</title>

    <!-- css -->
    <link href="website_home/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="website_home/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="website_home/plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link href="website_home/css/nivo-lightbox.css" rel="stylesheet" />
    <link href="website_home/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
    <link href="website_home/css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="website_home/css/owl.theme.css" rel="stylesheet" media="screen" />
    <link href="website_home/css/animate.css" rel="stylesheet" />
    <link href="website_home/css/style.css" rel="stylesheet">

    <!-- boxed bg -->
    <link id="bodybg" href="website_home/bodybg/bg1.css" rel="stylesheet" type="text/css" />
    <!-- template skin -->
    <link id="t-colors" href="website_home/color/default.css" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="top-area">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
        <div class="container navigation">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <img src="new.jpg" alt="" width="100" height="100" />


            </div>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#intro"><H4><B>Home</B></H4></a></li>
                    <li><a href="#doctor"><H4><B>Doctors</B></H4></a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Section: intro -->
    <section id="intro" class="intro">
        <div class="intro-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                            <h1 class="h-ultra">Medical Rec.</h1 >
                        </div> <br>
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                            <h3 class="h-light">SAVE <span class="color">YOURSELFE </span> FROM <span style="color:RED;">COVID-19</span> </h3>
                        </div>
                        <div class="well well-trans">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">

                                <ul class="lead-list">
                                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Avoid not crowding</strong><br /></span></li>
                                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Wear a mask</strong><br /></span></li>
                                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Take the vaccine doses</strong><br /></span></li>
                                </ul>

                            </div>
                        </div>


                    </div>
                    <div class="col-lg-6">
                        <div class="form-wrapper">
                            <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                                <div class="panel panel-skin">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Login / Signup  <br><br></h3>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method="POST" action="{{route('auth.login')}}" class="lead">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control input-md" type="text" name="email" placeholder="user@example.com" autocomplete="username">
                                                        @if ($errors->has('email'))
                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control input-md" type="password" name="password" placeholder="Password" autocomplete="current-password">
                                                        @if ($errors->has('password'))
                                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @include('flash-message')

                                            <input type="submit" value="Login" class="btn btn-skin btn-block btn-lg">

                                            <B> <p class="lead-footer" >If you don't have an account<a  href="{{route('auth.login')}}"> <lable style="color:#1515bb;"> <u>CLICK HERE</u> ‏</lable></a></p></B>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /Section: intro -->

    <!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">

        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box text-center">

                            <i class="fa fa-check fa-3x circled bg-skin"></i>
                            <h4 class="h-bold">Make an appoinment</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box text-center">

                            <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                            <h4 class="h-bold">Git diagnosis online</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box text-center">
                            <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                            <h4 class="h-bold">Choose your Doctor</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box text-center">

                            <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                            <h4 class="h-bold">several clinics</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="doctor" class="home-section bg-gray paddingbot-60">
        <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                        <div class="section-heading text-center">
                            <h2 class="h-bold">Doctors</h2>
                            </p>
                        </div>
                    </div>
                    <div class="divider-short"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div id="filters-container" class="cbp-l-filters-alignLeft">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All (<div class="cbp-filter-counter"></div>)</div>
                    </div>

                    <div id="grid-container" class="cbp-l-grid-team">
                        <ul>
                            @foreach($doctors as $doctor)
                            <li class="cbp-item psychiatrist">

                                <a class="cbp-caption">

                                    <div class="cbp-caption-defaultWrap">
                                        <img src="website_home/img/tebweb.jpg" alt="" width="100%">
                                    </div>

                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="cbp-singlePage cbp-l-grid-team-name">{{$doctor->first_name .' ' .$doctor->last_name}}</a>

                                <div class="cbp-l-grid-team-position">{{$doctor->department->name ?? ''}}</div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <footer>

        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="text-left">
                                <p>&copy;Copyright 2022 - Medicla Rec. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="text-right">
                            </div>
                            <!--
                                All links in the footer should remain intact.
                                Licenseing information is available at: http://bootstraptaste.com/license/
                                You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Core JavaScript Files -->
<script src="website_home/js/jquery.min.js"></script>
<script src="website_home/js/bootstrap.min.js"></script>
<script src="website_home/js/jquery.easing.min.js"></script>
<script src="website_home/js/wow.min.js"></script>
<script src="website_home/js/jquery.scrollTo.js"></script>
<script src="website_home/js/jquery.appear.js"></script>
<script src="website_home/js/stellar.js"></script>
<script src="website_home/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="website_home/js/owl.carousel.min.js"></script>
<script src="website_home/js/nivo-lightbox.min.js"></script>
<script src="website_home/js/custom.js"></script>


</body>

</html>
