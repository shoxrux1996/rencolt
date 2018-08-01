<nav class="navbar navbar-white navbar-warning navbar-absolute" style="{{$style ? 'padding-top:70px;' : ''}}">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{route('index')}}">
            <div class="logo-container text-center">
                <div class="logo">
                    <img src="{{asset('assets/img/res/logo2.png')}}" height="90" alt="RENCOLT" rel="tooltip"
                         title="<b>RENCOLT</b> was Designed & Coded with care by the staff from <b>IUTLab</b>"
                         data-placement="bottom" data-html="true">
                </div>
            </div>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navigation-example">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="col-md-3 ">
                        <a href="{{route('index')}}" id="cs1" class="btn btn-simple "
                           >
                            @lang('главная.главная')
                        </a>

                    </div>
                </li>
                <li>
                    <div class="col-md-3 dropdown">
                        <a href="{{route('index')}} " id="cs1" class="btn btn-simple  dropdown-toggle" data-toggle="dropdown">
                            @lang('главная.каталог')
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{route('products')}}">@lang('главная.продукты')</a></li>
                            <li><a href="{{route('objects')}}">@lang('главная.объекты')</a></li>
                            <li><a href="{{route('videos')}}">@lang('главная.видео')</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="col-md-3 dropdown">
                        <a href="#" id="cs1" class="btn btn-simple  dropdown-toggle"
                           data-toggle="dropdown">
                            @lang('главная.информация')
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            @foreach($categories as $category)
                            <li><a href="{{route('category',$category->slug)}}">{{$category->getTranslatedAttribute('name')}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="col-md-3">
                        <a href="{{route('partners')}}" id="cs1" class="btn btn-simple">
                        @lang('главная.партрены')
                        </a>
                    </div>
                </li>
                <li>
                    <div class="col-md-3 dropdown">
                        <a href="{{route('aboutus')}}" id="cs1" class="btn btn-simple">
                            @lang('главная.о_нас')
                        </a>
                    </div>
                </li>
                <li>
                    <div class="col-md-3 dropdown">
                        <a href="#" id="cs1" class="btn btn-simple  dropdown-toggle" data-toggle="dropdown">
                            {{App::isLocale('uz') ? "UZB" : (App::isLocale('en') ? "ENG" : "РУС")}}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            @if(App::isLocale('uz'))

                               <li><a href="{{route('lang.switch', "ru")}}">РУС</a></li>

                                <li><a href="{{route('lang.switch', "en")}}">ENG</a></li>

                            @elseif(App::isLocale('en'))

                                <li><a href="{{route('lang.switch', "ru")}}">РУС</a></li>

                                <li><a href="{{route('lang.switch', "uz")}}">UZB</a></li>

                            @else
                               <li> <a href="{{route('lang.switch', "uz")}}">UZB</a></li>

                                <li><a href="{{route('lang.switch', "en")}}">ENG</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 navbar-right">
                    <ul class="nav navbar-nav navbar-right" id="cs2">
                        <li id="cs12">
                            <a href="#" target="_blank" id="cs1"
                               class="btn btn-simple  dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons fadeIn animated infinite">phone</i>&ensp;+998 97 777 44 14
                                &emsp; +998 77 441 44 55

                            </a>
                        </li>
                        <li>
                            <form action="{{ route('all') }}" method="get" class="form-group label-floating has-success">
                                <label class="control-label">@lang('главная.поиск')</label>
                                <input type="text" class="form-control" name="search"/>
                                <span class="form-control-feedback">
                                <i class="material-icons animated infinite swing">search</i>
                            </span>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>