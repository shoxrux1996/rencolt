@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('content')
    @include('navs.main', ['class' => "transparent"])
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            @foreach($videos as $key => $video)
                <li data-target="#carousel-example-1z" data-slide-to="0" class="{{$key== 0 ? 'active' : ''}}"></li>
            @endforeach

        </ol>
        <!--/.Indicators-->
        <!--Slides-->

        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            @foreach($videos as $key=>$video)
                @if($key%3 ==0)
                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                    <div class="view" style="background-image: url('{{asset('assets/img/res/videoanim.jpg')}}'); background-size: cover; ">
                        <!-- Mask & flexbox options-->
                        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                            <div class="row container"  style=" padding-top: 150px; overflow: auto; height: 500px ">
                                @endif
                                <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                                    <div class="card card-cascade wider hoverable">
                                        <!-- Card image -->
                                        <div class="view view-cascade view-zoom overlay zoom">
                                            <img class="img-fluid" src="{{asset('assets/img/res/youtube.jpg')}}" alt="Card image cap">
                                            <a href="{{route('video', $video->id)}}">
                                                <div class="mask flex-center rgba-red-strong">
                                                    <p class="white-text">{{$video->getTranslatedAttribute('name')}}</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row card-body">
                                            <div class="col-md-6 col-sm-6">
                                                <a href="{{route('video', $video->id)}}"><span class="badge red"><i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>@lang('главная.видео')</span></a>
                                            </div>
                                            <div class="col-md-6 col-sm-6 text-center">
                                                <a href="{{route('video', $video->id)}}"><span class="badge black">@lang('главная.перейти') <i class="fa fa-forward wow infinite slideInRight"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($key%4 == 3 || $key == ($videos->count()-1))
                            </div>
                        </div>
                        <!-- Mask & flexbox options-->
                    </div>
                </div>
                @endif
            @endforeach
            @if($videos->count()  == 0)
                <div class="carousel-item active">
                    <div class="view" style="background-image: url('{{asset('assets/img/res/videoanim.jpg')}}'); background-size: cover; ">
                        <!-- Mask & flexbox options-->
                        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                            <div class="row container"  style=" padding-top: 150px; overflow: auto; height: 500px ">
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="fixed-action-btn smooth-scroll position-fixed animated wow fixed-bottom bounce infinite">
                <button type="button" class="btn btn-warning waves-effect waves-light fixed-bottom  position-absolute position-fixed" data-toggle="modal" data-target="#centralModalDanger" style="border-radius: 400px"><i class="fa fa-phone"></i></button>
            </div>

        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
@endsection
