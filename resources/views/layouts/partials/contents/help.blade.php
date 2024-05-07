<div class="container pt-3">
    <div id="help_desk_main_row">
        <div class="row">
            <div class="col-md-12 h4 text-center text-success necessary-service-apply" tabindex="0">{{ __('site.help.title') }}</div>
        </div>
        <div class="help_desk_inner">
            <div class="d-sm-flex align-items-center">
                <div class="col-12 col-sm-7 col-md-7">
                    <div class="row border pointer rounded py-3 mt-3" onclick="divShowHide('commonly_asked_div_7','commonly_asked_icon_div_7');">
                        <div class="col-2 col-md-2 d-flex justify-content-center align-self-center text-end"><img class="img-fluid" src="https://www.mygov.bd/img/home/call_icon.png" alt=""></div>
                        <div class="col-10 col-md-10 d-flex justify-content-between align-self-center px-2 ">
                            <div class="col-md-11">{{ __('site.help.call') }}</div>
                            <div class="col-md-1  text-center" id="commonly_asked_icon_div_7"><i class="fas fa-chevron-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div id="commonly_asked_div_7" class="row">
                        <div class="container">
                            <div class="row border border-top-0 py-3 help_desk_grid">
                                <div class="col-11 ps-3">
                                    <h5 tabindex="0" aria-label="333 সরকারি তথ্য ও সেবা" class="m-0">333</h5>
                                    <h6 class="m-0 text-secondary">{{ __('site.help.governmentService') }}</h6>
                                </div>
                                <div class="col-1 d-flex justify-content-center align-self-center text-success ps-1">
                                    <i class="fas fa-phone-alt fa-lg" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row border border-top-0 py-3 help_desk_grid">
                                <div class="col-11 ps-3">
                                    <h5 tabindex="0" aria-label="999 জরুরি সেবা" class="m-0">999</h5>
                                    <h6 class="m-0 text-secondary">{{ __('site.help.emergency') }}</h6>
                                </div>
                                <div class="col-1 d-flex justify-content-center align-self-center text-success ps-1">
                                    <i class="fas fa-phone-alt fa-lg" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row border border-top-0 py-3 help_desk_grid">
                                <div class="col-11 ps-3">
                                    <h5 tabindex="0" aria-label="09666727278 মাইগভ সংক্রান্ত যেকোনো সমস্যা / জিজ্ঞাসা" class="m-0">09666727278</h5>
                                    <h6 class="m-0 text-secondary">{{ __('site.help.myGov') }}</h6>
                                </div>
                                <div class="col-1 d-flex justify-content-center align-self-center text-success ps-1">
                                    <i class="fas fa-phone-alt fa-lg" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-5 col-md-5">
                    <img class="img-fluid ms-0 ms-sm-3 ms-md-5" src="https://www.mygov.bd/img/home/help_desk_right.png" alt="Help Desk image">
                </div>
            </div>
        </div>
    </div>
</div>
