@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('content')
    @include('navs.main', ['class' => "transparent"])
     <!--Main layout-->
     <main id="cs7">
         <section class=" container magazine-section pb-4">
             <!-- Section heading -->
             <h2 class="h1-responsive font-weight-bold text-center " style="padding-top: 100px; "><span class="btn btn-black darken-4" style="border-radius: 30px"><h3 style="font-weight: bold;margin:10px 0;"><b>{{$product->getTranslatedAttribute('name')}}</b></h3></span></h2>
             <!-- Section description -->
             <!-- Grid row -->
             <div class="row">
                 <!-- Grid column -->
                 <div class="col-lg-6 col-md-6">
                     <!-- Featured news -->
                     <div class="single-news mb-lg-0 mb-4">
                         <!-- Image -->
                         <div class="view overlay rounded z-depth-1-half mb-4" >
                             @if(json_decode($product->images) != null)
                                 <img class="img-fluid img-thumbnail" src="{{asset('storage/'.json_decode($product->images)[0])}}" style="width: 100%; border-color: black!important; border-radius: 30px" alt="Sample image">
                             @else
                                 <img class="img-fluid img-thumbnail" src="{{asset('assets/products-jpg/img8.jpg')}}" style="width: 100%; border-color: black!important; border-radius: 30px" alt="Sample image">
                             @endif
                             <a>
                                 <div class="mask rgba-white-slight"></div>
                             </a>
                         </div>
                         <!-- Data -->
                         <!-- <div class="news-data d-flex justify-content-between">
                             <a href="#!" class="deep-orange-text"><h6 class="font-weight-bold">Травертин</h6></a>

                         </div> -->
                         <!--Carousel Wrapper-->
                         <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
                             <!--Controls-->
                             <div class="controls-top text-center">
                                 <a class="black-text" href="#multi-item-example" data-slide="prev"><i class="fa fa-angle-left fa-3x pr-3"></i></a>
                                 <a class="black-text" href="#multi-item-example" data-slide="next"><i class="fa fa-angle-right fa-3x pl-3"></i></a>
                             </div>
                             <!--/.Controls-->
                             <!--Slides-->
                             <div class="carousel-inner" role="listbox">
                                 <!--First slide-->
                                 @foreach(json_decode($product->images) as $key=>$image)
                                     @if($key%4 == 0)<div class="carousel-item {{$key == 0 ? 'active' : ''}}">@endif
                                     <div class="col-md-3 mb-3">
                                         <a data-magnify="gallery" href="{{asset('storage/'.$image)}}">
                                             <div class="card">
                                                 <img class="img-fluid" src="{{asset('storage/'.$product->image_crop($image))}}" alt="Card image cap">
                                             </div></a>
                                     </div>
                                 @if($key%4 == 3 || $key == (count(json_decode($product->images))-1))</div>@endif
                                 <!--/.First slide-->
                                 @endforeach

                             </div>
                             <!--/.Slides-->
                         </div>
                         <!--/.Carousel Wrapper-->

                     </div>
                     <!-- Featured news -->
                 </div>
                 <div class="col-lg-6 col-md-6 yellow lighten-3" style="border-radius: 30px">
                     <!-- Excerpt -->
                     <h3 class="font-weight-bold text-center black-text detail-h3"><a>@lang('главная.описание')</a></h3>
                     <div class="black-text mb-lg-0 mb-md-5 mb-4 bq-warning blockquote detail-p">
                         {!! $product->text_ru !!}
                     </div>
                     {{--<blockquote class="blockquote text-right mt-10">--}}
                         {{--<footer class="blockquote-footer mb-3">Source:--}}
                             {{--<cite data-toggle="tooltip" data-placement="top" title="www.wikipedia.org">Wikipedia</cite>--}}
                         {{--</footer>--}}
                     {{--</blockquote>--}}
                     <div class="col-md-12 col-lg-12">
                         <h3 class="font-weight-bold black-text mb-3"><a>@lang('главная.вы_можете')</a></h3>
                         <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalPoll" style="border-radius: 30px"> <i class="fa fa-paper-plane ml-1"></i> @lang('главная.свяжитесь')</button>
                         <button class="btn btn-success mt-3 mb-3 btn-block" data-toggle="modal" data-target="#sideModalTR" style="border-radius: 30px"><i class="fa fa-magic mr-1"></i> @lang('главная.узнать_адрес')</button>
                     </div>
                 </div>
                </div>

             <div class="fixed-action-btn smooth-scroll position-fixed animated wow fixed-bottom bounce infinite">
                 <button type="button" class="btn btn-warning waves-effect waves-light fixed-bottom  position-absolute position-fixed" data-toggle="modal" data-target="#centralModalDanger" style="border-radius: 400px"><i class="fa fa-phone"></i></button>
             </div>
             <!-- Grid row -->
         </section>
    </main>
    <!--Main layout-->
@endsection

