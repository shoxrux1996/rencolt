@extends('layouts.main')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ext2.css') }}">
<link rel="stylesheet" href="{{ asset('css/baguetteBox.min.css') }} " />
<link rel="stylesheet" href="{{ asset('assets/css/cards-gallery.css') }}">
@endsection
@section('title')
    Продукты
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
                                                @foreach($newProducts as $new)
                                                <div class="col-md-12 col-sm-6">
                                                    <div class="row">
                                                        <a href="{{ route('object', $new->id) }}" id="cs23">
                                                            <div class="col-md-10 text-left">
                                                                @if(json_decode($new->images) != null)
                                                                    <img src="{{ asset('storage/'.json_decode($new->images)[0]) }}" class="img-rounded" height="100">
                                                                @else
                                                                    <img src="{{ asset('assets/img/res/Chele.png') }}" class="img-rounded" height="100">
                                                                @endif
                                                                <h5 class="text-left">{{$new->getTranslatedAttribute('name')}}</h5>
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
                                            <a href="{{ route('objects') }}" id="cs23"><h3 class="title text-left"><i class="material-icons">keyboard_arrow_left</i> @lang('объекты.объекты')</h3></a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if(json_decode($product->images) != null)
                                                        <img src="{{ asset('storage/'.json_decode($product->images)[0]) }}" class="img-rounded img-responsive">
                                                    @else
                                                        <img src="{{ asset('assets/img/res/Chele.png') }}" class="img-rounded img-responsive">
                                                    @endif
                                                </div>
                                                <div class="col-md-12" id="cs14">
                                                    <div id="cs15" class="gallery-block cards-gallery">
                                                        @if(json_decode($product->images) != null)
                                                        @foreach(json_decode($product->images) as $image)
                                                        <div class="card" id="cs27">
                                                            <a class="" href="{{ asset('storage/'.$image) }}">
                                                         <img src="{{ asset('storage/'.$image) }}" alt="No Image" width="100" height="100" class="">
                                                        </a>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 container">
                                            <h3 class="title text-left"><b>{{$product->getTranslatedAttribute('name')}}</b></h3>
                                            <div class="col-md-12" id="cs16">
                                                <h5> {!! $product->getTranslatedAttribute('text')!!}</h5>
                                            </div>
                                            <div class="col-md-12 text-right" id="cs14">
                                                <button class="btn btn-white" data-toggle="modal" data-target="#myModal2" id="cs17">@lang('объекты.заказать')<i class="material-icons animated infinite fadeIn" id="cs18">shopping_cart</i></button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="title text-left">@lang('объекты.похожие')</h3>
                                            </div>
                                            <div class="col-md-12 ">
                                                <div class="row">
                                                    @foreach($relatedProducts as $related)
                                                    <a href="{{ route('object', $related->id) }}" id="cs23">
                                                        <div class="col-md-3 col-sm-6">
                                                            @if(json_decode($related->images) != null)
                                                                <img src="{{asset('storage/'.json_decode($related->images)[0])}}" class="img-rounded  img-raised" width="200">
                                                            @else
                                                                <img src="{{ asset('assets/img/res/Chele.png') }}" class="img-rounded  img-raised" width="200">
                                                            @endif
                                                            <h5 class="title text-left">{{$related->getTranslatedAttribute('name')}}</h5>
                                                        </div>
                                                    </a>
                                                   @endforeach
                                                </div>
                                            </div>
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

    <!-- Modal Core -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">@lang('продукты.свяжитесь')<i class="fa fa-telegram" style="color: lightblue"></i></h4>
                </div>
                <div class="modal-body">
                    <h5 class="title">@lang('продукты.заполните')</h5>
                    <img src="{{ asset('assets/img/telegram.png') }}" class="img-rounded img-responsive">
                    <div class="content">
                        <div class="input-group">
                            <span class="input-group-addon">
                                            <i class="material-icons">account_box</i>
                                        </span>
                            <input type="text" class="form-control" placeholder="@lang('продукты.имя')">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                            <i class="material-icons" id="cs8">phone</i>
                                        </span>
                            <input type="text" class="form-control" placeholder="@lang('продукты.номер')">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                            <i class="material-icons" id="cs10">message</i>
                                        </span>
                            <input type="text" value="" placeholder="@lang('продукты.текст')" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cs26">@lang('продукты.закрыть')</button>
                    <button type="button" class="btn btn-info" id="cs26">@lang('продукты.отправить')</button>
                </div>
                <hr>
            </div>
        </div>
    </div>
    @include('footer.footer')
@endsection
@section('scripts')
<script src="{{ asset('js/baguetteBox.min.js') }}"></script>
<script>
baguetteBox.run('.cards-gallery', { animation: 'slideIn' });
</script>
<script type="text/javascript">
    function formSubmit(name){
        $('#category').val(name);
        $('#productsForm').submit();
    }
</script>

@endsection
