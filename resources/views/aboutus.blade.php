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
                            <div class="detail-info">

                                <div class="row container">
                                    <div class="col-md-12 text-center">
                                        <h2><b>@lang('онас.онас')</b></h2>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <img src="assets/img/about.png" id="cs30" class="info-page img-raised" rel="tooltip" title="@lang('онас.текст_фото')" data-placement="top" data-html="true">
                                    </div>

                                  <div class="col-md-12" id="cs31"> 
                                <h2 class="title text-center"><b rel="tooltip" data-placement="bottom" data-html="true">@lang('онас.свяжитесь')</b></h2>
                                @lang('онас.текст')
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-center" id="cs31">
                                        <img src="assets/img/res/chele.png" height="200">
                                    </div>
                                <div class="col-md-6" id="cs31">
                                    <h3><b>@lang('онас.контакты')</b></h3>
                                    <p>
                                        <div class="form card">
                                <div class="content">
                                    <div class="footer text-center">
                                    <a class="btn btn-warning btn-lg">@lang('онас.визитка')</a>
                                </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" id="cs8">phone</i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="+998 97 444 55 56" disabled>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" id="cs9">email</i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="rencol.uz@gmail.com" disabled>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons" id="cs4">location_on</i>
                                        </span>
                                        <input type="password" placeholder="Uzbekistan, Tashkent, M.Ulugbek district" class="form-control" disabled />
                                    </div>
                                </div>
                                
                            </div>
                                    </p>
                                   
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
