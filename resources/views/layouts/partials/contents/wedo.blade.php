<section class="we-do">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="we-do-content">
                    <h4>{{ __('site.weDo.subscribe') }}</h4>
                </div>
                <div class="subscribe-option">
                    <form action="#">
                        <div class="col-md-12">
                            <input type="text" name="subscribe" placeholder="{{ __('site.weDo.write') }}">
                        </div>
                        <div class="col-md-12">
                            <button>{{ __('site.weDo.title') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="row data-main-section">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="data-section">
                            <div class="row">
                                <div class="col-md-2 data-section-icon">
                                    <i data-feather="user" class="feather theme-color"></i>
                                </div>
                                <div class="col-md-10 data">
                                    <p class="theme-color data-count"> 0</p>
                                    <p>{{ __('site.weDo.user') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="data-section">
                            <div class="row">
                                <div class="col-md-2 data-section-icon">
                                    <i data-feather="file-text" class="feather theme-color"></i>
                                </div>
                                <div class="col-md-10 data">
                                    <p class="theme-color data-count">0</p>
                                    <p>ইস্যুকৃত ডকুমেন্ট</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12 bottom-card">
                        <div class="data-section">
                            <div class="row">
                                <div class="col-md-2 data-section-icon">
                                    <i data-feather="briefcase" class="feather theme-color"></i>
                                </div>
                                <div class="col-md-10 data">
                                    <p class="theme-color data-count">0</p>
                                    <p> {{ __('site.weDo.issuer') }} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12 bottom-card">
                        <div class="data-section">
                            <div class="row">
                                <div class="col-md-2 data-section-icon">
                                    <i data-feather="file" class="feather theme-color"></i>
                                </div>
                                <div class="col-md-10 data">
                                    <p class="theme-color data-count">0 </p>
                                    <p> {{ __('site.weDo.requester') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 about-content-left mt-3 text-right">
                        <a href=""><i data-feather="arrow-right-circle" class="feather feather-16"></i>  {{ __('site.weDo.statistics') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
