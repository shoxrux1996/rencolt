<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <div class="view" id="cs2">
                    <!-- Mask & flexbox options-->
                    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                        <!-- Content -->
                        <div class="text-left white-text mx-5 wow lightSpeedIn">
                            <h1 class="mb-4">
                                <strong class="display-4">@lang('главная.отточенто_краска')</strong>
                            </h1>
                            <p class="mb-4 d-md-block wow bounceIn" id="cs3">
                                <strong style="font-size: 30px">@lang('главная.справтесь')</strong>
                            </p>
                            <a href="{{route('products','Отточенто краска')}}" class="btn btn-deep-purple btn-lg wow flipInX" id="cs4" data-toggle="tooltip" data-placement="top" title="@lang('главная.перейти')">@lang('главная.читать')
                                <i class="fa fa-paste ml-2"></i>
                            </a>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Mask & flexbox options-->
                </div>
            </div>
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item">
                <div class="view" id="cs5">
                    <!-- Mask & flexbox options-->
                    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                        <!-- Content -->
                        <div class="text-left white-text mx-5 wow fadeInDown">
                            <h1 class="mb-4">
                                <strong class="display-4">@lang('главная.эмульсия')</strong>
                            </h1>
                            <p class="mb-4 d-md-block wow flipInX">
                                <strong style="font-size: 30px">@lang('главная.качество')</strong>
                            </p>
                            <a href="{{route('products','Эмульсия')}}" class="btn btn-pink btn-lg wow flipInY" data-toggle="tooltip" data-placement="top" title="@lang('главная.перейти')"
                                id="cs4">@lang('главная.узнать')
                                <i class="fa fa-paste ml-2"></i>
                            </a>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Mask & flexbox options-->
                </div>
            </div>
            <!--/Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <div class="view" id="cs6">
                    <!-- Mask & flexbox options-->
                    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                        <!-- Content -->
                        <div class="text-left white-text mx-5 wow slideInLeft">
                            <h1 class="mb-4">
                                <strong class="display-4">@lang('главная.клей')</strong>
                            </h1>
                            <p class="mb-4 d-md-block wow bounceIn">
                                <strong style="font-size: 30px">@lang('главная.мощный')</strong>
                            </p>
                            <a href="{{route('products','Клей ПВА')}}" class="btn btn-amber btn-lg wow flipInX" data-toggle="tooltip" data-placement="top" title="@lang('главная.перейти')"
                                id="cs4">@lang('главная.узнать')
                                <i class="fa fa-paste ml-2"></i>
                            </a>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Mask & flexbox options-->
                </div>
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->
