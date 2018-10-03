@extends('layouts.main')
@section('title')
Uzbekistan
@endsection
@section('styles')
<link href="https://fonts.googleapis.com/css?family=Headland+One" rel="stylesheet">
@endsection
@section('content')
    @include('navs.main', ['class' => "transparent"])
    <!--Main layout-->
    <main id="cs7">
        <div class="container  example" id="cs10">
            <p class="text-center black-text" style="padding-top: 50px; "><button class="btn btn-black" style="border-radius: 40px"> <h3><b>ОБЪЕКТЫ </b></h3></button></p>
            <!--Section: Main info-->
            <section class="mt-5 wow zoomIn">
                <!--Grid row-->
                <div class="row">

                    <div class="col-md-12">

                        <div class="row">
                            @foreach($products as $product)
                                @if(json_decode($product->images) != null)
                                    @foreach(json_decode($product->images) as $key => $image)
                                    <div class="col-md-4 col-sm-6 mb-4">
                                        <div class="view overlay rounded  ">
                                            <a data-magnify="gallery" href="{{asset('storage/'.$image)}}">
                                                <img class="img-fluid " src="{{asset('storage/'.$product->image_crop($image))}}" style="width: 100%" alt="Sample image">
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <div class="fixed-action-btn smooth-scroll position-fixed animated wow fixed-bottom bounce infinite">
                        <button type="button" class="btn btn-warning waves-effect waves-light fixed-bottom  position-absolute position-fixed" data-toggle="modal" data-target="#centralModalDanger" style="border-radius: 400px"><i class="fa fa-phone"></i></button>
                    </div>
                </div>
                <!--Grid row-->
            </section>
        </div>
    </main>
    <!--Main layout-->
@endsection

