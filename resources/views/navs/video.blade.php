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
            <div class="view" style="background-image: url('{{asset('assets/img/res/videoanim.jpg')}}'); background-size: cover">
                    <!-- Mask & flexbox options-->
                    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                        <!-- Content -->
                        <div class="text-left white-text mx-5 wow lightSpeedIn">
                            <h1 class="mb-4">
                             <strong class="display-2"><b>@lang('главная.видео_')</b></strong>
                            </h1>
                            <p class="mb-4 d-md-block wow bounceIn" id="cs3">
                                <strong style="font-size: 30px">@lang('главная.наслаждение')</strong>
                            </p>
                            <a href="#scroll" class="btn btn-red btn-lg wow flipInX smooth-scroll list-unstyled" id="cs4" data-toggle="tooltip" data-placement="top" title="@lang('главная.смотреть_лист')">@lang('главная.смотреть')
                <i class="fa fa-youtube-play ml-2"></i>
              </a>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Mask & flexbox options-->
                </div>
            </div>
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
