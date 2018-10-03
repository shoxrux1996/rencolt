<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark {{$class == 'transparent' ? 'transparent' : 'warning-color' }} scrolling-navbar">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{route('index')}}">
                <img class="image-thumbnail" src="{{ asset('assets/img/res/logo2.png') }}" height="70" alt="Not Found!">
            </a>
            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse font-weight-bold" style="font-size: 16px" id="navbarSupportedContent">
                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    @foreach($categories as $category)
                    <li class="nav-item">
                            <a class="nav-link" href="{{route('products', $category->name_ru)}}">{{$category->getTranslatedAttribute('name')}}</a>
                        </li>
                    @endforeach
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('главная.дополнительно')</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('partners')}}">@lang('главная.партнеры')</a>
                            <a class="dropdown-item" href="{{route('aboutus')}}">@lang('главная.контакты')</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{App::isLocale('uz') ? "UZB" : (App::isLocale('en') ? "ENG" : "РУС")}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if(App::isLocale('uz'))
                            <a class="dropdown-item" href="{{route('lang.switch', "ru")}}">РУС</a>
                            <a class="dropdown-item" href="{{route('lang.switch', "en")}}">ENG</a>
                            @elseif(App::isLocale('en'))
                            <a class="dropdown-item" href="{{route('lang.switch', "ru")}}">РУС</a>
                            <a class="dropdown-item" href="{{route('lang.switch', "uz")}}">UZB</a>
                            @else
                            <a class="dropdown-item" href="{{route('lang.switch', "uz")}}">UZB</a>
                            <a class="dropdown-item" href="{{route('lang.switch', "en")}}">ENG</a>
                         @endif
                        </div>
                    </li>
                </ul>
                <!-- Right -->
                {{-- <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="#!" class="nav-link border border-light rounded">
                            <i class="black-text animated jackInTheBox infinite fa fa-phone mr-2"></i>{{env('PHONE')}}
                        </a>
                    </li>
                </ul> --}}
            </div>
        </div>
</nav>
<!-- Navbar -->
