@extends('layouts.main')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ext2.css') }}">
@endsection
@section('title')
   Видео
@endsection
@section('content')
    @include('navs.main', ['style' => true])
    <div class="wrapper" id="cs2">
        <div class="main main-raised">
            <div class="container">
                <div class="section  section-landing container">
                    <div class="row">
                        <div class="col-md-12" id="cs22">
                            <div class="row">
                                <form action="{{ route('videos.search') }}" method="get" id="productsForm">
                                <div class="col-md-3">
                                    <h3 class="title text-left">@lang('видео.искать_видео')</h3>
                                    <div class="row">
                                        <div class="col-md-12 form-group label-floating has-success">

                                            <label class="control-label text-left">@lang('видео.поиск')</label>
                                            <input type="text" class="form-control" name="search" />
                                            <span class="form-control-feedback">
                                        <i class="material-icons animated infinite swing">search</i>
                                        </span>

                                        </div>

                                        <div class="col-md-12 ">
                                            <h3 class="title">@lang('видео.категории')</h3>
                                            <input type="hidden" name="category" id="category">

                                            @foreach($categories as $category )
                                            <a href="#" onclick="formSubmit('{{$category->name_ru}}')" id="cs23"><h6 class="description">{{$category->getTranslatedAttribute('name')}} &ensp; &ensp; &ensp;&ensp;&ensp;&ensp;&ensp; {{$category->videos->count() != 0 ? $category->videos->count() : ''}}</h6></a>
                                            @endforeach
                                            
                                        </div>

                                        <div class="col-md-12">
                                            <h3 class="title text-left" id="cs14">@lang('видео.новинки')</h3>

                                            <div class="row">
                                                @foreach($newProducts as $product)
                                                <div class="col-md-12 col-sm-6">
                                                    <div class="row">
                                                        <a href="{{ route('video', $product->id) }}" id="cs23">
                                                            <div class="col-md-10 text-left">
                                                                <img src="{{ asset('assets/img/play.gif') }}" class="img-rounded" height="100">
                                                                <h5 class="text-left">{{$product->getTranslatedAttribute('name')}}</h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <div class="col-md-9" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="title text-left">@lang('видео.видео')</h3>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="row">
                                                @foreach($products as $product)
                                                <div class="col-md-3">
                                                    <a href="{{ route('video', $product->id) }}" id="cs23">
                                                        <div class="container2" id="cs25">
                                                            <img src="{{ asset('assets/img/play.gif') }}" alt="Avatar" class="image" id="cs24">
                                                            <div class="middle">
                                                                <div class="text2"></div>
                                                            </div>
                                                            <h5 class="title text-center">{{$product->getTranslatedAttribute('name')}}</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12 text-center">
                                            {!! $products->links('pagination') !!}
                                    </div>
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
@section('scripts')
<script type="text/javascript">
    function formSubmit(name){
        $('#category').val(name);
        $('#productsForm').submit();
    }
</script>
@endsection
