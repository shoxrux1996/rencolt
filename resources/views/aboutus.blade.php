@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('content')
    @include('navs.main', ['class' => "transparent"])
    <!--Main layout-->
    <main id="cs11" class="elegant-color-dark" style="background-image: url('{{asset('assets/objects/object (6).jpg')}}'); background-size: cover">
    <div class="container z-depth-7 example " id="cs10">
        <h2 class="h1-responsive font-weight-bold text-center " style="padding-top: 20px; "><span class="btn btn-black darken-4" style="border-radius: 30px"><h3 style="font-weight: bold;margin:10px 0;"><b>@lang('главная.контакты')</b></h3></span></h2>
        <!--Section: Main info-->
        <section class="mt-5 wow zoomIn">
            <!--Grid row-->
            <div class="card" style="background-color: rgba(255,255,255,0.6); border-radius: 30px">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-lg-8">
                        <form action="{{route('telegram')}}" method="post">
                            @csrf
                        <div class="card-body form">
                            <!-- Header -->
                            <h3 class="mt-4"><i class="fa fa-envelope pr-2"></i>@lang('главная.свяжитесь')</h3>
                            <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" name="name" id="form-contact-name" class="form-control" required>
                                        <label for="form-contact-name" class="black-text">@lang('главная.имя')</label>
                                    </div>
                                </div>
                                <!-- Grid column -->

                            </div>
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input name="phone" type="text" id="form-contact-phone" class="form-control" required>
                                        <label for="form-contact-phone" class="black-text">@lang('главная.номер')</label>
                                    </div>
                                </div>
                                <!-- Grid column -->
                            </div>
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <textarea type="text" name="text" id="form-contact-message" class="form-control md-textarea" rows="3" required></textarea>
                                        <label for="form-contact-message" class="black-text">@lang('главная.сообшение')</label>
                                        <button type="submit" class="btn-floating btn-lg btn-block elegant-color-dark text-center text-white mt-4" style="border-radius: 30px">
                                            <i class="fa fa-send-o pr-2"></i>@lang('главная.отправить')
                                        </button>
                                    </div>
                                </div>
                                <!-- Grid column -->
                            </div>
                            <!-- Grid row -->
                        </div>
                        </form>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-lg-4" style="background-color: #ffc947; border-top-right-radius: 30px; border-bottom-right-radius: 30px">
                        <div class="card-body contact text-center h-100">
                            <h3 class="my-4"><b>@lang('главная.контакт')</b></h3>
                            <ul class="text-lg-left list-unstyled ml-4">
                                <li>
                                    <p><i class="fa fa-map-marker pr-2"></i>{{env('ADDRESS')}}</p>
                                </li>
                                <li>
                                    <p><i class="fa fa-phone pr-2"></i>{{env('PHONE')}}</p>
                                </li>
                                <li>
                                    <p><i class="fa fa-envelope pr-2"></i>{{env('EMAIL')}}</p>
                                </li>
                            </ul>
                            <hr class="hr-light my-4">
                            <ul class="list-inline text-center list-unstyled">
                                <li class="list-inline-item">
                                    <a class="p-2 fa-lg tw-ic">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="p-2 fa-lg li-ic">
                                        <i class="fa fa-linkedin"> </i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="p-2 fa-lg ins-ic">
                                        <i class="fa fa-instagram"> </i>
                                    </a>
                                </li>
                            </ul>
                            <div class="text-center">
                                <div class="map" style="width:300px!important; height: 400px; ">
                                    <iframe src="https://maps.google.com/maps?q=Mannon Uygur Street, Tashkent=&output=embed" scrolling="no" marginheight="0" marginwidth="0"  frameborder="0" style="border:0; width: 100%; height: 100%; "></iframe>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            <div class="fixed-action-btn smooth-scroll position-fixed animated wow fixed-bottom bounce infinite">
                <button type="button" class="btn btn-warning waves-effect waves-light fixed-bottom  position-absolute position-fixed" data-toggle="modal" data-target="#centralModalDanger" style="border-radius: 400px"><i class="fa fa-phone"></i></button>
            </div>
            <!--Grid row-->
        </section>
    </div>
</main>
    <!--Main layout-->
@endsection

