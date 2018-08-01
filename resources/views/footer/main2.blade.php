<div class="section landing-section" id="cs7">
    <div class="row container">
        <div class="col-md-4 col-md-offset-2">
            <h2 class="text-left title" id="cs11">@lang('главная.категория')</h2>
            <h4 class="text-left description" id="cs11">@lang('главная.категория_заглавие')</h4>
            <form class="contact-form">
                <div class="row">
                    @foreach($categories as $category)
                    <a href="{{ route('category', $category->slug) }}" id="cs23">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label" id="cs11">{{$category->getTranslatedAttribute('name')}}</label>
                            </div>

                        </div>
                    </a>
                    @endforeach
                </div>
            </form>
        </div>
       
        <div class="col-md-4">
            <h2 class="text-left title" id="cs11">@lang('продукты.свяжитесь_с')</h2>
            <div class="card card-signup card-raised" id="cs19">
                <form class="form" method="post" action="{{ route('telegram') }}">
                    @csrf
                    @if($errors->telegram->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->telegram->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="content">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">account_box</i>
                            </span>
                            <input type="text" class="form-control" placeholder="@lang('продукты.имя')" name="name" required="">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons" id="cs20">phone</i>
                            </span>
                            <input type="text" class="form-control" placeholder="@lang('продукты.номер')" name="phone" required>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons" id="cs10">message</i>
                            </span>
                            <input type="text" value="" placeholder="@lang('продукты.текст')" class="form-control" name="text" required/>
                        </div>
                    </div>
                    <div class="footer text-right">
                        <button type="submit" class="btn btn-info btn-lg btn-simple">@lang('продукты.отправить')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>