@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('content')
    @include('navs.main', ['class' => "transparent"])
    @include('navs.carousel')
    <!--Main layout-->
    <main id="cs7">
        <div class="container z-depth-7 example">
            <h2 class="h1-responsive font-weight-bold text-center" id="cs8">
                <span class="badge red darken-4">@lang('главная.продукты')
                    <i class="fa fa-check"></i>
                </span>
            </h2>
            <!--Section: Main info-->
            <section class="mt-5 wow zoomIn">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    @foreach($categories as $category)
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="@lang('главная.нажмитье')">
                        <div class="card card-cascade wider hoverable">
                            <!-- Card image -->
                            <div class="view view-cascade view-zoom overlay zoom">
                            <img class="img-fluid" src="{{$category->image != null || $category->image != ''? asset('storage/'.$category->image) : asset('assets/img/res/travertin.jpg')}}" alt="Card image cap">
                                <a href="{{route('products', $category->name_ru)}}">
                                    <div class="mask flex-center rgba-blue-light">
                                        <p class="white-text">{{$category->getTranslatedAttribute('name')}}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{route('products', $category->name_ru)}}">
                                        <span class="badge red">
                                            <i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>{{$category->getTranslatedAttribute('name')}}</span>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <a href="{{route('products', $category->name_ru)}}">
                                        <span class="badge black">@lang('главная.перейти')
                                            <i class="fa fa-forward wow infinite slideInRight"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class="card card-cascade wider hoverable">
                            <!-- Card image -->
                            <div class="view view-cascade view-zoom overlay zoom">
                                <img class="img-fluid" src="img/res/pva.jpg" alt="Card image cap">
                                <a href="list.html">
                                    <div class="mask flex-center rgba-orange-strong">
                                        <p class="white-text">КЛЕЙ ПВА</p>
                                    </div>
                                </a>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-6 col-sm-6">
                                    <a href="video.html">
                                        <span class="badge red">
                                            <i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>КЛЕЙ ПВА</span>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <a href="video.html">
                                        <span class="badge black">Перейтьи
                                            <i class="fa fa-forward wow infinite slideInRight"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class="card card-cascade wider hoverable">
                            <!-- Card image -->
                            <div class="view view-cascade view-zoom overlay zoom">
                                <img class="img-fluid" src="img/res/emul.jpg" alt="Card image cap">
                                <a href="list.html">
                                    <div class="mask flex-center rgba-blue-strong">
                                        <p class="white-text">ГРУНТОВКА</p>
                                    </div>
                                </a>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-6 col-sm-6">
                                    <a href="video.html">
                                        <span class="badge red">
                                            <i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>ГРУНТОВКА</span>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <a href="video.html">
                                        <span class="badge black">Перейтьи
                                            <i class="fa fa-forward wow infinite slideInRight"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class="card card-cascade wider hoverable">
                            <!-- Card image -->
                            <div class="view view-cascade view-zoom overlay zoom">
                                <img class="img-fluid" src="img/res/emul.jpg" alt="Card image cap">
                                <a href="list.html">
                                    <div class="mask flex-center rgba-orange-strong">
                                        <p class="white-text">ЭМУЛЬСИЯ</p>
                                    </div>
                                </a>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-6 col-sm-6">
                                    <a href="video.html">
                                        <span class="badge red">
                                            <i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>ЭМУЛЬСИЯ</span>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <a href="video.html">
                                        <span class="badge black">Перейтьи
                                            <i class="fa fa-forward wow infinite slideInRight"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class="card card-cascade wider hoverable">
                            <!-- Card image -->
                            <div class="view view-cascade view-zoom overlay zoom">
                                <img class="img-fluid" src="img/res/otto.jpg" alt="Card image cap">
                                <a href="list.html">
                                    <div class="mask flex-center rgba-blue-light">
                                        <p class="white-text">ОТТОЧЕНТО КРАСКА</p>
                                    </div>
                                </a>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-12 col-sm-6">
                                    <a href="video.html">
                                        <span class="badge red">
                                            <i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>ОТТОЧЕНТО КРАСКА</span>
                                    </a>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <a href="video.html">
                                        <span class="badge black">Перейтьи
                                            <i class="fa fa-forward wow infinite slideInRight"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class="card card-cascade wider hoverable">
                                <!-- Card image -->
                                <div class="view view-cascade view-zoom overlay zoom">
                                    <img class="img-fluid" src="{{asset('assets/img/res/otto.jpg')}}" alt="Card image cap">
                                    <a href="{{route('objects')}}">
                                        <div class="mask flex-center rgba-blue-light">
                                            <p class="white-text">@lang('главная.объекты')</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="row card-body">
                                    <div class="col-md-6 col-sm-6">
                                        <a href="{{route('objects')}}">
                                            <span class="badge red">
                                                <i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>@lang('главная.объекты')</span>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <a href="{{route('objects')}}">
                                            <span class="badge black">@lang('главная.перейти')
                                                <i class="fa fa-forward wow infinite slideInRight"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class="card card-cascade wider hoverable">
                            <!-- Card image -->
                            <div class="view view-cascade view-zoom overlay zoom">
                                <img class="img-fluid" src="{{asset('assets/img/res/video.jpg')}}" alt="Card image cap">
                                <a href="{{route('videos')}}">
                                    <div class="mask flex-center rgba-red-strong">
                                        <p class="white-text">@lang('главная.видео')</p>
                                    </div>
                                </a>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{route('videos')}}">
                                        <span class="badge red">
                                            <i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>@lang('главная.видео')</span>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <a href="{{route('videos')}}">
                                        <span class="badge black">@lang('главная.перейти')
                                            <i class="fa fa-forward wow infinite slideInRight"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
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
