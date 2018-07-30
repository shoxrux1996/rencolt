@extends('layouts.main')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ext2.css') }}">
@endsection
@section('title')
   Объекты
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
                                <form action="{{ route('objects.search') }}" method="get" id="productsForm">
                                <div class="col-md-3">
                                    <h3 class="title text-left">@lang('объекты.искать_объекты')</h3>
                                    <div class="row">
                                        <div class="col-md-12 form-group label-floating has-success">

                                            <label class="control-label text-left">@lang('объекты.поиск')</label>
                                            <input type="text" class="form-control" name="search" />
                                            <span class="form-control-feedback">
                                        <i class="material-icons animated infinite swing">search</i>
                                        </span>

                                        </div>

                                        <div class="col-md-12 ">
                                            <h3 class="title">@lang('объекты.категории')</h3>
                                            <input type="hidden" name="category" id="category">

                                            @foreach($categories as $category )
                                            <a href="#" onclick="formSubmit('{{$category->name_ru}}')" id="cs23"><h6 class="description">{{$category->getTranslatedAttribute('name')}} &ensp; &ensp; &ensp;&ensp;&ensp;&ensp;&ensp; {{$category->objects->count() != 0 ? $category->objects->count() : ''}}</h6></a>
                                            @endforeach
                                            
                                        </div>

                                        <div class="col-md-12">
                                            <h3 class="title text-left" id="cs14">@lang('объекты.новинки')</h3>

                                            <div class="row">
                                                @foreach($newProducts as $product)
                                                <div class="col-md-12 col-sm-6">
                                                    <div class="row">
                                                        <a href="{{ route('object', $product->id) }}" id="cs23">
                                                            <div class="col-md-10 text-left">
                                                                @if(json_decode($product->images) != null)
                                                                    <img src="{{ asset('storage/'.json_decode($product->images)[0]) }}" class="img-rounded" height="100">
                                                                @else
                                                                    <img src="{{ asset('assets/img/res/Chele.png') }}" class="img-rounded" height="100">
                                                                @endif
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
                                            <h3 class="title text-left">@lang('объекты.объекты')</h3>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                @foreach($products as $product)
                                                <div class="col-md-3">
                                                    <a href="{{ route('object', $product->id) }}" id="cs23">
                                                        <div class="container2" id="cs25">
                                                             @if(json_decode($product->images) != null)
                                                                    <img src="{{ asset('storage/'.json_decode($product->images)[0]) }}" alt="Avatar" class="image" id="cs24">
                                                                @else
                                                                    <img src="{{ asset('assets/img/res/Chele.png') }}" alt="Avatar" class="image" id="cs24">
                                                            @endif
                                                            <div class="middle">
                                                                <div class="text"><i class="fa fa-eye" aria-hidden="true"></i></div>
                                                            </div>
                                                            <h5 class="title text-center">{{$product->getTranslatedAttribute('name')}}</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endforeach
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