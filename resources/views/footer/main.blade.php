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
            <h2 class="text-left title" id="cs11">@lang('главная.контакты')</h2>
            <div class="card card-signup card-raised" id="plate-default">
                <form class="form" action="">
                    <div class="content">
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
                            <input type="password" placeholder="Uzbekistan, Tashkent, M.Ulugbek district"
                                   class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <a class="btn btn-simple btn-warning btn-lg">@lang('главная.наша_визитка')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>