@extends('layouts.main')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ext2.css') }}">
<link rel="stylesheet" href="{{ asset('css/baguetteBox.min.css') }} " />
<link rel="stylesheet" href="{{ asset('assets/css/cards-gallery.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/partners.css') }}">
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
                            <div class="row" id="row1">
                                <div class="col-md-3">
                                  <div class="item">
                                       <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/cbb4ed58de854707da6c85e63f295784.png" class="img-responsive partner-image" alt="">
                                     <h3>ЧП «Micros Development»</h3>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="item">
                                       <img src="https://www.muic.uz/assets/public/images/resident-logo.png" class="img-responsive partner-image" alt="">
                                     <h3>ЧП «Special Soft»</h3>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="item">
                                       <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/2e0812e9cfa8cc919c32b09924f80ed7.png" class="img-responsive partner-image" alt="">
                                     <h3>ЧП «Datasite Technology»</h3>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="item">
                                       <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/aa88d66cfe837518ce8f8d2739daced7.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «Smart Technologies Group»</h3>
                                  </div>
                                </div>
                            </div> 
                            <div class="row" id="row2">
                               <div class="col-md-3">
                                  <div class="item">
                                     <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/9918b02d7d7faf29fd4981d3a9983dbe.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «Prime Media Solution»</h3>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="item">
                                     <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/046c8544a2fa0bd9c4057b706b9b0b96.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «Business Triangle»</h3>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="item">
                                     <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/85ac4155a56fb0ec1141ed0689b2b6f5.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «SBS-Infosoft»</h3>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="item">
                                     <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/bbd92586a1c790d8f85401e9ac43dd0d.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «Intelligent Solutions»</h3>
                                  </div>
                               </div>
                            </div> 
                            <div class="row" id="row3">
                               <div class="col-md-3">
                                  <div class="item">
                                     <img src="https://www.muic.uz/assets/public/images/resident-logo.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «Leading Business Software»</h3>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="item">
                                     <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/31f11d3bcfee5a06d88d5661ee33ee15.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «Venkon Group»</h3>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="item">
                                     <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/45232a347a3661a754f113bcec82ebc0.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «Wiener Deming»</h3>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="item">
                                     <img src="https://www.muic.uz/thumb/view/w/150/h/120/src/uploads/resident/3f34f178b62436e07013c38f2250217b.png" class="img-responsive partner-image" alt="">
                                     <h3>ООО «Fof Soft Technology»</h3>
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
