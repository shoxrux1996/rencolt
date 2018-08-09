@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('styles')
<link href="https://fonts.googleapis.com/css?family=Headland+One" rel="stylesheet">
@endsection
@section('content')
    @include('navs.main', ['class' => "warning-color"])
    <!--Main layout-->
    <main id="cs7">
        <div class="container z-depth-7 example" id="cs10">
            <h2 class="h1-responsive font-weight-bold text-center" id="cs8"><span class="badge red darken-4" style="font-family: 'Headland One', serif; border-radius: 40px">@lang('главная.объекты') <i class="fa fa-list"></i></span></h2>
            <!--Section: Main info-->
            <section class="mt-5 wow zoomIn">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    @foreach($products as $product)
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                @if(json_decode($product->images) != null)
                                    <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('storage/'.$product->image_crop(json_decode($product->images)[0]))}}" alt="Card image cap">
                                @else
                                    <img class="img-fluid rounded-circle img-thumbnail" src="{{asset('assets/img/res/travertin.jpg')}}" alt="Card image cap">
                                @endif
                                <a href="{{route('object', $product->id)}}">
                                    <div class="mask flex-center ">
                                        <p class="white-text">
                                            <h1 class="white-text">{{$product->getTranslatedAttribute('name')}}</h1></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="{{route('object', $product->id)}}"><h4><span class="badge red darken-4 wow pulse infinite">{{$product->getTranslatedAttribute('name')}}</span></h4></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-fluid rounded-circle img-thumbnail" src="img/res/travertin.jpg" alt="Card image cap">
                                <a href="detail.html">
                                    <div class="mask flex-center ">
                                        <p class="white-text">
                                            <h1 class="white-text">Марка P4-20</h1></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="detail.html"><h4><span class="badge red darken-4 wow pulse infinite">Марка P4-20</span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-fluid rounded-circle img-thumbnail" src="img/res/travertin.jpg" alt="Card image cap">
                                <a href="detail.html">
                                    <div class="mask flex-center ">
                                        <p class="white-text">
                                            <h1 class="white-text">Марка P4-20</h1></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="detail.html"><h4><span class="badge red darken-4 wow pulse infinite">Марка P4-20</span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-fluid rounded-circle img-thumbnail" src="img/res/travertin.jpg" alt="Card image cap">
                                <a href="detail.html">
                                    <div class="mask flex-center ">
                                        <p class="white-text">
                                            <h1 class="white-text">Марка P4-20</h1></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="detail.html"><h4><span class="badge red darken-4 wow pulse infinite">Марка P4-20</span></h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4" data-toggle="tooltip" data-placement="top" title="Нажмитье чтобы просмотреть подробнее">
                        <div class=" wider ">
                            <!-- Card image -->
                            <div class="view view-cascade  overlay ">
                                <img class="img-fluid rounded-circle img-thumbnail" src="img/res/travertin.jpg" alt="Card image cap">
                                <a href="detail.html">
                                    <div class="mask flex-center ">
                                        <p class="white-text">
                                            <h1 class="white-text">Марка P4-20</h1></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row card-body  text-center">
                            <div class="col-md-12">
                                <a href="detail.html"><h4><span class="badge red darken-4 wow pulse infinite">Марка P4-20</span></h4></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!--Grid row-->
            </section>
        </div>
    </main>
    <!--Main layout-->
@endsection

