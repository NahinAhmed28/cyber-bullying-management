<footer>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-8">
                @if (@$sitesetting->{'footer_'. app()->getLocale()} )
                    {!! $sitesetting->{'footer_'. app()->getLocale()} !!}
                @else
                    {{(app()->getLocale() == 'en') ? 'Copyright © 2023 Expatriate Smart Centre - ESC, All rights reserved.' : 'প্রবাস স্মার্ট সেন্টার জন্য কপিরাইট © ২০২৩ ডকুমেন্টেশন। সমস্ত অধিকার সংরক্ষিত.'}}
                @endif
            </div>
            <div class="col-4 text-right">
                <img src="assets/landing-page-main/img/footer_company_1.png">
            </div>
        </div>
    </div>
</footer>
