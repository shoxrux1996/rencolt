<!-- Navbar -->
    <!--Carousel Wrapper-->
    <div>
        <ol class="carousel-indicators">
            <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
                <!--Controls-->
                <div class="controls-top text-center">
                    <a class="white-text" href="#multi-item-example" data-slide="prev"><i class="fa fa-angle-left fa-3x pr-3"></i></a>
                    <a class="white-text" href="#multi-item-example" data-slide="next"><i class="fa fa-angle-right fa-3x pl-3"></i></a>
                </div>
                <!--/.Controls-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    @foreach($categories as $key => $category)
                    @if($key%4 == 0)<div class="carousel-item {{$key == 0 ? 'active' : ''}}">@endif
                        <div class="col-md-3 mb-3 view view-cascade  overlay">
                            <a href="{{route('products', $category->name_ru)}}">
                                <div class="">
                                    <img class="img-fluid rounded-circle img-thumbnail index-image" src="{{$category->image != null || $category->image != ''? asset('storage/'.$category->image) : asset('assets/img/res/travertin.jpg')}}" alt="No Image">
                                </div>
                            </a>
                        </div>
                    @if($key%4 == 3 || $key == ($categories->count()-1))</div>@endif
                    @endforeach
                    <!--/.First slide-->
                </div>
            <!--/.Slides-->
            </div>
        </ol>
    </div>
    <!--/.Carousel Wrapper-->

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
                            <h4 class="mb-4 index-title">
                                <strong class="display-4">@lang('главная.отточенто_краска')</strong>
                            </h4>
                            <p class="mb-4 d-md-block wow bounceIn" id="cs3">
                                <strong style="font-size: 30px">@lang('главная.справтесь')</strong>
                            </p>
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
                            <h4 class="mb-4 index-title">
                                <strong class="display-4">@lang('главная.эмульсия')</strong>
                            </h4>
                            <p class="mb-4 d-md-block wow flipInX">
                                <strong style="font-size: 30px">@lang('главная.качество')</strong>
                            </p>

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
                            <h4 class="mb-4 index-title">
                                <strong class="display-4">@lang('главная.клей')</strong>
                            </h4>
                            <p class="mb-4 d-md-block wow bounceIn">
                                <strong style="font-size: 30px">@lang('главная.мощный')</strong>
                            </p>

                        </div>
                        <!-- Content -->

                    </div>
                    <!-- Mask & flexbox options-->
                </div>
            </div>
            <div class="fixed-action-btn smooth-scroll position-fixed animated wow fixed-bottom bounce infinite">
                <button type="button" class="btn btn-orange waves-effect waves-light fixed-bottom  position-absolute position-fixed" data-toggle="modal" data-target="#centralModalDanger" style="border-radius: 400px"><i class="fa fa-phone"></i></button>
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
