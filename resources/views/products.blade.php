@extends('layouts.main')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ext2.css') }}">
@endsection
@section('title')
    Лист Продукты
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
                                <form action="{{ route('products.search') }}" method="get" id="productsForm">
                                <div class="col-md-3">
                                    <h3 class="title text-left">@lang('продукты.искать_продукты')</h3>
                                    <div class="row">
                                        <div class="col-md-12 form-group label-floating has-success">

                                            <label class="control-label text-left">@lang('продукты.поиск')</label>
                                            <input type="text" class="form-control" name="search" />
                                            <span class="form-control-feedback">
                                        <i class="material-icons animated infinite swing">search</i>
                                        </span>

                                        </div>

                                        <div class="col-md-12 ">
                                            <h3 class="title">@lang('продукты.категории')</h3>
                                            <input type="hidden" name="category" id="category">
                                            <table class="table">
                                                <tbody>
                                                    @foreach($categories as $category )
                                                    <tr>
                                                        <td>
                                                            <a href="#" onclick="formSubmit('{{$category->name_ru}}')" id="cs23"><h6 class="description">{{$category->getTranslatedAttribute('name')}} </h6></a>
                                                        </td>
                                                        <td>
                                                            <h6>{{$category->products->count()}}</h6>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>

                                        <div class="col-md-12">
                                            <h3 class="title text-left" id="cs14">@lang('продукты.новинки')</h3>

                                            <div class="row">
                                                @foreach($newProducts as $product)
                                                <div class="col-md-12 col-sm-6 paddingTop">
                                                    <div class="row">
                                                        <a href="{{ route('product',$product->id) }}" id="cs23">
                                                            <div class="col-md-7">
                                                                @if(json_decode($product->images) != null)
                                                                    <img src="{{ asset('storage/'.json_decode($product->images)[0]) }}" class="img-rounded" height="100">
                                                                @else
                                                                    <img src="{{ asset('assets/img/res/Chele.png') }}" class="img-rounded" height="100">
                                                                @endif
                                                            </div>
                                                            <div class="col-md-5">
                                                                <h7 class="text-left">{{substr($product->getTranslatedAttribute('name'),0, 25)}} {{strlen($product->getTranslatedAttribute('name')) > 26 ? '...' : ''}}</h7>
                                                                <p class="text-left">{{date('Y-m-d',strtotime($product->created_at))}}</p>
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
                                            <h3 class="title text-left">@lang('продукты.продукты')</h3>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                @foreach($products as $product)
                                                <div class="col-md-3">
                                                    <a href="{{ route('product', $product->id) }}" id="cs23">
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
            @include('footer.main2')
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
