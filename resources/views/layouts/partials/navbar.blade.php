<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mynav">
    <a class="navbar-brand py-0 w-50" href="#" >
{{--        <img src="{{asset('assets/landing-page-main/img/logo.png')}}"  class="w-50">--}}
        <img src="{{ ($sitesetting->logo) ?  asset('storage/'.$sitesetting->logo) : asset('site/assets/images/logo.png') }}" alt="{{( $sitesetting->{'title_'. app()->getLocale()} )? $sitesetting->{'title_'. app()->getLocale()} :__('admin.menu.site_short') }}" class="brand-image w-25" style="max-height: 80px;max-width:150px">

    </a>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="btn btn-outline-info " href="#">{{ __('site.common.helpdesk') }} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-info " href="{{route('admin.login')}}">{{ __('site.login.login') }} <span class="sr-only">(current)</span></a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="btn btn-outline-primary" href="#">{{ __('site.login.registration') }} </a>--}}
{{--            </li>--}}
            <li class="nav-item dropdown" >
                <a class="btn btn-success rounded-pill" data-toggle="dropdown" href="#" aria-expanded="false">
                    {{ Config::get('languages')[App::getLocale()]['display'] }}
                </a>
                <div class="dropdown-menu" style="left: -70px;padding: 1px;width: fit-content">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <a style="padding :0;" href="{{ route('lang.switch', $lang) }}" class="btn btn-outline-success nav-link">
                                {{$language['display']}}
                            </a>
                        @endif
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
</nav>
