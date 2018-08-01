<!doctype html>
<html lang="{{\App::getLocale()}}">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }} ">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/apple-icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>RENCOLT - @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}"/>
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{asset('assets/css/material-kit.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ext.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/hover.css') }}">
    @yield('styles')
</head>

<body class="landing-page">

    @yield('content')
    <!-- Modal Core -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">@lang('главная.подробнее')</h4>
                </div>
                <div class="modal-body">
                    @lang('главная.подробнее_текст')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-simple" data-dismiss="modal">@lang('главная.спасибо')</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="telegramModal" tabindex="-1" role="dialog" aria-labelledby="telegramModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">@lang('главная.подробнее')</h4>
                </div>
                <div class="modal-body">
                    {{Session::get('message')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-simple" data-dismiss="modal">@lang('главная.спасибо')</button>
                </div>
            </div>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/material.min.js') }}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('assets/js/nouislider.min.js') }}" type="text/javascript"></script>
<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{ asset('assets/js/material-kit.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/slick.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.plate.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.demo').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            // prev arrow

            prevArrow: false,

            nextArrow: false,


            // Enables auto play of slides

            autoplay: true,

            autoplaySpeed: 2000,

            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ],


        });
    });

    $('#plate-default').plate();
    $('#plate-default2').plate();
</script>
@if(Session::has('message'))
<script type="text/javascript">
    $('#telegramModal').modal('show');
</script>
@endif
@yield('scripts')

</html>