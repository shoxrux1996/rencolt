@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('styles')
<link href="https://fonts.googleapis.com/css?family=Headland+One" rel="stylesheet">
<style>
        @media (min-width: 68px) {
            .carousel-multi-item-2 .col-md-3 {
                float: left;
                width: 25%;
                max-width: 100%;
            }
        }

        .carousel-multi-item-2 .card img {
            border-radius: 4px;
        }
    </style>
@endsection
@section('content')
    @include('navs.main', ['class' => "warning-color"])
     <!--Main layout-->
     <main id="cs7">
        <!-- Section: Magazine v.2 -->
        <section class="card container magazine-section elegant-color">
            <!-- Section heading -->
            <h2 class="h1-responsive font-weight-bold text-center my-5" style="padding-top: 100px">
                <span class="badge red darken-4">{{$product->getTranslatedAttribute('name')}}</span>
            </h2>
            <!-- Section description -->
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-lg-6 col-md-6">
                    <!-- Featured news -->
                    <div class="single-news mb-lg-0 mb-4">
                        <!-- Image -->
                        <div class="view overlay rounded z-depth-1-half mb-4">
                            @if(json_decode($product->images) != null)
                            <img class="img-fluid" src="{{asset('storage/'.json_decode($product->images)[0])}}" style="width: 100%" alt="Sample image">
                            @else
                            <img class="img-fluid" src="{{asset('assets/img/res/travertin.jpg')}}" style="width: 100%" alt="Sample image">
                            @endif
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Data -->
                        <div class="news-data d-flex justify-content-between">
                            <a href="#!" class="deep-orange-text">
                                <h6 class="font-weight-bold">
                                    <i class="fa fa-cutlery pr-2"></i>{{$product->getTranslatedAttribute('name')}}</h6>
                            </a>
                            <p class="font-weight-bold white-text">
                                <i class="fa fa-clock-o pr-2"></i>{{date('d/m/Y',strtotime($product->created_at))}}</p>
                        </div>
                        <!--Carousel Wrapper-->
                        <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
                            <!--Controls-->
                            <div class="controls-top text-center">
                                <a class="black-text" href="#multi-item-example" data-slide="prev">
                                    <i class="fa fa-angle-left fa-3x pr-3"></i>
                                </a>
                                <a class="black-text" href="#multi-item-example" data-slide="next">
                                    <i class="fa fa-angle-right fa-3x pl-3"></i>
                                </a>
                            </div>
                            <!--/.Controls-->
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <!--First slide-->

                                <div class="carousel-item active">

                                    @foreach(json_decode($product->images) as $image)
                                    <div class="col-md-3 mb-3">
                                        <a href="{{asset('storage/'.$image)}}">
                                            <div class="card">
                                                <img class="img-fluid" src="{{asset('storage/'.$product->image_crop($image))}}" alt="Card image cap">
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <!--/.First slide-->
                                {{-- <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="col-md-3 mb-3">
                                        <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(53).jpg">
                                            <div class="card">
                                                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(53).jpg" alt="Card image cap">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(25).jpg">
                                            <div class="card">
                                                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(25).jpg" alt="Card image cap">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(47).jpg">
                                            <div class="card">
                                                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(47).jpg" alt="Card image cap">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(26).jpg">
                                            <div class="card">
                                                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(26).jpg" alt="Card image cap">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!--/.Second slide--> --}}
                            </div>
                            <!--/.Slides-->
                        </div>
                        <!--/.Carousel Wrapper-->
                        {{-- <table class="table table-hover white-text mb-4 mt-2">
                            <thead>
                                <tr>
                                    <th scope="col">Номер</th>
                                    <th scope="col">Код</th>
                                    <th scope="col">Цвет</th>
                                    <th scope="col">микрон (мм)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>P4-20</td>
                                    <td>Красный</td>
                                    <td>22.33</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>P4-22</td>
                                    <td>черный</td>
                                    <td>@12.20</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>В1-3</td>
                                    <td>черный</td>
                                    <td>@2.24</td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </div>
                    <!-- Featured news -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <!-- Excerpt -->
                    <h3 class="font-weight-bold white-text mb-3">
                        <a>@lang('главная.описание')</a>
                    </h3>
                    <div class="white-text mb-lg-0 mb-md-5 mb-4 bq-warning blockquote"> {!! $product->getTranslatedAttribute('text') !!}</div>
                    {{-- <blockquote class="blockquote text-right">
                        <footer class="blockquote-footer mb-3">Source:
                            <cite data-toggle="tooltip" data-placement="top" title="www.wikipedia.org">Wikipedia</cite>
                        </footer>
                    </blockquote> --}}
                    <div class="col-md-12 col-lg-12">
                        <h3 class="font-weight-bold white-text mb-3">
                            <a>@lang('главная.вы_можете')</a>
                        </h3>
                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalPoll">
                            <i class="fa fa-paper-plane ml-1"></i> @lang('главная.свяжитесь')</button>
                        <button class="btn btn-success mt-3 mb-3 btn-block" data-toggle="modal" data-target="#sideModalTR">
                            <i class="fa fa-magic mr-1"></i> @lang('главная.узнать_адрес')</button>
                    </div>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                @if($relatedProducts->count() > 0)
                <div class="col-lg-12 col-md-12">
                    <div class="row text-left">
                        <div class="col-md-6 col-lg-6 pb-3">
                            <h3 class="font-weight-bold white-text mb-3">
                                <a>@lang('главная.похожие')</a>
                            </h3>
                            <div class="row container">
                                <!-- Grid column -->
                                @foreach($relatedProducts as $related)
                                <div class="col-md-4 pt-3 col-sm-4">
                                    <!--Image-->
                                    <div class="view overlay rounded z-depth-1">
                                    @if(json_decode($related->images) != null)
                                    <img class="img-fluid" src="{{asset('storage/'.$related->image_crop(json_decode($related->images)[0]))}}" alt="Sample image">
                                    @else
                                    <img class="img-fluid" src="{{asset('assets/img/res/travertin.jpg')}}" alt="Sample image">
                                    @endif
                                        <a href="{{route('product', $related->id)}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!--Grid column-->

            </div>
            <!-- Grid row -->
        </section>
        <!-- Section: Magazine v.2 -->
    </main>
    <!--Main layout-->
@endsection

