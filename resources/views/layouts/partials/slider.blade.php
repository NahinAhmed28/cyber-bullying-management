<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/landing-page-main/img/banner_home/Banner-111.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-center align-middle btn btn-outline-success ">{{ __('site.slider.status') }}</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/landing-page-main/img/banner_home/Banner-222.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-center align-middle btn btn-outline-success">{{ __('site.slider.status') }}</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/landing-page-main/img/banner_home/Banner-333.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-center align-middle btn btn-outline-success ">{{ __('site.slider.status') }}</h3>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
