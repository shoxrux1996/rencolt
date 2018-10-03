@extends('layouts.main')
{{--@section('styles')--}}

    {{--<link href="https://fonts.googleapis.com/css?family=Headland+One" rel="stylesheet">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.magnify.css')}}">--}}

    {{--<link href="{{asset('assets/css/snack-helper.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('assets/css/magnify-bezelless-theme.css')}}" rel="stylesheet">--}}
{{--@endsection--}}
@section('title')
Uzbekistan
@endsection
@section('content')
    @include('navs.main', ['class' => "transparent"])
    <!--Main layout-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            @if($products->count() > 4 || count(json_decode($category->images)) >  6)
                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            @endif
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <div class="view" style="background-image: url('{{asset('assets/objects/object (1).jpg')}}'); background-size: cover; ">
                    <!-- Mask & flexbox options-->
                    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                        <div class="row container"  style=" overflow: auto; height: 500px ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <!--Grid column-->
                                        @foreach($products as  $key => $product)
                                            @if($key < 4)
                                            <div class="col-md-4 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                                                <div class=" wider ">
                                                    <!-- Card image -->
                                                    <div class="view view-cascade  overlay ">
                                                        @if(json_decode($product->images) != null)
                                                            <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('storage/'.$product->image_crop(json_decode($product->images)[0]))}}" alt="Card image cap">
                                                        @else
                                                            <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('assets/img/res/travertin.jpg')}}" alt="Card image cap">
                                                        @endif
                                                        <a href="{{route('product', $product->id)}}">
                                                            <div class="mask flex-center ">
                                                                <h4 class="white-text"> {{$product->getTranslatedAttribute('name')}}</h4>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-md-12">
                                                        <a href="{{route('product', $product->id)}}"><h6><span class="btn btn-black wow pulse" style="border-radius: 40px">{{$product->getTranslatedAttribute('name')}}</span></h6></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        <div class="col-md-4 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                                            <div class=" wider ">
                                                <!-- Card image -->
                                                <div class="view view-cascade  overlay ">
                                                    <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('assets/img/res/house.gif')}}" alt="Card image cap">
                                                    <a href="{{route('objects', $category->name_ru)}}">
                                                        <div class="mask flex-center ">
                                                            <h4 class="white-text">@lang('главная.объекты')</h4>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <a href="{{route('objects', $category->name_ru)}}"><h4><span class="btn btn-black wow pulse" style="border-radius: 40px">@lang('главная.объекты')</span></h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                                            <div class=" wider ">
                                                <!-- Card image -->
                                                <div class="view view-cascade  overlay ">
                                                    <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('assets/img/res/video.jpg')}}" alt="Card image cap">
                                                    <a href="{{route('videos', $category->name_ru)}}">
                                                        <div class="mask flex-center ">
                                                            <h4 class="white-text"> @lang('главная.видео')</h4>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <a href="{{route('videos', $category->name_ru)}}"><h6><span class="btn btn-black wow pulse" style="border-radius: 40px"> @lang('главная.видео')</span></h6></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        @if(json_decode($category->images) != null)
                                            @foreach(json_decode($category->images) as $key => $image)
                                                @if($key < 6)
                                                <div class="col-md-4 mb-4">
                                                    <div class="view overlay rounded">
                                                        <a data-magnify="gallery" href="{{asset('storage/'.$image)}}">
                                                            <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('storage/'.$category->image_crop($image))}}" style="width: 100%" alt="Sample image">
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Mask & flexbox options-->
                </div>
            </div>
            @if($products->count() > 4 || count(json_decode($category->images)) >  6)
            <div class="carousel-item">
                <div class="view" style="background-image: url('{{asset('assets/objects/object (1).jpg')}}'); background-size: cover; ">
                    <!-- Mask & flexbox options-->
                    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                        <div class="row container"  style=" overflow: auto; height: 500px ">

                            <div class="col-md-6">
                                <div class="row">
                                    <!--Grid column-->
                                    @foreach($products as  $key => $product)
                                        @if($key > 3 && $key < 8)
                                            <div class="col-md-4 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                                                <div class=" wider ">
                                                    <!-- Card image -->
                                                    <div class="view view-cascade  overlay ">
                                                        @if(json_decode($product->images) != null)
                                                            <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('storage/'.$product->image_crop(json_decode($product->images)[0]))}}" alt="Card image cap">
                                                        @else
                                                            <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('assets/img/res/travertin.jpg')}}" alt="Card image cap">
                                                        @endif
                                                        <a href="{{route('product', $product->id)}}">
                                                            <div class="mask flex-center ">
                                                                <h4 class="white-text"> {{$product->getTranslatedAttribute('name')}}</h4>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-md-12">
                                                        <a href="{{route('product', $product->id)}}"><h6><span class="btn btn-black wow pulse" style="border-radius: 40px">{{$product->getTranslatedAttribute('name')}}</span></h6></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    @if(json_decode($category->images) != null)
                                        @foreach(json_decode($category->images) as $key => $image)
                                            @if($key > 5 && $key < 12)
                                                <div class="col-md-4 mb-4">
                                                    <div class="view overlay rounded">
                                                        <a data-magnify="gallery" href="{{asset('storage/'.$image)}}">
                                                            <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('storage/'.$category->image_crop($image))}}" style="width: 100%" alt="Sample image">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="fixed-action-btn smooth-scroll position-fixed animated wow fixed-bottom bounce infinite">
                <button type="button" class="btn btn-warning waves-effect waves-light fixed-bottom  position-absolute position-fixed" data-toggle="modal" data-target="#centralModalDanger" style="border-radius: 400px"><i class="fa fa-phone"></i></button>
            </div>
        </div>

    </div>


@endsection

