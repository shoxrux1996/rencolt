@extends('layouts.main')
@section('title')
Uzbekistan
@endsection

@section('content')
    @include('navs.main', ['class' => "transparent"])

    <main id="cs7">
        <!-- Section: Magazine v.2 -->
        <section class=" container magazine-section">
            <!-- Section heading -->
            <h2 class="h1-responsive font-weight-bold text-center my-5" style="padding-top: 100px"><span class="btn btn-outline-black darken-4"><h3><b>{{$video->getTranslatedAttribute('name')}}</b></h3></span></h2>
            <!-- Section description -->
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-lg-12 col-md-12">
                    <!-- Featured news -->
                    <div class="single-news mb-lg-0 mb-4">
                        <!-- Image -->
                        <div class="view overlay rounded z-depth-1-half mb-4">

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->video}}"></iframe>
                            </div>


                        </div>

                    </div>
                    <!-- Featured news -->
                </div>
                <div class="col-lg-12 col-md-12 yellow lighten-3">
                    <!-- Excerpt -->
                    <h3 class="font-weight-bold black-text mb-3"><a>@lang('главная.описание')</a></h3>
                    <div class="black-text mb-lg-0 mb-md-5 mb-4 bq-warning blockquote">
                        {!!$video->getTranslatedAttribute('text')!!}
                    </div>
                    {{--<blockquote class="blockquote text-right">--}}
                        {{--<footer class="blockquote-footer mb-3">Source:--}}
                            {{--<cite data-toggle="tooltip" data-placement="top" title="www.wikipedia.org">Wikipedia</cite>--}}
                        {{--</footer>--}}
                    {{--</blockquote>--}}
                    <div class="col-md-12 col-lg-12">
                        <h3 class="font-weight-bold black-text mb-3"><a>@lang('главная.вы_можете')</a></h3>
                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalPoll"> <i class="fa fa-paper-plane ml-1"></i>@lang('главная.свяжитесь')</button>
                        <button class="btn btn-success mt-3 mb-3 btn-block" data-toggle="modal" data-target="#sideModalTR"><i class="fa fa-magic mr-1"></i> @lang('главная.узнать_адрес')</button>
                    </div>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                @if($relatedVideos->count() > 0)
                <div class="col-lg-12 col-md-12">
                    <div class="row text-center">
                        <div class="col-md-12 col-lg-12 pb-3 pt-3"><a href="video.html">
                                <h3 class="btn btn-outline-dark font-weight-bold dark-grey-text mb-3" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье_видео')">@lang('главная.похожие_видео')</h3></a>
                            <div class="row container">
                                <!-- Grid column -->
                                @foreach($relatedVideos as $related)
                                <div class="col-md-3 pt-3 col-sm-4">
                                    <div class="card card-cascade wider hoverable">
                                        <!-- Card image -->
                                        <div class="view view-cascade view-zoom overlay zoom">
                                            <img class="img-fluid" src="{{asset('assets/img/res/youtube.jpg')}}" alt="Card image cap">
                                            <a href="{{route('video',$related->id)}}">
                                                <div class="mask flex-center rgba-red-strong">
                                                    <p class="white-text">{{$related->getTranslatedAttribute('name')}}</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row card-body">
                                            <div class="col-md-6 col-sm-6">
                                                <a href="{{route('video',$related->id)}}"><span class="badge red"><i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>@lang('главная.видео')</span></a>
                                            </div>
                                            <div class="col-md-6 col-sm-6 text-center">
                                                <a href="{{route('video',$related->id)}}"><span class="badge black">@lang('главная.перейти') <i class="fa fa-forward wow infinite slideInRight"></i></span></a>
                                            </div>
                                        </div>
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

            <div class="fixed-action-btn smooth-scroll position-fixed animated wow fixed-bottom bounce infinite">
                <button type="button" class="btn btn-warning waves-effect waves-light fixed-bottom  position-absolute position-fixed" data-toggle="modal" data-target="#centralModalDanger" style="border-radius: 400px"><i class="fa fa-phone"></i></button>
            </div>
            <!-- Grid row -->
        </section>

    </main>
@endsection
