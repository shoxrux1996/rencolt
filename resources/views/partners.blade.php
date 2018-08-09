@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('content')
    @include('navs.main', ['class' => "warning-color"])
    <!--Main layout-->
    <main id="cs11" class="elegant-color">
        <div class="container z-depth-7 example  lime darken-1" id="cs10">
            <h2 class="h1-responsive font-weight-bold text-center" id="cs8"><span class="badge red darken-4" style="font-family: 'Headland One', serif; border-radius: 40px">@lang('главная.партнеры')</span></h2>
            <!--Section: Main info-->
            <section class="mt-5 wow zoomIn">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-fluid img-thumbnail" src="{{asset('assets/img/res/BASF.png')}}" alt="Card image cap">
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="#"><h4><span class="badge red darken-4 wow pulse infinite">BASF</span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-flui img-thumbnail" src="{{asset('assets/img/res/GUNKEM.jpg')}}" alt="Card image cap">
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="#"><h4><span class="badge red darken-4 wow pulse infinite">GUNKEM</span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-fluid img-thumbnail" src="{{asset('assets/img/res/PULCRA.png')}}" alt="Card image cap">
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="#"><h4><span class="badge red darken-4 wow pulse infinite">PULCRA</span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-fluid img-thumbnail" src="{{asset('assets/img/res/travertin.jpg')}}" alt="Card image cap">
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="#"><h4><span class="badge red darken-4 wow pulse infinite">Марка P4-20</span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-fluid img-thumbnail" src="{{asset('assets/img/res/travertin.jpg')}}" alt="Card image cap">
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="#"><h4><span class="badge red darken-4 wow pulse infinite">Марка P4-20</span></h4></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Grid row-->
            </section>
        </div>
    </main>
    <!--Main layout-->

@endsection

