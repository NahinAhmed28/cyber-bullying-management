<div class="container pt-3">
    <div class="row">
        <div class="col-md-12 h4 text-center text-success necessary-service-apply" tabindex="0">{{ __('site.faq.title') }}</div>
    </div>
    <div class="d-md-flex align-items-center">
        <div class="col-12 col-md-7">
            <div onclick="divShowHide('commonly_asked_div_1','commonly_asked_icon_div_1');">
                <div class="accti1 border rounded my-3 p-3 pointer" tabindex="0">
                    <div class="row">
                        <div class="col-10 col-md-11 fw-bold common-ask-title">
                            {{ __('site.faq.question1') }}
                        </div>
                        <div id="commonly_asked_icon_div_1" class="col-2 col-md-1"><i class="fas fa-chevron-up" aria-hidden="true"></i>
                        </div>
                        <div id="commonly_asked_div_1" class="col-12 col-md-11 common-ask-details" style="display: block;">
                            {{ __('site.faq.answer1') }}
                        </div>
                    </div>
                </div>
            </div>
            <script>
                jQuery(document).ready(function($) {
                    $(".accti1").keyup(function(event) {
                        if (event.keyCode === 13) {
                            $(this).click();
                        }
                    });
                });
            </script>
            <div onclick="divShowHide('commonly_asked_div_2','commonly_asked_icon_div_2');">
                <div class="accti1 border rounded my-3 p-3 pointer" tabindex="0">
                    <div class="row">
                        <div class="col-10 col-md-11 fw-bold common-ask-title">
                            {{ __('site.faq.question2') }}
                        </div>
                        <div id="commonly_asked_icon_div_2" class="col-2 col-md-1"><i class="fas fa-chevron-up" aria-hidden="true"></i>
                        </div>
                        <div id="commonly_asked_div_2" class="col-12 col-md-11 common-ask-details" style="display: block;">
                            <div>{!! __('site.faq.answer2') !!}</div>

                        </div>
                    </div>
                </div>
            </div>
            <script>
                jQuery(document).ready(function($) {
                    $(".accti1").keyup(function(event) {
                        if (event.keyCode === 13) {
                            $(this).click();
                        }
                    });
                });
            </script>
            <div onclick="divShowHide('commonly_asked_div_3','commonly_asked_icon_div_3');">
                <div class="accti1 border rounded my-3 p-3 pointer" tabindex="0">
                    <div class="row">
                        <div class="col-10 col-md-11 fw-bold common-ask-title">
                            {{ __('site.faq.question3') }}
                        </div>
                        <div id="commonly_asked_icon_div_3" class="col-2 col-md-1"><i class="fas fa-chevron-up" aria-hidden="true"></i>
                        </div>
                        <div id="commonly_asked_div_3" class="col-12 col-md-11 common-ask-details" style="display: block;">
                            {!! __('site.faq.answer3') !!}
                        </div>
                    </div>
                </div>
            </div>
            <script>
                jQuery(document).ready(function($) {
                    $(".accti1").keyup(function(event) {
                        if (event.keyCode === 13) {
                            $(this).click();
                        }
                    });
                });
            </script>
            <div onclick="divShowHide('commonly_asked_div_4','commonly_asked_icon_div_4');">
                <div class="accti1 border rounded my-3 p-3 pointer" tabindex="0">
                    <div class="row">
                        <div class="col-10 col-md-11 fw-bold common-ask-title">
                            {{ __('site.faq.question4') }}                        </div>
                        <div id="commonly_asked_icon_div_4" class="col-2 col-md-1"><i class="fas fa-chevron-up" aria-hidden="true"></i>
                        </div>
                        <div id="commonly_asked_div_4" class="col-12 col-md-11 common-ask-details" style="display: block;">
                            {!! __('site.faq.answer4') !!}
                        </div>
                    </div>
                </div>
            </div>
            <script>
                jQuery(document).ready(function($) {
                    $(".accti1").keyup(function(event) {
                        if (event.keyCode === 13) {
                            $(this).click();
                        }
                    });
                });
            </script>
            <script src="https://www.mygov.bd/js/home.js?v=1.0.1"></script>        </div>
        <div class="col-12 col-md-5">
            <img src="https://www.mygov.bd/img/home/commonly_asked_right_banner.png" alt="Frequently Asked Questions image" class="img-fluid ms-0 ms-md-5">
        </div>
    </div>
</div>
