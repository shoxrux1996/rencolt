<!doctype html>
<html lang="{{\App::getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RENCOLT - @yield('title')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('assets/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/my.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/media.css')}}">
    @yield('styles')
</head>

<body>
    @yield('content')

    @include('footer.main')
    <!-- Modal: modalPoll -->
    <div class="modal fade right" id="modalPoll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-primary" role="document">
            <div class="modal-content">
                <!--Header-->
                <form action="{{route('telegram')}}" method="post">
                    <div class="modal-header">
                        <p class="heading lead">@lang('главная.отправить_сообщение')
                        </p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">×</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">

                            @csrf
                            <div class="text-center">
                                <i class="fa fa-paper-plane fa-4x mb-3 animated wobble"></i>
                                <p>
                                    <strong>@lang('главная.телеграм')</strong>
                                </p>
                                <p>@lang('главная.вы_точно')
                                    <strong></strong>@lang('главная.мы_всегда')</strong>
                                </p>
                            </div>
                            <hr>
                            <!-- Radio -->
                            <p class="text-center">
                                <strong>@lang('главная.заполните')</strong>
                            </p>
                            <!-- Radio -->
                            <p class="text-center">
                                <strong>@lang('главная.эту_форму')</strong>
                            </p>
                            <div class="md-form mt-3">
                                <input type="text" id="materialContactFormName" class="form-control" name="name" required>
                                <label for="materialContactFormName">@lang('главная.имя')</label>
                            </div>
                            <div class="md-form mt-3">
                                <input type="text" id="materialContactFormNumber" class="form-control" name="phone" required>
                                <label for="materialContactFormNumber">@lang('главная.номер')</label>
                            </div>
                            <!--Basic textarea-->
                            <div class="md-form">
                                <textarea type="text" id="form79textarea" class="md-textarea form-control" name="text" rows="3" required></textarea>
                                <label for="form79textarea">@lang('главная.сообшение')</label>
                            </div>

                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-md btn-primary" style="border-radius: 40px">@lang('главная.отправить')
                            <i class="fa fa-paper-plane ml-1 white-text"></i>
                        </button>
                        <button type="button" class="btn btn-md btn-red darken-4 waves-effect" data-dismiss="modal" style="border-radius: 40px">@lang('главная.закрыть')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal: modalPoll -->
    <!-- Side Modal Top Right -->
    <!-- To change the direction of the modal animation change .right class -->
    <div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-side modal-top-left" role="document">
            <div class="modal-content">
                <div class="modal-header orange lighten-1 black-text">
                    <h4 class="modal-title w-100" id="myModalLabel">@lang('главная.наш_адрес')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-location-arrow fa-4x mb-3 animated wobble"></i>
                        <p>
                            <strong>@lang('главная.локация')</strong>
                        </p>
                        <p>
                            <strong>@lang('главная.это_форма')
                            </strong>@lang('главная.наша_визитная')
                        </p>
                        <p>
                            <strong>@lang('главная.адресс'):
                            </strong>{{env('ADDRESS')}}
                        </p>
                        <p>
                            <strong>@lang('главная.номер'):
                            </strong>{{env('PHONE')}}
                        </p>
                        <p>
                            <strong>@lang('главная.время'):
                            </strong>9.00 - 18.00
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('aboutus')}}">
                        <button type="button" class="btn black btn-md" style="border-radius: 20px">@lang('главная.подробнее')</button>
                    </a>
                    <button type="button" class="btn btn-warning btn-md" data-dismiss="modal" style="border-radius: 20px">@lang('главная.закрыть')</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Side Modal Top Right -->
    <div class="modal fade" id="telegramModal" tabindex="-1" role="dialog" aria-labelledby="telegramModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        {{Session::get('message')}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-simple" data-dismiss="modal">@lang('главная.спасибо')</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('assets/js/mdb.min.js')}}"></script>
    @if(Session::has('message'))
    <script type="text/javascript">
        $('#telegramModal').modal('show');
    </script>
    @endif
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $("#alert-target").click(function() {
            toastr["info"]("I was launched via jQuery!")
        });
    </script>


    @yield('scripts')
</body>

</html>
