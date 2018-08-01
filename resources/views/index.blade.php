@extends('layouts.main')
@section('title')
    Главная
@endsection
@section('content')
    @include('navs.main', ['style' => false])
    <div class="wrapper" id="cs2">
        <div class="header header-filter" id="cs3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 animated bounceInUp">
                        <h1 class="title" id="cs1">@lang('главная.заглавие')</h1>
                        <h4 id="cs1">@lang('главная.текст')</h4>
                        <br />
                        <div>
                            <a href="#" class="btn btn-white btn-raised btn-lg btn-round" data-toggle="modal" data-target="#myModal" style="color: black">
                                <i class="material-icons">subject</i>@lang('главная.подробнее')
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="row section">
                    <h2 class="title text-center">@lang('главная.новинки') <i class="material-icons animated infinite flash" id="cs4">fiber_new</i></h2>
                    <div class="slider demo col-md-12" id="cs5">
                        @foreach($products as $product)
                        <div class="col-md-4 ">
                            <div class="team">
                                <div class="team-player btn-tooltip hvr-curl-top-right">
                                    <a href="{{get_class($product) == 'App\Video' ? route('video', $product->id) : (get_class($product) == 'App\Objec' ? route('object', $product->id) : route('product', $product->id))}}">
                                        @if(get_class($product) != 'App\Video')
                                            @if(json_decode($product->images) != null)
                                            <img src="{{ asset('storage/'.json_decode($product->images)[0]) }}" alt="Thumbnail Image" class="img-raised img-rounded" width="250" height="200">
                                            @else
                                            <img src="{{ asset('assets/img/res/Chele.png') }}" alt="Thumbnail Image" class="img-raised img-rounded" width="250" height="200">
                                            @endif
                                        @else
                                            <img src="{{ asset('assets/img/play.gif') }}" alt="Thumbnail Image" class="img-raised img-rounded" width="250" height="200">
                                        @endif
                                    </a>
                                    <h4 class="title text-center">{{$product->getTranslatedAttribute('name')}} <br />
                                        <a href="{{get_class($product) == 'App\Video' ? route('video', $product->id) : (get_class($product) == 'App\Objec' ? route('object', $product->id) : route('product', $product->id))}}"><small class="text-muted btn btn-info btn-simple btn-sm">@lang('главная.смотреть') <i class="material-icons">visibility</i></small></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="section text-center section-landing container" id="cs28" >
                    <div class="row container">
                        <div class="col-md-12">
                            <h2 class="title">@lang('главная.о_компании')<i class="material-icons" id="cs6">help</i></h2>
                            <div class="row">
                                <div class="col-md-6" id="plate-default2">
                                    <img src="assets/img/res/Chele.png" class="img-rounded img-responsive img-raised">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="description" id="cs1">@lang('главная.о_компании_текст')</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('footer.main')
        </div>
    </div>
    @include('footer.footer')
@endsection
