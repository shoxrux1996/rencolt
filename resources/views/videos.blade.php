@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('content')
    @include('navs.main', ['class' => "transparent"])
    @include('navs.video')
    <!--Main layout-->
    <main id="scroll" style="background-image: url('{{asset('assets/img/res/videofon.jpg')}}'); background-size: cover">
        <div class="container z-depth-7 example">
            <h2 class="h1-responsive font-weight-bold text-center" id="cs8"><span class="badge red hoverable" style="border-radius: 30px">@lang('главная.видео') <i class="fa fa-youtube-play"></i></span></h2>
            <!--Section: Main info-->
            <section class="mt-5 wow zoomIn">
                <!--Grid row-->
                <div class="row">
                    @foreach($videos as $video)
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                        <div class="card card-cascade wider hoverable">
                            <!-- Card image -->
                            <div class="view view-cascade view-zoom overlay zoom">
                                <img class="img-fluid" src="{{asset('assets/img/res/youtube.jpg')}}" alt="Card image cap">
                                <a href="{{route('video',$video->id)}}">
                                    <div class="mask flex-center rgba-red-strong">
                                        <p class="white-text">{{$video->getTranslatedAttribute('name')}}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{route('video',$video->id)}}"><span class="badge red"><i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>@lang('главная.видео')</span></a>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <a href="{{route('video',$video->id)}}"><span class="badge black">@lang('главная.перейти') <i class="fa fa-forward wow infinite slideInRight"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
        <!--Grid row-->
        </section>
        </div>
    </main>
    <!--Main layout-->
@endsection
