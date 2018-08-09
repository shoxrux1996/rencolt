@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('content')
    @include('navs.main', ['class' => "warning-color"])
        <!--Main layout-->
        <main id="cs11" class="elegant-color-dark" style="background-image: url('{{asset('assets/cont.jpg')}}'); background-size: cover">
            <div class="container z-depth-7 example " id="cs10">
                <h2 class="h1-responsive font-weight-bold text-center" id="cs8"><span class="badge red darken-4" style="font-family: 'Headland One', serif; border-radius: 40px">@lang('главная.контакты')</span></h2>
                <!--Section: Main info-->
                <section class="mt-5 wow zoomIn">
                    <!--Grid row-->
                    <div class="card">
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
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="name" id="form-contact-name" class="form-control" required>
                                                    <label for="form-contact-name" class="">@lang('главная.имя')</label>
                                                </div>
                                            </div>
                                            <!-- Grid column -->
                                            <!-- Grid column -->
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="form-contact-phone" name="phone" class="form-control" required>
                                                    <label for="form-contact-phone" class="">@lang('главная.номер')</label>
                                                </div>
                                            </div>
                                            <!-- Grid column -->
                                        </div>
                                        <!-- Grid row -->

                                        <!-- Grid row -->
                                        <!-- Grid row -->
                                        <div class="row">
                                            <!-- Grid column -->
                                            <div class="col-md-12">
                                                <div class="md-form mb-0">
                                                    <textarea type="text" id="form-contact-message" name="text" class="form-control md-textarea" rows="3" required></textarea>
                                                    <label for="form-contact-message">@lang('главная.сообшение')</label>
                                                    <button type="submit" class="btn-floating btn-lg btn-block elegant-color-dark text-center text-white mt-4">
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
                            <div class="col-lg-4" style="background-color: #ffc947">
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
                                        <img src="{{asset('assets/img/res/cont.png')}}" width="300" height="250">
                                    </div>
                                </div>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                    <!--Grid row-->
                </section>
            </div>
        </main>
        <!--Main layout-->

@endsection

